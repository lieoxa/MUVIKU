<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="theme-color" content="#111215" />
    <title>Pencarian Film & Serial — MUVIKU</title>
    
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

    <style>
        .search-input-box {
            background: rgba(26, 28, 35, 0.85);
            backdrop-filter: blur(16px);
            border: 1.5px solid var(--mv-glass-border);
            border-radius: var(--mv-radius-full);
            padding: 8px 16px;
            display: flex;
            align-items: center;
            gap: 12px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.4);
            transition: var(--mv-transition);
        }
        .search-input-box:focus-within {
            border-color: var(--mv-primary);
            box-shadow: 0 0 25px rgba(255, 174, 31, 0.35);
        }
        .search-input-box input {
            background: transparent;
            border: none;
            outline: none;
            color: #ffffff;
            font-size: 15px;
            font-weight: 500;
            width: 100%;
        }
        .search-input-box input::placeholder {
            color: var(--mv-text-muted);
        }
        .empty-search-state {
            padding: 60px 20px;
            text-align: center;
        }
        .empty-icon-wrap {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: rgba(255, 174, 31, 0.1);
            border: 1px solid rgba(255, 174, 31, 0.25);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 36px;
            color: var(--mv-primary);
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <!-- TOP NAVBAR -->
    <nav class="navbar sticky-top py-3" style="background: rgba(17, 18, 21, 0.92); backdrop-filter: blur(20px); border-bottom: 1px solid rgba(255, 255, 255, 0.06); z-index: 1000;">
        <div class="container-fluid px-3 px-md-5 d-flex align-items-center justify-content-between">
            <a href="{{ route('utama') }}" class="d-flex align-items-center text-decoration-none">
                <img src="{{ asset('img/muviku.png') }}" alt="MUVIKU" style="max-height: 42px; width: auto;" loading="lazy">
            </a>

            <div class="d-flex align-items-center gap-3">
                <a href="{{ route('utama') }}" class="btn-mv-secondary py-1.5 px-3 text-decoration-none" style="font-size: 13.5px;">
                    <i class="bi bi-house-door"></i> <span class="d-none d-sm-inline">Beranda</span>
                </a>
            </div>
        </div>
    </nav>

    <!-- SEARCH CONTAINER -->
    <main class="container px-3 px-md-4 pt-4 pb-5 mb-5" style="max-width: 1200px;">
        
        <!-- SEARCH HEADER & INPUT -->
        <div class="row justify-content-center mb-5">
            <div class="col-12 col-md-8 col-lg-7 text-center">
                <h1 class="fw-bold text-white fs-3 mb-2">Cari Film & Serial TV</h1>
                <p class="text-secondary small mb-4">Temukan ribuan film blockbuster, serial populer, dan podcast eksklusif.</p>
                
                <form action="{{ url('/search') }}" method="GET" class="search-input-box">
                    <i class="bi bi-search fs-5 text-warning"></i>
                    <input type="text" name="q" value="{{ request('q') }}" placeholder="Ketik judul film, aktor, genre, atau sutradara..." autofocus>
                    @if(request('q'))
                        <a href="{{ url('/search') }}" class="text-secondary text-decoration-none"><i class="bi bi-x-circle-fill"></i></a>
                    @endif
                    <button type="submit" class="btn-mv-primary py-1.5 px-3" style="font-size: 13px;">Cari</button>
                </form>
            </div>
        </div>

        <!-- SEARCH RESULTS -->
        @if(!empty($query))
            <section class="mb-5">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h2 class="fs-5 fw-bold text-white mb-0">
                        Hasil Pencarian untuk "<span class="text-warning">{{ $query }}</span>"
                    </h2>
                    <span class="badge bg-secondary bg-opacity-25 text-light px-3 py-1.5 rounded-pill font-monospace">
                        {{ $searchResults->count() }} Ditemukan
                    </span>
                </div>

                @if($searchResults->isNotEmpty())
                    <div class="row g-3 row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6">
                        @foreach ($searchResults as $film)
                            <div class="col">
                                <a href="{{ route('film.detail', $film->id) }}" class="text-decoration-none">
                                    <div class="mv-movie-card">
                                        <span class="mv-card-badge">{{ $film->tipe }}</span>
                                        <img src="{{ $film->thumbnail_url }}" alt="{{ $film->judul }}" loading="lazy">
                                        <div class="mv-card-overlay">
                                            <div class="mv-card-play-btn"><i class="bi bi-play-fill"></i></div>
                                            <div class="fw-bold text-white fs-6 text-truncate mb-1">{{ $film->judul }}</div>
                                            <div class="text-secondary small d-flex align-items-center justify-content-between">
                                                <span>{{ $film->tahun }}</span>
                                                <span class="text-warning"><i class="bi bi-star-fill"></i> 4.8</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="empty-search-state">
                        <div class="empty-icon-wrap">
                            <i class="bi bi-film"></i>
                        </div>
                        <h4 class="fw-bold text-white mb-2">Film Tidak Ditemukan</h4>
                        <p class="text-secondary small mb-4" style="max-width: 420px; margin: auto;">
                            Tidak menemukan hasil yang cocok untuk kata kunci pencarian Anda. Coba periksa ejaan atau gunakan kata kunci lain.
                        </p>
                        <a href="{{ route('utama') }}" class="btn-mv-primary text-decoration-none">
                            <i class="bi bi-arrow-left"></i> Kembali ke Beranda
                        </a>
                    </div>
                @endif
            </section>
        @endif

        <!-- POPULER & REKOMENDASI -->
        <section class="mb-5">
            <h3 class="fs-5 fw-bold text-white mb-3"><i class="bi bi-fire text-warning me-1"></i> Rekomendasi Populer</h3>
            <div class="row g-3 row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6">
                @foreach ($filmsBanyakDitonton->take(12) as $film)
                    <div class="col">
                        <a href="{{ route('film.detail', $film->id) }}" class="text-decoration-none">
                            <div class="mv-movie-card">
                                <span class="mv-card-badge">{{ $film->tipe }}</span>
                                <img src="{{ $film->thumbnail_url }}" alt="{{ $film->judul }}" loading="lazy">
                                <div class="mv-card-overlay">
                                    <div class="mv-card-play-btn"><i class="bi bi-play-fill"></i></div>
                                    <div class="fw-bold text-white fs-6 text-truncate mb-1">{{ $film->judul }}</div>
                                    <div class="text-secondary small">{{ $film->tahun }}</div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </section>

    </main>

    <!-- FLOATING BOTTOM NAVIGATION BAR -->
    <div class="mv-bottom-nav-container">
        <nav class="mv-bottom-nav">
            <a href="{{ route('utama') }}" class="mv-nav-item">
                <i class="bi bi-house-door-fill"></i>
                <span class="d-none d-sm-inline">Beranda</span>
            </a>
            <a href="{{ url('/search') }}" class="mv-nav-item active">
                <i class="bi bi-search"></i>
                <span class="d-none d-sm-inline">Cari</span>
            </a>
            <a href="{{ route('watchlist') }}" class="mv-nav-item">
                <i class="bi bi-bookmark-fill"></i>
                <span class="d-none d-sm-inline">Watchlist</span>
            </a>
            <a href="{{ route('favorit') }}" class="mv-nav-item">
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
