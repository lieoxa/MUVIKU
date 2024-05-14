<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@trimble-oss/modus-icons@1.9.0/dist/modus-solid/fonts/modus-icons.css">
    <link rel="stylesheet" href="css/detail.css">
    <title>Detail</title>
</head>
<style>
    .hidden {
        display: none;
    }

    .btn-simpan.active {
        background-color: #28a745;
        /* Ganti warna sesuai keinginan Anda */
        cursor: pointer;
    }

    .btn-simpan:disabled {
        background-color: #6c757d;
        /* Ganti warna sesuai keinginan Anda */
        cursor: not-allowed;
    }
</style>

<body>
    <nav class="navbar ps-2 pe-3 sticky-top w-100 p-0 d-flex justify-content-between" style="height:68.59px;"
        id="mainNav">
        <div class="d-flex gap-3" style="height: 68.58px">
            <button onclick="window.history.go(-1); return false;" class="btn1 border-0"><i class="bi bi-chevron-left"
                    style="font-size: 25px; margin-bottom: 20px;"></i></button>
            <h2 class="mb-0 txt-detail">Detail</h2>
        </div>
        <div class="select-menu">
            <div class="select-btn">
                <span class="sBtn-text"><i class="bi bi-three-dots-vertical" style="font-size: 25px"></i></span>
                <i class="bx bx-chevron-down"></i>
                <ul class="options rounded">
                    <li class="option daftar" id="daftar">
                        <span class="option-text"><i class="bi bi-bookmark-check-fill fs-5"></i>Tambahkan ke
                            Daftar</span>
                    </li>
                    <hr>
                    <li data-bs-toggle="modal" data-bs-target="#lapor" class="option laporkan">
                        <span class="option-text"><i class="bi bi-question-circle-fill fs-5"></i>Laporkan
                            Film</span>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="full mb-3">
        <img src="img/jk.jpg" class="w-100 thumbnail-detail" alt="...">
        <div class="parent position-relative">
            <div class="half mb-4 pt-5"
                style="margin-top: -172px; padding-left: 12px; padding-right: 12px; padding-bottom: 0.49rem;">
                <div class="title mb-2 d-flex justify-content-between">
                    <h1 class="fw-bolder">Jujutsu Kaisen</h1><br>
                </div>

                <div class="d-flex gap-2" style="font-size: 15px">
                    <div class="tahun w-auto">2022</div>
                    <div class="umur w-auto bg-secondary px-1">13+</div>
                    <div class="durasi w-auto">1 Season</div>
                </div>
                <h6 class="d-flex" style="font-size:0.9rem">Perusahaan : <p class="ms-1">MAPPA</p>
                </h6>
                <h6 class="mb-2 d-flex" style="font-size:0.9rem">Sutradara : <p class="ms-1">Goro Taniguchi</p>
                </h6>
                <h6 class="mb-2" style="font-size:0.9rem">Perusahaan produksi : MAPPA</h6>
                <div class="desk">
                    <p>Jujutsu Kaisen bercerita tentang Yuji Itadori yang menjadi murid SMA
                        karena sebuah kejadian, Iseng-iseng melakukan aktivitas melakukan
                        aktivitas paranormal tanpa
                        dasar dengan klub gaib. Siswa <span class="additional-text"> sekolah menengah Yuuji Itadori
                            menghabiskan hari-harinya di
                            ruang klub atau rumah
                            sakit, dimana dia mengunjungi kakeknya yang terbaring di tempat tidur.</span>
                        <span class="read-more-btn text-primary" onclick="toggleReadMore()">Selengkapnya...</span>
                    </p>
                </div>
            </div>
            <div class="btn-fungsional my-4">
                <div class="text-white">
                    <ul class="d-flex p-0 justify-content-around" style="list-style: none">
                        <li class="text-center favorit" id="disukai">
                            <i class="bi bi-heart"></i>
                            <h6><small>Favorit</small></h6>
                        </li>
                        <li class="text-center" onclick="downloadVideo('downloadVideo', '')">
                            <div class="mx-auto"><i class="bi bi-download"></i></div>
                            <h6><small>Unduh</small></h6>
                        </li>
                        <li class="text-center">
                            <i class="bi bi-share"></i>
                            <h6><small>Bagikan</small></h6>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="episode container">
                <div class="jumlah-e d-flex gap-2">
                    <h4 class="fw-medium mb-3">Season</h4>
                </div>
                <div class="accordion accordion-flush gap-2 d-grid" id="accordionFlushExample">
                    <div class="accordion-item rounded-4 border">
                        <h2 class="accordion-header">
                            <button class="accordion-button rounded-5 collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false"
                                aria-controls="flush-collapseOne">
                                Season 1
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse rounded-5"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body px-2 pt-0 rounded-5">
                                <div class="row grid gap-2 list-episode list-unstyled">
                                    <div class="accordion accordion-flush" id="s1_e1">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button
                                                    class="accordion-button eps-icon-down collapsed border px-2 py-2 rounded-4 border-secondary bg-dark gap-2"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#s1-e1"
                                                    aria-expanded="false" aria-controls="s1-e1">
                                                    <div class="px-2 text-black rounded-2 text-center" style="background: #d7d7d7; height:26.49px;">
                                                        <h5 class="border-0 my-0" style="font-weight: 650 !important;padding-top:2px;padding-bottom:1px">1</h5>
                                                    </div>
                                                    <h6 class="my-auto">Ryomen Sukuna</h6>
                                                </button>
                                            </h2>
                                            <div id="s1-e1" class="accordion-collapse collapse"
                                                data-bs-parent="#s1_e1">
                                                <div class="accordion-body p-0 p-2 d-flex">
                                                    <div class="img-eps">
                                                        <img src="img/jjk1.jpg">
                                                    </div>
                                                    <div class="desc text-white w-75 container">
                                                        Di dunia di mana para iblis memakan manusia.
                                                    </div>
                                                </div>
                                                <div class="icon-play w-25">
                                                    <img src="img/play-button.png" class="w-75">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion accordion-flush" id="s1_e2">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button
                                                    class="accordion-button eps-icon-down collapsed border px-2 py-2 rounded-4 border-secondary bg-dark gap-2"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#s1-e2"
                                                    aria-expanded="false" aria-controls="s1-e2">
                                                    <div class="px-2 text-black rounded-2 text-center" style="background: #d7d7d7; height:26.49px;">
                                                        <h5 class="border-0 my-0" style="font-weight: 650 !important;padding-top:2px;padding-bottom:1px">2</h5>
                                                    </div>
                                                    <h6 class="my-auto">Untuk Diriku Sendiri</h6>
                                                </button>
                                            </h2>
                                            <div id="s1-e2" class="accordion-collapse collapse"
                                                data-bs-parent="#s1_e2">
                                                <div class="accordion-body p-0 p-2 d-flex">
                                                    <div class="img-eps">
                                                        <img src="img/jjk2.jpg">
                                                    </div>
                                                    <div class="desc text-white w-75 container">
                                                        Yuji berhasil mengendalikan kutukan Ryomen Sukuna.
                                                    </div>
                                                </div>
                                                <div class="icon-play">
                                                    <img src="img/play-button.png" class="w-25">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion accordion-flush" id="s1_e3">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button
                                                    class="accordion-button eps-icon-down collapsed border px-2 py-2 rounded-4 border-info bg-dark gap-2"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#s1-e3"
                                                    aria-expanded="false" aria-controls="s1-e3">
                                                    <div class="px-2 text-black rounded-2 text-center" style="background: #d7d7d7; height:26.49px;">
                                                        <h5 class="border-0 my-0" style="font-weight: 650 !important;padding-top:2px;padding-bottom:1px">3</h5>
                                                    </div>
                                                    <h6 class="my-auto">Gadis Baja</h6>
                                                </button>
                                            </h2>
                                            <div id="s1-e3" class="accordion-collapse collapse"
                                                data-bs-parent="#s1_e3">
                                                <div class="accordion-body p-0 p-2 d-flex">
                                                    <div class="img-eps">
                                                        <img src="img/jjk3.jpg">
                                                    </div>
                                                    <div class="desc text-white w-75 container">
                                                        Nobara Kugisaki ikut dalam perjalanan ke Roppongi.
                                                    </div>
                                                </div>
                                                <div class="icon-play">
                                                    <img src="img/play-button.png" class="w-25">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion accordion-flush" id="s1_e4">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button
                                                    class="accordion-button eps-icon-down collapsed border px-2 py-2 rounded-4 border-info bg-dark gap-2"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#s1-e4"
                                                    aria-expanded="false" aria-controls="s1-e4">
                                                    <div class="px-2 text-black rounded-2 text-center" style="background: #d7d7d7; height:26.49px;">
                                                        <h5 class="border-0 my-0" style="font-weight: 650 !important;padding-top:2px;padding-bottom:1px">4</h5>
                                                    </div>
                                                    <h6 class="my-auto">Rahim Kutukan Harus Mati</h6>
                                                </button>
                                            </h2>
                                            <div id="s1-e4" class="accordion-collapse collapse"
                                                data-bs-parent="#s1_e4">
                                                <div class="accordion-body p-0 p-2 d-flex">
                                                    <div class="img-eps">
                                                        <img src="img/jjk4.jpg">
                                                    </div>
                                                    <div class="desc text-white w-75 container">
                                                        Ketika rahim kutukan menyerang sebuah lapas remaja.
                                                    </div>
                                                </div>
                                                <div class="icon-play">
                                                    <img src="img/play-button.png" class="w-25">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion accordion-flush" id="s1_e5">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button
                                                    class="accordion-button eps-icon-down collapsed border px-2 py-2 rounded-4 border-info bg-dark gap-2"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#s1-e5"
                                                    aria-expanded="false" aria-controls="s1-e5">
                                                    <div class="px-2 text-black rounded-2 text-center" style="background: #d7d7d7; height:26.49px;">
                                                        <h5 class="border-0 my-0" style="font-weight: 650 !important;padding-top:2px;padding-bottom:1px">5</h5>
                                                    </div>
                                                    <h6 class="my-auto">Rahim Kutukan Harus Mati -ll-</h6>
                                                </button>
                                            </h2>
                                            <div id="s1-e5" class="accordion-collapse collapse"
                                                data-bs-parent="#s1_e5">
                                                <div class="accordion-body p-0 p-2 d-flex">
                                                    <div class="img-eps">
                                                        <img src="img/jjk5.jpg">
                                                    </div>
                                                    <div class="desc text-white w-75 container">
                                                        Ketika Sukuna menyandera tubuh Yuji dengan cara mengerikan.
                                                    </div>
                                                </div>
                                                <div class="icon-play">
                                                    <img src="img/play-button.png" class="w-25">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion accordion-flush" id="s1_e6">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button
                                                    class="accordion-button eps-icon-down collapsed border px-2 py-2 rounded-4 border-info bg-dark gap-2"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#s1-e6"
                                                    aria-expanded="false" aria-controls="s1-e6">
                                                    <div class="px-2 text-black rounded-2 text-center" style="background: #d7d7d7; height:26.49px;">
                                                        <h5 class="border-0 my-0" style="font-weight: 650 !important;padding-top:2px;padding-bottom:1px">6</h5>
                                                    </div>
                                                    <h6 class="my-auto">Setelah Hujan</h6>
                                                </button>
                                            </h2>
                                            <div id="s1-e6" class="accordion-collapse collapse"
                                                data-bs-parent="#s1_e6">
                                                <div class="accordion-body p-0 p-2 d-flex">
                                                    <div class="img-eps">
                                                        <img src="img/jjk6.jpg">
                                                    </div>
                                                    <div class="desc text-white w-75 container">
                                                        Sukuna memberi tahu Yuji bahwa ia akan menghidupkannya.
                                                    </div>
                                                </div>
                                                <div class="icon-play">
                                                    <img src="img/play-button.png" class="w-25">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion accordion-flush" id="s1_e7">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button
                                                    class="accordion-button eps-icon-down collapsed border px-2 py-2 rounded-4 border-info bg-dark gap-2"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#s1-e7"
                                                    aria-expanded="false" aria-controls="s1-e7">
                                                    <div class="px-2 text-black rounded-2 text-center" style="background: #d7d7d7; height:26.49px;">
                                                        <h5 class="border-0 my-0" style="font-weight: 650 !important;padding-top:2px;padding-bottom:1px">7</h5>
                                                    </div>
                                                    <h6 class="my-auto">Serangan</h6>
                                                </button>
                                            </h2>
                                            <div id="s1-e7" class="accordion-collapse collapse"
                                                data-bs-parent="#s1_e7">
                                                <div class="accordion-body p-0 p-2 d-flex">
                                                    <div class="img-eps">
                                                        <img src="img/jjk7.jpg">
                                                    </div>
                                                    <div class="desc text-white w-75 container">
                                                        Roh Kutukan bernama Jogo menyerang Gojo.
                                                    </div>
                                                </div>
                                                <div class="icon-play">
                                                    <img src="img/play-button.png" class="w-25">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion accordion-flush" id="s1_e8">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button
                                                    class="accordion-button eps-icon-down collapsed border px-2 py-2 rounded-4 border-info bg-dark gap-2"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#s1-e8"
                                                    aria-expanded="false" aria-controls="s1-e8">
                                                    <div class="px-2 text-black rounded-2 text-center" style="background: #d7d7d7; height:26.49px;">
                                                        <h5 class="border-0 my-0" style="font-weight: 650 !important;padding-top:2px;padding-bottom:1px">8</h5>
                                                    </div>
                                                    <h6 class="my-auto">Kebosanan</h6>
                                                </button>
                                            </h2>
                                            <div id="s1-e8" class="accordion-collapse collapse"
                                                data-bs-parent="#s1_e8">
                                                <div class="accordion-body p-0 p-2 d-flex">
                                                    <div class="img-eps">
                                                        <img src="img/jjk8.jpg">
                                                    </div>
                                                    <div class="desc text-white w-75 container">
                                                        Ketika Kugisaki dan Fushiguro berlatih untuk acara pertukaran.
                                                    </div>
                                                </div>
                                                <div class="icon-play">
                                                    <img src="img/play-button.png" class="w-25">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion accordion-flush" id="s1_e9">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button
                                                    class="accordion-button eps-icon-down collapsed border px-2 py-2 rounded-4 border-info bg-dark gap-2"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#s1-e9"
                                                    aria-expanded="false" aria-controls="s1-e9">
                                                    <div class="px-2 text-black rounded-2 text-center" style="background: #d7d7d7; height:26.49px;">
                                                        <h5 class="border-0 my-0" style="font-weight: 650 !important;padding-top:2px;padding-bottom:1px">9</h5>
                                                    </div>
                                                    <h6 class="my-auto">Orang Tidak Penting dan Hukuman</h6>
                                                </button>
                                            </h2>
                                            <div id="s1-e9" class="accordion-collapse collapse"
                                                data-bs-parent="#s1_e9">
                                                <div class="accordion-body p-0 p-2 d-flex">
                                                    <div class="img-eps">
                                                        <img src="img/jjk9.jpg">
                                                    </div>
                                                    <div class="desc text-white w-75 container">
                                                        Junpei Yoshino, seorang siswa SMA, mendapati para perundungnya terbunuh
                                                    </div>
                                                </div>
                                                <div class="icon-play">
                                                    <img src="img/play-button.png" class="w-25">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion accordion-flush" id="s1_e10">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button
                                                    class="accordion-button eps-icon-down collapsed border px-2 py-2 rounded-4 border-info bg-dark gap-2"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#s1-e10"
                                                    aria-expanded="false" aria-controls="s1-e10">
                                                    <div class="px-2 text-black rounded-2 text-center" style="background: #d7d7d7; height:26.49px;">
                                                        <h5 class="border-0 my-0" style="font-weight: 650 !important;padding-top:2px;padding-bottom:1px">10</h5>
                                                    </div>
                                                    <h6 class="my-auto">Transfigurasi</h6>
                                                </button>
                                            </h2>
                                            <div id="s1-e10" class="accordion-collapse collapse"
                                                data-bs-parent="#s1_e10">
                                                <div class="accordion-body p-0 p-2 d-flex">
                                                    <div class="img-eps">
                                                        <img src="img/jjk10.jpg">
                                                    </div>
                                                    <div class="desc text-white w-75 container">
                                                        Ketika Kugisaki dan Fushiguro berlatih untuk acara pertukaran.
                                                    </div>
                                                </div>
                                                <div class="icon-play">
                                                    <img src="img/play-button.png" class="w-25">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion accordion-flush" id="s1_e11">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button
                                                    class="accordion-button eps-icon-down collapsed border px-2 py-2 rounded-4 border-info bg-dark gap-2"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#s1-e11"
                                                    aria-expanded="false" aria-controls="s1-e11">
                                                    <div class="px-2 text-black rounded-2 text-center" style="background: #d7d7d7; height:26.49px;">
                                                        <h5 class="border-0 my-0" style="font-weight: 650 !important;padding-top:2px;padding-bottom:1px">11</h5>
                                                    </div>
                                                    <h6 class="my-auto">Berpikiran Sempit</h6>
                                                </button>
                                            </h2>
                                            <div id="s1-e11" class="accordion-collapse collapse"
                                                data-bs-parent="#s1_e11">
                                                <div class="accordion-body p-0 p-2 d-flex">
                                                    <div class="img-eps">
                                                        <img src="img/jjk11.jpg">
                                                    </div>
                                                    <div class="desc text-white w-75 container">
                                                        Ketika Kugisaki dan Fushiguro berlatih untuk acara pertukaran.
                                                    </div>
                                                </div>
                                                <div class="icon-play">
                                                    <img src="img/play-button.png" class="w-25">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion accordion-flush" id="s1_e12">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button
                                                    class="accordion-button eps-icon-down collapsed border px-2 py-2 rounded-4 border-info bg-dark gap-2"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#s1-e12"
                                                    aria-expanded="false" aria-controls="s1-e12">
                                                    <div class="px-2 text-black rounded-2 text-center" style="background: #d7d7d7; height:26.49px;">
                                                        <h5 class="border-0 my-0" style="font-weight: 650 !important;padding-top:2px;padding-bottom:1px">12</h5>
                                                    </div>
                                                    <h6 class="my-auto">Untukmu, Suatu Hari Nanti
                                                    </h6>
                                                </button>
                                            </h2>
                                            <div id="s1-e12" class="accordion-collapse collapse"
                                                data-bs-parent="#s1_e12">
                                                <div class="accordion-body p-0 p-2 d-flex">
                                                    <div class="img-eps">
                                                        <img src="img/jjk12.jpg">
                                                    </div>
                                                    <div class="desc text-white w-75 container">
                                                        Ketika Kugisaki dan Fushiguro berlatih untuk acara pertukaran.
                                                    </div>
                                                </div>
                                                <div class="icon-play">
                                                    <img src="img/play-button.png" class="w-25">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion accordion-flush" id="s1_e13">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button
                                                    class="accordion-button eps-icon-down collapsed border px-2 py-2 rounded-4 border-info bg-dark gap-2"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#s1-e13"
                                                    aria-expanded="false" aria-controls="s1-e13">
                                                    <div class="px-2 text-black rounded-2 text-center" style="background: #d7d7d7; height:26.49px;">
                                                        <h5 class="border-0 my-0" style="font-weight: 650 !important;padding-top:2px;padding-bottom:1px">13</h5>
                                                    </div>
                                                    <h6 class="my-auto">Besok</h6>
                                                </button>
                                            </h2>
                                            <div id="s1-e13" class="accordion-collapse collapse"
                                                data-bs-parent="#s1_e13">
                                                <div class="accordion-body p-0 p-2 d-flex">
                                                    <div class="img-eps">
                                                        <img src="img/jjk13.jpg">
                                                    </div>
                                                    <div class="desc text-white w-75 container">
                                                        Ketika Kugisaki dan Fushiguro berlatih untuk acara pertukaran.
                                                    </div>
                                                </div>
                                                <div class="icon-play">
                                                    <img src="img/play-button.png" class="w-25">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion accordion-flush" id="s1_e14">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button
                                                    class="accordion-button eps-icon-down collapsed border px-2 py-2 rounded-4 border-info bg-dark gap-2"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#s1-e14"
                                                    aria-expanded="false" aria-controls="s1-e14">
                                                    <div class="px-2 text-black rounded-2 text-center" style="background: #d7d7d7; height:26.49px;">
                                                        <h5 class="border-0 my-0" style="font-weight: 650 !important;padding-top:1px;padding-bottom:1px">14</h5>
                                                    </div>
                                                    <h6 class="my-auto">Adu Kemampuan - Kelompok 0</h6>
                                                </button>
                                            </h2>
                                            <div id="s1-e14" class="accordion-collapse collapse"
                                                data-bs-parent="#s1_e14">
                                                <div class="accordion-body p-0 p-2 d-flex">
                                                    <div class="img-eps">
                                                        <img src="img/jjk14.jpg">
                                                    </div>
                                                    <div class="desc text-white w-75 container">
                                                        Ketika Kugisaki dan Fushiguro berlatih untuk acara pertukaran.
                                                    </div>
                                                </div>
                                                <div class="icon-play">
                                                    <img src="img/play-button.png" class="w-25">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion accordion-flush" id="s1_e15">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button
                                                    class="accordion-button eps-icon-down collapsed border px-2 py-2 rounded-4 border-info bg-dark gap-2"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#s1-e15"
                                                    aria-expanded="false" aria-controls="s1-e15">
                                                    <div class="px-2 text-black rounded-2 text-center" style="background: #d7d7d7; height:26.49px;">
                                                        <h5 class="border-0 my-0" style="font-weight: 650 !important;padding-top:1px;padding-bottom:1px">15</h5>
                                                    </div>
                                                    <h6 class="my-auto">Adu Kemampuan - Kelompok 1</h6>
                                                </button>
                                            </h2>
                                            <div id="s1-e15" class="accordion-collapse collapse"
                                                data-bs-parent="#s1_e15">
                                                <div class="accordion-body p-0 p-2 d-flex">
                                                    <div class="img-eps">
                                                        <img src="img/jjk15.jpg">
                                                    </div>
                                                    <div class="desc text-white w-75 container">
                                                        Ketika Kugisaki dan Fushiguro berlatih untuk acara pertukaran.
                                                    </div>
                                                </div>
                                                <div class="icon-play">
                                                    <img src="img/play-button.png" class="w-25">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion accordion-flush" id="s1_e16">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button
                                                    class="accordion-button eps-icon-down collapsed border px-2 py-2 rounded-4 border-info bg-dark gap-2"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#s1-e16"
                                                    aria-expanded="false" aria-controls="s1-e16">
                                                    <div class="px-2 text-black rounded-2 text-center" style="background: #d7d7d7; height:26.49px;">
                                                        <h5 class="border-0 my-0" style="font-weight: 650 !important;padding-top:1px;padding-bottom:1px">16</h5>
                                                    </div>
                                                    <h6 class="my-auto">Adu Kemampuan - Kelompok 2</h6>
                                                </button>
                                            </h2>
                                            <div id="s1-e16" class="accordion-collapse collapse"
                                                data-bs-parent="#s1_e16">
                                                <div class="accordion-body p-0 p-2 d-flex">
                                                    <div class="img-eps">
                                                        <img src="img/jjk16.jpg">
                                                    </div>
                                                    <div class="desc text-white w-75 container">
                                                        Ketika Kugisaki dan Fushiguro berlatih untuk acara pertukaran.
                                                    </div>
                                                </div>
                                                <div class="icon-play">
                                                    <img src="img/play-button.png" class="w-25">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion accordion-flush" id="s1_e17">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button
                                                    class="accordion-button eps-icon-down collapsed border px-2 py-2 rounded-4 border-info bg-dark gap-2"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#s1-e17"
                                                    aria-expanded="false" aria-controls="s1-e17">
                                                    <div class="px-2 text-black rounded-2 text-center" style="background: #d7d7d7; height:26.49px;">
                                                        <h5 class="border-0 my-0" style="font-weight: 650 !important;padding-top:1px;padding-bottom:1px">17</h5>
                                                    </div>
                                                    <h6 class="my-auto">Adu Kemampuan - Kelompok 3</h6>
                                                </button>
                                            </h2>
                                            <div id="s1-e17" class="accordion-collapse collapse"
                                                data-bs-parent="#s1_e17">
                                                <div class="accordion-body p-0 p-2 d-flex">
                                                    <div class="img-eps">
                                                        <img src="img/jjk17.jpg">
                                                    </div>
                                                    <div class="desc text-white w-75 container">
                                                        Ketika Kugisaki dan Fushiguro berlatih untuk acara pertukaran.
                                                    </div>
                                                </div>
                                                <div class="icon-play">
                                                    <img src="img/play-button.png" class="w-25">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion accordion-flush" id="s1_e18">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button
                                                    class="accordion-button eps-icon-down collapsed border px-2 py-2 rounded-4 border-info bg-dark gap-2"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#s1-e18"
                                                    aria-expanded="false" aria-controls="s1-e18">
                                                    <div class="px-2 text-black rounded-2 text-center" style="background: #d7d7d7; height:26.49px;">
                                                        <h5 class="border-0 my-0" style="font-weight: 650 !important;padding-top:1px;padding-bottom:1px">18</h5>
                                                    </div>
                                                    <h6 class="my-auto">Orang Bijaksana</h6>
                                                </button>
                                            </h2>
                                            <div id="s1-e18" class="accordion-collapse collapse"
                                                data-bs-parent="#s1_e18">
                                                <div class="accordion-body p-0 p-2 d-flex">
                                                    <div class="img-eps">
                                                        <img src="img/jjk18.jpg">
                                                    </div>
                                                    <div class="desc text-white w-75 container">
                                                        Ketika Kugisaki dan Fushiguro berlatih untuk acara pertukaran.
                                                    </div>
                                                </div>
                                                <div class="icon-play">
                                                    <img src="img/play-button.png" class="w-25">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion accordion-flush" id="s1_e19">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button
                                                    class="accordion-button eps-icon-down collapsed border px-2 py-2 rounded-4 border-info bg-dark gap-2"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#s1-e19"
                                                    aria-expanded="false" aria-controls="s1-e19">
                                                    <div class="px-2 text-black rounded-2 text-center" style="background: #d7d7d7; height:26.49px;">
                                                        <h5 class="border-0 my-0" style="font-weight: 650 !important;padding-top:1px;padding-bottom:1px">19</h5>
                                                    </div>
                                                    <h6 class="my-auto">Kilatan Hitam</h6>
                                                </button>
                                            </h2>
                                            <div id="s1-e19" class="accordion-collapse collapse"
                                                data-bs-parent="#s1_e19">
                                                <div class="accordion-body p-0 p-2 d-flex">
                                                    <div class="img-eps">
                                                        <img src="img/jjk19.jpg">
                                                    </div>
                                                    <div class="desc text-white w-75 container">
                                                        Ketika Kugisaki dan Fushiguro berlatih untuk acara pertukaran.
                                                    </div>
                                                </div>
                                                <div class="icon-play">
                                                    <img src="img/play-button.png" class="w-25">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion accordion-flush" id="s1_e20">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button
                                                    class="accordion-button eps-icon-down collapsed border px-2 py-2 rounded-4 border-info bg-dark gap-2"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#s1-e20"
                                                    aria-expanded="false" aria-controls="s1-e20">
                                                    <div class="px-2 text-black rounded-2 text-center" style="background: #d7d7d7; height:26.49px;">
                                                        <h5 class="border-0 my-0" style="font-weight: 650 !important;padding-top:1px;padding-bottom:1px">20</h5>
                                                    </div>
                                                    <h6 class="my-auto">Nonstandar</h6>
                                                </button>
                                            </h2>
                                            <div id="s1-e20" class="accordion-collapse collapse"
                                                data-bs-parent="#s1_e20">
                                                <div class="accordion-body p-0 p-2 d-flex">
                                                    <div class="img-eps">
                                                        <img src="img/jjk20.jpg">
                                                    </div>
                                                    <div class="desc text-white w-75 container">
                                                        Ketika Kugisaki dan Fushiguro berlatih untuk acara pertukaran.
                                                    </div>
                                                </div>
                                                <div class="icon-play">
                                                    <img src="img/play-button.png" class="w-25">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion accordion-flush" id="s1_e21">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button
                                                    class="accordion-button eps-icon-down collapsed border px-2 py-2 rounded-4 border-info bg-dark gap-2"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#s1-e21"
                                                    aria-expanded="false" aria-controls="s1-e21">
                                                    <div class="px-2 text-black rounded-2 text-center" style="background: #d7d7d7; height:26.49px;">
                                                        <h5 class="border-0 my-0" style="font-weight: 650 !important;padding-top:1px;padding-bottom:1px">21</h5>
                                                    </div>
                                                    <h6 class="my-auto">Jujutsu Koshien</h6>
                                                </button>
                                            </h2>
                                            <div id="s1-e21" class="accordion-collapse collapse"
                                                data-bs-parent="#s1_e21">
                                                <div class="accordion-body p-0 p-2 d-flex">
                                                    <div class="img-eps">
                                                        <img src="img/jjk21.jpg">
                                                    </div>
                                                    <div class="desc text-white w-75 container">
                                                        Ketika Kugisaki dan Fushiguro berlatih untuk acara pertukaran.
                                                    </div>
                                                </div>
                                                <div class="icon-play">
                                                    <img src="img/play-button.png" class="w-25">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion accordion-flush" id="s1_e22">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button
                                                    class="accordion-button eps-icon-down collapsed border px-2 py-2 rounded-4 border-info bg-dark gap-2"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#s1-e22"
                                                    aria-expanded="false" aria-controls="s1-e22">
                                                    <div class="px-2 text-black rounded-2 text-center" style="background: #d7d7d7; height:26.49px;">
                                                        <h5 class="border-0 my-0" style="font-weight: 650 !important;padding-top:2px;padding-bottom:1px">22</h5>
                                                    </div>
                                                    <h6 class="my-auto">Asal Mula Ketaatan Buta</h6>
                                                </button>
                                            </h2>
                                            <div id="s1-e22" class="accordion-collapse collapse"
                                                data-bs-parent="#s1_e22">
                                                <div class="accordion-body p-0 p-2 d-flex">
                                                    <div class="img-eps">
                                                        <img src="img/jjk22.jpg">
                                                    </div>
                                                    <div class="desc text-white w-75 container">
                                                        Ketika Kugisaki dan Fushiguro berlatih untuk acara pertukaran.
                                                    </div>
                                                </div>
                                                <div class="icon-play">
                                                    <img src="img/play-button.png" class="w-25">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion accordion-flush" id="s1_e23">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button
                                                    class="accordion-button eps-icon-down collapsed border px-2 py-2 rounded-4 border-info bg-dark gap-2"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#s1-e23"
                                                    aria-expanded="false" aria-controls="s1-e23">
                                                    <div class="px-2 text-black rounded-2 text-center" style="background: #d7d7d7; height:26.49px;">
                                                        <h5 class="border-0 my-0" style="font-weight: 650 !important;padding-top:2px;padding-bottom:1px">23</h5>
                                                    </div>
                                                    <h6 class="my-auto">Asal Mula Ketaatan Buta - 2 -</h6>
                                                </button>
                                            </h2>
                                            <div id="s1-e23" class="accordion-collapse collapse"
                                                data-bs-parent="#s1_e23">
                                                <div class="accordion-body p-0 p-2 d-flex">
                                                    <div class="img-eps">
                                                        <img src="img/jjk23.jpg">
                                                    </div>
                                                    <div class="desc text-white w-75 container">
                                                        Ketika Kugisaki dan Fushiguro berlatih untuk acara pertukaran.
                                                    </div>
                                                </div>
                                                <div class="icon-play">
                                                    <img src="img/play-button.png" class="w-25">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion accordion-flush" id="s1_e24">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button
                                                    class="accordion-button eps-icon-down collapsed border px-2 py-2 rounded-4 border-info bg-dark gap-2"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#s1-e24"
                                                    aria-expanded="false" aria-controls="s1-e24">
                                                    <div class="px-2 text-black rounded-2 text-center" style="background: #d7d7d7; height:26.49px;">
                                                        <h5 class="border-0 my-0" style="font-weight: 650 !important;padding-top:2px;padding-bottom:1px">24</h5>
                                                    </div>
                                                    <h6 class="my-auto">Komplotan</h6>
                                                </button>
                                            </h2>
                                            <div id="s1-e24" class="accordion-collapse collapse"
                                                data-bs-parent="#s1_e24">
                                                <div class="accordion-body p-0 p-2 d-flex">
                                                    <div class="img-eps">
                                                        <img src="img/jjk24.jpg">
                                                    </div>
                                                    <div class="desc text-white w-75 container">
                                                        Ketika Kugisaki dan Fushiguro berlatih untuk acara pertukaran.
                                                    </div>
                                                </div>
                                                <div class="icon-play">
                                                    <img src="img/play-button.png" class="w-25">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kategori pb-2">
                        <h5 class="active">Serial Relate</h5>
                    </div>
                    <div class="scroll-horizontal  d-flex">
                        <section class="relate" id="relate">
                            <div class="img-relate d-flex row g-2 pt-0" style="max-width: 100vw">
                                <div class="col-4">
                                    <img src="img/anim10.jpeg">
                                </div>
                                <div class="col-4">
                                    <img src="img/anim11.jpg">
                                </div>
                                <div class="col-4">
                                    <img src="img/anim1.jpg">
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal bg-modal fade" id="lapor" tabindex="-1" aria-labelledby="laporLabel" aria-hidden="true">
        <div class="modal-dialog container my-auto">
            <div class="modal-content rounded-5 lapor mx-auto">
                <div class="modal-header border-bottom-0 d-block pt-0">
                    <h1 class="modal-title fs-5" id="laporLabel">Laporkan Kesalahan Film</h1>
                </div>
                <div class="modal-body container py-0 px-4">
                    <label for="aa" class="w-100 mb-2 d-flex">
                        <input id="aa" type="radio" name="when"
                            style="min-height:20px; min-width:20px; vertical-align: middle;">
                        <div class="ps-1">Kerusakan Gambar atau Audio Film</div>
                    </label>

                    <label for="cc" class="w-100 mb-2 d-flex">
                        <input id="cc" type="radio" name="when"
                            style="min-height:20px; min-width:20px; vertical-align: middle;">
                        <div class="ps-1">Masalah Teknis atau Kualitas Video</div>
                    </label>

                    <label for="bb" class="w-100 mb-2 pb-4 position-relative">
                        <input id="bb" type="radio" name="when"
                            style="min-height:20px; min-width:20px; vertical-align: middle;">
                        <div class="ps-1 position-absolute" style="left: 20px; top: 0;">Kesalahan Tahun Rilis, Nama
                            Sutradara atau Nama Perusahaan</div>
                    </label>

                    <label for="bb" class="w-100 mb-2 pb-4 position-relative">
                        <input id="bb" type="radio" name="when"
                            style="min-height:20px; min-width:20px; vertical-align: middle;">
                        <div class="ps-1 position-absolute" style="left: 20px; top: 0;">Kesalahan Judul, Thumbnail
                            atau Deskripsi</div>
                    </label>

                    <label for="lainnya" class="w-100 mb-2 d-flex">
                        <input id="lainnya" type="radio" name="when" value="other"
                            style="min-height:20px; min-width:20px; vertical-align: middle;">
                        <div class="ps-1">Lainnya</div>
                    </label>

                    <div id="lainnyaTextarea" class="w-100 d-flex hidden">
                        <textarea name="when_other" id="lainnyaInput" rows="4" style="display: none"
                            placeholder="Tuliskan laporan Anda di sini..."></textarea>
                    </div>
                </div>
                <div class="modal-footer border-top-0 justify-content-center p-0 pt-3">
                    <input type="submit" id="laporbtn"
                        class="text-white text-center border-0 btn-simpan py-2 rounded-3" style="width: 35%"
                        data-bs-dismiss="modal" value="Laporkan" disabled>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    const radioButtons = document.querySelectorAll('input[name="when"]');
    const submitButton = document.querySelector('.btn-simpan');
    const lainnyaTextarea = document.getElementById('lainnyaTextarea');
    const lainnyaInput = document.getElementById('lainnyaInput');

    // Tambahkan event listener untuk setiap radio button
    radioButtons.forEach(radio => {
        radio.addEventListener('change', function() {
            const isAnyRadioSelected = [...radioButtons].some(radio => radio.checked);

            submitButton.disabled = !isAnyRadioSelected;

            if (isAnyRadioSelected) {
                submitButton.classList.add('active');
            } else {
                submitButton.classList.remove('active');
            }

            // Jika radio button "Lainnya" dipilih, tampilkan textarea dan aktifkan tombol
            if (radio.id === 'lainnya') {
                lainnyaTextarea.classList.remove('hidden');
                lainnyaInput.style.display = 'block';
                submitButton.disabled = lainnyaInput.value.trim() ===
                    ''; // Nonaktifkan tombol jika textarea kosong
            } else {
                lainnyaTextarea.classList.add('hidden');
                lainnyaInput.style.display = 'none';
            }
        });
    });

    // Tambahkan event listener untuk textarea
    lainnyaInput.addEventListener('input', function() {
        submitButton.disabled = lainnyaInput.value.trim() === ''; // Nonaktifkan tombol jika textarea kosong
    });
