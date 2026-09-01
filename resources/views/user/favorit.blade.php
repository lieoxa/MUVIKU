<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="theme-color" content="#111215" />
    <title>Film Favorit — MUVIKU</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400;1,600&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- Master Premium CSS -->
    <link rel="stylesheet" href="{{ asset('css/muviku-premium.css') }}">
</head>

<body>
    <!-- TOP NAVBAR -->
    <nav class="navbar sticky-top py-3" style="background: rgba(17, 18, 21, 0.92); backdrop-filter: blur(20px); border-bottom: 1px solid rgba(255, 255, 255, 0.06); z-index: 1000;">
        <div class="container-fluid px-3 px-md-5 d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-3">
                <a href="{{ route('utama') }}" class="btn-mv-secondary py-1.5 px-3 text-decoration-none" style="font-size: 13.5px;">
                    <i class="bi bi-chevron-left"></i> Kembali
                </a>
                <span class="fs-5 fw-bold text-white"><i class="bi bi-heart-fill text-danger me-2"></i>Film Favorit</span>
            </div>
            <a href="{{ route('utama') }}" class="d-flex align-items-center text-decoration-none">
                <img src="{{ asset('img/muviku.png') }}" alt="MUVIKU" style="max-height: 40px; width: auto;" loading="lazy">
            </a>
        </div>
    </nav>

    <!-- CONTENT -->
    <main class="container px-3 px-md-4 pt-4 pb-5 mb-5" style="max-width: 1200px;">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div>
                <h1 class="fs-4 fw-bold text-white mb-1">Koleksi Favorit</h1>
                <p class="text-secondary small mb-0">Semua film dan tayangan yang Anda sukai di satu tempat.</p>
            </div>
            <span class="badge bg-danger bg-opacity-25 text-danger border border-danger border-opacity-25 rounded-pill px-3 py-1.5 font-monospace">
                {{ $films->count() }} Disukai
            </span>
        </div>

        @if($films->isNotEmpty())
            <div class="row g-3 row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6">
                @foreach ($films as $film)
                    <div class="col">
                        <a href="{{ route('film.detail', $film->id) }}" class="text-decoration-none">
                            <div class="mv-movie-card">
                                <span class="mv-card-badge" style="background: rgba(225, 29, 72, 0.85);"><i class="bi bi-heart-fill me-1"></i> Favorit</span>
                                <img src="{{ $film->thumbnail_url }}" alt="{{ $film->judul }}" loading="lazy">
                                <div class="mv-card-overlay">
                                    <div class="mv-card-play-btn"><i class="bi bi-play-fill"></i></div>
                                    <div class="fw-bold text-white fs-6 text-truncate mb-1">{{ $film->judul }}</div>
                                    <div class="text-secondary small d-flex align-items-center justify-content-between">
                                        <span>{{ $film->tahun }}</span>
                                        <span class="text-warning"><i class="bi bi-star-fill"></i> 4.9</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-5">
                <i class="bi bi-heart fs-1 text-danger opacity-75 mb-3 d-block"></i>
                <h4 class="text-white fw-bold mb-2">Belum Ada Film Favorit</h4>
                <p class="text-secondary small mb-4">Ketuk tombol suka pada detail film yang Anda gemari untuk menambahkannya ke koleksi ini.</p>
                <a href="{{ route('utama') }}" class="btn-mv-primary text-decoration-none">
                    <i class="bi bi-compass"></i> Jelajahi Film Sekarang
                </a>
            </div>
        @endif
    </main>

    <!-- FLOATING BOTTOM NAVIGATION BAR -->
    <div class="mv-bottom-nav-container">
        <nav class="mv-bottom-nav">
            <a href="{{ route('utama') }}" class="mv-nav-item">
                <i class="bi bi-house-door-fill"></i>
                <span class="d-none d-sm-inline">Beranda</span>
            </a>
            <a href="{{ url('/search') }}" class="mv-nav-item">
                <i class="bi bi-search"></i>
                <span class="d-none d-sm-inline">Cari</span>
            </a>
            <a href="{{ route('watchlist') }}" class="mv-nav-item">
                <i class="bi bi-bookmark-fill"></i>
                <span class="d-none d-sm-inline">Watchlist</span>
            </a>
            <a href="{{ route('favorit') }}" class="mv-nav-item active">
                <i class="bi bi-heart-fill"></i>
                <span class="d-none d-sm-inline">Favorit</span>
            </a>
            <a href="{{ route('profile') }}" class="mv-nav-item">
                <i class="bi bi-person-fill"></i>
                <span class="d-none d-sm-inline">Profil</span>
            </a>
        </nav>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
