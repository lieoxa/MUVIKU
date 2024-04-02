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
            <nav class="kategori">
                <a class="active" href="#anime">Anime</a>
                <a href="#korea">Korea</a>
                <a href="#podcast">Podcast</a>
                <a href="#indonesia">Indonesia</a>
                <a href="#animasi">Animasi</a>
                <a href="#hero">Hero</a>
                <a href="#serial">Serial</a>
                <a href="#horror">Horror</a>
            </nav>
        </div>
        <div class="scroll-horizontal h-100 d-flex">
            <section class="w-100" id="anime"></section>
            {{-- <section class="w-100" id="korea"></section>
            <section class="w-100" id="podcast"></section>
            <section class="w-100" id="indonesia"></section>
            <section class="w-100" id="animasi"></section>
            <section class="w-100" id="hero"></section>
            <section class="w-100" id="serial"></section>
            <section class="w-100" id="horror"></section> --}}
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
