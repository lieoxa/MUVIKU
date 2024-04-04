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
    <link rel="stylesheet" href="css/search.css">
    <title>Search</title>
</head>

<body class="container">
    <header class="container fixed-top pb-1 pt-2">
        <nav class="navbar">
            <div class="col-12 position-relative">
                <form class="d-flex col-12" role="search">
                    <input class="form-control pe-6" type="search" placeholder="Cari disini..." aria-label="Search">
                    <button type="submit" class="icon-search"><i class="modus-icons"
                            aria-hidden="true">search</i></button>
                    <a href="#" class="btn-search btn cari text-white">Cari</a>
                </form>
            </div>
        </nav>
    </header>

    <div class="old">
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
            @else
        @endif
    </div>

    @if (count($rekomendasis->where('id')->where('status', 'Publish')) > 0)
        <div class="mb-4">
            <h1 class="text-white text-start fw-bold">Rekomendasi</h1>
            <section class="d-flex gap-2 bar" style="height: 161px">
                @foreach ($rekomendasis->where('id')->where('status', 'Publish') as $item)
                    <div class=" li">
                        <div class="card bg-transparent card-img-top">
                            <img src="{{ asset('imgdb/' . $item->gambar) }}" width="160" height="160"
                                class="card-img-top-1 w-100">
                            <div class="card-img-overlay card-1 text-white p-6">
                                <h5 class="card-title fw-bold" style="color: #DA137F">{{ $item->judul }}</h5>
                                <p class="card-text lh-1"><small>{{ $item->deskripsi }}</small></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </section>
        </div>
    @else
    @endif

    <div class="mb-4">
        <h1 class="text-white text-start fw-bold">Trending Anime</h1>
        <section class="splide anim" aria-label="Splide Basic HTML Example">
            <div class="splide__track">
                <ul class="splide__list">
                    <li class="splide__slide d-grid gap-2 li-anim" onclick="window.location='{{ route('detailsrc') }}'">
                        <div class="card bg-transparent border-0" style="max-width: 540px;">
                            <div class="row g-0 d-flex">
                                <div class="col-4">
                                    <img src="img/tren-anim.jpg" class="img-fluid rounded img-anim" alt="...">
                                </div>
                                <div class="col-8 text-white">
                                    <div class="card-body py-0 px-2">
                                        <h6 class="card-title">One Piece Red</h6>
                                        <p class="text-secondary perusahaan"><small>Toei Animation</small></p>
                                        <p class="text-secondary view"><i class="bi bi-eye-fill"></i><small
                                                class="my-auto"> 88.8K</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card bg-transparent border-0" style="max-width: 540px;">
                            <div class="row g-0 d-flex">
                                <div class="col-4">
                                    <img src="img/tren-anim1.jpg" class="img-fluid rounded img-anim" alt="...">
                                </div>
                                <div class="col-8 text-white">
                                    <div class="card-body py-0 px-2">
                                        <h6 class="card-title">Your Name</h6>
                                        <p class="text-secondary perusahaan"><small>CoMix Wave Films</small></p>
                                        <p class="text-secondary view"><i class="bi bi-eye-fill"></i><small
                                                class="my-auto"> 88.8K</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card bg-transparent border-0" style="max-width: 540px;">
                            <div class="row g-0 d-flex">
                                <div class="col-4">
                                    <img src="img/tren-anim6.jpg" class="img-fluid rounded img-anim" alt="...">
                                </div>
                                <div class="col-8 text-white">
                                    <div class="card-body py-0 px-2">
                                        <h6 class="card-title">Spirited Away</h6>
                                        <p class="text-secondary perusahaan"><small>Ghibli</small></p>
                                        <p class="text-secondary view"><i class="bi bi-eye-fill"></i><small
                                                class="my-auto"> 88.8K</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="splide__slide d-grid gap-2 li-anim">
                        <div class="card bg-transparent border-0" style="max-width: 540px;">
                            <div class="row g-0 d-flex">
                                <div class="col-4">
                                    <img src="img/tren-anim2.jpeg" class="img-fluid rounded img-anim" alt="...">
                                </div>
                                <div class="col-8 text-white">
                                    <div class="card-body py-0 px-2">
                                        <h6 class="card-title">Jujutsu Kaisen 0</h6>
                                        <p class="text-secondary perusahaan"><small>MAPPA</small></p>
                                        <p class="text-secondary view"><i class="bi bi-eye-fill"></i><small
                                                class="my-auto"> 88.8K</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card bg-transparent border-0" style="max-width: 540px;">
                            <div class="row g-0 d-flex">
                                <div class="col-4">
                                    <img src="img/tren-anim3.jpg" class="img-fluid rounded img-anim" alt="...">
                                </div>
                                <div class="col-8 text-white">
                                    <div class="card-body py-0 px-2">
                                        <h6 class="card-title">Weathering With You</h6>
                                        <p class="text-secondary perusahaan"><small>CoMix Wave Films</small></p>
                                        <p class="text-secondary view"><i class="bi bi-eye-fill"></i><small
                                                class="my-auto"> 88.8K</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card bg-transparent border-0" style="max-width: 540px;">
                            <div class="row g-0 d-flex">
                                <div class="col-4">
                                    <img src="img/tren-anim5.jpg" class="img-fluid rounded img-anim" alt="...">
                                </div>
                                <div class="col-8 text-white">
                                    <div class="card-body py-0 px-2">
                                        <h6 class="card-title">Ocean Waves</h6>
                                        <p class="text-secondary perusahaan"><small> Ghibli</small></p>
                                        <p class="text-secondary view"><i class="bi bi-eye-fill"></i><small
                                                class="my-auto"> 88.8K</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="splide__slide d-grid gap-2 li-anim">
                        <div class="card bg-transparent border-0" style="max-width: 540px;">
                            <div class="row g-0 d-flex">
                                <div class="col-4">
                                    <img src="img/tren-anim10.jpg" class="img-fluid rounded img-anim" alt="...">
                                </div>
                                <div class="col-8 text-white">
                                    <div class="card-body py-0 px-2">
                                        <h6 class="card-title">Drifting Home</h6>
                                        <p class="text-secondary perusahaan"><small>Studio Colorido</small></p>
                                        <p class="text-secondary view"><i class="bi bi-eye-fill"></i><small
                                                class="my-auto"> 88.8K</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card bg-transparent border-0" style="max-width: 540px;">
                            <div class="row g-0 d-flex">
                                <div class="col-4">
                                    <img src="img/tren-anim13.jpg" class="img-fluid rounded img-anim" alt="...">
                                </div>
                                <div class="col-8 text-white">
                                    <div class="card-body py-0 px-2">
                                        <h6 class="card-title">Maboroshi</h6>
                                        <p class="text-secondary perusahaan"><small>MAPPA</small></p>
                                        <p class="text-secondary view"><i class="bi bi-eye-fill"></i><small
                                                class="my-auto"> 88.8K</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card bg-transparent border-0" style="max-width: 540px;">
                            <div class="row g-0 d-flex">
                                <div class="col-4">
                                    <img src="img/tren-anim11.jpg" class="img-fluid rounded img-anim" alt="...">
                                </div>
                                <div class="col-8 text-white">
                                    <div class="card-body py-0 px-2">
                                        <h6 class="card-title">Hello World</h6>
                                        <p class="text-secondary perusahaan"><small>Graphinica</small></p>
                                        <p class="text-secondary view"><i class="bi bi-eye-fill"></i><small
                                                class="my-auto"> 88.8K</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="splide__slide d-grid gap-2 li-anim-end">
                        <div class="card bg-transparent border-0" style="max-width: 540px;">
                            <div class="row g-0 d-flex">
                                <div class="col-4">
                                    <img src="img/tren-anim7.jpg" class="img-fluid rounded img-anim" alt="...">
                                </div>
                                <div class="col-8 text-white">
                                    <div class="card-body py-0 px-2">
                                        <h6 class="card-title">Suzume</h6>
                                        <p class="text-secondary perusahaan"><small>CoMix Wave Films</small></p>
                                        <p class="text-secondary view"><i class="bi bi-eye-fill"></i><small
                                                class="my-auto"> 88.8K</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card bg-transparent border-0" style="max-width: 540px;">
                            <div class="row g-0 d-flex">
                                <div class="col-4">
                                    <img src="img/tren-anim8.webp" class="img-fluid rounded img-anim" alt="...">
                                </div>
                                <div class="col-8 text-white">
                                    <div class="card-body py-0 px-2">
                                        <h6 class="card-title">Demon Slayer</h6>
                                        <p class="text-secondary perusahaan"><small>Ufotable</small></p>
                                        <p class="text-secondary view"><i class="bi bi-eye-fill"></i><small
                                                class="my-auto"> 88.8K</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card bg-transparent border-0" style="max-width: 540px;">
                            <div class="row g-0 d-flex">
                                <div class="col-4">
                                    <img src="img/tren-anim14.jpg" class="img-fluid rounded img-wwwanim"
                                        alt="...">
                                </div>
                                <div class="col-8 text-white">
                                    <div class="card-body py-0 px-2">
                                        <h6 class="card-title">One Piece Gold</h6>
                                        <p class="text-secondary perusahaan"><small>Toei Animation</small></p>
                                        <p class="text-secondary view"><i class="bi bi-eye-fill"></i><small
                                                class="my-auto"> 88.8K</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
    </div>

    <div class="mb-4 pb-4">
        <h1 class="text-white text-start fw-bold">Banyak Ditonton</h1>
        <section class="splide trend-film" aria-label="Splide Basic HTML Example">
            <div class="splide__track">
                <ul class="splide__list">
                    <li class="splide__slide li-1">
                        <img src="{{ asset('img/anim.jpg') }}" class="card-img-top slider-img" alt="...">
                    </li>
                    <li class="splide__slide li-1">
                        <img src="{{ asset('img/hero.jpg') }}" class="card-img-top slider-img" alt="...">
                    </li>
                    <li class="splide__slide li-1">
                        <img src="{{ asset('img/horror1.jpg') }}" class="card-img-top slider-img" alt="...">
                    </li>
                    <li class="splide__slide li-1">
                        <img src="{{ asset('img/drakor1.jpg') }}" class="card-img-top slider-img" alt="...">
                    </li>
                    <li class="splide__slide li-1">
                        <img src="{{ asset('img/thumb-pertaruhan.jpg') }}" class="card-img-top slider-img"
                            alt="...">
                    </li>
                    <li class="splide__slide li-1">
                        <img src="{{ asset('img/animasi7.jpg') }}" class="card-img-top slider-img" alt="...">
                    </li>
                    <li class="splide__slide li-1">
                        <img src="{{ asset('img/comedy7.jpg') }}" class="card-img-top slider-img" alt="...">
                    </li>
                    <li class="splide__slide li-1">
                        <img src="{{ asset('img/anim1.jpg') }}" class="card-img-top slider-img" alt="...">
                    </li>
                    <li class="splide__slide li-1">
                        <img src="{{ asset('img/hero1.jpg') }}" class="card-img-top slider-img" alt="...">
                    </li>
                    <li class="splide__slide li-1">
                        <img src="{{ asset('img/horror1.jpg') }}" class="card-img-top slider-img" alt="...">
                    </li>
                    <li class="splide__slide li-1">
                        <img src="{{ asset('img/drakor1.jpg') }}" class="card-img-top slider-img" alt="...">
                    </li>
                    <li class="splide__slide li-1">
                        <img src="{{ asset('img/fi1.jpg') }}" class="card-img-top slider-img" alt="...">
                    </li>
                    <li class="splide__slide li-1">
                        <img src="{{ asset('img/animasi8.jpg') }}" class="card-img-top slider-img" alt="...">
                    </li>
                    <li class="splide__slide li-1">
                        <img src="{{ asset('img/comedy6.jpg') }}" class="card-img-top slider-img" alt="...">
                    </li>
                    <li class="splide__slide li-1">
                        <img src="{{ asset('img/anim2.jpg') }}" class="card-img-top slider-img" alt="...">
                    </li>
                    <li class="splide__slide li-1">
                        <img src="{{ asset('img/hero2.jpg') }}" class="card-img-top slider-img" alt="...">
                    </li>
                    <li class="splide__slide li-1">
                        <img src="{{ asset('img/horror2.jpg') }}" class="card-img-top slider-img" alt="...">
                    </li>
                    <li class="splide__slide li-1">
                        <img src="{{ asset('img/drakor2.jpg') }}" class="card-img-top slider-img" alt="...">
                    </li>
                    <li class="splide__slide li-1">
                        <img src="{{ asset('img/fi2.jpg') }}" class="card-img-top slider-img" alt="...">
                    </li>
                    <li class="splide__slide li-1">
                        <img src="{{ asset('img/animasi9.jpg') }}" class="card-img-top slider-img" alt="...">
                    </li>
                    <li class="splide__slide li-1">
                        <img src="{{ asset('img/comedy5.jpg') }}" class="card-img-top slider-img" alt="...">
                    </li>
                </ul>
            </div>
        </section>
    </div>
    </div>
    <footer class="menu-wrapper fixed-bottom">
        <div class="navigation container" id="navigationn">
            <li>
                <a class="btnn border-end-0 border-bottom-0 border-start-0">
                    <img src="img/logo-muviku.png" class="mb-1" style="width: 20%;">
                    <span>Utama</span>
                </a>
            </li>
            <li>
                <a class="btnn border-end-0 border-bottom-0 border-start-0 active">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25"
                        viewBox="0,0,256,256">
                        <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                            stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                            font-family="none" font-weight="none" font-size="none" text-anchor="none"
                            style="mix-blend-mode: normal">
                            <g transform="scale(5.33333,5.33333)">
                                <path transform="translate(-15.15512,36.5872) rotate(-45.001)" d="M34.6,28.1h4v17h-4z"
                                    fill="#e6551c"></path>
                                <path
                                    d="M20,4c-8.83656,0 -16,7.16344 -16,16c0,8.83656 7.16344,16 16,16c8.83656,0 16,-7.16344 16,-16c0,-8.83656 -7.16344,-16 -16,-16z"
                                    fill="#e6551c"></path>
                                <path transform="translate(-15.83953,38.24094) rotate(-45.001)"
                                    d="M36.2,32.1h4v12.3h-4z" fill="#e6551c"></path>
                                <path
                                    d="M20,7c-7.1797,0 -13,5.8203 -13,13c0,7.1797 5.8203,13 13,13c7.1797,0 13,-5.8203 13,-13c0,-7.1797 -5.8203,-13 -13,-13z"
                                    fill="#64b5f6"></path>
                                <path
                                    d="M26.9,14.2c-1.7,-2 -4.2,-3.2 -6.9,-3.2c-2.7,0 -5.2,1.2 -6.9,3.2c-0.4,0.4 -0.3,1.1 0.1,1.4c0.4,0.4 1.1,0.3 1.4,-0.1c1.4,-1.6 3.3,-2.5 5.4,-2.5c2.1,0 4,0.9 5.4,2.5c0.2,0.2 0.5,0.4 0.8,0.4c0.2,0 0.5,-0.1 0.6,-0.2c0.4,-0.4 0.4,-1.1 0.1,-1.5z"
                                    fill="#bbdefb"></path>
                            </g>
                        </g>
                        <g fill="#e6551c" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                            stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                            font-family="none" font-weight="none" font-size="none" text-anchor="none"
                            style="mix-blend-mode: normal">
                            <g>
                                <path
                                    d="M214.82,225.79v0c0,-3 0.89,-5.5 2.67,-7.5c1.78,-2 4.45333,-3 8.02,-3c3.56,0 6.26333,1 8.11,3c1.84,2 2.76,4.5 2.76,7.5v0c0,2.87333 -0.92,5.28 -2.76,7.22c-1.84667,1.93333 -4.55,2.9 -8.11,2.9c-3.56667,0 -6.24,-0.96667 -8.02,-2.9c-1.78,-1.94 -2.67,-4.34667 -2.67,-7.22z">
                                </path>
                            </g>
                        </g>
                    </svg>
                    <span>Cari</span>
                </a>
            </li>
            <li>
                <a class="btnn border-end-0 border-bottom-0 border-start-0">
                    <i class="bi bi-heart" aria-hidden="true"></i>
                    <span>Suka</span>
                </a>
            </li>
            <li onclick="window.location='{{ route('profile') }}'">
                <a class="btnn border-end-0 border-bottom-0 border-start-0">
                    <i class="bi bi-person fs-4" aria-hidden="true"></i>
                    <span style="margin-top: -4px">Profil</span>
                </a>
            </li>
        </div>
    </footer>
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
