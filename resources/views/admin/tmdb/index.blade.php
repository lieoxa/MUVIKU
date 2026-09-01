@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <div class="card bg-light-info shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Import Data Film & TV Series dari TMDB API</h4>
                    <p class="mb-0">Cari dan pilih film atau TV series dari API TMDB untuk langsung di-import ke MUVIKU tanpa memakan storage laptop!</p>
                </div>
                <div class="col-3 text-center">
                    <i class="ti ti-cloud-download text-primary" style="font-size: 4rem;"></i>
                </div>
            </div>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="ti ti-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="ti ti-alert-triangle me-2"></i>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Form Pencarian TMDB -->
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('admin.tmdb.index') }}" method="GET" class="row g-3">
                <div class="col-md-9">
                    <div class="input-group">
                        <span class="input-group-text"><i class="ti ti-search"></i></span>
                        <input type="text" name="query" class="form-control form-control-lg" 
                               placeholder="Ketik judul film atau series (contoh: Avengers, Naruto, Spider-Man)..." 
                               value="{{ $query ?? '' }}" required>
                    </div>
                </div>
                <div class="col-md-3 d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="ti ti-search me-1"></i> Cari TMDB API
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Header Hasil -->
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h5 class="mb-0 fw-semibold">
            @if ($query)
                Hasil Pencarian untuk: "<span class="text-primary">{{ $query }}</span>"
            @else
                Film & TV Series Populer Hari Ini (TMDB API Live)
            @endif
        </h5>
        <span class="badge bg-primary rounded-pill px-3 py-2">0 MB Local Storage</span>
    </div>

    <!-- Grid Hasil Film & Series -->
    <div class="row">
        @forelse ($results as $item)
            @php
                $title = $item['title'] ?? $item['name'] ?? 'Tanpa Judul';
                $poster = $service->getImageUrl($item['poster_path'] ?? null);
                $releaseDate = $item['release_date'] ?? $item['first_air_date'] ?? '';
                $year = $releaseDate ? substr($releaseDate, 0, 4) : 'N/A';
                $mediaType = $item['media_type'] ?? (isset($item['title']) ? 'movie' : 'tv');
                $overview = Str::limit($item['overview'] ?? 'Tidak ada deskripsi tersedia.', 110);
            @endphp
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                    <div class="position-relative">
                        <img src="{{ $poster ?: asset('img/default-thumbnail.jpg') }}" 
                             class="card-img-top" 
                             style="height: 320px; object-fit: cover;" 
                             alt="{{ $title }}">
                        <span class="position-absolute top-0 end-0 badge {{ $mediaType === 'movie' ? 'bg-info' : 'bg-warning' }} m-2 px-3 py-2 text-uppercase">
                            {{ $mediaType === 'movie' ? 'Film' : 'Serial TV' }}
                        </span>
                        @if (!empty($item['vote_average']))
                            <span class="position-absolute bottom-0 start-0 badge bg-dark bg-opacity-75 m-2">
                                ⭐ {{ number_format($item['vote_average'], 1) }}
                            </span>
                        @endif
                    </div>
                    <div class="card-body d-flex flex-column p-3">
                        <h6 class="card-title fw-bold text-truncate mb-1" title="{{ $title }}">{{ $title }}</h6>
                        <small class="text-muted mb-2"><i class="ti ti-calendar me-1"></i>{{ $year }}</small>
                        <p class="card-text text-muted small flex-grow-1" style="font-size: 0.85rem;">{{ $overview }}</p>
                        
                        <form action="{{ route('admin.tmdb.import') }}" method="POST" class="mt-2">
                            @csrf
                            <input type="hidden" name="tmdb_id" value="{{ $item['id'] }}">
                            <input type="hidden" name="media_type" value="{{ $mediaType }}">
                            <button type="submit" class="btn btn-outline-primary w-100 rounded-pill">
                                <i class="ti ti-plus me-1"></i> Import ke MUVIKU
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <i class="ti ti-movie-off text-muted" style="font-size: 3rem;"></i>
                <p class="mt-2 text-muted">Tidak ada hasil ditemukan dari API TMDB.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
