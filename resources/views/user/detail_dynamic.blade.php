<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
    <title>{{ $film->judul }} - MUVIKU</title>
</head>

<style>
    body {
        background-color: #0b0c0e;
        color: #ffffff;
        font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
    }

    .video-container {
        position: relative;
        padding-bottom: 56.25%; /* 16:9 aspect ratio */
        height: 0;
        overflow: hidden;
        background: #000;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.8);
    }

    .video-container iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: 0;
    }

    .hero-banner-detail {
        width: 100%;
        height: 380px;
        object-fit: cover;
        object-position: center 25%;
        border-radius: 0 0 24px 24px;
        filter: brightness(0.85);
    }

    .vignette-detail {
        position: relative;
    }

    .vignette-detail::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 80%;
        background: linear-gradient(to top, #0b0c0e 15%, transparent 100%);
        pointer-events: none;
    }

    .btn-action-muviku {
        background: #FFAE1F;
        color: #000000;
        font-weight: 700;
        border: none;
        border-radius: 30px;
        padding: 10px 24px;
        transition: all 0.3s ease;
    }

    .btn-action-muviku:hover {
        background: #e09918;
        transform: translateY(-2px);
    }

    .badge-tag {
        background: rgba(255, 174, 31, 0.15);
        color: #FFAE1F;
        border: 1px solid rgba(255, 174, 31, 0.4);
        border-radius: 8px;
        padding: 4px 10px;
        font-size: 12px;
        font-weight: 600;
    }

    .card-recom {
        transition: transform 0.3s ease;
        cursor: pointer;
    }

    .card-recom:hover {
        transform: translateY(-6px);
    }
</style>

