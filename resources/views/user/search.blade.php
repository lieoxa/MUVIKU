<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="theme-color" content="#000000" />
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@trimble-oss/modus-icons@1.9.0/dist/modus-solid/fonts/modus-icons.css">
    <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet'>
    <link rel="stylesheet" href="css/search.css">
    <title>Search</title>
</head>

<style>
    * {
        font-family: 'Ubuntu';
    }

    .menu-wrapper {
        position: fixed !important;
        bottom: 24px !important;
        left: 50% !important;
        transform: translateX(-50%) !important;
        width: 90% !important;
        max-width: 480px !important;
        height: 72px !important;
        background: rgba(18, 18, 22, 0.85) !important;
        backdrop-filter: blur(20px) !important;
        -webkit-backdrop-filter: blur(20px) !important;
        border: 1px solid rgba(255, 255, 255, 0.08) !important;
        border-radius: 36px !important;
        box-shadow: 0 12px 36px rgba(0, 0, 0, 0.5) !important;
        z-index: 1000 !important;
        padding: 0 12px !important;
        display: flex !important;
        align-items: center !important;
    }

    .menu-wrapper .navigation {
        display: flex !important;
        justify-content: space-around !important;
        align-items: center !important;
        width: 100% !important;
        height: 100% !important;
        margin: 0 !important;
        padding: 0 !important;
    }

    .menu-wrapper .navigation li {
        list-style: none !important;
        text-align: center !important;
        flex: 1 !important;
        padding: 0 !important;
        margin: 0 !important;
    }

    .menu-wrapper .navigation li a {
        color: #94a3b8 !important;
        text-decoration: none !important;
        display: flex !important;
        flex-direction: column !important;
        align-items: center !important;
        transition: all 0.3s ease !important;
        gap: 4px !important;
        margin: 0 !important;
        padding: 0 !important;
        background: transparent !important;
        border: none !important;
    }

    .menu-wrapper .navigation li a i {
        font-size: 20px !important;
        display: block !important;
        margin: 0 !important;
        padding: 0 !important;
        color: inherit !important;
    }

    .menu-wrapper .navigation li a img {
        width: 20px !important;
        height: 20px !important;
        object-fit: contain !important;
        display: block !important;
        margin: 0 !important;
        padding: 0 !important;
    }

    .menu-wrapper .navigation li a span {
        font-family: 'Plus Jakarta Sans', sans-serif !important;
        font-size: 11px !important;
        font-weight: 500 !important;
        display: block !important;
        color: inherit !important;
        margin: 0 !important;
        padding: 0 !important;
        letter-spacing: 0.2px !important;
    }

    .menu-wrapper .navigation li a.active {
        color: #FFAE1F !important;
        font-weight: 700 !important;
    }

    .menu-wrapper .navigation li a:hover {
        color: #ffffff !important;
    }

    .search-result-card:hover {
        transform: translateY(-6px) scale(1.02);
    }
    .search-result-card:hover .play-overlay {
        opacity: 1 !important;
    }
</style>

