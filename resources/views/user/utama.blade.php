<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="theme-color" content="#000000" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="splide.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet'>
    <!-- PWA  -->
    <meta name="theme-color" content="#6777ef" />
    <link rel="apple-touch-icon" href="{{ asset('logo-muviku.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">
    <title>MUVIKU</title>
</head>

<style>
    * {
        font-family: 'Ubuntu';
    }

    .dropdown-item {
        padding: 0px;
    }

    #toggleCheckbox {
        display: none;
    }

    #toggleLabel {
        display: inline-block;
        cursor: pointer;
        background-color: #a1a1a3b2;
        border: 1px solid #ffffff;
        border-radius: 4px;
        color: white;
    }

    #toggleCheckbox:checked+#toggleLabel {
        color: red;
    }

    #toggleCheckboxx {
        display: none;
    }

    #toggleLabell {
        display: inline-block;
        cursor: pointer;
        background-color: #a1a1a3b2;
        border: 1px solid #ffffff;
        border-radius: 4px;
        color: white;
    }

    #toggleCheckboxx:checked+#toggleLabell {
        color: red;
    }

    #toggleCheckboxxx {
        display: none;
    }

    #toggleLabelll {
        display: inline-block;
        cursor: pointer;
        background-color: #a1a1a3b2;
        border: 1px solid #ffffff;
        border-radius: 4px;
        color: white;
    }

    #toggleCheckboxxx:checked+#toggleLabelll {
        color: red;
    }

    #toggleCheckboxxxx {
        display: none;
    }

    #toggleLabellll {
        display: inline-block;
        cursor: pointer;
        background-color: #a1a1a3b2;
        border: 1px solid #ffffff;
        border-radius: 4px;
        color: white;
    }

    #toggleCheckboxxxx:checked+#toggleLabellll {
        color: red;
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
</style>