<body>
    {{-- TOP NAVBAR --}}
    <nav class="navbar sticky-top px-3 py-2 w-100" style="background: rgba(11, 12, 14, 0.9); backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px); border-bottom: 1px solid rgba(255,255,255,0.08); z-index: 1050;" id="mainNav">
        <div class="container-fluid d-flex justify-content-between align-items-center p-0">
            <div class="d-flex align-items-center gap-2 overflow-hidden me-2">
                <button onclick="window.history.back()" class="btn btn-dark rounded-circle p-0 d-flex align-items-center justify-content-center text-white border border-secondary flex-shrink-0" style="width: 40px; height: 40px;" title="Kembali">
                    <i class="bi bi-arrow-left fs-5"></i>
                </button>
                <h5 class="m-0 fw-bold text-white text-truncate" style="max-width: 300px; font-size: 1.1rem;">{{ $film->judul }}</h5>
            </div>
            <div class="d-flex align-items-center gap-2 flex-shrink-0">
                <a href="{{ route('utama') }}" class="btn btn-dark rounded-circle p-0 d-flex align-items-center justify-content-center text-white border border-secondary" style="width: 40px; height: 40px;" title="Halaman Utama">
                    <i class="bi bi-house-door-fill fs-5"></i>
                </a>
                <div class="dropdown">
                    <button class="btn btn-dark rounded-circle p-0 d-flex align-items-center justify-content-center text-white border border-secondary" style="width: 40px; height: 40px;" type="button" data-bs-toggle="dropdown" aria-expanded="false" title="Menu">
                        <i class="bi bi-three-dots-vertical fs-5"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow-lg rounded-4 p-2 bg-dark border border-secondary mt-2">
                        <li>
                            <a class="dropdown-item text-white rounded-3 py-2 d-flex align-items-center gap-2" href="#" id="daftar">
                                <i class="bi bi-bookmark-check-fill text-primary fs-5"></i> Tambahkan ke Daftar
                            </a>
                        </li>
                        <li><hr class="dropdown-divider border-secondary opacity-50 my-1"></li>
                        <li>
                            <a class="dropdown-item text-white rounded-3 py-2 d-flex align-items-center gap-2" href="#" data-bs-toggle="modal" data-bs-target="#lapor">
                                <i class="bi bi-question-circle-fill text-warning fs-5"></i> Laporkan Film
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    {{-- HERO BANNER / VIDEO PLAYER --}}
    <div class="container my-3">
        @php
            $videoUrl = $film->video;
            if ($videoUrl && str_contains($videoUrl, 'youtube.com/watch?v=')) {
                $videoUrl = str_replace('watch?v=', 'embed/', $videoUrl);
            }
        @endphp

        @if ($videoUrl)
            <div class="video-container mb-4">
                <iframe src="{{ $videoUrl }}?autoplay=0&rel=0" allowfullscreen allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
            </div>
        @else
            <div class="vignette-detail mb-4">
                <img src="{{ $film->thumbnail_url }}" class="hero-banner-detail" alt="{{ $film->judul }}">
            </div>
        @endif
    </div>

    {{-- DETAIL CONTENT --}}
    <div class="container mb-5">
        <div class="row">
            <div class="col-lg-8">
                <div class="d-flex flex-wrap align-items-center gap-2 mb-3">
                    <span class="badge-tag">{{ $film->tipe }}</span>
                    <span class="badge bg-secondary">{{ $film->tahun }}</span>
                    <span class="badge bg-dark border border-secondary">{{ $film->usia ?: '13+' }}</span>
                    <span class="text-secondary small"><i class="bi bi-clock me-1"></i>{{ $film->durasi ?: '120 Menit' }}</span>
                </div>

                <h1 class="fw-bolder mb-2 text-white display-6">{{ $film->judul }}</h1>

                <div class="text-secondary small mb-3">
                    <span class="me-3"><strong>Studio:</strong> {{ $film->perusahaan ?: 'MUVIKU Production' }}</span>
                    <span><strong>Sutradara:</strong> {{ $film->sutradara ?: 'MUVIKU Creator' }}</span>
                </div>

                <p class="text-light leading-relaxed mb-4 fs-6" style="line-height: 1.7; opacity: 0.9;">
                    {{ $film->deskripsi }}
                </p>

                @if ($videoUrl)
                    <div class="btn-play mb-4">
                        <button class="btn btn-action-muviku w-100 py-3 d-flex align-items-center justify-content-center gap-2" onclick="window.scrollTo({top: 0, behavior: 'smooth'})">
                            <i class="bi bi-play-fill fs-3"></i> <span class="fs-5 fw-bold">Putar Video</span>
                        </button>
                    </div>
                @endif

                {{-- ACTION BUTTONS (FAVORIT, UNDUH, BAGIKAN) --}}
                <div class="btn-fungsional my-4">
                    <div class="text-white">
                        <ul class="d-flex p-0 justify-content-around align-items-center m-0" style="list-style: none; background: rgba(255,255,255,0.04); padding: 18px 0 !important; border-radius: 16px; border: 1px solid rgba(255,255,255,0.08);">
                            <li class="text-center favorit d-flex flex-column align-items-center justify-content-center" id="disukai" style="cursor: pointer;">
                                <div class="d-flex align-items-center justify-content-center" style="height: 40px;">
                                    <i class="bi bi-heart fs-3 pt-1" id="iconFavorit"></i>
                                </div>
                                <h6 class="mt-1 mb-0"><small id="textFavorit">Favorit</small></h6>
                            </li>
                            <li class="text-center d-flex flex-column align-items-center justify-content-center" id="btnUnduh" style="cursor: pointer;" onclick="downloadVideo()">
                                <div class="d-flex align-items-center justify-content-center" style="height: 40px;">
                                    <i class="bi bi-download fs-3 pt-1"></i>
                                </div>
                                <h6 class="mt-1 mb-0"><small>Unduh</small></h6>
                            </li>
                            <li class="text-center share d-flex flex-column align-items-center justify-content-center" id="btnShare" style="cursor: pointer;" onclick="shareMovie()">
                                <div class="d-flex align-items-center justify-content-center" style="height: 40px;">
                                    <i class="bi bi-share fs-3 pt-1"></i>
                                </div>
                                <h6 class="mt-1 mb-0"><small>Bagikan</small></h6>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- SEASONS & EPISODES (IF SERIAL) --}}
                @if ($film->tipe === 'Serial' && $film->seasons && $film->seasons->count() > 0)
                    <div class="mt-5">
                        <h4 class="fw-bold text-white mb-3"><i class="bi bi-collection-play me-2 text-warning"></i>Daftar Episode</h4>
                        <div class="accordion accordion-flush" id="seasonsAccordion">
                            @foreach ($film->seasons as $sIndex => $season)
                                <div class="accordion-item bg-dark text-white border-secondary rounded-3 mb-2 overflow-hidden">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button bg-dark text-white fw-bold {{ $sIndex > 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#season-{{ $season->id }}">
                                            {{ $season->season }} ({{ $season->episodes->count() }} Episode)
                                        </button>
                                    </h2>
                                    <div id="season-{{ $season->id }}" class="accordion-collapse collapse {{ $sIndex == 0 ? 'show' : '' }}" data-bs-parent="#seasonsAccordion">
                                        <div class="accordion-body p-2">
                                            @foreach ($season->episodes as $episode)
                                                <div class="d-flex align-items-center gap-3 p-2 rounded hover-bg-secondary mb-1" style="background: rgba(255,255,255,0.03);">
                                                    <span class="badge bg-warning text-dark fw-bold px-2 py-1">{{ $episode->episode }}</span>
                                                    <div class="flex-grow-1">
                                                        <h6 class="m-0 fw-bold text-white fs-6">{{ $episode->judul }}</h6>
                                                        <small class="text-secondary">{{ $episode->desk_eps }}</small>
                                                    </div>
                                                    <button class="btn btn-sm btn-outline-warning rounded-circle p-2" onclick="window.scrollTo({top: 0, behavior: 'smooth'})">
                                                        <i class="bi bi-play-fill fs-5"></i>
                                                    </button>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            {{-- REKOMENDASI SIDEBAR --}}
            <div class="col-lg-4 mt-4 mt-lg-0">
                <h5 class="fw-bold text-white mb-3"><i class="bi bi-star-fill me-2 text-warning"></i>Rekomendasi Lainnya</h5>
                <div class="d-flex flex-column gap-3">
                    @foreach ($rekomendasi as $rec)
                        <div class="card-recom d-flex gap-3 align-items-center bg-dark p-2 rounded-3 border border-secondary" onclick="window.location='{{ route('film.detail', $rec->id) }}'">
                            <img src="{{ $rec->thumbnail_url }}" style="width: 70px; height: 95px; object-fit: cover; border-radius: 8px;" alt="{{ $rec->judul }}">
                            <div class="flex-grow-1 overflow-hidden">
                                <h6 class="text-white fw-bold text-truncate mb-1" style="font-size: 0.9rem;">{{ $rec->judul }}</h6>
                                <span class="badge bg-secondary mb-1" style="font-size: 10px;">{{ $rec->tipe }}</span>
                                <div class="text-secondary small" style="font-size: 0.75rem;">{{ $rec->tahun }} • {{ $rec->durasi ?: '120m' }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- REPORT MODAL --}}
    <div class="modal bg-modal fade" id="lapor" tabindex="-1" aria-labelledby="laporLabel" aria-hidden="true">
        <div class="modal-dialog container my-auto">
            <div class="modal-content rounded-5 lapor mx-auto">
                <div class="modal-header border-bottom-0 d-block pt-0">
                    <h1 class="modal-title fs-5" id="laporLabel">Laporkan Kesalahan Film</h1>
                </div>
                <div class="modal-body container py-0 px-4">
                    <label for="aa" class="w-100 mb-2 d-flex">
                        <input id="aa" type="radio" name="when" style="min-height:20px; min-width:20px; vertical-align: middle;">
                        <div class="ps-2">Kerusakan Gambar atau Audio Film</div>
                    </label>
                    <label for="bb" class="w-100 mb-2 d-flex">
                        <input id="bb" type="radio" name="when" style="min-height:20px; min-width:20px; vertical-align: middle;">
                        <div class="ps-2">Masalah Teknis atau Kualitas Video</div>
                    </label>
                    <label for="cc" class="w-100 mb-2 pb-4 position-relative">
                        <input id="cc" type="radio" name="when" style="min-height:20px; min-width:20px; vertical-align: middle;">
                        <div class="ps-2 position-absolute" style="left: 20px; top: 0;">Kesalahan Tahun Rilis, Nama Sutradara atau Nama Perusahaan</div>
                    </label>
                    <label for="dd" class="w-100 mb-2 pb-4 position-relative">
                        <input id="dd" type="radio" name="when" style="min-height:20px; min-width:20px; vertical-align: middle;">
                        <div class="ps-2 position-absolute" style="left: 20px; top: 0;">Kesalahan Judul, Thumbnail atau Deskripsi</div>
                    </label>
                    <label for="lainnya" class="w-100 mb-2 d-flex">
                        <input id="lainnya" type="radio" name="when" value="other" style="min-height:20px; min-width:20px; vertical-align: middle;">
                        <div class="ps-2">Lainnya</div>
                    </label>
                    <div id="lainnyaTextarea" class="w-100 d-flex" style="display:none;">
                        <textarea name="when_other" id="lainnyaInput" rows="4" style="display: none" placeholder="Tuliskan laporan Anda di sini..."></textarea>
                    </div>
                </div>
                <div class="modal-footer border-top-0 justify-content-center p-0 pt-3">
                    <input type="submit" id="laporbtn" class="text-white text-center border-0 btn-simpan py-2 rounded-3" style="width: 35%" data-bs-dismiss="modal" value="Laporkan" disabled>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Select menu toggle --}}
    <script>
        const optionMenu = document.querySelector(".select-menu"),
            selectBtn = optionMenu.querySelector(".select-btn"),
            options = optionMenu.querySelector(".options");

        selectBtn.addEventListener("click", () => {
            optionMenu.classList.toggle("active");
        });

        document.addEventListener("click", (event) => {
            if (!optionMenu.contains(event.target)) {
                optionMenu.classList.remove("active");
            }
        });

        options.addEventListener("click", (event) => {
            event.stopPropagation();
        });

        document.addEventListener("scroll", () => {
            optionMenu.classList.remove("active");
        });
    </script>

    {{-- Scroll-based navbar style --}}
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

    {{-- SweetAlert for Daftar & Lapor --}}
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

        document.getElementById('laporbtn').addEventListener('click', function() {
            Swal.fire({
                position: "center",
                icon: "success",
                text: "Laporan Terkirim",
                showConfirmButton: false,
                timer: 2000
            });
        });

        // Report modal radio buttons
        const radioButtons = document.querySelectorAll('input[name="when"]');
        const submitButton = document.querySelector('.btn-simpan');
        const lainnyaTextarea = document.getElementById('lainnyaTextarea');
        const lainnyaInput = document.getElementById('lainnyaInput');

        radioButtons.forEach(radio => {
            radio.addEventListener('change', function() {
                const isAnyRadioSelected = [...radioButtons].some(radio => radio.checked);
                submitButton.disabled = !isAnyRadioSelected;
                if (isAnyRadioSelected) {
                    submitButton.classList.add('active');
                } else {
                    submitButton.classList.remove('active');
                }
                if (radio.id === 'lainnya') {
                    lainnyaTextarea.style.display = 'flex';
                    lainnyaInput.style.display = 'block';
                    submitButton.disabled = lainnyaInput.value.trim() === '';
                } else {
                    lainnyaTextarea.style.display = 'none';
                    lainnyaInput.style.display = 'none';
                }
            });
        });

        if (lainnyaInput) {
            lainnyaInput.addEventListener('input', function() {
                submitButton.disabled = lainnyaInput.value.trim() === '';
            });
        }

        // Favorit toggle functionality
        let isFavorited = false;
        const disukaiBtn = document.getElementById('disukai');
        if (disukaiBtn) {
            disukaiBtn.addEventListener('click', function() {
                isFavorited = !isFavorited;
                const icon = document.getElementById('iconFavorit');
                const text = document.getElementById('textFavorit');
                
                if (isFavorited) {
                    icon.className = 'bi bi-heart-fill text-danger fs-3';
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        text: "Berhasil Ditambahkan ke Favorit",
                        showConfirmButton: false,
                        timer: 2000
                    });
                } else {
                    icon.className = 'bi bi-heart fs-3';
                    Swal.fire({
                        position: "center",
                        icon: "info",
                        text: "Dihapus dari Favorit",
                        showConfirmButton: false,
                        timer: 2000
                    });
                }
            });
        }

        function downloadVideo() {
            Swal.fire({
                position: "center",
                icon: "success",
                text: "Proses Mengunduh Video...",
                showConfirmButton: false,
                timer: 2000
            });
        }

        function shareMovie() {
            if (navigator.share) {
                navigator.share({
                    title: "{{ $film->judul }}",
                    text: "Tonton {{ $film->judul }} di MUVIKU!",
                    url: window.location.href
                }).catch(() => {});
            } else {
                navigator.clipboard.writeText(window.location.href);
                Swal.fire({
                    position: "center",
                    icon: "success",
                    text: "Tautan Berhasil Disalin!",
                    showConfirmButton: false,
                    timer: 2000
                });
            }
        }
    </script>
</body>

</html>
