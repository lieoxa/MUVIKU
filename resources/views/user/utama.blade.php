<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="theme-color" content="#111215" />
    <title>MUVIKU — Streaming Film & Serial TV</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400;1,600&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- Splide Carousel CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
    
    <!-- Master Premium CSS -->
    <link rel="stylesheet" href="{{ asset('css/muviku-premium.css') }}">

    <!-- PWA -->
    <link rel="apple-touch-icon" href="{{ asset('logo-muviku.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">

    <style>
        .splide__pagination__page.is-active {
            background: var(--mv-primary) !important;
            transform: scale(1.3);
        }
        .splide__pagination__page {
            background: rgba(255, 255, 255, 0.3) !important;
        }
        .hero-banner-card {
            min-height: 480px;
            border-radius: 24px;
            overflow: hidden;
            position: relative;
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: flex-end;
            padding: 40px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.8);
        }
        @media (max-width: 768px) {
            .hero-banner-card {
                min-height: 380px;
                padding: 24px 18px;
            }
        }
        .hero-gradient-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(90deg, rgba(17, 18, 21, 0.95) 0%, rgba(17, 18, 21, 0.7) 45%, rgba(17, 18, 21, 0.15) 100%),
                        linear-gradient(0deg, rgba(17, 18, 21, 0.98) 0%, transparent 60%);
        }
        .section-title {
            font-size: 1.35rem;
            font-weight: 800;
            letter-spacing: -0.5px;
            color: #ffffff;
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 18px;
        }
        .section-title i {
            color: var(--mv-primary);
        }
        .podcast-card {
            border-radius: 18px;
            overflow: hidden;
            background: var(--mv-bg-card);
            border: 1px solid var(--mv-glass-border);
            transition: var(--mv-transition);
        }
        .podcast-card:hover {
            transform: translateY(-5px);
            border-color: var(--mv-glass-border-hover);
            box-shadow: var(--mv-shadow-glow);
        }
        .podcast-thumb-wrap {
            position: relative;
            aspect-ratio: 16/9;
            overflow: hidden;
        }
        .podcast-thumb-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }
        .podcast-card:hover .podcast-thumb-wrap img {
            transform: scale(1.06);
        }
    </style>
</head>

