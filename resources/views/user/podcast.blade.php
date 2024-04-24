<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Podcast</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/detail.css">
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

    .select-menu .select-btn {
        color: black;
        display: flex;
        height: 55px;
        background: transparent;
        color: white;
        padding: 0px;
        font-size: 18px;
        font-weight: 400;
        border-radius: 8px;
        align-items: center;
        cursor: pointer;
        justify-content: space-between;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }

    .select-menu .options {
        position: absolute;
        top: 50px !important;
        right: 12px;
        padding: 0;
        margin-top: 10px;
        background: #232429;
        box-shadow: 0 0 3px rgba(0, 0, 0, 0.1);
        display: none;
        border: 2px solid #9e9e9e;
    }

    .select-menu.active .options {
        display: block;
    }

    .options .option {
        display: flex;
        height: 55px;
        cursor: pointer;
        padding: 0 16px;
        align-items: center;
    }

    .option i {
        font-size: 25px;
        margin-right: 12px;
    }

    .option .option-text {
        font-size: 16px;
        color: #ffffff;
    }

    .bi .bi-three-dots-vertical::before,
    [class*=" bi-three-dots-vertical"]::before,
    [class^=bi-three-dots-vertical]::before {
        line-height: 1;
        vertical-align: -4px;
    }
</style>

<body>
    <div class="full pb-4">
        <nav class="navbar ps-2 pe-3 sticky-top w-100 p-0 d-flex justify-content-between" style="height:68.59px;"
            id="mainNav">
            <div class="d-flex gap-3" style="height: 68.58px">
                <button class="btn1 border-0"><i
                        class="bi bi-chevron-left" style="font-size: 25px; margin-bottom: 20px;"></i></button>
                <h2 class="mb-0 txt-detail">Detail</h2>
            </div>
            <div class="3-dot">
                <div class="select-menu">
                    <div class="select-btn">
                        <span class="sBtn-text"><i class="bi bi-three-dots-vertical"
                                style="font-size: 25px;"></i></span>
                        <i class="bx bx-chevron-down"></i>
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
        <div class="video justify-content-center">
            {{-- <img src="img/podcast.jpg" class="w-100"> --}}
            <iframe width="100%" height="215" src="https://www.youtube.com/embed/KXgH9D1D_OA?autoplay=1&rel=0&showinfo=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
        <div class="container pt-2">
            <div class="mb-4 d-flex justify-content-between">
                <div class="judul">
                    <h3 style="height: 47px">Kena Senioritas Di TV, Dicky Difie Capek Pura Pura Baik</h3>
                </div>
            </div>
            <h6 class="d-flex" style="font-size:0.9rem">Channel : <p class="ms-1">HAS Creative</p>
            </h6>
            <h6 class="mb-2 d-flex" style="font-size:0.9rem">Host : <p class="ms-1">Praz Teguh</p>
            </h6>
            <div class="desk">
                <p>Hi Guys! Kembali lagi di Channel HAS Creative, di program Podcast Warung Kopi (PWK). Di episode kali
                    ini, PWK kedatangan seorang komika yang dikenal dengan persona kemayu sering kali dipanggil dengan
                    <span class="additional-text">
                        sebutan Neng Dicky Difie. Dicky Fahrizal atau lebih banyak dikenal dengan nama panggung Dicky
                        Difie, merupakan seorang komika yang lahir pada tanggal 06 Desember 1985. Mengawali karir di
                        dunia komedi dengan mengikuti ajang pencarian bakat komedi bernama Stand Up Comedy Indonesia
                        season 5 pada tahun 2011.</span>
                    <span class="read-more-btn text-primary" onclick="toggleReadMore()">Selengkapnya...</span>
                </p>
            </div>
            <div class="btn-fungsional my-4">
                <div class="text-white">
                    <ul class="d-flex p-0 justify-content-around" style="list-style: none">
                        <li class="text-center favorit" id="disukai">
                            <i class="bi bi-heart"></i>
                            <h6><small>Disukai</small></h6>
                        </li>
                        <li class="text-center" onclick="downloadVideo('downloadVideo', '')">
                            <div class="mx-auto"><i class="bi bi-download"></i></div>
                            <h6><small>Download</small></h6>
                        </li>
                        <li class="text-center share">
                            <i class="bi bi-share"></i>
                            <h6><small>Bagikan</small></h6>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="kategori">
                <div class="film-relate">
                    <h5 class="mb-2">Podcast Lainnya</h5>
                </div>
            </div>
            <div class="scroll-horizontal  d-flex">
                <section class="relate" id="relate">
                    <div class="img-relate-podcast d-flex row g-1" style="max-width: 100vw">
                        <div class="col-12 d-flex">
                            <div class="img-podcast">
                                <img src="img/podcast1.jpg">
                            </div>
                            <div class="body-podcast px-2 py-2 w-100">
                                <h6>Dateng Lagi Rusuh Lagi D...</h6>
                                <p><small>HAS Creative</small></p>
                            </div>
                        </div>
                        <div class="col-12 d-flex">
                            <div class="img-podcast">
                                <img src="img/podcast5.jpg">
                            </div>
                            <div class="body-podcast px-2 py-2 w-100">
                                <h6>Punya Kuda Di Kasih Nam...</h6>
                                <p><small>HAS Creative</small></p>
                            </div>
                        </div>
                        <div class="col-12 d-flex">
                            <div class="img-podcast">
                                <img src="img/podcast3.jpg">
                            </div>
                            <div class="body-podcast px-2 py-2 w-100">
                                <h6>Lukasnya Terlalu Dalam B...</h6>
                                <p><small>HAS Creative</small></p>
                            </div>
                        </div>
                        <div class="col-12 d-flex">
                            <div class="img-podcast">
                                <img src="img/podcast4.jpg">
                            </div>
                            <div class="body-podcast px-2 py-2 w-100">
                                <h6>Niat Bongkar Sosok Yanti...</h6>
                                <p><small>HAS Creative</small></p>
                            </div>
                        </div>
                    </div>
                </section>
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
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
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
            text: "Berhasil Ditambah",
            showConfirmButton: false,
            timer: 2000
        });
    });
    document.getElementById('daftar').addEventListener('click', function() {

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

</html>