</script>


<script type="text/javascript">
    $("body").on("click", "input[name='when']", function() {
        if ($("input[name='when']:checked").val() == 'other') {
            $("textarea[name='when_other']").css('display', 'block');
        } else {
            $("textarea[name='when_other']").css('display', 'none');
            $("textarea[name='when_other']").val('');
        }
    });
</script>
<script>
    let isFavorite = false;

    function changeIconAndColor(button) {
        // Mengambil elemen ikon pada tombol
        var iconElement = button.querySelector("i");

        // Mengganti kelas ikon untuk mengubahnya menjadi bintang terisi (filled star)
        iconElement.classList.toggle("bi-heart");
        iconElement.classList.toggle("bi-heart-fill");
    }
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        window.addEventListener("scroll", function() {
            var nav = document.getElementById("mainNav");

            if (window.scrollY > 10) {
                nav.classList.add("scrolled");
            } else {
                nav.classList.remove("scrolled");
            }
        });
    });
</script>
<script>
    document.addEventListener('contextmenu', function(e) {
        e.preventDefault();
    });
</script>
<script>
    function toggleReadMore() {
        const textDesk = document.querySelector('.desk');
        const readMoreBtn = document.querySelector('.read-more-btn');
        const additionalText = document.querySelector('.additional-text');

        textDesk.classList.toggle('expanded');

        if (textDesk.classList.contains('expanded')) {
            additionalText.style.display = 'inline';
            readMoreBtn.textContent = 'Tutup';
        } else {
            additionalText.style.display = 'none';
            readMoreBtn.textContent = 'Selengkapnya...';
        }
    }