<body>
    @php
        use App\Models\AccUser;
        $get_acc_user = Auth::user() ? AccUser::find(Auth::user()->id) : null;
    @endphp

    <!-- TOP NAVBAR -->
    <nav class="navbar sticky-top py-3" style="background: rgba(17, 18, 21, 0.92); backdrop-filter: blur(20px); border-bottom: 1px solid rgba(255, 255, 255, 0.06); z-index: 1000;">
        <div class="container-fluid px-3 px-md-5 d-flex align-items-center justify-content-between">
            <!-- Original Brand Logo -->
            <a href="{{ route('utama') }}" class="d-flex align-items-center text-decoration-none">
                <img src="{{ asset('img/muviku.png') }}" alt="MUVIKU" style="max-height: 42px; width: auto;" loading="lazy">
            </a>

            <!-- Right Actions: Search trigger & Profile Dropdown -->
            <div class="d-flex align-items-center gap-3">
                <a href="{{ url('/search') }}" class="btn-mv-secondary py-2 px-3 d-none d-sm-inline-flex text-decoration-none" style="font-size: 13.5px;">
                    <i class="bi bi-search"></i>
                    <span>Cari Film...</span>
                </a>

                @if (Auth::user())
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center gap-2 text-decoration-none dropdown-toggle p-1 rounded-pill" data-bs-toggle="dropdown" aria-expanded="false" style="border: 1.5px solid var(--mv-glass-border); background: rgba(255,255,255,0.05);">
                            <img src="{{ Auth::user()->gambar ? (Str::startsWith(Auth::user()->gambar, ['http://', 'https://']) ? Auth::user()->gambar : asset('imgprofil/' . Auth::user()->gambar)) : asset('img/imgProfile/profile.png') }}"
                                class="rounded-circle" width="36" height="36" style="object-fit: cover; border: 2px solid #FFAE1F !important;" alt="{{ Auth::user()->name }}">
                            <span class="text-white d-none d-md-inline pe-2 fw-semibold" style="font-size: 13.5px;">{{ Str::limit(Auth::user()->name, 12) }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end p-3 rounded-4 mt-2 text-white mv-glass" style="min-width: 260px; box-shadow: 0 16px 36px rgba(0,0,0,0.6);">
                            <li class="text-center mb-3">
                                <img src="{{ Auth::user()->gambar ? (Str::startsWith(Auth::user()->gambar, ['http://', 'https://']) ? Auth::user()->gambar : asset('imgprofil/' . Auth::user()->gambar)) : asset('img/imgProfile/profile.png') }}"
                                    height="64" width="64" class="rounded-circle border mb-2" style="border-color: #FFAE1F !important; object-fit: cover;">
                                <div class="fw-bold fs-6 text-white">{{ Auth::user()->name }}</div>
                                <span class="badge rounded-pill px-3 py-1 mt-1 font-monospace" style="font-size: 11px; background: rgba(255, 174, 31, 0.15); color: #FFAE1F; border: 1px solid rgba(255, 174, 31, 0.3);">
                                    {{ $get_acc_user ? $get_acc_user->statuss : 'Member' }}
                                </span>
                            </li>
                            <hr class="border-secondary opacity-25 my-2">
                            <li>
                                <a class="dropdown-item text-light d-flex align-items-center gap-2 py-2 px-3 rounded-3" href="{{ route('profile') }}">
                                    <i class="bi bi-person-circle text-warning"></i> <span>Profil Saya</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item text-light d-flex align-items-center gap-2 py-2 px-3 rounded-3" href="{{ route('watchlist') }}">
                                    <i class="bi bi-bookmark-fill text-warning"></i> <span>Daftar Tonton</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item text-light d-flex align-items-center gap-2 py-2 px-3 rounded-3" href="{{ route('favorit') }}">
                                    <i class="bi bi-heart-fill text-danger"></i> <span>Favorit</span>
                                </a>
                            </li>
                            <hr class="border-secondary opacity-25 my-2">
                            <li>
                                <a class="dropdown-item text-danger d-flex align-items-center gap-2 py-2 px-3 rounded-3" href="{{ route('logoutLogin') }}">
                                    <i class="bi bi-box-arrow-right"></i> <span>Keluar</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="btn-mv-primary text-decoration-none">
                        <i class="bi bi-box-arrow-in-right"></i> Masuk
                    </a>
                @endif
            </div>
        </div>
    </nav>

    <!-- MAIN CONTENT CONTAINER -->
    <main class="container-fluid px-3 px-md-5 pt-3 pb-5 mb-5">

        <!-- GENRE PILLS BAR -->
        <div class="mv-genre-pills mb-4 mt-2">
            <a href="{{ route('utama') }}" class="mv-pill active"><i class="bi bi-stars me-1"></i> Semua</a>
            <a href="{{ url('/search?tipe=Film') }}" class="mv-pill"><i class="bi bi-film me-1"></i> Film</a>
            <a href="{{ url('/search?tipe=Serial') }}" class="mv-pill"><i class="bi bi-tv me-1"></i> Serial TV</a>
            @foreach ($kategoris as $kat)
                <a href="{{ url('/search?kategori=' . $kat->id) }}" class="mv-pill">
                    {{ $kat->kategori }}
                </a>
            @endforeach
        </div>

        <!-- HERO CAROUSEL -->
        @if ($filmsPopuler->isNotEmpty())
            <section class="splide hero-splide mb-5" aria-label="Featured Movies">
                <div class="splide__track">
                    <ul class="splide__list">
                        @foreach ($filmsPopuler as $item)
                            <li class="splide__slide">
                                <div class="hero-banner-card" style="background-image: url('{{ $item->thumbnail_url }}');">
                                    <div class="hero-gradient-overlay"></div>
                                    <div class="mv-hero-content">
                                        <div class="d-flex align-items-center gap-2 mb-2">
                                            <span class="badge px-3 py-1 rounded-pill fw-bold" style="font-size: 11px; background: var(--mv-primary-gradient) !important; color: #000;">
                                                {{ $item->tipe }}
                                            </span>
                                            <span class="badge bg-dark bg-opacity-75 border border-secondary text-light px-2.5 py-1 rounded-pill" style="font-size: 11px;">
                                                {{ $item->tahun }}
                                            </span>
                                            <span class="badge bg-dark bg-opacity-75 border border-secondary text-warning px-2.5 py-1 rounded-pill" style="font-size: 11px;">
                                                <i class="bi bi-star-fill me-1"></i>4.9
                                            </span>
                                            <span class="text-secondary small ms-1">{{ $item->durasi ?: '120 Menit' }}</span>
                                        </div>
                                        <h1 class="display-6 fw-bold text-white mb-2" style="letter-spacing: -0.5px;">{{ $item->judul }}</h1>
                                        <p class="text-light opacity-75 small line-clamp-2 mb-4" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; max-width: 550px;">
                                            {{ $item->deskripsi }}
                                        </p>
                                        <div class="d-flex flex-wrap align-items-center gap-3">
                                            <a href="{{ route('film.detail', $item->id) }}" class="btn-mv-primary text-decoration-none py-2.5 px-4">
                                                <i class="bi bi-play-fill fs-5"></i> Tonton Sekarang
                                            </a>
                                            <a href="{{ route('watchlist') }}" class="btn-mv-secondary text-decoration-none py-2.5 px-3">
                                                <i class="bi bi-plus-lg"></i> Watchlist
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </section>
        @endif

        <!-- SECTION: FILM POPULER / SEDANG TREN -->
        <section class="mb-5">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <h2 class="section-title mb-0"><i class="bi bi-fire text-warning"></i> Sedang Tren Sekarang</h2>
                <a href="{{ url('/search') }}" class="text-decoration-none text-warning small fw-semibold">Lihat Semua <i class="bi bi-chevron-right"></i></a>
            </div>
            <div class="row g-3 row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6">
                @foreach ($films->take(6) as $film)
                    <div class="col">
                        <a href="{{ route('film.detail', $film->id) }}" class="text-decoration-none">
                            <div class="mv-movie-card">
                                <span class="mv-card-badge">{{ $film->tipe }}</span>
                                <img src="{{ $film->thumbnail_url }}" alt="{{ $film->judul }}" loading="lazy">
                                <div class="mv-card-overlay">
                                    <div class="mv-card-play-btn"><i class="bi bi-play-fill"></i></div>
                                    <div class="fw-bold text-white fs-6 line-clamp-1 mb-1 text-truncate">{{ $film->judul }}</div>
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
        </section>

        <!-- SECTION: SERIAL TV PILIHAN -->
        @if ($serials->isNotEmpty())
            <section class="mb-5">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h2 class="section-title mb-0"><i class="bi bi-collection-play-fill text-warning"></i> Serial TV Unggulan</h2>
                    <a href="{{ url('/search?tipe=Serial') }}" class="text-decoration-none text-warning small fw-semibold">Lihat Semua <i class="bi bi-chevron-right"></i></a>
                </div>
                <div class="row g-3 row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6">
                    @foreach ($serials->take(6) as $serial)
                        <div class="col">
                            <a href="{{ route('film.detail', $serial->id) }}" class="text-decoration-none">
                                <div class="mv-movie-card">
                                    <span class="mv-card-badge" style="background: rgba(255, 174, 31, 0.85); color: #000;">Series</span>
                                    <img src="{{ $serial->thumbnail_url }}" alt="{{ $serial->judul }}" loading="lazy">
                                    <div class="mv-card-overlay">
                                        <div class="mv-card-play-btn"><i class="bi bi-play-fill"></i></div>
                                        <div class="fw-bold text-white fs-6 text-truncate mb-1">{{ $serial->judul }}</div>
                                        <div class="text-secondary small d-flex align-items-center justify-content-between">
                                            <span>{{ $serial->durasi ?: 'Episode Lengkap' }}</span>
                                            <span class="text-warning"><i class="bi bi-star-fill"></i> 4.9</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </section>
        @endif

        <!-- SECTION: PODCAST EKSKLUSIF -->
        @if ($podcast->isNotEmpty())
            <section class="mb-5">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h2 class="section-title mb-0"><i class="bi bi-mic-fill text-warning"></i> Podcast Eksklusif</h2>
                    <a href="{{ url('/search') }}" class="text-decoration-none text-warning small fw-semibold">Lihat Semua <i class="bi bi-chevron-right"></i></a>
                </div>
                <div class="row g-3 row-cols-1 row-cols-sm-2 row-cols-lg-3">
                    @foreach ($podcast->take(3) as $pod)
                        <div class="col">
                            <div class="podcast-card p-3 h-100 d-flex flex-column justify-content-between">
                                <div>
                                    <div class="podcast-thumb-wrap rounded-3 mb-3">
                                        <img src="{{ $pod->thumbnail ? asset('imgthumb/' . $pod->thumbnail) : asset('img/default-thumbnail.jpg') }}" alt="{{ $pod->judul }}">
                                        <div class="position-absolute top-0 end-0 m-2 badge bg-danger rounded-pill px-2.5 py-1 font-monospace" style="font-size: 10.5px;">
                                            PODCAST
                                        </div>
                                    </div>
                                    <h5 class="fw-bold text-white fs-6 mb-2 line-clamp-2" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; line-height: 1.4;">
                                        {{ $pod->judul }}
                                    </h5>
                                    <div class="d-flex align-items-center gap-2 text-secondary small mb-3">
                                        <span><i class="bi bi-person-fill text-warning"></i> {{ $pod->host ?: 'Host' }}</span>
                                        <span>•</span>
                                        <span><i class="bi bi-youtube text-danger"></i> {{ $pod->channel ?: 'Channel' }}</span>
                                    </div>
                                </div>
                                <a href="{{ $pod->video }}" target="_blank" class="btn-mv-secondary py-2 w-100 text-decoration-none">
                                    <i class="bi bi-play-circle-fill fs-5 text-warning"></i> Putar Podcast
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        @endif

        <!-- SECTION: FILM HORROR -->
        @if ($filmsHorror->isNotEmpty())
            <section class="mb-5">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h2 class="section-title mb-0"><i class="bi bi-moon-stars-fill text-danger"></i> Horror & Sensasi Misteri</h2>
                    <a href="{{ url('/search?kategori=10') }}" class="text-decoration-none text-warning small fw-semibold">Lihat Semua <i class="bi bi-chevron-right"></i></a>
                </div>
                <div class="row g-3 row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6">
                    @foreach ($filmsHorror->take(6) as $film)
                        <div class="col">
                            <a href="{{ route('film.detail', $film->id) }}" class="text-decoration-none">
                                <div class="mv-movie-card">
                                    <span class="mv-card-badge" style="background: rgba(225, 29, 72, 0.85);">Horror</span>
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
        @endif

    </main>

    <!-- FLOATING BOTTOM NAVIGATION BAR -->
    <div class="mv-bottom-nav-container">
        <nav class="mv-bottom-nav">
            <a href="{{ route('utama') }}" class="mv-nav-item active">
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
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (document.querySelector('.hero-splide')) {
                new Splide('.hero-splide', {
                    type: 'loop',
                    perPage: 1,
                    autoplay: true,
                    interval: 5000,
                    arrows: true,
                    pagination: true,
                    pauseOnHover: true,
                }).mount();
            }
        });
    </script>
</body>
</html>
