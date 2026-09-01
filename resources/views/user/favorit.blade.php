<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Favorit | Muviku</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #111215;
            color: #f8fafc;
            min-height: 100vh;
            margin: 0;
            padding-bottom: 120px;
            overflow-x: hidden;
            user-select: none;
        }

        .header-nav {
            position: sticky;
            top: 0;
            z-index: 100;
            background: rgba(17, 18, 21, 0.85);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.06);
            padding: 16px 0;
        }

        .header-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .header-title {
            font-size: 1.4rem;
            font-weight: 800;
            color: #ffffff;
            margin: 0;
            letter-spacing: 0.5px;
        }

        .favorites-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 16px;
            padding: 24px 0;
        }

        @media (min-width: 576px) {
            .favorites-grid {
                grid-template-columns: repeat(3, 1fr);
                gap: 20px;
            }
        }

        @media (min-width: 768px) {
            .favorites-grid {
                grid-template-columns: repeat(4, 1fr);
                gap: 24px;
            }
        }

        @media (min-width: 992px) {
            .favorites-grid {
                grid-template-columns: repeat(5, 1fr);
                gap: 24px;
            }
        }

        .movie-card {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            position: relative;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .movie-card:hover {
            transform: translateY(-6px);
            border-color: rgba(255, 255, 255, 0.12);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.4);
            background: rgba(255, 255, 255, 0.04);
        }

        .poster-container {
            position: relative;
            width: 100%;
            aspect-ratio: 2/3;
            overflow: hidden;
            background: #1e1e24;
        }

        .movie-poster {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .movie-card:hover .movie-poster {
            transform: scale(1.06);
        }

        /* Floating Trash Button */
        .trash-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 36px;
            height: 36px;
            background: rgba(17, 18, 21, 0.75);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ef4444;
            cursor: pointer;
            transition: all 0.2s ease;
            z-index: 10;
        }

        .trash-btn:hover {
            background: #ef4444;
            color: #ffffff;
            transform: scale(1.1);
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
        }

        .movie-details {
            padding: 14px;
        }

        .movie-title {
            font-size: 0.92rem;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 4px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .movie-studio {
            font-size: 0.75rem;
            color: #94a3b8;
            font-weight: 500;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* Floating Nav Dock */
        .menu-wrapper {
            position: fixed !important;
            bottom: 24px !important;
            left: 50% !important;
            transform: translateX(-50%) !important;
            width: 90% !important;
            max-width: 480px !important;
            height: 72px !important;
            background: rgba(18, 18, 22, 0.85) !important;
            backdrop-filter: blur(20px) !important;
            -webkit-backdrop-filter: blur(20px) !important;
            border: 1px solid rgba(255, 255, 255, 0.08) !important;
            border-radius: 36px !important;
            box-shadow: 0 12px 36px rgba(0, 0, 0, 0.5) !important;
            z-index: 1000 !important;
            padding: 0 12px !important;
            display: flex !important;
            align-items: center !important;
        }

        .menu-wrapper .navigation {
            display: flex !important;
            justify-content: space-around !important;
            align-items: center !important;
            width: 100% !important;
            height: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
        }

        .menu-wrapper .navigation li {
            list-style: none !important;
            text-align: center !important;
            flex: 1 !important;
            padding: 0 !important;
            margin: 0 !important;
        }

        .menu-wrapper .navigation li a {
            color: #94a3b8 !important;
            text-decoration: none !important;
            display: flex !important;
            flex-direction: column !important;
            align-items: center !important;
            transition: all 0.3s ease !important;
            gap: 4px !important;
            margin: 0 !important;
            padding: 0 !important;
            background: transparent !important;
            border: none !important;
        }

        .menu-wrapper .navigation li a i {
            font-size: 20px !important;
            display: block !important;
            margin: 0 !important;
            padding: 0 !important;
            color: inherit !important;
        }

        .menu-wrapper .navigation li a img {
            width: 20px !important;
            height: 20px !important;
            object-fit: contain !important;
            display: block !important;
            margin: 0 !important;
            padding: 0 !important;
        }

        .menu-wrapper .navigation li a span {
            font-family: 'Plus Jakarta Sans', sans-serif !important;
            font-size: 11px !important;
            font-weight: 500 !important;
            display: block !important;
            color: inherit !important;
            margin: 0 !important;
            padding: 0 !important;
            letter-spacing: 0.2px !important;
        }

        .menu-wrapper .navigation li a.active {
            color: #FFAE1F !important;
            font-weight: 700 !important;
        }

        .menu-wrapper .navigation li a:hover {
            color: #ffffff !important;
        }

        /* Custom SweetAlert integration */
        .swal2-modal {
            background-color: rgba(20, 20, 24, 0.95) !important;
            backdrop-filter: blur(25px) !important;
            -webkit-backdrop-filter: blur(25px) !important;
            border: 1px solid rgba(255, 255, 255, 0.08) !important;
            border-radius: 20px !important;
            color: #ffffff !important;
        }
        
        .swal2-title {
            color: #ffffff !important;
        }
    </style>
</head>

<body>

    <!-- Frosted Header Navbar -->
    <div class="header-nav">
        <div class="container header-container">
            <h3 class="header-title">Daftar Favorit</h3>
        </div>
    </div>

    <!-- Main Grid Content -->
    <div class="container">
        <div class="favorites-grid">
            
            <!-- Movie Card 1 -->
            <div class="movie-card">
                <div class="poster-container">
                    <img src="{{ asset('img/jumanji.jpg') }}" class="movie-poster" alt="Jumanji">
                    <div class="trash-btn" title="Hapus dari Favorit">
                        <i class="bi bi-trash-fill"></i>
                    </div>
                </div>
                <div class="movie-details">
                    <h5 class="movie-title">Jumanji</h5>
                    <p class="movie-studio">TriStar Pictures</p>
                </div>
            </div>

            <!-- Movie Card 2 -->
            <div class="movie-card">
                <div class="poster-container">
                    <img src="{{ asset('img/drakor7.jpg') }}" class="movie-poster" alt="Train to Busan">
                    <div class="trash-btn" title="Hapus dari Favorit">
                        <i class="bi bi-trash-fill"></i>
                    </div>
                </div>
                <div class="movie-details">
                    <h5 class="movie-title">Train to Busan</h5>
                    <p class="movie-studio">RedPeter Film</p>
                </div>
            </div>

            <!-- Movie Card 3 -->
            <div class="movie-card">
                <div class="poster-container">
                    <img src="{{ asset('img/anim8.jpg') }}" class="movie-poster" alt="Spirited Away">
                    <div class="trash-btn" title="Hapus dari Favorit">
                        <i class="bi bi-trash-fill"></i>
                    </div>
                </div>
                <div class="movie-details">
                    <h5 class="movie-title">Spirited Away</h5>
                    <p class="movie-studio">Studio Ghibli</p>
                </div>
            </div>

            <!-- Movie Card 4 -->
            <div class="movie-card">
                <div class="poster-container">
                    <img src="{{ asset('img/anim3.jpg') }}" class="movie-poster" alt="Weathering With You">
                    <div class="trash-btn" title="Hapus dari Favorit">
                        <i class="bi bi-trash-fill"></i>
                    </div>
                </div>
                <div class="movie-details">
                    <h5 class="movie-title">Weathering With You</h5>
                    <p class="movie-studio">CoMix Wave Films</p>
                </div>
            </div>

            <!-- Movie Card 5 -->
            <div class="movie-card">
                <div class="poster-container">
                    <img src="{{ asset('img/hero7.jpg') }}" class="movie-poster" alt="Thor Ragnarok">
                    <div class="trash-btn" title="Hapus dari Favorit">
                        <i class="bi bi-trash-fill"></i>
                    </div>
                </div>
                <div class="movie-details">
                    <h5 class="movie-title">Thor Ragnarok</h5>
                    <p class="movie-studio">Marvel Studios</p>
                </div>
            </div>

        </div>
    </div>

    <!-- Floating Navigation Menu -->
    <footer>
        <div class="menu-wrapper">
            <div class="navigation" id="navigationn">
                <li>
                    <a href="/utama">
                        <img src="img/logo-muviku.png" alt="Utama">
                        <span>Utama</span>
                    </a>
                </li>
                <li>
                    <a href="/search">
                        <i class="bi bi-search" aria-hidden="true"></i>
                        <span>Cari</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('favorit') }}" class="active">
                        <img src="img/heart.png" alt="Suka">
                        <span>Suka</span>
                    </a>
                </li>
                <li>
                    <a href="/profile">
                        <i class="bi bi-person fs-4" aria-hidden="true"></i>
                        <span>Profil</span>
                    </a>
                </li>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Setup trash action for each movie card
        document.querySelectorAll('.trash-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.stopPropagation(); // Avoid triggering card-level clicks if any
                
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Berhasil Dihapus!",
                    showConfirmButton: false,
                    timer: 1500,
                    background: '#141418',
                    color: '#ffffff'
                });

                // Smoothly remove card from interface
                const card = this.closest('.movie-card');
                card.style.opacity = '0';
                card.style.transform = 'scale(0.9) translateY(10px)';
                
                setTimeout(() => {
                    card.remove();
                }, 400);
            });
        });
    </script>
</body>

</html>
