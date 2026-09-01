<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="theme-color" content="#111215" />
    <title>{{ $film->judul }} — MUVIKU</title>
    
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
        .player-glow-wrap {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            background: #000000;
            box-shadow: 0 15px 45px rgba(0, 0, 0, 0.9), 0 0 35px rgba(255, 174, 31, 0.25);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .player-glow-wrap iframe {
            display: block;
            width: 100%;
            aspect-ratio: 16/9;
            border: none;
        }
        .hero-banner-fallback {
            width: 100%;
            aspect-ratio: 16/9;
            object-fit: cover;
            filter: brightness(0.85);
        }
        .meta-pill {
            padding: 4px 12px;
            font-size: 12px;
            font-weight: 700;
            border-radius: var(--mv-radius-full);
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.12);
            color: #ffffff;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }
        .episode-card {
            background: rgba(26, 28, 35, 0.6);
            border: 1px solid var(--mv-glass-border);
            border-radius: var(--mv-radius-md);
            padding: 14px;
            transition: var(--mv-transition);
            cursor: pointer;
        }
        .episode-card:hover {
            background: rgba(35, 38, 48, 0.85);
            border-color: var(--mv-glass-border-hover);
            transform: translateX(4px);
        }
    </style>
</head>

<body>
    <!-- TOP NAVBAR -->
    <nav class="navbar sticky-top py-3" style="background: rgba(17, 18, 21, 0.92); backdrop-filter: blur(20px); border-bottom: 1px solid rgba(255, 255, 255, 0.06); z-index: 1000;">
        <div class="container-fluid px-3 px-md-5 d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-3">
                <a href="{{ route('utama') }}" class="btn-mv-secondary py-1.5 px-3 text-decoration-none" style="font-size: 13.5px;">
                    <i class="bi bi-chevron-left"></i> Kembali
                </a>
                <a href="{{ route('utama') }}" class="d-flex align-items-center text-decoration-none">
                    <img src="{{ asset('img/muviku.png') }}" alt="MUVIKU" style="max-height: 40px; width: auto;" loading="lazy">
                </a>
            </div>

            <div class="d-flex align-items-center gap-2">
                <a href="{{ url('/search') }}" class="btn-mv-secondary py-1.5 px-3 text-decoration-none" style="font-size: 13.5px;">
                    <i class="bi bi-search"></i>
                </a>
            </div>
        </div>
    </nav>

    <!-- MAIN CONTAINER -->
    <main class="container px-3 px-md-4 pt-3 pb-5 mb-5" style="max-width: 1200px;">
        
        @php
            $videoUrl = $film->video_embed_url;
            if (!$videoUrl && !empty($film->video)) {
                if (str_starts_with($film->video, 'http://') || str_starts_with($film->video, 'https://')) {
                    $videoUrl = $film->video;
                }
            }
        @endphp

        <!-- VIDEO PLAYER / HERO BACKDROP -->
        <div class="player-glow-wrap mb-4" id="videoPlayerSection">
            @if ($videoUrl)
                <iframe src="{{ $videoUrl }}?autoplay=0&rel=0" allowfullscreen allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
            @else
                <img src="{{ $film->thumbnail_url }}" class="hero-banner-fallback" alt="{{ $film->judul }}">
            @endif
        </div>

        <div class="row g-4">
            <!-- LEFT COLUMN: FILM DETAILS & EPISODES -->
            <div class="col-lg-8">
                
                <!-- TITLE & BADGES -->
                <div class="d-flex flex-wrap align-items-center gap-2 mb-3">
                    <span class="meta-pill" style="background: var(--mv-primary-gradient); color: #000; border-color: transparent;">
                        {{ $film->tipe }}
                    </span>
                    <span class="meta-pill text-warning">
                        <i class="bi bi-star-fill"></i> 4.9
                    </span>
                    <span class="meta-pill">
                        {{ $film->tahun }}
                    </span>
                    <span class="meta-pill">
                        {{ $film->usia ?: '13+' }}
                    </span>
                    <span class="meta-pill text-warning">
                        <i class="bi bi-clock"></i> {{ $film->durasi ?: '120 Menit' }}
                    </span>
                    <span class="meta-pill">
                        {{ $film->kategorifilm ? $film->kategorifilm->kategori : 'Action / Drama' }}
                    </span>
                </div>

                <h1 class="display-6 fw-bold text-white mb-2" style="letter-spacing: -0.5px;">{{ $film->judul }}</h1>

                <div class="d-flex flex-wrap gap-4 text-secondary small mb-4">
                    <div><strong class="text-light">Studio:</strong> {{ $film->perusahaan ?: 'MUVIKU Production' }}</div>
                    <div><strong class="text-light">Sutradara:</strong> {{ $film->sutradara ?: 'MUVIKU Creator' }}</div>
                </div>

                <!-- ACTION BUTTONS -->
                <div class="d-flex flex-wrap align-items-center gap-3 mb-4 pb-3 border-bottom border-secondary border-opacity-25">
                    @if ($videoUrl)
                        <button class="btn-mv-primary py-2.5 px-4" onclick="document.getElementById('videoPlayerSection').scrollIntoView({behavior: 'smooth'})">
                            <i class="bi bi-play-fill fs-5"></i> Putar Film
                        </button>
                    @endif
                    <a href="{{ route('watchlist') }}" class="btn-mv-secondary py-2.5 px-3 text-decoration-none">
                        <i class="bi bi-plus-lg"></i> Watchlist
                    </a>
                    <a href="{{ route('favorit') }}" class="btn-mv-secondary py-2.5 px-3 text-decoration-none">
                        <i class="bi bi-heart"></i> Favorit
                    </a>
                    <button class="btn-mv-secondary py-2.5 px-3" onclick="navigator.clipboard.writeText(window.location.href); alert('Tautan film berhasil disalin!');">
                        <i class="bi bi-share"></i> Bagikan
                    </button>
                </div>

                <!-- SYNOPSIS -->
                <div class="mb-5">
                    <h3 class="fs-5 fw-bold text-white mb-2">Sinopsis</h3>
                    <p class="text-light opacity-90 leading-relaxed" style="font-size: 15px; line-height: 1.8;">
                        {{ $film->deskripsi }}
                    </p>
                </div>

                <!-- TV SERIES EPISODES LIST -->
                @if ($film->tipe === 'Serial' && $film->seasons && $film->seasons->isNotEmpty())
                    <div class="mb-5">
                        <h3 class="fs-5 fw-bold text-white mb-3"><i class="bi bi-collection-play text-warning me-2"></i> Daftar Episode Serial</h3>
                        
                        <div class="accordion accordion-flush" id="seasonsAccordion">
                            @foreach ($film->seasons as $sIndex => $season)
                                <div class="accordion-item bg-transparent border-0 mb-3">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button bg-dark bg-opacity-75 text-white fw-bold rounded-3 border border-secondary border-opacity-25 py-3 px-4 {{ $sIndex > 0 ? 'collapsed' : '' }}" 
                                                type="button" data-bs-toggle="collapse" data-bs-target="#season-{{ $season->id }}">
                                            <i class="bi bi-folder2-open me-2 text-warning"></i> {{ $season->season }} ({{ $season->episodes->count() }} Episode)
                                        </button>
                                    </h2>
                                    <div id="season-{{ $season->id }}" class="accordion-collapse collapse {{ $sIndex == 0 ? 'show' : '' }}" data-bs-parent="#seasonsAccordion">
                                        <div class="accordion-body p-0 pt-2 d-flex flex-column gap-2">
                                            @foreach ($season->episodes as $episode)
                                                <div class="episode-card d-flex align-items-center justify-content-between gap-3" 
                                                     onclick="document.getElementById('videoPlayerSection').scrollIntoView({behavior: 'smooth'})">
                                                    <div class="d-flex align-items-center gap-3">
                                                        <span class="badge rounded-pill px-2.5 py-1.5 fw-bold font-monospace" style="background: rgba(255, 174, 31, 0.2); color: #FFAE1F; border: 1px solid rgba(255, 174, 31, 0.4);">
                                                            Eps {{ $episode->episode }}
                                                        </span>
                                                        <div>
                                                            <div class="fw-bold text-white fs-6 mb-0.5">{{ $episode->judul }}</div>
                                                            <div class="text-secondary small line-clamp-1 text-truncate" style="max-width: 450px;">{{ $episode->desk_eps }}</div>
                                                        </div>
                                                    </div>
                                                    <div class="btn-mv-primary py-1.5 px-3" style="font-size: 12px;">
                                                        <i class="bi bi-play-fill fs-6"></i> Putar
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

            </div>

            <!-- RIGHT COLUMN: REKOMENDASI TERKAIT -->
            <div class="col-lg-4">
                <div class="mv-card p-4">
                    <h4 class="fs-6 fw-bold text-white mb-3"><i class="bi bi-stars text-warning me-1"></i> Rekomendasi Terkait</h4>
                    <div class="d-flex flex-column gap-3">
                        @foreach ($rekomendasi->take(6) as $rec)
                            <a href="{{ route('film.detail', $rec->id) }}" class="text-decoration-none">
                                <div class="d-flex gap-3 align-items-center p-2 rounded-3" style="background: rgba(255,255,255,0.03); transition: var(--mv-transition);">
                                    <img src="{{ $rec->thumbnail_url }}" style="width: 60px; height: 85px; object-fit: cover; border-radius: 8px;" alt="{{ $rec->judul }}" loading="lazy">
                                    <div class="flex-grow-1 overflow-hidden">
                                        <h6 class="text-white fw-bold text-truncate mb-1" style="font-size: 13.5px;">{{ $rec->judul }}</h6>
                                        <div class="d-flex align-items-center gap-2 mb-1">
                                            <span class="badge bg-secondary bg-opacity-50 text-light" style="font-size: 10px;">{{ $rec->tipe }}</span>
                                            <span class="text-warning small" style="font-size: 11px;"><i class="bi bi-star-fill"></i> 4.8</span>
                                        </div>
                                        <div class="text-secondary small" style="font-size: 11.5px;">{{ $rec->tahun }} • {{ $rec->durasi ?: '120m' }}</div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

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