<body>
    @php
        use App\Models\AccUser;

        $get_acc_user = AccUser::find(Auth::user()->id);
        // dd($get_acc_user->statuss);
    @endphp
    <nav class="navbar sticky-top pb-3" style="background: rgba(17, 18, 21, 0.85); backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px); border-bottom: 1px solid rgba(255, 255, 255, 0.05);">
        <div class="container-fluid d-flex mt-2 justify-content-between">

            <img src="img/muviku.png" class="navbar-brand my-auto" style="max-width: 130px; width: 100%;" loading="lazy">
            @if (Auth::user())
                <div class="btn-group">
                    <img src="{{ Auth::user()->gambar ? (Str::startsWith(Auth::user()->gambar, ['http://', 'https://']) ? Auth::user()->gambar : 'imgprofil/' . Auth::user()->gambar) : 'img/imgProfile/profile.png' }}"
                        class="navbar-brand my-auto me-0 rounded-circle foto py-0 dropdown-toggle border"
                        data-bs-toggle="dropdown" aria-expanded="false" height="40.59" width="40.59" style="border: 2px solid #FFAE1F !important; object-fit: cover;">
                    <ul class="dropdown-menu dropdown-menu-end end-0 p-3 rounded-4 mt-2 text-white"
                        style="text-align: center; background: rgba(20, 20, 24, 0.95); backdrop-filter: blur(25px); -webkit-backdrop-filter: blur(25px); border: 1px solid rgba(255, 255, 255, 0.08) !important; min-width: 250px; box-shadow: 0 10px 30px rgba(0,0,0,0.5);">
                        <li class="mb-2"><img
                                src="{{ Auth::user()->gambar ? (Str::startsWith(Auth::user()->gambar, ['http://', 'https://']) ? Auth::user()->gambar : 'imgprofil/' . Auth::user()->gambar) : 'img/imgProfile/profile.png' }}"
                                height="70" width="70" class="rounded-pill border"></li>
                        <li>{{ $get_acc_user->statuss }}</li>
                        <li class="text-secondary text-start" style="font-size: 12px">Nama</li>
                        <li class="text-start">{{ Str::title(Auth::user()->name) }}</li>
                        <li class="text-secondary text-start" style="font-size: 12px">Email</li>
                        <li class="text-start">{{ Str::title(Auth::user()->email) }}</li>
                        <li class="text-secondary text-start" style="font-size: 12px">No. Hp</li>
                        <li class="text-start">{{ Auth::user()->nohp ?: 'Belum diisi' }}</li>
                    </ul>
                </div>
            @else
                <a href="{{ route('login') }}" type="submit" class="logout btn btn-outline-light my-auto">Masuk</a>
            @endif

        </div>
    </nav>

    {{-- SLIDE  ATAS --}}
    @if (Auth::user())
        <div class="justify-content-start container mb-3">
            <div class="dropdown d-flex gap-2">
                <button onclick="window.location='{{ route('watchlist') }}'"
                    class="text-white bg-transparent py-1 border px-3 rounded-pill">Daftar Tonton</button>
                <button class="text-white bg-transparent py-1 border px-3 rounded-pill dropdown-toggle" type="button"
                    data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Kategori
                </button>
            </div>
        </div>
    @else
    @endif

    <div class="mt-1 mb-4">
        <div class="container-sm">
            <div class="mb-4">
                <section class="splide new" aria-label="Splide Basic HTML Example">
                    <div class="splide__track">
                        <ul class="splide__list">
                            @foreach ($filmsPopuler->take(5) as $index => $item)
                                <li class="splide__slide li">
                                    <div class="img-slide position-relative">
                                        <div class="hero-btns-wrapper">
                                            <button type="button" onclick="window.location='{{ route('film.detail', $item->id) }}'"
                                                class="btn-1 putar d-flex btn btn-light bg-white border-black favorit fw-bold py-0"><span
                                                    class="btn-putar"><i
                                                        class="bi-play-fill icon-putar my-auto"></i></span><span
                                                    class="text-btn1">Putar</span></button>
                                            <label for="toggleCheckbox{{ $index }}" id="toggleLabel{{ $index }}"
                                                class="btn-2 d-flex btn favorit pt-2 fw-bold"><span
                                                    class="wish-list"><i
                                                        class="bi-heart-fill my-auto icon-heart"></i></span><span
                                                    class="text-btn2">Favorit</span></label>
                                        </div>
                                        <img src="{{ $item->thumbnail_url }}" class="w-100 rounded-5 img-slide-atas" alt="{{ $item->judul }}">
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </section>
            </div>
        </div>

        {{-- SLIDE FILM --}}
        <div x-data="{ sliders: '' }">

            {{-- SLIDE Rekomendasi --}}

            <section>
                <div class="text-center mb-2">
                    <div class="mb-4 container" x-show="sliders == '' ? true : false">
                        {{-- <h1 class="text-white text-start fw-bold">Film Terbaru</h1> --}}
                        <section class="splide new-1" aria-label="Splide Basic HTML Example">
                            <div class="splide__track">
                                <ul class="splide__list">
                                    @foreach ($filmsRandom as $item)
                                        <li class="splide__slide li">
                                            <img src="{{ $item->thumbnail_url }}"
                                                class="card-img-top slider-img" alt="{{ $item->judul }}">
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </section>
                    </div>

                    {{-- SLIDE Animasi Anak-Anak --}}

                    <div class="animate container mb-4" x-show="sliders == '' ? true : (sliders == 'animasi')">
                        <h1 class="text-white text-start fw-bold">Animasi Anak-Anak</h1>
                        <section class="animasi">
                            <div class="d-flex gap-2 bar mt-1">
                                @foreach ($filmsAnimasi as $item)
                                    <div class="li position-relative" onclick="window.location='{{ route('film.detail', $item->id) }}'">
                                        <div class="tonton position-absolute start-50 translate-middle w-100" style="top: 88%">
                                            <input type="button" value="{{ $loop->even ? 'Film Terbaru' : 'Tonton Sekarang' }}">
                                        </div>
                                        <img src="{{ $item->thumbnail_url }}" class="card-img-top slider-img" alt="{{ $item->judul }}">
                                        <div class="card-body mt-1 mx-auto">
                                            <h6 class="card-title text-left text-white">{{ $item->judul }}</h6>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </section>
                    </div>

                    {{-- SLIDE BANNER --}}

                    @if (count($banner->where('lokasi', 'Utama')->where('status', 'Publish')) > 0)
                        <div class="mb-4 container" x-show="sliders == '' ? true : false">
                            <section class="splide new-11" aria-label="Splide Basic HTML Example">
                                <div class="splide__track">
                                    <ul class="splide__list">
                                        @foreach ($banner->where('lokasi', 'Utama')->where('status', 'Publish') as $item)
                                            <li class="splide__slide coming-soon">
                                                <div class="cs">
                                                    <img src="{{ asset('imgdb/' . $item->gambar) }}"
                                                        class="card-img-top-1 w-100" alt="...">
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </section>
                        </div>
                    @else
                    @endif

                    {{-- SLIDE KE EMPAT --}}

                    <div class="mb-4 container" x-show="sliders == '' ? true : false">
                        <h1 class="text-white text-start fw-bold">Hanya Ada di <span class="muviku">MUVIKU</span></h1>
                        <section class="splide new-8" aria-label="Splide Basic HTML Example">
                            <div class="splide__track">
                                <ul class="splide__list" style="gap: 0.5rem;">
                                    @foreach ($filmsExclusive as $item)
                                        <li class="splide__slide saran" onclick="window.location='{{ route('film.detail', $item->id) }}'">
                                            <img src="{{ $item->thumbnail_url }}"
                                                class="card-img-top film-khusus slider-img" alt="{{ $item->judul }}">
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </section>
                    </div>

                    {{-- SLIDE KE LIMA --}}

                    <div class="hero mb-4 container" x-show="sliders == '' ? true : (sliders == 'hero')">
                        <h1 class="text-white text-start fw-bold">Super Hero</h1>
                        <section>
                            <div class="d-flex gap-2 bar mt-1">
                                @foreach ($filmsHero as $item)
                                    <div class="li" onclick="window.location='{{ route('film.detail', $item->id) }}'">
                                        <img src="{{ $item->thumbnail_url }}" class="card-img-top slider-img"
                                            style="width: 100%" alt="{{ $item->judul }}">
                                        <div class="card-body mt-1 mx-auto">
                                            <h6 class="card-title text-left text-white">{{ $item->judul }}</h6>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </section>
                    </div>

                    {{-- SLIDE KE ENAM --}}

                    @if (count($podcast->where('status', 'Publish')) > 0)
                        <div class="mb-4 container" x-show="sliders == '' ? true : (sliders == 'podcast')">
                            <h1 class="text-white text-start fw-bold">Acara Podcast</h1>
                            <section>
                                <div class="d-flex gap-2 bar mt-1">
                                    @foreach ($podcast->where('id')->where('status', 'Publish') as $item)
                                        <div class="position-relative podcast-container">
                                            <img src="img/play-button.png"
                                                class="position-absolute top-50 text-white fs-7 top-50 start-50 translate-middle"
                                                style="width: 25%;">
                                            <img src="img/logo-podcast.png" class="logo-podcast position-absolute">
                                            <img src="{{ asset('imgthumb/' . $item->thumbnail) }}" class="podcast">
                                        </div>
                                    @endforeach
                                </div>
                            </section>
                        </div>
                </div>
            @else
                @endif

                {{-- SLIDE KE TUJUH --}}

                <div class="mb-4 container" x-show="sliders == '' ? true : (sliders == 'anime')">
                    <h1 class="text-white text-start fw-bold">Anime</h1>
                    <section>
                        <div class="d-flex gap-2 bar mt-1">
                            @foreach ($filmsAnime as $item)
                                <div class="li" onclick="window.location='{{ route('film.detail', $item->id) }}'">
                                    <img src="{{ $item->thumbnail_url }}" class="card-img-top slider-img"
                                        style="width: 100%" alt="{{ $item->judul }}">
                                    <div class="card-body mt-1 mx-auto">
                                        <h6 class="card-title text-left text-white">{{ $item->judul }}</h6>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>
                </div>

                {{-- SLIDE KE DELAPAN --}}

                <div class="mb-4 container" x-show="sliders == '' ? true : (sliders == 'korea')">
                    <h1 class="text-white text-start fw-bold">Film Korea</h1>
                    <section>
                        <div class="d-flex gap-2 bar mt-1">
                            @foreach ($filmsKorea as $item)
                                <div class="li position-relative" onclick="window.location='{{ route('film.detail', $item->id) }}'">
                                    <img src="{{ $item->thumbnail_url }}" class="card-img-top slider-img" alt="{{ $item->judul }}">
                                    <div class="card-body mt-1 mx-auto">
                                        <h6 class="card-title text-left text-white">{{ $item->judul }}</h6>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>
                </div>

                {{-- SLIDE KE SEMBILAN --}}

                <div class="mb-4 container" x-show="sliders == '' ? true : (sliders == 'serial')">
                    <h1 class="text-white text-start fw-bold">Serial ber Episode</h1>
                    <section>
                        <div class="d-flex gap-2 bar mt-1">
                            @foreach ($serials as $item)
                                <div class="saran-1" onclick="window.location='{{ route('film.detail', $item->id) }}'">
                                    <div class="card bg-custom rounded-3 rounded-bottom-4">
                                        <img src="{{ $item->thumbnail_url }}" class="card-img-top w-100" alt="{{ $item->judul }}">
                                        <div class="saran-bawah d-flex ps-6 pe-4">
                                            <div class="text-white w-50 my-auto text-start">
                                                <h6 class="m-0">{{ $item->judul }}</h6>
                                                <p class="mb-0 text-secondary" style="font-size: 12px">{{ $item->durasi ?: '16 Episode' }}</p>
                                            </div>
                                            <div class="tombol w-50 text-end">
                                                <i class="bi bi-play-circle-fill text-white fs-6 my-auto me-0"
                                                    style="width: 50%"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>
                </div>

                {{-- SLIDE KE SEPULUH --}}

                <div class="mb-4 container" x-show="sliders == '' ? true : (sliders == 'horror')">
                    <h1 class="text-white text-start fw-bold">Film Horror</h1>
                    <section>
                        <div class="d-flex gap-2 bar mt-1">
                            @foreach ($filmsHorror as $item)
                                <div class="li position-relative" onclick="window.location='{{ route('film.detail', $item->id) }}'">
                                    <img src="{{ $item->thumbnail_url }}" class="card-img-top slider-img" alt="{{ $item->judul }}">
                                    <div class="card-body mt-1 mx-auto">
                                        <h6 class="card-title text-left text-white">{{ $item->judul }}</h6>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>
                </div>

                {{-- SLIDE KE SEBELAH --}}

                <div class="mb-4 container-sm" x-show="sliders == '' ? true : (sliders == 'indonesia')">
                    <h1 class="text-white text-start fw-bold">Film Indonesia</h1>
                    <section class="splide new-4" aria-label="Splide Basic HTML Example">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <li class="splide__slide saran-2">
                                    <div class="card bg-custom rounded-3 rounded-bottom-4">
                                        <div id="main-slider" class="splide pb-2"
                                            onclick="window.location='{{ route('film.detail', $item->id) }}'">
                                            <div class="splide__track">
                                                <ul class="splide__list">
                                                    <li class="splide__slide rounded-3">
                                                        <!-- Content for thumbnail slider item 1 -->
                                                        <img src="img/f1-1.webp">
                                                    </li>
                                                    <li class="splide__slide rounded-3">
                                                        <!-- Content for thumbnail slider item 2 -->
                                                        <img src="img/f1-2.webp">
                                                    </li>
                                                    <li class="splide__slide rounded-3">
                                                        <!-- Content for thumbnail slider item 1 -->
                                                        <img src="img/f1-3.webp">
                                                    </li>
                                                    <li class="splide__slide rounded-3">
                                                        <!-- Content for thumbnail slider item 2 -->
                                                        <img src="img/f1-4.webp">
                                                    </li>
                                                    <!-- Add more thumbnail slider items as needed -->
                                                </ul>
                                            </div>
                                        </div>

                                        <div id="thumbnail-slider" class="splide">
                                            <div class="splide__track border-0">
                                                <ul class="splide__list">
                                                    <li class="splide__slide rounded">
                                                        <!-- Content for thumbnail slider item 1 -->
                                                        <img src="img/f1-1.webp">
                                                    </li>
                                                    <li class="splide__slide rounded">
                                                        <!-- Content for thumbnail slider item 2 -->
                                                        <img src="img/f1-2.webp">
                                                    </li>
                                                    <li class="splide__slide rounded">
                                                        <!-- Content for thumbnail slider item 1 -->
                                                        <img src="img/f1-3.webp">
                                                    </li>
                                                    <li class="splide__slide rounded">
                                                        <!-- Content for thumbnail slider item 2 -->
                                                        <img src="img/f1-4.webp">
                                                    </li>
                                                    <li class="splide__slide rounded">
                                                        <div class="sisa-eps mt-2" style="font-size: 20px"><i
                                                                class="bi bi-plus"></i>4</div>
                                                    </li>
                                                    <!-- Add more thumbn    ail slider items as needed -->
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="saran-bawah d-flex ps-6 pe-4"
                                            onclick="window.location='{{ route('film.detail', $item->id) }}'">
                                            <div class="text-white my-auto text-start" style="width: 80%">
                                                <h6 class="m-0">Pertaruhan The Series</h6>
                                                <p class="mb-0 text-secondary" style="font-size: 12px">2024</p>
                                            </div>
                                            <div class="tombol text-end" style="width: 20%">
                                                <i class="bi bi-play-circle-fill text-white fs-6 my-auto me-0"
                                                    style="width: 50%"></i>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="splide__slide saran-2">
                                    <div class="card bg-custom rounded-3 rounded-bottom-4">
                                        <div id="main-slider1" class="splide pb-2">
                                            <div class="splide__track">
                                                <ul class="splide__list">
                                                    <li class="splide__slide rounded-3">
                                                        <img src="img/switch1.webp">
                                                    </li>
                                                    <li class="splide__slide rounded-3">
                                                        <img src="img/switch2.webp">
                                                    </li>
                                                    <li class="splide__slide rounded-3">
                                                        <img src="img/switch3.webp">
                                                    </li>
                                                    <li class="splide__slide rounded-3">
                                                        <img src="img/switch4.webp">
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div id="thumbnail-slider1" class="splide">
                                            <div class="splide__track border-0">
                                                <ul class="splide__list">
                                                    <li class="splide__slide rounded">
                                                        <!-- Content for thumbnail slider item 2 -->
                                                        <img src="img/switch1.webp">
                                                    </li>
                                                    <li class="splide__slide rounded">
                                                        <!-- Content for thumbnail slider item 1 -->
                                                        <img src="img/switch2.webp">
                                                    </li>
                                                    <li class="splide__slide rounded">
                                                        <!-- Content for thumbnail slider item 1 -->
                                                        <img src="img/switch3.webp">
                                                    </li>
                                                    <li class="splide__slide rounded">
                                                        <!-- Content for thumbnail slider item 1 -->
                                                        <img src="img/switch4.webp">
                                                    </li>
                                                    <li class="splide__slide rounded">
                                                        <div class="sisa-eps mt-2" style="font-size: 20px"><i
                                                                class="bi bi-plus"></i>4</div>
                                                    </li>
                                                    <!-- Add more thumbnail slider items as needed -->
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="saran-bawah d-flex ps-6 pe-4">
                                            <div class="text-white my-auto text-start" style="width: 80%">
                                                <h6 class="m-0">Switchover</h6>
                                                <p class="mb-0 text-secondary" style="font-size: 12px">2023</p>
                                            </div>
                                            <div class="tombol text-end" style="width: 20%">
                                                <i class="bi bi-play-circle-fill text-white fs-6 my-auto me-0"
                                                    style="width: 50%"></i>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="splide__slide saran-2">
                                    <div class="card bg-custom rounded-3 rounded-bottom-4">
                                        <div id="main-slider2" class="splide pb-2">
                                            <div class="splide__track">
                                                <ul class="splide__list">
                                                    <li class="splide__slide rounded-3">
                                                        <!-- Content for main slider item 1 -->
                                                        <img src="img/dbs1.webp" alt="Main Slide 1">
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div id="thumbnail-slider2" class="splide">
                                            <div class="splide__track border-0">
                                                <ul class="splide__list">
                                                    <li class="splide__slide rounded">
                                                        <!-- Content for thumbnail slider item 1 -->
                                                        <img src="img/dbs1.webp">
                                                    </li>
                                                    <li class="splide__slide rounded">
                                                        <!-- Content for thumbnail slider item 1 -->
                                                        <img src="img/dbs2.webp">
                                                    </li>
                                                    <li class="splide__slide rounded">
                                                        <!-- Content for thumbnail slider item 2 -->
                                                        <img src="img/dbs3.webp">
                                                    </li>
                                                    <li class="splide__slide rounded">
                                                        <!-- Content for thumbnail slider item 2 -->
                                                        <img src="img/dbs4.webp">
                                                    </li>
                                                    <li class="splide__slide rounded">
                                                        <div class="sisa-eps mt-2" style="font-size: 20px"><i
                                                                class="bi bi-plus"></i>2</div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="saran-bawah d-flex ps-6 pe-4">
                                            <div class="text-white my-auto text-start" style="width: 80%">
                                                <h6 class="m-0">Di Bulan Suci Ini...</h6>
                                                <p class="mb-0 text-secondary" style="font-size: 12px">2023</p>
                                            </div>
                                            <div class="tombol text-end" style="width: 20%">
                                                <i class="bi bi-play-circle-fill text-white fs-6 my-auto me-0"
                                                    style="width: 50%"></i>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="splide__slide saran-2">
                                    <div class="card bg-custom rounded-3 rounded-bottom-4">
                                        <div id="main-slider4" class="splide pb-2">
                                            <div class="splide__track">
                                                <ul class="splide__list">
                                                    <li class="splide__slide rounded-3">
                                                        <!-- Content for main slider item 1 -->
                                                        <img src="img/cpa1.webp" alt="Main Slide 3">
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div id="thumbnail-slider4" class="splide">
                                            <div class="splide__track border-0">
                                                <ul class="splide__list">
                                                    <li class="splide__slide rounded">
                                                        <!-- Content for thumbnail slider item 1 -->
                                                        <img src="img/cpa1.webp">
                                                    </li>
                                                    <li class="splide__slide rounded">
                                                        <!-- Content for thumbnail slider item 1 -->
                                                        <img src="img/cpa2.webp">
                                                    </li>
                                                    <li class="splide__slide rounded">
                                                        <!-- Content for thumbnail slider item 2 -->
                                                        <img src="img/cpa3.webp">
                                                    </li>
                                                    <li class="splide__slide rounded">
                                                        <!-- Content for thumbnail slider item 2 -->
                                                        <img src="img/cpa4.webp">
                                                    </li>
                                                    <li class="splide__slide rounded">
                                                        <div class="sisa-eps mt-2" style="font-size: 20px"><i
                                                                class="bi bi-plus"></i>4</div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="saran-bawah d-flex ps-6 pe-4">
                                            <div class="text-white my-auto text-start" style="width: 80%">
                                                <h6 class="m-0">Cinta Pertama Ayah</h6>
                                                <p class="mb-0 text-secondary" style="font-size: 12px">2023</p>
                                            </div>
                                            <div class="tombol text-end" style="width: 20%">
                                                <i class="bi bi-play-circle-fill text-white fs-6 my-auto me-0"
                                                    style="width: 50%"></i>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="splide__slide saran-2">
                                    <div class="card bg-custom rounded-3 rounded-bottom-4">
                                        <div id="main-slider3" class="splide pb-2">
                                            <div class="splide__track">
                                                <ul class="splide__list">
                                                    <li class="splide__slide rounded-3">
                                                        <!-- Content for main slider item 1 -->
                                                        <img src="img/adil01.webp" alt="Main Slide 3">
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div id="thumbnail-slider3" class="splide">
                                            <div class="splide__track border-0">
                                                <ul class="splide__list">
                                                    <li class="splide__slide rounded">
                                                        <!-- Content for thumbnail slider item 1 -->
                                                        <img src="img/adil01.webp">
                                                    </li>
                                                    <li class="splide__slide rounded">
                                                        <!-- Content for thumbnail slider item 1 -->
                                                        <img src="img/adil02.webp">
                                                    </li>
                                                    <li class="splide__slide rounded">
                                                        <!-- Content for thumbnail slider item 2 -->
                                                        <img src="img/adil03.webp">
                                                    </li>
                                                    <li class="splide__slide rounded">
                                                        <!-- Content for thumbnail slider item 2 -->
                                                        <img src="img/adil04.webp">
                                                    </li>
                                                    <li class="splide__slide rounded">
                                                        <div class="sisa-eps mt-2" style="font-size: 20px"><i
                                                                class="bi bi-plus"></i>4</div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="saran-bawah d-flex ps-6 pe-4">
                                            <div class="text-white my-auto text-start" style="width: 80%">
                                                <h6 class="m-0">Ratu Adil</h6>
                                                <p class="mb-0 text-secondary" style="font-size: 12px">2023</p>
                                            </div>
                                            <div class="tombol text-end" style="width: 20%">
                                                <i class="bi bi-play-circle-fill text-white fs-6 my-auto me-0"
                                                    style="width: 50%"></i>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </section>
                </div>
        </div>
        </section>
    </div>
    </div>

    {{-- NAVIGATION --}}

    <div class="menu-wrapper">
        <div class="navigation" id="navigationn">
            <li>
                <a href="/utama" class="active">
                    <img src="img/logo-muviku.png" alt="Utama">
                    <span>Utama</span>
                </a>
            </li>
            <li>
                <a href="/search">
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

    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content position-relative">
                <div class="modal-header text-white justify-content-center">
                    <h1 class="modal-title fs-1 fw-bold">Kategori</h1>
                </div>
                <div class="modal-body">
                    <ul class="w-100 text-white text-center vh-80 list-unstyled overflow-y-auto">
                        <li class="py-3"><a class="dropdown-item" href="#"></a></li>
                        @foreach ($kategoris as $item)
                            <li class="py-3"><a class="dropdown-item" href="#">{{ $item->kategori }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="modal-footer justify-content-center pb-3">
                    <button type="button" class="btn rounded-circle" data-bs-dismiss="modal">
                        <i class="bi bi-x fs-2"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        const checkbox = document.getElementById('toggleCheckbox');
        const label = document.getElementById('toggleLabel');

        label.addEventListener('click', () => {
            if (checkbox.checked) {
                label.style.color = 'white';
            } else {
                label.style.color = 'red';
            }
        });
    </script>
    <script>
        const checkbox = document.getElementById('toggleCheckboxx');
        const label = document.getElementById('toggleLabell');

        label.addEventListener('click', () => {
            if (checkbox.checked) {
                label.style.color = 'white';
            } else {
                label.style.color = 'red';
            }
        });
    </script>
    <script>
        const checkbox = document.getElementById('toggleCheckboxxx');
        const label = document.getElementById('toggleLabelll');

        label.addEventListener('click', () => {
            if (checkbox.checked) {
                label.style.color = 'white';
            } else {
                label.style.color = 'red';
            }
        });
    </script>
    <script>
        const checkbox = document.getElementById('toggleCheckboxxxx');
        const label = document.getElementById('toggleLabellll');

        label.addEventListener('click', () => {
            if (checkbox.checked) {
                label.style.color = 'white';
            } else {
                label.style.color = 'red';
            }
        });
    </script>
    <script>
        const list = document.querySelectorAll('.list');

        function activeLink() {
            list.forEach((item) =>
                item.classList.remove('active'));
            this.classList.add('active')
        }
        list.forEach((item) =>
            item.addEventListener('click', activeLink));
    </script>

    <script>
        var splide = new Splide('.splide.new', {
            arrows: false,
            autoplay: true,
            interval: 4000,
            type: 'loop',
            lazyLoad: 'nearby',
            gap: '0.5rem',
        });
        splide.mount();
    </script>

    {{-- <script>
        var splide = new Splide('.splide.slider-1', {
            // perPage: 5,
            // type: 'loop',
            // arrows: 'false'
            // focus: 0,
            pagination: false,
            autoWidth: true,
            gap: '1.2rem',
            arrows: false,
            lazyLoad: 'nearby',
            drag: 'free',

            // omitEnd: true,
        });
        splide.mount();
    </script> --}}

    <Script>
        var splide1 = new Splide('.splide.new-1', {
            perPage: 6,
            focus: 0,
            omitEnd: true,
            rewind: true,
            arrows: false,
            pagination: false,
            lazyLoad: 'nearby',
            gap: '0.75rem',
            drag: 'free',
            breakpoints: {
                1200: { perPage: 5 },
                992: { perPage: 4 },
                768: { perPage: 3 },
                576: { perPage: 2 },
            }
        });
        splide1.mount();

        var splide4 = new Splide('.splide.new-4', {
            perPage: 4,
            focus: 0,
            omitEnd: true,
            rewind: true,
            arrows: false,
            pagination: false,
            lazyLoad: 'nearby',
            gap: '0.75rem',
            drag: 'free',
            breakpoints: {
                992: { perPage: 3 },
                768: { perPage: 2 },
                576: { perPage: 1 },
            }
        });
        splide4.mount();

        var splide8 = new Splide('.splide.new-8', {
            perPage: 3,
            rewind: true,
            arrows: false,
            pagination: false,
            lazyLoad: 'nearby',
            focus: 0,
            omitEnd: true,
            drag: 'free',
            gap: '0.75rem',
            breakpoints: {
                992: { perPage: 2 },
                576: { perPage: 1 },
            }
        });
        splide8.mount();

        var splide11 = new Splide('.splide.new-11', {
            arrows: false,
            lazyLoad: 'nearby',
            autoplay: true,
            interval: 4000,
            type: 'loop',
            gap: '0.5rem',
        });
        splide11.mount();

        // Mouse Drag-to-Scroll implementation for all horizontal .bar sliders
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.bar').forEach(function(slider) {
                let isDown = false;
                let startX;
                let scrollLeft;

                slider.addEventListener('mousedown', function(e) {
                    isDown = true;
                    startX = e.pageX - slider.offsetLeft;
                    scrollLeft = slider.scrollLeft;
                    slider.style.cursor = 'grabbing';
                });

                slider.addEventListener('mouseleave', function() {
                    isDown = false;
                    slider.style.cursor = 'grab';
                });

                slider.addEventListener('mouseup', function() {
                    isDown = false;
                    slider.style.cursor = 'grab';
                });

                slider.addEventListener('mousemove', function(e) {
                    if(!isDown) return;
                    e.preventDefault();
                    const x = e.pageX - slider.offsetLeft;
                    const walk = (x - startX) * 2;
                    slider.scrollLeft = scrollLeft - walk;
                });

                slider.style.cursor = 'grab';
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var main = new Splide('#main-slider', {
                type: 'fade',
                heightRatio: 0.7,
                pagination: false,
                arrows: false,
                cover: true,
            });

            var thumbnails = new Splide('#thumbnail-slider', {
                arrows: false,
                rewind: true,
                fixedWidth: 104,
                fixedHeight: 58,
                isNavigation: true,
                gap: '0.5rem',
                padding: {
                    left: '0.5rem',
                    right: '0.5rem',
                },
                pagination: false,
                cover: true,
                drag: false,
                breakpoints: {
                    640: {
                        fixedWidth: 45,
                        fixedHeight: 45,
                    },
                },
            });

            main.sync(thumbnails);
            main.mount();
            thumbnails.mount();
        });

        document.addEventListener('DOMContentLoaded', function() {
            var main = new Splide('#main-slider1', {
                type: 'fade',
                heightRatio: 0.7,
                pagination: false,
                arrows: false,
                cover: true,
            });

            var thumbnails = new Splide('#thumbnail-slider1', {
                arrows: false,
                rewind: true,
                fixedWidth: 104,
                fixedHeight: 58,
                isNavigation: true,
                gap: '0.5rem',
                padding: {
                    left: '0.5rem',
                    right: '0.5rem',
                },
                pagination: false,
                cover: true,
                drag: false,
                breakpoints: {
                    640: {
                        fixedWidth: 45,
                        fixedHeight: 45,
                    },
                },
            });

            main.sync(thumbnails);
            main.mount();
            thumbnails.mount();
        });

        document.addEventListener('DOMContentLoaded', function() {
            var main = new Splide('#main-slider2', {
                type: 'fade',
                heightRatio: 0.7,
                pagination: false,
                arrows: false,
                cover: true,
            });

            var thumbnails = new Splide('#thumbnail-slider2', {
                arrows: false,
                rewind: true,
                fixedWidth: 104,
                fixedHeight: 58,
                isNavigation: true,
                gap: '0.5rem',
                padding: {
                    left: '0.5rem',
                    right: '0.5rem',
                },
                pagination: false,
                cover: true,
                drag: false,
                breakpoints: {
                    640: {
                        fixedWidth: 45,
                        fixedHeight: 45,
                    },
                },
            });

            main.sync(thumbnails);
            main.mount();
            thumbnails.mount();
        });

        document.addEventListener('DOMContentLoaded', function() {
            var main = new Splide('#main-slider3', {
                type: 'fade',
                heightRatio: 0.7,
                pagination: false,
                arrows: false,
                cover: true,
            });

            var thumbnails = new Splide('#thumbnail-slider3', {
                arrows: false,
                rewind: true,
                fixedWidth: 104,
                fixedHeight: 58,
                isNavigation: true,
                gap: '0.5rem',
                padding: {
                    left: '0.5rem',
                    right: '0.5rem',
                },
                pagination: false,
                cover: true,
                drag: false,
                breakpoints: {
                    640: {
                        fixedWidth: 45,
                        fixedHeight: 45,
                    },
                },
            });

            main.sync(thumbnails);
            main.mount();
            thumbnails.mount();
        });
        document.addEventListener('DOMContentLoaded', function() {
            var main = new Splide('#main-slider4', {
                type: 'fade',
                heightRatio: 0.7,
                pagination: false,
                arrows: false,
                cover: true,
            });

            var thumbnails = new Splide('#thumbnail-slider4', {
                arrows: false,
                rewind: true,
                fixedWidth: 104,
                fixedHeight: 58,
                isNavigation: true,
                gap: '0.5rem',
                padding: {
                    left: '0.5rem',
                    right: '0.5rem',
                },
                pagination: false,
                cover: true,
                drag: false,
                breakpoints: {
                    640: {
                        fixedWidth: 45,
                        fixedHeight: 45,
                    },
                },
            });

            main.sync(thumbnails);
            main.mount();
            thumbnails.mount();
        });
    </script>


    <script>
        document.addEventListener('contextmenu', function(e) {
            e.preventDefault();
        });
    </script>
    {{-- <script>
        var btnContainer = document.getElementById("navigationn");
        var btnns = btnContainer.getElementsByClassName("btnn");

        for (var i = 0; i < btnns.length; i++) {
            btnns[i].addEventListener('click', function() {
                var current = document.getElementsByClassName("active");
                current[0].className = current[0].className.replace(" active", "");
                this.className += " active";
            })
        }
    </script> --}}
    <script src="{{ asset('/sw.js') }}"></script>
    <script>
        if ("serviceWorker" in navigator) {
            // Register a service worker hosted at the root of the
            // site using the default scope.
            navigator.serviceWorker.register("/sw.js").then(
                (registration) => {
                    console.log("Service worker registration succeeded:", registration);
                },
                (error) => {
                    console.error(`Service worker registration failed: ${error}`);
                },
            );
        } else {
            console.error("Service workers are not supported.");
        }
    </script>

</body>

</html>
