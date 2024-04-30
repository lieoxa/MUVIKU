<!doctype html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Favorit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
    <link rel="stylesheet" href="css/watchlist.css">
</head>

<body>
    <div class="old" style="padding-top: 65px">
        <div class="atas sticky-top position-fixed w-100">
            <div class="navbar ps-2 pe-3 w-100 p-0 d-flex" style="height:68.59px;" id="mainNav">
                <div class="txt-daftar ms-2">
                    <h3 class="mb-0 text-white">Daftar Favorit</h3>
                </div>
            </div>
            <div x-data="{ sliders: '' }">
                <div class="container-sm">
                    <div class="container mb-2 p-0 border-bottom-1" style="max-height: 44px;" x-data="{ filter: 'all' }">
                        <section class="splide slider-1 mt-0 mb-4" aria-label="Splide Basic HTML Example">
                            <div class="splide__track">
                                <ul class="splide__list">
                                    <li class="splide__slide ">
                                        <span
                                            :class="filter == 'anime' ? 'title-service text-white fs-8 fw-bold' :
                                                'text-secondary'"
                                            x-on:click="filter = 'anime';sliders = 'anime'">Semua</span>
                                    </li>
                                    {{-- <li class="splide__slide ">
                                        <span
                                            :class="filter == 'anime' ? 'title-service text-white fs-8 fw-bold' :
                                                'text-secondary'"
                                            x-on:click="filter = 'anime';sliders = 'anime'">Anime</span>
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
                            <div
                                class="d-flex gap-2 mt-2 card-body p-1 bg-transparent border border-secondary w-auto rounded">
                                <div class="d-flex h-100">
                                    <img src="{{ asset('img/anim.jpg') }}" class="rounded slider-img" width="80"
                                        height="90">
                                </div>
                                <div class="ms-1 w-auto my-1">
                                    <h5 class="text-white mb-1">One Piece Red</h5>
                                    <p>MAPPA</p>
                                </div>
                                <div class="w-auto text-white ms-auto pe-1" id="heart" style="margin-top: 4px; margin-right: 0.3rem;">
                                    <i class="bi bi-heart-fill fs-4 text-danger"></i>
                                </div>
                            </div>
                        </section>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <footer>
        <div class="menu-wrapper fixed-bottom">
            <div class="navigation container-fluid" id="navigationn">
                <li>
                    <a href="/utama" class="btnn border-end-0 border-bottom-0 border-start-0">
                        <img src="img/logo-muviku.png" class="mb-1" style="width: 20%;">
                        <span>Utama</span>
                    </a>
                </li>
                <li>
                    <a href="/search" class="btnn border-end-0 border-bottom-0 border-start-0">
                        <i class="bi bi-search pe-0" aria-hidden="true"></i>
                        <span>Cari</span>
                    </a>
                </li>
                <li>
                    <a href="/favorit" class="btnn border-end-0 border-bottom-0 border-start-0 active">
                        <img src="img/love.png" width="20">
                        <span>Suka</span>
                    </a>
                </li>
                <li>
                    <a href="/profile" class="btnn border-end-0 border-bottom-0 border-start-0 ">
                        <i class="bi bi-person fs-4" aria-hidden="true"></i>
                        <span style="margin-top: -4px">Profil</span>
                    </a>
                </li>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
<script>
    document.getElementById('heart').addEventListener('click', function() {

        Swal.fire({
            position: "center",
            icon: "success",
            text: "Berhasil Dihapus!",
            showConfirmButton: false,
            timer: 2000
        });
    });
</script>
<script>
    const optionMenu = document.querySelector(".select-menu"),
        selectBtn = optionMenu.querySelector(".select-btn"),
        options = optionMenu.querySelectorAll(".option"),
        sBtn_text = optionMenu.querySelector(".sBtn-text");
    selectBtn.addEventListener("click", () => optionMenu.classList.toggle("active"));
    options.forEach(option => {
        option.addEventListener("click", () => {
            let selectedOption = option.querySelector(".option-text").innerText;
            sBtn_text.innerText = selectedOption;
            optionMenu.classList.remove("active");
        });
    });
</script>

</html>
