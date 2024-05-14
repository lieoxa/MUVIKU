<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="theme-color" content="#000">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@trimble-oss/modus-icons@1.9.0/dist/modus-solid/fonts/modus-icons.css">
    <link rel="stylesheet" href="css/detail.css">
    <title>Detail</title>
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
            {{-- <span>
                <button class="btn-heart sticky-top border-0" onclick="changeIconAndColor(this)"><i
                        class="bi bi-heart"></i></button>
            </span> --}}
        </nav>
        <div class="full mb-3">
            <img src="img/animasi.jpg" class="w-100 thumbnail-detail" alt="...">
            <div class="parent position-relative">
                <div class="half mb-4 pt-5"
                    style="margin-top: -172px; padding-left: 12px; padding-right: 12px; padding-bottom: 0.49rem;">
                    <div class="title mb-2 d-flex justify-content-between">
                        <h1 class="fw-bolder">Toy Story 4</h1>
                    </div>

                    <div class="d-flex gap-2" style="font-size: 15px">
                        <div class="tahun w-auto">2019</div>
                        <div class="umur w-auto bg-secondary px-1">13+</div>
                        <div class="durasi w-auto">1j 40m</div>
                    </div>
                    <h6 class="d-flex" style="font-size:0.9rem">Perusahaan : <p class="ms-1">Pixar Animation Studios
                        </p>
                    </h6>
                    <h6 class="mb-2 d-flex" style="font-size:0.9rem">Sutradara : <p class="ms-1">Josh Cooley</p>
                    </h6>
                    <div class="btn-play">
                        <a href="#" id="myButton" onclick="playVideo()"
                            class="btn btn-light w-100 mt-2 btn-putar"
                            style="margin-bottom: 14px !important;padding-right: 20px"><i
                                class="bi bi-play-fill fs-1 my-auto"></i><span class="fs-5 fw-bold">Putar</span></a>
                    </div>
                    <div class="desk">
                        <p>Toy Story 4 dibuka dengan kilas balik peristiwa sembilan tahun sebelum Woody dan kawan-kawan
                            pindah ke tangan Bonnie. Di bawah hujan deras, Woody dan kawanannya termasuk sang pujaan
                            hati Bo Peep <span class="additional-text">sedang melakukan misi penyelamatan pada sebuah
                                mainan. yang
                                menyenangkan bagi dunia.Singkat cerita, peristiwa itu juga menjadi awal perpisahan Woody
                                dengan Bo Peep, karakter yang nantinya memegang peranan penting dalam kisah kali ini.
                                Toy Story 4 kemudian berlanjut pada kegelisahan Woody karena selama beberapa waktu
                                belakangan tak lagi dipilih Bonnie untuk dimainkan. Meski berusaha tetap optimistis,
                                Woody tak bisa menghilangkan raut sedih penuh harapnya.</span>
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
                    {{-- <iframe class="d-none"
                        src="https://drive.google.com/file/d/1dO9S5lNaI5Cqn3xof4Yjmi41j6K0fgAg/preview" width="100%"
                        height="auto" allow="autoplay" allowfullscreen="true"></iframe> --}}
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
                            style="min-height:20px; min-width:20px; vertical-align: middle;">
                        <div class="ps-2">Kerusakan Gambar atau Audio Film</div>
                    </label>

                    <label for="bb" class="w-100 mb-2 d-flex">
                        <input id="bb" type="radio" name="when"
                            style="min-height:20px; min-width:20px; vertical-align: middle;">
                        <div class="ps-2">Masalah Teknis atau Kualitas Video</div>
                    </label>

                    <label for="cc" class="w-100 mb-2 pb-4 position-relative">
                        <input id="cc" type="radio" name="when"
                            style="min-height:20px; min-width:20px; vertical-align: middle;">
                        <div class="ps-2 position-absolute" style="left: 20px; top: 0;">Kesalahan Tahun Rilis, Nama
                            Sutradara atau Nama Perusahaan</div>
                    </label>

                    <label for="dd" class="w-100 mb-2 pb-4 position-relative">
                        <input id="dd" type="radio" name="when"
                            style="min-height:20px; min-width:20px; vertical-align: middle;">
                        <div class="ps-2 position-absolute" style="left: 20px; top: 0;">Kesalahan Judul, Thumbnail
                            atau Deskripsi</div>
                    </label>

                    <label for="lainnya" class="w-100 mb-2 d-flex">
                        <input id="lainnya" type="radio" name="when" value="other"
                            style="min-height:20px; min-width:20px; vertical-align: middle;">
                        <div class="ps-2">Lainnya</div>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('fullscreenchange', function() {
            var video = document.querySelector('video');
            if (document.fullscreenElement && video) {
                video.style.setProperty('-webkit-media-controls-timeline', 'none', 'important');
                video.style.setProperty('-moz-media-controls-timeline', 'none', 'important');
                video.style.setProperty('-ms-media-controls-timeline', 'none', 'important');
            }
        });
    </script>

    <script>
        const shareData = {
            title: "OnePiece",
            text: "Learn web development on MDN!",
            url: "http://192.168.184.86:8000/film",
        };

        const btn = document.querySelector(".share");

        // Share must be triggered by "user activation"
        btn.addEventListener("click", async () => {
            try {
                await navigator.share(shareData);
            } catch (err) {
                // resultPara.textContent = `Error: ${err}`;
            }
        });
    </script>

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
            var iconElement = button.querySelector("i");

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
    {{-- <script>
    function playVideo() {
        var elem = document.getElementsByTagName('iframe')[0];
        if (elem.requestFullscreen) {
            elem.requestFullscreen();
        } else if (elem.mozRequestFullScreen) {
            elem.mozRequestFullScreen();
        } else if (elem.webkitRequestFullscreen) {
            elem.webkitRequestFullscreen();
        } else if (elem.msRequestFullscreen) {
            elem.msRequestFullscreen();
        } else {
            alert("Full screen not supported");
            return;
        }
        elem.play();
    }
</script> --}}
    {{-- <script>
    Get iframe element
    const iframe = document.querySelector('iframe');

    iframe.classList.add('show');
</script> --}}
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
        document.getElementById('daftar').addEventListener('click', function() {

            Swal.fire({
                position: "center",
                icon: "success",
                text: "Berhasil Ditambah",
                showConfirmButton: false,
                timer: 2000
            });
        });


        document.getElementById('disukai').addEventListener('click', function() {

            Swal.fire({
                position: "center",
                icon: "success",
                text: "Berhasil Ditambah",
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
    <script>
        function downloadVideo(videoId, videoName) {
            var video = document.getElementById(videoId);
            var url = video.getElementsByTagName('source')[0].src;

            var link = document.createElement('a');
            link.href = url;
            link.download = 'downloaded_video_' + videoName + '.mp4';

            document.body.appendChild(link);

            link.click();

            document.body.removeChild(link);
        }
    </script>
</body>

</html>
