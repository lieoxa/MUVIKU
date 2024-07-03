<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="theme-color" content="#000">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/detail.css">
    <title>Detail</title>
    <style>
        .hidden {
            display: none;
        }

        .btn-simpan.active {
            background-color: #28a745;
            cursor: pointer;
        }

        .btn-simpan:disabled {
            background-color: #6c757d;
            cursor: not-allowed;
        }

        .bi .bi-play-fill::before,
        [class*=" bi-play-fill"]::before,
        [class^=bi-play-fill]::before {
            line-height: 0.5;
            vertical-align: -6px;
        }

        .bi .bi-three-dots-vertical::before,
        [class*=" bi-three-dots-vertical"]::before,
        [class^=bi-three-dots-vertical]::before {
            line-height: 1;
            vertical-align: -4px;
        }
    </style>
</head>

<body>
    <section>
        <nav class="navbar ps-2 pe-3 sticky-top w-100 p-0 d-flex justify-content-between" style="height:68.59px;"
            id="mainNav">
            <div class="d-flex gap-3" style="height: 68.58px">
                <button onclick="window.history.go(-1); return false;" class="btn1 border-0"><i
                        class="bi bi-chevron-left" style="font-size: 25px; margin-bottom: 20px;"></i></button>
                <h2 class="mb-0 txt-detail">Detail</h2>
            </div>
            <div class="3-dot">
                <div class="select-menu">
                    <div class="select-btn">
                        <span class="sBtn-text"><i class="bi bi-three-dots-vertical"
                                style="font-size: 25px;"></i></span>
                        <ul class="options rounded">
                            <li class="option daftar" id="daftar">
                                <span class="option-text"><i class="bi bi-bookmark-check-fill fs-5"></i>Tambah ke
                                    Daftar</span>
                            </li>
                            <hr>
                            <li data-bs-toggle="modal" id="report" data-bs-target="#lapor" class="option laporkan">
                                <span class="option-text"><i class="bi bi-question-circle-fill fs-5"></i>Laporkan Video
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <div class="full mb-3">
            <img src="img/slide.jpg" class="w-100 thumbnail-detail" alt="...">
            <div class="parent position-relative">
                <div class="half mb-4 pt-5"
                    style="margin-top: -172px; padding-left: 12px; padding-right: 12px; padding-bottom: 0.49rem;">
                    <div class="title mb-2 d-flex justify-content-between">
                        <h1 class="fw-bolder">Cars 2</h1>
                    </div>

                    <div class="d-flex gap-2" style="font-size: 15px">
                        <div class="tahun w-auto">2011</div>
                        <div class="umur w-auto bg-secondary px-1">SU</div>
                        <div class="durasi w-auto">1j 46m</div>
                    </div>
                    <h6 class="d-flex" style="font-size:0.9rem">Perusahaan : <p class="ms-1">Pixar Animation Studios
                        </p>
                    </h6>
                    <h6 class="mb-2 d-flex" style="font-size:0.9rem">Sutradara : <p class="ms-1">John Lasseter</p>
                    </h6>
                    <div class="btn-play">
                        <a href="#" id="myButton" onclick="playVideo()"
                            class="btn btn-light w-100 mt-2 btn-putar"
                            style="margin-bottom: 14px !important;padding-right: 20px"><i
                                class="bi bi-play-fill fs-1 my-auto"></i><span class="fs-5 fw-bold">Putar</span></a>
                    </div>
                    <div class="desk">
                        <p>Mata-mata Inggris Finn McMissile menyelidiki cadangan minyak bumi terbesar di dunia, yang
                            dimiliki oleh sekelompok mobil lemon (mobil yang sudah tidak bekerja dengan baik). Setelah
                            ketahuan, Finn meloloskan diri dan merekayasa kematiannya.<span class="additional-text">

                            Juara Piston Cup 4 kali Lightning McQueen kembali ke Radiator Springs dan bereuni dengan
                            sahabatnya Tow Mater dan kekasihnya Sally Carrera. Mantan juragan minyak Sir Miles Axlerod,
                            yang sekarang penganjur tenaga hijau mengumumkan sebuah pertandingan balap yang dinamakan
                            "World Grand Prix" untuk mempromosikan Allinol, bahan bakar bio miliknya. Setelah mobil
                            formula Italia Francesco Bernoulli menantang McQueen, dia dan Mater bersama Luigi, Guido,
                            Fillmore, dan Sarge terbang ke Tokyo, Jepang untuk balapan pertama di World Grand Prix.</span>
                            <span class="read-more-btn text-primary" onclick="toggleReadMore()">Selengkapnya...</span>
                        </p>
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
                                <li class="text-center share">
                                    <i class="bi bi-share"></i>
                                    <h6><small>Bagikan</small></h6>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="box-video d-none">
                        <video id="downloadVideo" controls height="310" width="310">
                            <source src="{{ asset('img/onepiecered.mp4') }}" type="video/mp4">
                        </video>
                    </div>
                    <iframe class=""
                        src="https://drive.google.com/file/d/1P_AvEftZz-fWxd4guBYaKt28HMpM_YqD/view?usp=sharing" width="100%"
                        height="auto" allow="autoplay" allowfullscreen="true"></iframe>
                    <div class="kategori">
                        <div class="film-relate">
                            <h5 class="mb-2">Film Relate</h5>
                        </div>
                    </div>
                    <div class="scroll-horizontal  d-flex">
                        <section class="relate" id="relate">
                            <div class="img-relate d-flex row g-1" style="max-width: 100vw">
                                <div class="col-4">
                                    <img src="img/animasi1.jpg">
                                </div>
                                <div class="col-4">
                                    <img src="img/animasi2.jpg">
                                </div>
                                <div class="col-4">
                                    <img src="img/animasi3.jpg">
                                </div>
                                <div class="col-4">
                                    <img src="img/animasi4.jpg">
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <div class="modal bg-modal fade" id="lapor" tabindex="-1" aria-labelledby="laporLabel" aria-hidden="true">
        <div class="modal-dialog container modal-dialog-centered">
            <div class="modal-content rounded-5 lapor mx-auto">
                <div class="modal-header border-bottom-0 d-block pt-0">
                    <h1 class="modal-title fs-5" id="laporLabel">Laporkan Kesalahan Film</h1>
                </div>
                <div class="modal-body container py-0 px-4">
                    <label for="aa" class="w-100 mb-2 d-flex">
                        <input id="aa" type="radio" name="when"
                            style="min-height:20px; min-width:20px; margin-top:5px">
                        <h5 class="ps-3 my-auto fs-5">Film tidak sesuai dengan Judul</h5>
                    </label>
                    <label for="aa" class="w-100 mb-2 d-flex">
                        <input id="aa" type="radio" name="when"
                            style="min-height:20px; min-width:20px; margin-top:5px">
                        <h5 class="ps-3 my-auto fs-5">Film tidak dapat diputar</h5>
                    </label>
                    <label for="aa" class="w-100 mb-2 d-flex">
                        <input id="aa" type="radio" name="when"
                            style="min-height:20px; min-width:20px; margin-top:5px">
                        <h5 class="ps-3 my-auto fs-5">Film Tidak Jelas</h5>
                    </label>
                    <label for="aa" class="w-100 mb-2 d-flex">
                        <input id="aa" type="radio" name="when"
                            style="min-height:20px; min-width:20px; margin-top:5px">
                        <h5 class="ps-3 my-auto fs-5">Subtitle tidak cocok</h5>
                    </label>
                    <div class="input-group my-2 mb-4">
                        <span class="input-group-text bg-white border-end-0"><i class="bi bi-pencil-fill"></i></span>
                        <input type="text" class="form-control border-start-0"
                            placeholder="Masukkan Pesan Keluhan Anda" aria-label="pesan">
                    </div>
                </div>
                <div class="modal-footer border-top-0 p-0 mb-3">
                    <button type="button" class="btn btn-batal w-100 py-3 text-white rounded-3"
                        data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-lapor w-100 py-3 mt-2 text-white rounded-3">Lapor</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function playVideo() {
            window.open('https://drive.google.com/file/d/1P_AvEftZz-fWxd4guBYaKt28HMpM_YqD/view?usp=sharing', '_blank');
        }

        const shareData = {
            title: "OnePiece",
            text: "Learn web development on MDN!",
            url: "http://192.168.184.86:8000/film",
        };

        const btn = document.querySelector(".share");

        btn.addEventListener("click", async () => {
            if (navigator.share) {
                try {
                    await navigator.share(shareData);
                    console.log('Shared successfully');
                } catch (err) {
                    console.error('Error sharing:', err);
                }
            } else {
                fallbackShare();
            }
        });

        function fallbackShare() {
            const shareUrl = "http://192.168.184.86:8000/film";
            Swal.fire({
                title: 'Bagikan',
                text: 'Salin tautan berikut untuk membagikan:',
                input: 'text',
                inputValue: shareUrl,
                showCancelButton: true,
                confirmButtonText: 'Salin',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    navigator.clipboard.writeText(shareUrl).then(() => {
                        Swal.fire('Tersalin!', 'Tautan telah tersalin ke papan klip.', 'success');
                    }).catch(err => {
                        Swal.fire('Gagal', 'Tidak dapat menyalin tautan.', 'error');
                    });
                }
            });
        }

        function toggleReadMore() {
            const additionalText = document.querySelector('.additional-text');
            const readMoreBtn = document.querySelector('.read-more-btn');
            if (additionalText.style.display === 'none' || additionalText.style.display === '') {
                additionalText.style.display = 'inline';
                readMoreBtn.innerText = 'Sembunyikan';
            } else {
                additionalText.style.display = 'none';
                readMoreBtn.innerText = 'Selengkapnya...';
            }
        }
    </script>
</body>

</html>
