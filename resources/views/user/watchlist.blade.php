<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar tontonan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
    <link rel="stylesheet" href="css/watchlist.css">
    {{-- <link rel="stylesheet" href="css/style.css"> --}}
</head>

<body>
    <div class="old" style="padding-top: 65px">
        <div class="atas sticky-top position-fixed w-100">
            <div class="navbar ps-2 pe-3 w-100 p-0 d-flex" style="height:68.59px;" id="mainNav">
                <button onclick="window.location='{{ route('profile') }}'" class="btn1 border-0 bg-transparent"><i
                        class="bi bi-chevron-left" style="font-size: 25px; margin-bottom: 20px;"></i></button>
                <div class="txt-daftar">
                    <h3 class="mb-0 text-white">Daftar Tonton</h3>
                </div>
            </div>
            <div x-data="{ sliders: '' }">
                <div class="container-sm">
                    <div class="container mb-2 p-0 border-bottom-1" style="max-height: 44px;" x-data="{ filter: 'all' }">
                        <section class="splide slider-1 mt-0 mb-4" aria-label="Splide Basic HTML Example">
                            <div class="splide__track">
                                <ul class="splide__list">
                                    {{-- <li class="splide__slide">
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
                                    </li> --}}
                                    {{-- <li class="splide__slide">
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
                                    </li> --}}
                                    <li class="splide__slide ">
                                        <span
                                            :class="filter == 'anime' ? 'title-service text-white fs-8 fw-bold' :
                                                'text-secondary'"
                                            x-on:click="filter = 'anime';sliders = 'anime'">Anime</span>
                                    </li>
                                    {{-- <li class="splide__slide">
                                        <span
                                            :class="filter == 'hero' ? 'title-service text-white fs-8 fw-bold' :
                                                'text-secondary'"
                                            x-on:click="filter = 'hero';sliders = 'hero'">Super Hero</span>
                                    </li> --}}
                                    {{-- <li class="splide__slide ">
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
                                    </li> --}}
                                </ul>
                            </div>
                        </section>
                        <div class="d-flex gap-2 bar mt-3">
                        </div>
                    </div>
                </div>
                <section>
                    <div class="hero my-3 container" style="margin-bottom: 1.9rem;"
                        x-show="sliders == '' ? true : (sliders == 'hero')">
                        {{-- <h1 class="text-white text-start fw-bold">Super Hero</h1> --}}
                        <section>
                            <div class="d-flex bar gap-2 mt-2 card-body p-1 bg-transparent border border-secondary w-auto rounded" onclick="window.location='{{ route('detailsrc') }}'">
                                <div class="d-flex h-100">
                                    <img src="{{ asset('img/anim.jpg') }}" class="rounded slider-img" width="100" height="130">
                                </div>
                                <div class="ms-1 w-auto my-1">
                                    <h5 class="text-white mb-1">One Piece Red</h5>
                                    <p>MAPPA</p>
                                </div>
                                <div class="w-auto text-white ms-auto pe-1">
                                    <i class="bi bi-three-dots-vertical fs-4"></i>
                                </div>
                            </div>
                        </section>
                    </div>
                    {{-- <div class="korea mb-4 container"
                    x-show="sliders == '' ? true : (sliders == 'korea')">
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
                                <img src="{{ asset('img/drakor5.jpg') }}" class="card-img-top slider-img"
                                    alt="...">
                            </div>
                            <div class="li position-relative">
                                <img src="img/logo-podcast.png" class="logo-podcast-1 position-absolute">
                                <img src="{{ asset('img/drakor6.jpg') }}" class="card-img-top slider-img"
                                    alt="...">
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
                                <img src="{{ asset('img/drakor9.jpg') }}" class="card-img-top slider-img"
                                    alt="...">
                            </div>
                            <div class="li position-relative">
                                <img src="img/logo-podcast.png" class="logo-podcast-1 position-absolute">
                                <img src="{{ asset('img/drakor10.jpg') }}" class="card-img-top slider-img">
                            </div>
                        </div>
                    </section>
                </div> --}}
                </section>
            </div>
        </div>
    </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>
<script>
    var splide = new Splide('.splide.slider-1', {
        pagination: false,
        autoWidth: true,
        gap: '1.2rem',
        arrows: false,
        lazyLoad: 'nearby',
        drag: 'free',
    });
    splide.mount();
</script>
<script>
    let section = document.querySelectorAll('section');
    let navLinks = document.querySelectorAll('nav a');

    window.onscroll = () => {

        section.forEach(sec => {

            let top = window.scrollY;
            let offset = sec.offsetTop;
            let height = sec.offsetHeight;
            let id = sec.getAttribute('id');

            if (top >= offset && top < offset + height) {
                navLinks.forEach(links => {
                    links.classList.remove('active');
                    document.querySelector('nav a[href*=' + id + ']').classList.add('active');
                })
            }
        });
    };
</script>

</html>
