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
    {{-- <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet"> --}}
    <title>MUVIKU</title>
</head>

<style>
    * {
        font-family: 'Ubuntu';
    }
</style>

<body>

    <nav class="navbar sticky-top pb-3" style="background: #222327;">
        <div class="container-fluid d-flex mt-2">
            <img src="img/muviku.png" class="navbar-brand my-auto" style="width: 30%;" loading="lazy">

            {{-- SUDAH LOGIN --}}
            {{-- <img src="{{ asset('img/imgProfile/profile.png') }}" alt="" width="10%"> --}}

            {{-- BLUM LOGIN --}}

            <a href="{{ route('login') }}" type="submit" class="logout btn btn-outline-light my-auto">Masuk</a>


        </div>
    </nav>

    {{-- SLIDE  ATAS --}}
    <div class="justify-content-start container mb-3">
        <div class="dropdown d-flex gap-2">
            <button onclick="{{ route('watchlist') }}"
                class="text-white bg-transparent py-1 border px-3 rounded-pill">Daftar Tonton</button>
            <button class="text-white bg-transparent py-1 border px-3 rounded-pill dropdown-toggle" type="button"
                data-bs-toggle="modal" data-bs-target="#exampleModal">
                Kategori
            </button>
        </div>
    </div>
    <div class="mt-1 mb-4">
        <div class="container-sm">
            <div class="mb-4">
                <section class="splide new" aria-label="Splide Basic HTML Example">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <li class="splide__slide li">
                                <div class="img-slide position-relative">
                                    <button type="button"
                                        class="btn-1 putar d-flex btn btn-light bg-white border-black favorit position-absolute translate-middle fw-bold py-0"><span
                                            class="btn-putar"><i
                                                class="bi-play-fill icon-putar my-auto"></i></span><span
                                            class="text-btn1">Putar</span></button>
                                    <button type="button"
                                        class="btn-2 d-flex btn btn-outline-light favorit position-absolute translate-middle pt-2 fw-bold"><span
                                            class="wish-list"><i
                                                class="bi-heart-fill my-auto icon-heart"></i></span><span
                                            class="text-btn2">Favorit</span></button>
                                    <img src="{{ asset('img/slide.jpg') }}" class="w-100 rounded-5 img-slide-atas">
                                </div>
                            </li>
                            <li class="splide__slide li">
                                <div class="img-slide position-relative">
                                    <button type="button"
                                        class="btn-1 putar d-flex btn btn-light bg-white border-black favorit position-absolute translate-middle fw-bold py-0"><span
                                            class="btn-putar"><i
                                                class="bi-play-fill icon-putar my-auto"></i></span><span
                                            class="text-btn1">Putar</span></button>
                                    <button type="button"
                                        class="btn-2 d-flex btn btn-outline-light favorit position-absolute translate-middle pt-2 fw-bold"><span
                                            class="wish-list"><i
                                                class="bi-heart-fill my-auto icon-heart"></i></span><span
                                            class="text-btn2">Favorit</span></button>
                                    <img src="{{ asset('img/slide1.jpg') }}" class="w-100 rounded-5 img-slide-atas">
                                </div>
                            </li>
                            <li class="splide__slide li">
                                <div class="img-slide position-relative">
                                    <button type="button"
                                        class="btn-1 putar d-flex btn btn-light bg-white border-black favorit position-absolute translate-middle fw-bold py-0"><span
                                            class="btn-putar"><i
                                                class="bi-play-fill icon-putar my-auto"></i></span><span
                                            class="text-btn1">Putar</span></button>
                                    <button type="button"
                                        class="btn-2 d-flex btn btn-outline-light favorit position-absolute translate-middle pt-2 fw-bold">
                                        <span class="wish-list">
                                            <i class="bi-heart-fill my-auto icon-heart">
                                            </i>
                                        </span>
                                        <span class="text-btn2">Favorit</span>
                                    </button>
                                    <img src="{{ asset('img/slide2.jpg') }}" class="w-100 rounded-5 img-slide-atas">
                                </div>
                            </li>
                        </ul>
                    </div>
                </section>
            </div>
        </div>

        {{-- SLIDE FILM --}}
        <div x-data="{ sliders: '' }">
            {{-- <div class="container-sm">
                <div class="container mb-3 p-0 border-bottom-1" style="max-height: 44px;" x-data="{ filter: 'all' }">
                    <section class="splide slider-1 mt-0 mb-4" aria-label="Splide Basic HTML Example">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <li class="splide__slide">
                                    <span
                                        :class="filter == 'all' ? 'title-service text-white fs-8 fw-bold' :
                                            'text-secondary'"
                                        x-on:click="filter = 'all';sliders = ''">Rekomendasi</span>
                                </li>
                                <li class="splide__slide ">
                                    <span
                                        :class="filter == 'indonesia' ? 'title-service text-white fs-8 fw-bold' :
                                            'text-secondary'"
                                        x-on:click="filter = 'indonesia';sliders = 'indonesia'">Film Indonesia</span>
                                </li>
                                <li class="splide__slide">
                                    <span
                                        :class="filter == 'korea' ? 'title-service text-white fs-8 fw-bold' :
                                            'text-secondary'"
                                        x-on:click="filter = 'korea';sliders = 'korea'">Film Korea</span>
                                </li>
                                <li class="splide__slide">
                                    <span
                                        :class="filter == 'podcast' ? 'title-service text-white fs-8 fw-bold' :
                                            'text-secondary'"
                                        x-on:click="filter = 'podcast';sliders = 'podcast'">Podcast</span>
                                </li>
                                <li class="splide__slide ">
                                    <span
                                        :class="filter == 'anime' ? 'title-service text-white fs-8 fw-bold' :
                                            'text-secondary'"
                                        x-on:click="filter = 'anime';sliders = 'anime'">Anime</span>
                                </li>
                                <li class="splide__slide">
                                    <span
                                        :class="filter == 'hero' ? 'title-service text-white fs-8 fw-bold' :
                                            'text-secondary'"
                                        x-on:click="filter = 'hero';sliders = 'hero'">Super Hero</span>
                                </li>
                                <li class="splide__slide ">
                                    <span
                                        :class="filter == 'serial' ? 'title-service text-white fs-8 fw-bold' :
                                            'text-secondary'"
                                        x-on:click="filter = 'serial';sliders = 'serial'">Serial</span>
                                </li>
                                <li class="splide__slide">
                                    <span
                                        :class="filter == 'horror' ? 'title-service text-white fs-8 fw-bold' :
                                            'text-secondary'"
                                        x-on:click="filter = 'horror';sliders = 'horror'">Horror</span>
                                </li>
                                <li class="splide__slide ">
                                    <span
                                        :class="filter == 'animasi' ? 'title-service text-white fs-8 fw-bold' :
                                            'text-secondary'"
                                        x-on:click="filter = 'animasi';sliders = 'animasi'">Animasi</span>
                                </li>
                            </ul>
                        </div>
                    </section>
                    <div class="d-flex gap-2 bar mt-3">
                    </div>
                </div>
            </div> --}}

            {{-- SLIDE Rekomendasi --}}

            <section>
                <div class="text-center mb-2">
                    <div class="mb-4 container" x-show="sliders == '' ? true : false">
                        {{-- <h1 class="text-white text-start fw-bold">Film Terbaru</h1> --}}
                        <section class="splide new-1" aria-label="Splide Basic HTML Example">
                            <div class="splide__track">
                                <ul class="splide__list">
                                    <li onclick="window.location='{{ route('film') }}'" class="splide__slide li">
                                        <img src="{{ asset('img/anim.jpg') }}" class="card-img-top slider-img"
                                            alt="...">
                                    </li>
                                    <li class="splide__slide li">
                                        <img src="{{ asset('img/hero.jpg') }}" class="card-img-top slider-img"
                                            alt="...">
                                    </li>
                                    <li class="splide__slide li">
                                        <img src="{{ asset('img/horror1.jpg') }}" class="card-img-top slider-img"
                                            alt="...">
                                    </li>
                                    <li class="splide__slide li">
                                        <img src="{{ asset('img/drakor1.jpg') }}" class="card-img-top slider-img"
                                            alt="...">
                                    </li>
                                    <li class="splide__slide li">
                                        <img src="{{ asset('img/anim7.jpg') }}" class="card-img-top slider-img"
                                            alt="...">
                                    </li>
                                    <li class="splide__slide li">
                                        <img src="{{ asset('img/animasi7.jpg') }}" class="card-img-top slider-img"
                                            alt="...">
                                    </li>
                                    <li class="splide__slide li">
                                        <img src="{{ asset('img/comedy7.jpg') }}" class="card-img-top slider-img"
                                            alt="...">
                                    </li>
                                    <li class="splide__slide li">
                                        <img src="{{ asset('img/anim1.jpg') }}" class="card-img-top slider-img"
                                            alt="...">
                                    </li>
                                    <li class="splide__slide li">
                                        <img src="{{ asset('img/hero1.jpg') }}" class="card-img-top slider-img"
                                            alt="...">
                                    </li>
                                    <li class="splide__slide li">
                                        <img src="{{ asset('img/horror1.jpg') }}" class="card-img-top slider-img"
                                            alt="...">
                                    </li>
                                    <li class="splide__slide li">
                                        <img src="{{ asset('img/drakor1.jpg') }}" class="card-img-top slider-img"
                                            alt="...">
                                    </li>
                                    <li class="splide__slide li">
                                        <img src="{{ asset('img/fi1.jpg') }}" class="card-img-top slider-img"
                                            alt="...">
                                    </li>
                                    <li class="splide__slide li">
                                        <img src="{{ asset('img/animasi8.jpg') }}" class="card-img-top slider-img"
                                            alt="...">
                                    </li>
                                    <li class="splide__slide li">
                                        <img src="{{ asset('img/comedy6.jpg') }}" class="card-img-top slider-img"
                                            alt="...">
                                    </li>
                                    <li class="splide__slide li">
                                        <img src="{{ asset('img/anim2.jpg') }}" class="card-img-top slider-img"
                                            alt="...">
                                    </li>
                                    <li class="splide__slide li">
                                        <img src="{{ asset('img/hero2.jpg') }}" class="card-img-top slider-img"
                                            alt="...">
                                    </li>
                                    <li class="splide__slide li">
                                        <img src="{{ asset('img/horror2.jpg') }}" class="card-img-top slider-img"
                                            alt="...">
                                    </li>
                                    <li class="splide__slide li">
                                        <img src="{{ asset('img/drakor2.jpg') }}" class="card-img-top slider-img"
                                            alt="...">
                                    </li>
                                    <li class="splide__slide li">
                                        <img src="{{ asset('img/horror4.jpg') }}" class="card-img-top slider-img"
                                            alt="...">
                                    </li>
                                    <li class="splide__slide li">
                                        <img src="{{ asset('img/animasi9.jpg') }}" class="card-img-top slider-img"
                                            alt="...">
                                    </li>
                                    <li class="splide__slide li">
                                        <img src="{{ asset('img/comedy5.jpg') }}" class="card-img-top slider-img"
                                            alt="...">
                                    </li>
                                </ul>
                            </div>
                        </section>
                    </div>

                    {{-- SLIDE Animasi Anak-Anak --}}

                    <div class="animate container" x-show="sliders == '' ? true : (sliders == 'animasi')">
                        <h1 class="text-white text-start fw-bold">Animasi Anak-Anak</h1>
                        <section class="animasi">
                            <div class="d-flex gap-2 bar mt-1">
                                <div class="li position-relative"
                                    onclick="window.location='{{ route('toystory') }}'">
                                    <div class="tonton position-absolute start-50 translate-middle w-100"
                                        style="top: 88%">
                                        <input type="button"
                                            style="font-size: 10px; background-color:#ffffff;color: #000000;width:98px;border-style: none; padding: 3px 0 ;"
                                            value="Film Terbaru">
                                    </div>
                                    <img src="{{ asset('img/animasi.jpg') }}" class="card-img-top slider-img"
                                        alt="...">
                                </div>
                                <div class="li position-relative" onclick="window.location='{{ route('mario') }}'">
                                    <div class="tonton position-absolute start-50 translate-middle w-100"
                                        style="top: 88%">
                                        <input type="button"
                                            style="font-size: 10px; background-color:#AD0000;color:white;width:98px;border-style: none; padding: 3px 0 ;"
                                            value="Tonton Sekarang">
                                    </div>
                                    <img src="{{ asset('img/animasi1.jpg') }}" class="card-img-top slider-img"
                                        alt="...">
                                </div>
                                <div class="li position-relative">
                                    <div class="tonton position-absolute start-50 translate-middle w-100"
                                        style="top: 88%">
                                        <input type="button"
                                            style="font-size: 10px; background-color:#ffffff;color:rgb(0, 0, 0);width:98px;border-style: none; padding: 3px 0 ;"
                                            value="Film Terbaru">
                                    </div>
                                    <img src="{{ asset('img/animasi2.jpg') }}" class="card-img-top slider-img">
                                </div>
                                <div class="li position-relative">
                                    <div class="tonton position-absolute start-50 translate-middle w-100"
                                        style="top: 88%">
                                        <input type="button"
                                            style="font-size: 10px; background-color:#AD0000;color:white;width:98px;border-style: none; padding: 3px 0 ;"
                                            value="Tonton Sekarang">
                                    </div>
                                    <img src="{{ asset('img/animasi3.jpg') }}" class="card-img-top slider-img">
                                </div>
                                <div class="li position-relative">
                                    <div class="tonton position-absolute start-50 translate-middle w-100"
                                        style="top: 88%">
                                        <input type="button"
                                            style="font-size: 10px; background-color:#ffffff;color:rgb(0, 0, 0);width:98px;border-style: none; padding: 3px 0 ;"
                                            value="Film Terbaru">
                                    </div>
                                    <img src="{{ asset('img/animasi4.jpg') }}" class="card-img-top slider-img">
                                </div>
                                <div class="li position-relative">
                                    <div class="tonton position-absolute start-50 translate-middle w-100"
                                        style="top: 88%">
                                        <input type="button"
                                            style="font-size: 10px; background-color:#AD0000;color:white;width:98px;border-style: none; padding: 3px 0 ;"
                                            value="Tonton Sekarang">
                                    </div>
                                    <img src="{{ asset('img/animasi5.jpg') }}" class="card-img-top slider-img">
                                </div>
                                <div class="li position-relative">
                                    <div class="tonton position-absolute start-50 translate-middle w-100"
                                        style="top: 88%">
                                        <input type="button"
                                            style="font-size: 10px; background-color:#ffffff;color:rgb(0, 0, 0);width:98px;border-style: none; padding: 3px 0 ;"
                                            value="Film Terbaru">
                                    </div>
                                    <img src="{{ asset('img/animasi6.jpg') }}" class="card-img-top slider-img">
                                </div>
                                <div class="li position-relative">
                                    <div class="tonton position-absolute start-50 translate-middle w-100"
                                        style="top: 88%">
                                        <input type="button"
                                            style="font-size: 10px; background-color:#AD0000;color:white;width:98px;border-style: none; padding: 3px 0 ;"
                                            value="Tonton Sekarang">
                                    </div>
                                    <img src="{{ asset('img/animasi7.jpg') }}" class="card-img-top slider-img">
                                </div>
                                <div class="li position-relative">
                                    <div class="tonton position-absolute start-50 translate-middle w-100"
                                        style="top: 88%">
                                        <input type="button"
                                            style="font-size: 10px; background-color:#ffffff;color:rgb(0, 0, 0);width:98px;border-style: none; padding: 3px 0 ;"
                                            value="Film Terbaru">
                                    </div>
                                    <img src="{{ asset('img/animasi8.jpg') }}" class="card-img-top slider-img">
                                </div>
                                <div class="li position-relative">
                                    <div class="tonton position-absolute start-50 translate-middle w-100"
                                        style="top: 88%">
                                        <input type="button"
                                            style="font-size: 10px; background-color:#AD0000;color:white;width:98px;border-style: none; padding: 3px 0 ;"
                                            value="Tonton Sekarang">
                                    </div>
                                    <img src="{{ asset('img/animasi9.jpg') }}" class="card-img-top slider-img">
                                </div>
                                <div class="li position-relative">
                                    <div class="tonton position-absolute start-50 translate-middle w-100"
                                        style="top: 88%">
                                        <input type="button"
                                            style="font-size: 10px; background-color:#ffffff;color:rgb(0, 0, 0);width:98px;border-style: none; padding: 3px 0 ;"
                                            value="Film Terbaru">
                                    </div>
                                    <img src="{{ asset('img/animasi10.jpg') }}" class="card-img-top slider-img">
                                </div>
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
                        <h6>test</h6>
                    @endif

                    {{-- SLIDE KE EMPAT --}}

                    <div class="mb-4 container" x-show="sliders == '' ? true : false">
                        <h1 class="text-white text-start fw-bold">Hanya Ada di <span class="muviku">MUVIKU</span></h1>
                        <section class="splide new-8" aria-label="Splide Basic HTML Example">
                            <div class="splide__track">
                                <ul class="splide__list" style="gap: 0.5rem;">
                                    <li class="splide__slide saran" onclick="window.location='{{ route('spy') }}'">
                                        <img src="{{ asset('img/comedy.jpg') }}"
                                            class="card-img-top film-khusus slider-img" alt="...">
                                    </li>
                                    <li class="splide__slide saran">
                                        <img src="{{ asset('img/comedy1.jpg') }}"
                                            class="card-img-top film-khusus slider-img" alt="...">
                                    </li>
                                    <li class="splide__slide saran">
                                        <img src="{{ asset('img/comedy2.jpg') }}"
                                            class="card-img-top film-khusus slider-img">
                                    </li>
                                    <li class="splide__slide saran">
                                        <img src="{{ asset('img/comedy3.jpg') }}"
                                            class="card-img-top film-khusus slider-img">
                                    </li>
                                    <li class="splide__slide saran">
                                        <img src="{{ asset('img/comedy4.jpg') }}"
                                            class="card-img-top film-khusus slider-img">
                                    </li>
                                    <li class="splide__slide saran">
                                        <img src="{{ asset('img/comedy5.jpg') }}"
                                            class="card-img-top film-khusus slider-img">
                                    </li>
                                    <li class="splide__slide saran">
                                        <img src="{{ asset('img/comedy6.jpg') }}"
                                            class="card-img-top film-khusus slider-img">
                                    </li>
                                    <li class="splide__slide saran">
                                        <img src="{{ asset('img/comedy7.jpg') }}"
                                            class="card-img-top film-khusus slider-img">
                                    </li>
                                </ul>
                            </div>
                        </section>
                    </div>

                    {{-- SLIDE KE LIMA --}}

                    <div class="hero mb-4 container" x-show="sliders == '' ? true : (sliders == 'hero')">
                        <h1 class="text-white text-start fw-bold">Super Hero</h1>
                        <section>
                            <div class="d-flex gap-2 bar mt-1">
                                <div class="li" onclick="window.location='{{ route('iron3') }}'">
                                    <img src="{{ asset('img/hero.jpg') }}" class="card-img-top slider-img"
                                        style="width: 100%" alt="...">
                                </div>
                                <div class="li">
                                    <img src="{{ asset('img/hero1.jpg') }}" class="card-img-top slider-img"
                                        style="width: 100%" alt="...">
                                </div>
                                <div class="li">
                                    <img src="{{ asset('img/hero2.jpg') }}" class="card-img-top slider-img"
                                        style="width: 100%">
                                </div>
                                <div class="li">
                                    <img src="{{ asset('img/hero3.jpg') }}" class="card-img-top slider-img"
                                        style="width: 100%">
                                </div>
                                <div class="li">
                                    <img src="{{ asset('img/hero4.jpg') }}" class="card-img-top slider-img"
                                        style="width: 100%" alt="...">
                                </div>
                                <div class="li">
                                    <img src="{{ asset('img/hero5.jpg') }}" class="card-img-top slider-img"
                                        style="width: 100%" alt="...">
                                </div>
                                <div class="li">
                                    <img src="{{ asset('img/hero6.jpg') }}" class="card-img-top slider-img"
                                        style="width: 100%" alt="...">
                                </div>
                                <div class="li">
                                    <img src="{{ asset('img/hero7.jpg') }}" class="card-img-top slider-img"
                                        style="width: 100%" alt="...">
                                </div>
                                <div class="li">
                                    <img src="{{ asset('img/hero8.jpg') }}" class="card-img-top slider-img"
                                        style="width: 100%" alt="...">
                                </div>
                                <div class="li">
                                    <img src="{{ asset('img/hero9.jpg') }}" class="card-img-top slider-img"
                                        style="width: 100%" alt="...">
                                </div>
                                <div class="li">
                                    <img src="{{ asset('img/hero10.jpg') }}" class="card-img-top slider-img"
                                        style="width: 100%" alt="...">
                                </div>
                            </div>
                        </section>
                    </div>

                    {{-- SLIDE KE ENAM --}}

                    @if (count($podcast->where('status', 'Publish')) > 0)
                        <div class="mb-4 container" x-show="sliders == '' ? true : (sliders == 'podcast')">
                            <h1 class="text-white text-start fw-bold">Acara Podcast</h1>
                            <section>
                                @foreach ($podcast->where('id')->where('status', 'Publish') as $item)
                                    <div class="d-flex gap-2 bar mt-1">
                                        <div class="d-flex gap-2 bar mt-1">
                                            <div class="position-relative" style="width: 320px; height: 180px;">
                                                <img src="img/play-button.png"
                                                    class="position-absolute top-50 text-white fs-7 top-50 start-50 translate-middle"
                                                    style="width: 25%;">
                                                <img src="img/logo-podcast.png"
                                                    class="logo-podcast position-absolute">
                                                <img src="{{ asset('imgdb/' . $item->thumbnail) }}" class="podcast">
                                            </div>
                                @endforeach
                        </div>
                </div>
            </section>
        </div>
    @else
        @endif

        {{-- SLIDE KE TUJUH --}}

        <div class="mb-4 container" x-show="sliders == '' ? true : (sliders == 'anime')">
            <h1 class="text-white text-start fw-bold">Anime Jepang</h1>
            <section>
                <div class="d-flex gap-2 bar mt-1">
                    <div class="li" onclick="window.location='{{ route('film') }}'">
                        <img src="{{ asset('img/anim.jpg') }}" class="card-img-top slider-img" style="width: 100%"
                            alt="...">
                        <div class="card-body mt-1 mx-auto">
                            <h6 class="card-title text-left text-white">One Piece</h6>
                        </div>
                    </div>
                    <div class="li">
                        <img src="{{ asset('img/anim2.jpg') }}" class="card-img-top slider-img" style="width: 100%">
                        <div class="card-body mt-1 mx-auto">
                            <h6 class="card-title text-left text-white">Weathering</h6>
                        </div>
                    </div>
                    <div class="li">
                        <img src="{{ asset('img/anim3.jpg') }}" class="card-img-top slider-img" style="width: 100%">
                        <div class="card-body mt-1 mx-auto">
                            <h6 class="card-title text-left text-white">Suzume</h6>
                        </div>
                    </div>
                    <div class="li">
                        <img src="{{ asset('img/anim4.jpg') }}" class="card-img-top slider-img" style="width: 100%">
                        <div class="card-body mt-1 mx-auto">
                            <h6 class="card-title text-left text-white">Your Name</h6>
                        </div>
                    </div>
                    <div class="li">
                        <img src="{{ asset('img/anim5.jpg') }}" class="card-img-top slider-img" style="width: 100%"
                            alt="...">
                        <div class="card-body mt-1 mx-auto">
                            <h6 class="card-title text-left text-white">Ocean Waves</h6>
                        </div>
                    </div>
                    <div class="li">
                        <img src="{{ asset('img/anim6.jpg') }}" class="card-img-top slider-img" style="width: 100%">
                        <div class="card-body mt-1 mx-auto">
                            <h6 class="card-title text-left text-white">Howls Castle</h6>
                        </div>
                    </div>
                    <div class="li">
                        <img src="{{ asset('img/anim2.jpg') }}" class="card-img-top slider-img" style="width: 100%">
                        <div class="card-body mt-1 mx-auto">
                            <h6 class="card-title text-left text-white">Demon Slayer</h6>
                        </div>
                    </div>
                    <div class="li">
                        <img src="{{ asset('img/anim7.jpg') }}" class="card-img-top slider-img" style="width: 100%">
                        <div class="card-body mt-1 mx-auto">
                            <h6 class="card-title text-left text-white">KIKI's</h6>
                        </div>
                    </div>
                    <div class="li">
                        <img src="{{ asset('img/anim8.jpg') }}" class="card-img-top slider-img" style="width: 100%">
                        <div class="card-body mt-1 mx-auto">
                            <h6 class="card-title text-left text-white">Spirited Away</h6>
                        </div>
                    </div>
                    <div class="li">
                        <img src="{{ asset('img/anim9.jpg') }}" class="card-img-top slider-img" style="width: 100%">
                        <div class="card-body mt-1 mx-auto">
                            <h6 class="card-title text-left text-white">Mononoke</h6>
                        </div>
                    </div>
                    </ul>
                </div>
            </section>
        </div>

        {{-- SLIDE KE DELAPAN --}}

        <div class="mb-4 container" x-show="sliders == '' ? true : (sliders == 'korea')">
            <h1 class="text-white text-start fw-bold">Film Korea</h1>
            <section>
                <div class="d-flex gap-2 bar mt-1">
                    <div class="li position-relative" onclick="window.location='{{ route('century') }}'">
                        <img src="img/logo-podcast.png" class="logo-podcast-1 position-absolute">
                        <img src="{{ asset('img/drakor1.jpg') }}" class="card-img-top slider-img">
                    </div>
                    <div class="li position-relative">
                        <img src="img/logo-podcast.png" class="logo-podcast-1 position-absolute">
                        <img src="{{ asset('img/drakor2.jpg') }}" class="card-img-top slider-img">
                    </div>
                    <div class="li position-relative">
                        <img src="img/logo-podcast.png" class="logo-podcast-1 position-absolute">
                        <img src="{{ asset('img/drakor3.jpg') }}" class="card-img-top slider-img">
                    </div>
                    <div class="li position-relative">
                        <img src="img/logo-podcast.png" class="logo-podcast-1 position-absolute">
                        <img src="{{ asset('img/drakor4.jpg') }}" class="card-img-top slider-img">
                    </div>
                    <div class="li position-relative">
                        <img src="img/logo-podcast.png" class="logo-podcast-1 position-absolute">
                        <img src="{{ asset('img/drakor5.jpg') }}" class="card-img-top slider-img" alt="...">
                    </div>
                    <div class="li position-relative">
                        <img src="img/logo-podcast.png" class="logo-podcast-1 position-absolute">
                        <img src="{{ asset('img/drakor6.jpg') }}" class="card-img-top slider-img" alt="...">
                    </div>
                    <div class="li position-relative">
                        <img src="img/logo-podcast.png" class="logo-podcast-1 position-absolute">
                        <img src="{{ asset('img/drakor7.jpg') }}" class="card-img-top slider-img">
                    </div>
                    <div class="li position-relative">
                        <img src="img/logo-podcast.png" class="logo-podcast-1 position-absolute">
                        <img src="{{ asset('img/drakor8.jpg') }}" class="card-img-top slider-img">
                    </div>
                    <div class="li position-relative">
                        <img src="img/logo-podcast.png" class="logo-podcast-1 position-absolute">
                        <img src="{{ asset('img/drakor9.jpg') }}" class="card-img-top slider-img" alt="...">
                    </div>
                    <div class="li position-relative">
                        <img src="img/logo-podcast.png" class="logo-podcast-1 position-absolute">
                        <img src="{{ asset('img/drakor10.jpg') }}" class="card-img-top slider-img">
                    </div>
                </div>
            </section>
        </div>

        {{-- SLIDE KE SEMBILAN --}}

        <div class="mb-4 container" x-show="sliders == '' ? true : (sliders == 'serial')">
            <h1 class="text-white text-start fw-bold">Serial ber Episode
            </h1>
            <section>
                <div class="d-flex gap-2 bar mt-1">
                    <div class="saran-1" onclick="window.location='{{ route('serial') }}'">
                        <div class="card border-white bg-custom bg-gradient rounded-3 rounded-bottom-4">
                            <img src="img/saran.jpg" class="card-img-top w-100" alt="...">
                            <div class="saran-bawah d-flex ps-6 pe-4">
                                <div class="text-white w-50 my-auto text-start">
                                    <h6 class="m-0">Jujutsu Kaisen</h6>
                                    <p class="mb-0 text-secondary" style="font-size: 12px">16
                                        Episode</p>
                                </div>
                                <div class="tombol w-50 text-end">
                                    <i class="bi bi-play-circle-fill text-white fs-6 my-auto me-0"
                                        style="width: 50%"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="saran-1">
                        <div class="card border-white bg-custom bg-gradient rounded-3 rounded-bottom-4">
                            <img src="img/saran1.jpg" class="card-img-top w-100" alt="...">
                            <div class="saran-bawah d-flex ps-6 pe-4">
                                <div class="text-white w-50 my-auto text-start">
                                    <h6 class="m-0">Tokyo Revenger</h6>
                                    <p class="mb-0 text-secondary" style="font-size: 12px">24
                                        Episode</p>
                                </div>
                                <div class="tombol w-50 text-end">
                                    <i class="bi bi-play-circle-fill text-white fs-6 my-auto me-0"
                                        style="width: 50%"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="saran-1">
                        <div class="card border-white bg-custom bg-gradient rounded-3 rounded-bottom-4">
                            <img src="img/saran2.webp" class="card-img-top w-100" alt="...">
                            <div class="saran-bawah d-flex ps-6 pe-4">
                                <div class="text-white w-50 my-auto text-start">
                                    <h6 class="m-0">Mr. Bean</h6>
                                    <p class="mb-0 text-secondary" style="font-size: 12px">15
                                        Episode</p>
                                </div>
                                <div class="tombol w-50 text-end">
                                    <i class="bi bi-play-circle-fill text-white fs-6 my-auto me-0"
                                        style="width: 50%"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="saran-1">
                        <div class="card border-white bg-custom bg-gradient rounded-3 rounded-bottom-4">
                            <img src="img/saran3.jpg" class="card-img-top w-100" alt="...">
                            <div class="saran-bawah d-flex ps-6 pe-4">
                                <div class="text-white w-50 my-auto text-start">
                                    <h6 class="m-0">Demon Slayer</h6>
                                    <p class="mb-0 text-secondary" style="font-size: 12px">26
                                        Episode</p>
                                </div>
                                <div class="tombol w-50 text-end">
                                    <i class="bi bi-play-circle-fill text-white fs-6 my-auto me-0"
                                        style="width: 50%"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="saran-1">
                        <div class="card border-white bg-custom bg-gradient rounded-3 rounded-bottom-4">
                            <img src="img/saran4.jpg" class="card-img-top w-100" alt="...">
                            <div class="saran-bawah d-flex ps-6 pe-4">
                                <div class="text-white w-50 my-auto text-start">
                                    <h6 class="m-0">Peace Maker</h6>
                                    <p class="mb-0 text-secondary" style="font-size: 12px">8
                                        Episode</p>
                                </div>
                                <div class="tombol w-50 text-end">
                                    <i class="bi bi-play-circle-fill text-white fs-6 my-auto me-0"
                                        style="width: 50%"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="saran-1">
                                    <div class="card border-white bg-custom bg-gradient rounded-3 rounded-bottom-4">
                                        <img src="img/one-piece.jpg" class="card-img-top w-100" alt="...">
                                        <div class="saran-bawah d-flex ps-6 pe-4">
                                            <div class="text-white w-50 my-auto text-start">
                                                <h6 class="m-0">One Piece</h6>
                                                <p class="mb-0 text-secondary" style="font-size: 12px">1068
                                                    Episode</p>
                                            </div>
                                            <div class="tombol w-50 text-end">
                                                <i class="bi bi-play-circle-fill text-white fs-6 my-auto me-0"
                                                    style="width: 50%"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                </div>
            </section>
        </div>

        {{-- SLIDE KE SEPULUH --}}

        @if (count($films->where('kategori', 'Horror')) > 0)
            <div class="mb-4 container" x-show="sliders == '' ? true : (sliders == 'horror')">
                <h1 class="text-white text-start fw-bold">Film Horror</h1>
                <section>
                    <div class="d-flex gap-2 bar mt-1">

                        @foreach ($films->where('id')->where('status', 'Publish')->where('kategori', 'Horror') as $item)
                            <div class="li position-relative">
                                <img src="img/logo-podcast.png" class="logo-podcast-1 position-absolute">
                                <img src="{{ asset('imgdb/' . $item->thumbnail) }}" class="card-img-top slider-img">
                            </div>
                        @endforeach

                        {{-- <div class="li position-relative">
                                    <img src="img/logo-podcast.png" class="logo-podcast-1 position-absolute">
                                    <img src="{{ asset('img/horror2.jpg') }}" class="card-img-top slider-img">
                                </div>
                                <div class="li position-relative">
                                    <img src="img/logo-podcast.png" class="logo-podcast-1 position-absolute">
                                    <img src="{{ asset('img/horror3.jpg') }}" class="card-img-top slider-img">
                                </div>
                                <div class="li position-relative">
                                    <img src="img/logo-podcast.png" class="logo-podcast-1 position-absolute">
                                    <img src="{{ asset('img/horror4.jpg') }}" class="card-img-top slider-img">
                                </div>
                                <div class="li position-relative">
                                    <img src="img/logo-podcast.png" class="logo-podcast-1 position-absolute">
                                    <img src="{{ asset('img/horror5.jpg') }}" class="card-img-top slider-img">
                                </div>
                                <div class="li position-relative">
                                    <img src="img/logo-podcast.png" class="logo-podcast-1 position-absolute">
                                    <img src="{{ asset('img/horror6.jpg') }}" class="card-img-top slider-img"
                                        alt="...">
                                </div>
                                <div class="li position-relative">
                                    <img src="img/logo-podcast.png" class="logo-podcast-1 position-absolute">
                                    <img src="{{ asset('img/horror7.jpg') }}" class="card-img-top slider-img"
                                        alt="...">
                                </div>
                                <div class="li position-relative">
                                    <img src="img/logo-podcast.png" class="logo-podcast-1 position-absolute">
                                    <img src="{{ asset('img/horror8.jpg') }}" class="card-img-top slider-img">
                                </div>
                                <div class="li position-relative">
                                    <img src="img/logo-podcast.png" class="logo-podcast-1 position-absolute">
                                    <img src="{{ asset('img/horror9.jpg') }}" class="card-img-top slider-img">
                                </div>
                                <div class="li position-relative">
                                    <img src="img/logo-podcast.png" class="logo-podcast-1 position-absolute">
                                    <img src="{{ asset('img/horror10.jpg') }}" class="card-img-top slider-img">
                                </div>
                                <div class="li position-relative">
                                    <img src="img/logo-podcast.png" class="logo-podcast-1 position-absolute">
                                    <img src="{{ asset('img/horror11.jpg') }}" class="card-img-top slider-img">
                                </div> --}}
                    </div>
                </section>
            </div>
        @else
        @endif

        {{-- SLIDE KE SEBELAH --}}

        <div class="mb-4 container-sm" x-show="sliders == '' ? true : (sliders == 'indonesia')">
            <h1 class="text-white text-start fw-bold">FIlm Indonesia</h1>
            <section class="splide new-4" aria-label="Splide Basic HTML Example">
                <div class="splide__track">
                    <ul class="splide__list">
                        <li class="splide__slide saran-2">
                            <div class="card border-white bg-custom bg-gradient rounded-3 rounded-bottom-4">
                                <div id="main-slider" class="splide pb-2"
                                    onclick="window.location='{{ route('pertaruhan') }}'">
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
                                            <li class="splide__slide rounded border">
                                                <!-- Content for thumbnail slider item 1 -->
                                                <img src="img/f1-1.webp">
                                            </li>
                                            <li class="splide__slide rounded border">
                                                <!-- Content for thumbnail slider item 2 -->
                                                <img src="img/f1-2.webp">
                                            </li>
                                            <li class="splide__slide rounded border">
                                                <!-- Content for thumbnail slider item 1 -->
                                                <img src="img/f1-3.webp">
                                            </li>
                                            <li class="splide__slide rounded border">
                                                <!-- Content for thumbnail slider item 2 -->
                                                <img src="img/f1-4.webp">
                                            </li>
                                            <li class="splide__slide rounded border bg-secondary text-white">
                                                <div class="sisa-eps mt-2" style="font-size: 20px"><i
                                                        class="bi bi-plus"></i>4</div>
                                            </li>
                                            <!-- Add more thumbn    ail slider items as needed -->
                                        </ul>
                                    </div>
                                </div>
                                <div class="saran-bawah d-flex ps-6 pe-4"
                                    onclick="window.location='{{ route('pertaruhan') }}'">
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
                            <div class="card border-white bg-custom bg-gradient rounded-3 rounded-bottom-4">
                                <div id="main-slider1" class="splide pb-2">
                                    <div class="splide__track">
                                        <ul class="splide__list">
                                            <li class="splide__slide rounded-3">
                                                <!-- Content for thumbnail slider item 2 -->
                                                <img src="img/switch1.webp">
                                            </li>
                                            <li class="splide__slide rounded-3">
                                                <!-- Content for thumbnail slider item 2 -->
                                                <img src="img/switch2.webp">
                                            </li>
                                            <li class="splide__slide rounded-3">
                                                <!-- Content for thumbnail slider item 1 -->
                                                <img src="img/switch3.webp">
                                            </li>
                                            <li class="splide__slide rounded-3">
                                                <!-- Content for thumbnail slider item 2 -->
                                                <img src="img/switch4.webp">
                                            </li>
                                            <!-- Add more thumbnail slider items as needed -->
                                        </ul>
                                    </div>
                                </div>

                                <div id="thumbnail-slider1" class="splide">
                                    <div class="splide__track border-0">
                                        <ul class="splide__list">
                                            <li class="splide__slide rounded border">
                                                <!-- Content for thumbnail slider item 2 -->
                                                <img src="img/switch1.webp">
                                            </li>
                                            <li class="splide__slide rounded border">
                                                <!-- Content for thumbnail slider item 1 -->
                                                <img src="img/switch2.webp">
                                            </li>
                                            <li class="splide__slide rounded border">
                                                <!-- Content for thumbnail slider item 1 -->
                                                <img src="img/switch3.webp">
                                            </li>
                                            <li class="splide__slide rounded border">
                                                <!-- Content for thumbnail slider item 1 -->
                                                <img src="img/switch4.webp">
                                            </li>
                                            <li class="splide__slide rounded border bg-secondary text-white">
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
                            <div class="card border-white bg-custom bg-gradient rounded-3 rounded-bottom-4">
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
                                            <li class="splide__slide rounded border">
                                                <!-- Content for thumbnail slider item 1 -->
                                                <img src="img/dbs1.webp">
                                            </li>
                                            <li class="splide__slide rounded border">
                                                <!-- Content for thumbnail slider item 1 -->
                                                <img src="img/dbs2.webp">
                                            </li>
                                            <li class="splide__slide rounded border">
                                                <!-- Content for thumbnail slider item 2 -->
                                                <img src="img/dbs3.webp">
                                            </li>
                                            <li class="splide__slide rounded border">
                                                <!-- Content for thumbnail slider item 2 -->
                                                <img src="img/dbs4.webp">
                                            </li>
                                            <li class="splide__slide rounded border bg-secondary text-white">
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
                    </ul>
                </div>
            </section>
        </div>
    </div>
    </section>
    </div>
    </div>

    {{-- NAVIGATION --}}

    <div class="menu-wrapper sticky-bottom start-50">
        <div class="navigation container-fluid" id="navigationn">
            <li>
                <a href="#" class="btnn border-end-0 border-bottom-0 border-start-0 active">
                    <img src="img/logo-muviku.png" class="mb-1" style="width: 20%;">
                    <span>Utama</span>
                </a>
            </li>
            <li>
                <a href="#" class="btnn border-end-0 border-bottom-0 border-start-0">
                    <i class="bi bi-search" aria-hidden="true"></i>
                    <span>Cari</span>
                </a>
            </li>
            <li>
                <a href="#" class="btnn border-end-0 border-bottom-0 border-start-0">
                    <i class="bi bi-heart" aria-hidden="true"></i>
                    <span>Suka</span>
                </a>
            </li>
            <li>
                <a href="#" class="btnn border-end-0 border-bottom-0 border-start-0">
                    <i class="bi bi-person fs-4" aria-hidden="true"></i>
                    <span style="margin-top: -4px">Profil</span>
                </a>
            </li>
        </div>
    </div>

    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content bg-transparent position-relative">
                <div class="modal-header text-white justify-content-center"
                    style="background: rgba(0, 0, 0, 0.863); border-bottom: 0.1px solid rgb(122, 119, 119);">
                    <h1 class="modal-title fs-1 fw-bold">Kategori</h1>
                </div>
                <div class="modal-body" style="background: rgba(0, 0, 0, 0.863)">
                    <ul class="w-100 text-white text-center vh-100 list-unstyled overflow-y-auto">
                        <li class="py-3"><a class="dropdown-item" href="#"></a></li>
                        <li class="py-3"><a class="dropdown-item" href="#">Daftar Tontonan</a></li>
                        @foreach ($kategoris as $item)
                            <li class="py-3"><a class="dropdown-item" href="#">{{ $item->kategori }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="modal-footer justify-content-center bg-transparent border-0 pb-3 z-99"
                    style="background: linear-gradient(0deg, rgba(24, 24, 24, 0.984) 40%, rgba(0,0,0,0.863) 100%);">
                    <button type="button" class="border btn-secondary rounded-circle text-black bg-white"
                        style="padding: 10px 16px 10px 16px " data-bs-dismiss="modal"><i
                            class="bi bi-x fs-2"></i></button>
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

    <script>
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
    </script>

    <Script>
        var splide = new Splide('.splide.new-1', {
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

        var splide = new Splide('.splide.new-4', {
            perPage: 4,
            focus: 0,
            omitEnd: true,
            rewind: true,
            arrows: false,
            pagination: false,
            lazyLoad: 'nearby',
            gap: '0.5rem',
        });

        splide.mount();

        var splide = new Splide('.splide.new-8', {
            perPage: 2,
            rewind: true,
            arrows: false,
            pagination: false,
            lazyLoad: 'nearby',
            focus: 0,
            omitEnd: true,
            drag: 'free',
        });

        splide.mount();

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

</body>

</html>