<body class="container">
    <header class="container fixed-top pb-1 pt-2">
        <nav class="navbar">
            <div class="col-12 position-relative">
                <form class="d-flex col-12" action="{{ url('/search') }}" method="GET" role="search">
                    <input class="form-control pe-6" type="search" name="q" value="{{ $query }}" placeholder="Cari disini..." aria-label="Search">
                    <button type="submit" class="icon-search"><i class="modus-icons"
                            aria-hidden="true">search</i></button>
                    <button type="submit" class="btn-search btn cari text-white">Cari</button>
                </form>
            </div>
        </nav>
    </header>

    <div class="old" style="margin-top: 60px;">
        @if (count($banner->where('lokasi', 'Search')->where('status', 'Publish')) > 0)
            <div class="iklan mb-4">
                <section class="splide new-11" aria-label="Splide Basic HTML Example">
                    <div class="splide__track">
                        <ul class="splide__list">
                            @foreach ($banner->where('lokasi', 'Search')->where('status', 'Publish') as $item)
                                <li class="splide__slide coming-soon card-img-top">
                                    <div class="cs">
                                        <img src="{{ asset('imgdb/' . $item->gambar) }}" class="card-img-top w-100">
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </section>
            </div>
        @endif
    </div>

    {{-- LIVE SEARCH RESULTS --}}
    @if (!empty($query))
        <div class="mb-5">
            <h4 class="text-white fw-bold mb-3 d-flex align-items-center gap-2">
                <i class="bi bi-film text-warning"></i> Hasil Pencarian: "<span class="text-warning">{{ $query }}</span>"
                <span class="badge bg-secondary rounded-pill fs-7 fw-normal ms-auto">{{ $searchResults->count() }} Film</span>
            </h4>
            @if ($searchResults->isNotEmpty())
                <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-3">
                    @foreach ($searchResults as $item)
                        <div class="col">
                            <div class="card h-100 bg-transparent border-0 search-result-card" 
                                 onclick="window.location='{{ route('film.detail', $item->id) }}'" 
                                 style="cursor: pointer; transition: transform 0.3s ease;">
                                <div class="position-relative overflow-hidden rounded-4 shadow-lg mb-2">
                                    <img src="{{ $item->thumbnail_url }}" class="w-100" style="height: 240px; object-fit: cover;" alt="{{ $item->judul }}">
                                    <div class="position-absolute top-0 end-0 m-2">
                                        <span class="badge px-2 py-1" style="background: rgba(0,0,0,0.75); color: #FFAE1F; border: 1px solid rgba(255,174,31,0.4); font-size: 11px;">
                                            {{ $item->tipe }}
                                        </span>
                                    </div>
                                    <div class="play-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center opacity-0 hover-opacity-100" 
                                         style="background: rgba(0, 0, 0, 0.4); transition: opacity 0.3s ease;">
                                        <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; background: rgba(255,174,31,0.9); color: #000;">
                                            <i class="bi bi-play-fill fs-3 ms-1"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body p-1">
                                    <h6 class="card-title text-white fw-bold text-truncate mb-1" style="font-size: 0.9rem;">{{ $item->judul }}</h6>
                                    <div class="d-flex align-items-center justify-content-between text-secondary" style="font-size: 0.75rem;">
                                        <span><i class="bi bi-calendar3 me-1"></i>{{ $item->tahun }}</span>
                                        <span><i class="bi bi-clock me-1"></i>{{ $item->durasi ?: '120m' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="p-5 text-center text-white rounded-4" style="background: rgba(255, 255, 255, 0.03); border: 1px dashed rgba(255, 255, 255, 0.15);">
                    <i class="bi bi-search fs-1 text-secondary d-block mb-3"></i>
                    <h5 class="fw-bold mb-1">Film Tidak Ditemukan</h5>
                    <p class="text-secondary small mb-0">Coba cari dengan kata kunci lain seperti "Spider-Man", "Anime", "Korea", atau "Horror".</p>
                </div>
            @endif
        </div>
    @endif

    {{-- DYNAMIC REKOMENDASI --}}
    @if ($filmsRekomendasi->isNotEmpty())
        <div class="mb-4">
            <h1 class="text-white text-start fw-bold">Rekomendasi</h1>
            <section class="d-flex gap-2 bar" style="overflow-x: auto; padding-bottom: 8px;">
                @foreach ($filmsRekomendasi as $item)
                    <div class="li" style="min-width: 150px; max-width: 150px; flex: 0 0 150px;" onclick="window.location='{{ route('film.detail', $item->id) }}'">
                        <div class="card bg-transparent card-img-top border-0 position-relative">
                            <img src="{{ $item->thumbnail_url }}" width="150" height="200" class="card-img-top-1 w-100 rounded-3" style="object-fit: cover;">
                            <div class="card-img-overlay card-1 text-white p-2 d-flex flex-column justify-content-end" style="background: linear-gradient(to top, rgba(0,0,0,0.85), transparent);">
                                <h6 class="card-title fw-bold text-truncate m-0" style="font-size: 0.85rem;">{{ $item->judul }}</h6>
                                <p class="card-text lh-1 m-0 text-truncate"><small class="text-secondary">{{ $item->tahun }} • {{ $item->tipe }}</small></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </section>
        </div>
    @endif

    {{-- DYNAMIC TRENDING ANIME --}}
    @if ($filmsAnime->isNotEmpty())
        <div class="mb-4">
            <h1 class="text-white text-start fw-bold">Trending Anime</h1>
            <section class="splide anim" aria-label="Trending Anime">
                <div class="splide__track">
                    <ul class="splide__list">
                        @foreach ($filmsAnime->chunk(3) as $chunk)
                            <li class="splide__slide d-grid gap-2 li-anim">
                                @foreach ($chunk as $item)
                                    <div class="card bg-transparent border-0" style="max-width: 540px;" onclick="window.location='{{ route('film.detail', $item->id) }}'">
                                        <div class="row g-0 d-flex align-items-center">
                                            <div class="col-4">
                                                <img src="{{ $item->thumbnail_url }}" class="img-fluid rounded img-anim" style="height: 90px; object-fit: cover; width: 100%;" alt="{{ $item->judul }}">
                                            </div>
                                            <div class="col-8 text-white">
                                                <div class="card-body py-0 px-2">
                                                    <h6 class="card-title text-truncate m-0">{{ $item->judul }}</h6>
                                                    <p class="text-secondary perusahaan mb-1"><small>{{ $item->perusahaan ?: 'Anime' }}</small></p>
                                                    <p class="text-secondary view m-0"><i class="bi bi-eye-fill"></i><small class="my-auto"> {{ rand(10, 99) }}.{{ rand(1, 9) }}K</small></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </li>
                        @endforeach
                    </ul>
                </div>
            </section>
        </div>
    @endif

    {{-- DYNAMIC BANYAK DITONTON --}}
    @if ($filmsBanyakDitonton->isNotEmpty())
        <div class="mb-5 pb-5">
            <h1 class="text-white text-start fw-bold">Banyak Ditonton</h1>
            <section class="splide trend-film" aria-label="Banyak Ditonton">
                <div class="splide__track">
                    <ul class="splide__list">
                        @foreach ($filmsBanyakDitonton as $item)
                            <li class="splide__slide li-1">
                                <img src="{{ $item->thumbnail_url }}" class="card-img-top slider-img" style="width: 100%; height: 220px; object-fit: cover; border-radius: 12px;" alt="{{ $item->judul }}">
                            </li>
                        @endforeach
                    </ul>
                </div>
            </section>
        </div>
    @endif
    </div>
    <div class="menu-wrapper">
        <div class="navigation" id="navigationn">
            <li>
                <a href="/utama">
                    <img src="img/logo-muviku.png" alt="Utama">
                    <span>Utama</span>
                </a>
            </li>
            <li>
                <a href="/search" class="active">
                    <i class="bi bi-search" aria-hidden="true"></i>
                    <span>Cari</span>
                </a>
            </li>
            <li>
                @if (Auth::user())
                    <a href="{{ route('favorit') }}">
                        <i class="bi bi-heart" aria-hidden="true"></i>
                        <span>Suka</span>
                    </a>
                @else
                    <a href="{{ route('login') }}">
                        <i class="bi bi-heart" aria-hidden="true"></i>
                        <span>Suka</span>
                    </a>
                @endif
            </li>
            <li>
                @if (Auth::user())
                    <a href="{{ route('profile') }}">
                        <i class="bi bi-person fs-4" aria-hidden="true"></i>
                        <span>Profil</span>
                    </a>
                @else
                    <a href="{{ route('login') }}">
                        <i class="bi bi-person fs-4" aria-hidden="true"></i>
                        <span>Profil</span>
                    </a>
                @endif
            </li>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
<script>
    var inputElement = document.querySelector('.form-control');

    inputElement.addEventListener('input', function() {
        if (this.value.trim() !== '') {
            this.classList.add('form-control-filled');
        } else {
            this.classList.remove('form-control-filled');
        }
    });
</script>

<script>
    var splide = new Splide('.splide.new-11', {
        arrows: false,
        lazyLoad: 'nearby',
        autoplay: true,
        interval: 4000,
        type: 'loop',
        gap: '0.5rem',
    });
    splide.mount();
</script>
<script>
    document.addEventListener('contextmenu', function(e) {
        e.preventDefault();
    });
</script>
<script>
    var splide = new Splide('.splide.anim', {
        perPage: 4,
        focus: 0,
        omitEnd: true,
        rewind: true,
        arrows: false,
        pagination: false,
        lazyLoad: 'nearby',
        gap: '0.5rem',
        drag: 'free',
    });

    splide.mount();

    var splide = new Splide('.splide.trend-film', {
        perPage: 4,
        focus: 0,
        omitEnd: true,
        rewind: true,
        arrows: false,
        pagination: false,
        lazyLoad: 'nearby',
        gap: '0.5rem',
        drag: 'free',
    });

    splide.mount();
</script>

</html>