</script>
<script>
    const optionMenu = document.querySelector(".select-menu"),
        selectBtn = optionMenu.querySelector(".select-btn"),
        options = optionMenu.querySelector(".options");

    // Toggle the "active" class on the menu when the button is clicked
    selectBtn.addEventListener("click", () => {
        optionMenu.classList.toggle("active");
    });

    // Close the menu when clicking outside of it
    document.addEventListener("click", (event) => {
        if (!optionMenu.contains(event.target)) {
            optionMenu.classList.remove("active");
        }
    });

    // Prevent the menu from closing when clicking inside it
    options.addEventListener("click", (event) => {
        event.stopPropagation();
    });

    // Close the menu when scrolling outside of it
    document.addEventListener("scroll", () => {
        optionMenu.classList.remove("active");
    });
</script>
<script>
    document.getElementById('disukai').addEventListener('click', function() {

        Swal.fire({
            position: "center",
            icon: "success",
            text: "Berhasil Ditambahkan",
            showConfirmButton: false,
            timer: 2000
        });
    });

    document.getElementById('daftar').addEventListener('click', function() {

        Swal.fire({
            position: "center",
            icon: "success",
            text: "Laporan Terkirim",
            showConfirmButton: false,
            timer: 2000
        });
    });

    document.getElementById('laporbtn').addEventListener('click', function() {

        Swal.fire({
            position: "center",
            icon: "success",
            text: "Laporan Terkirim",
            showConfirmButton: false,
            timer: 2000
        });
    });
</script>

</html>
