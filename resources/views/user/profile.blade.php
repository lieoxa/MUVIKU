<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="theme-color" content="#111215" />
    <title>Profile | Muviku</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- AlpineJS -->
    <script src="https://unpkg.com/alpinejs" defer></script>

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

        .profile-banner-container {
            position: relative;
            width: 100%;
            height: 200px;
            overflow: hidden;
        }
        
        @media (min-width: 992px) {
            .profile-banner-container {
                height: 280px;
            }
        }

        .profile-banner-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: brightness(0.5) blur(1px);
        }

        .profile-banner-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 120px;
            background: linear-gradient(to top, #111215, transparent);
        }

        .profile-main-container {
            margin-top: -60px;
            position: relative;
            z-index: 10;
            padding-left: 16px;
            padding-right: 16px;
        }
        
        @media (min-width: 992px) {
            .profile-main-container {
                margin-top: -100px;
            }
        }

        /* Grid Layout */
        .profile-container {
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        @media (min-width: 992px) {
            .profile-container {
                display: grid;
                grid-template-columns: 340px 1fr;
                gap: 32px;
                align-items: start;
            }
        }

        /* Left Panel: User Card */
        .user-card-panel {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 24px;
            padding: 32px 24px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .user-avatar-container {
            width: 120px;
            height: 120px;
            margin: 0 auto 20px;
            position: relative;
        }

        .user-avatar {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            border: 4px solid #FFAE1F;
            object-fit: cover;
            box-shadow: 0 8px 20px rgba(0,0,0,0.4);
            transition: transform 0.3s ease;
        }

        .user-avatar-container:hover .user-avatar {
            transform: scale(1.05);
        }

        .user-name {
            font-size: 1.4rem;
            font-weight: 800;
            color: #ffffff;
            margin-bottom: 8px;
            letter-spacing: 0.3px;
        }

        .user-status-badge {
            display: inline-block;
            background: rgba(255, 174, 31, 0.15);
            color: #FFAE1F;
            font-size: 0.75rem;
            font-weight: 700;
            padding: 6px 16px;
            border-radius: 20px;
            margin-bottom: 24px;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            border: 1px solid rgba(255, 174, 31, 0.25);
        }

        .user-info-list {
            text-align: left;
            border-top: 1px solid rgba(255, 255, 255, 0.06);
            padding-top: 20px;
        }

        .info-item {
            margin-bottom: 16px;
        }

        .info-item:last-child {
            margin-bottom: 0;
        }

        .info-label {
            display: block;
            color: #94a3b8;
            font-size: 0.72rem;
            font-weight: 600;
            text-transform: uppercase;
            margin-bottom: 4px;
            letter-spacing: 0.5px;
        }

        .info-value {
            color: #f8fafc;
            font-size: 0.92rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            word-break: break-all;
        }
        
        .info-value i {
            color: #FFAE1F;
            font-size: 1.1rem;
            margin-right: 8px;
        }

        /* Right Panel: Menu List */
        .menu-panel {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .menu-item-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 16px;
            padding: 18px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .menu-item-card:hover {
            background: rgba(255, 255, 255, 0.06);
            border-color: rgba(255, 255, 255, 0.15);
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
        }
        
        .menu-item-card:active {
            transform: translateY(0);
        }

        .menu-item-content {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .menu-icon {
            font-size: 1.3rem;
            color: #FFAE1F;
            display: flex;
            align-items: center;
        }

        .menu-title {
            color: #f8fafc;
            font-size: 0.95rem;
            font-weight: 600;
            letter-spacing: 0.2px;
        }

        .arrow-icon {
            color: #64748b;
            font-size: 0.9rem;
            transition: transform 0.3s ease;
        }

        .menu-item-card:hover .arrow-icon {
            transform: translateX(4px);
            color: #ffffff;
        }

        .logout-card:hover {
            background: rgba(239, 68, 68, 0.1) !important;
            border-color: rgba(239, 68, 68, 0.25) !important;
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

        /* Modals & Forms Glassmorphism */
        .bg-modal {
            background-color: rgba(0, 0, 0, 0.8) !important;
            backdrop-filter: blur(8px);
        }

        .modal-content {
            background: rgba(20, 20, 24, 0.95) !important;
            backdrop-filter: blur(25px) !important;
            -webkit-backdrop-filter: blur(25px) !important;
            border: 1px solid rgba(255, 255, 255, 0.08) !important;
            border-radius: 24px !important;
            color: #f8fafc !important;
            padding: 32px 24px !important;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.5);
        }

        .modal-header, .modal-footer {
            border: none !important;
            padding: 0 !important;
        }

        .modal-body {
            padding: 0 !important;
        }

        .modal-body h6 {
            color: #94a3b8;
            font-size: 0.78rem;
            font-weight: 600;
            text-transform: uppercase;
            margin-bottom: 8px;
            letter-spacing: 0.5px;
        }

        .modal-body input, .modal-body textarea {
            background: rgba(255, 255, 255, 0.04) !important;
            border: 1px solid rgba(255, 255, 255, 0.08) !important;
            color: #ffffff !important;
            border-radius: 12px !important;
            padding: 12px 16px !important;
            transition: all 0.3s ease !important;
            width: 100%;
            font-size: 0.92rem;
            text-indent: 0 !important;
        }

        .modal-body input:focus, .modal-body textarea:focus {
            outline: none !important;
            border-color: #FFAE1F !important;
            box-shadow: 0 0 0 3px rgba(255, 174, 31, 0.25) !important;
            background: rgba(255, 255, 255, 0.08) !important;
        }

        .label-upload {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.04);
            border: 1px dashed rgba(255, 255, 255, 0.15);
            border-radius: 12px;
            padding: 14px;
            color: #94a3b8;
            font-weight: 600;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .label-upload:hover {
            background: rgba(255, 255, 255, 0.08);
            border-color: #FFAE1F;
            color: #ffffff;
        }

        .btn-simpan-profil, #btn-save, #btn-simpan, #btn-add {
            background: #FFAE1F !important;
            border: none !important;
            color: #111215 !important;
            font-weight: 700 !important;
            border-radius: 12px !important;
            padding: 12px 28px !important;
            font-size: 0.95rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
            box-shadow: 0 4px 15px rgba(255, 174, 31, 0.2);
            width: 100%;
        }

        .btn-simpan-profil:hover:not(.disabled), #btn-save:hover:not(.disabled), #btn-simpan:hover:not(.disabled), #btn-add:hover:not(.disabled) {
            background: #e69d1c !important;
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(255, 174, 31, 0.35);
        }

        .disabled {
            background: rgba(255, 255, 255, 0.06) !important;
            color: rgba(255, 255, 255, 0.25) !important;
            cursor: not-allowed !important;
            box-shadow: none !important;
            transform: none !important;
        }

        .icon-eye-pw {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            cursor: pointer;
            z-index: 10;
        }

        .icon-eye-pw:hover {
            color: #ffffff;
        }
    </style>
</head>

<body>

    <div class="profile-page-wrapper">
        <!-- Banner Background -->
        <div class="profile-banner-container">
            <img src="{{ asset('images/bg-profile.png') }}" class="profile-banner-img" alt="Banner Background">
            <div class="profile-banner-overlay"></div>
        </div>
        
        <!-- Main Content -->
        <div class="container profile-main-container">
            <div class="profile-container">
                
                <!-- Left Side: User Card -->
                <div class="user-card-panel">
                    <div class="user-avatar-container">
                        <img src="{{ Auth::user()->gambar ? (Str::startsWith(Auth::user()->gambar, ['http://', 'https://']) ? Auth::user()->gambar : 'imgprofil/' . Auth::user()->gambar) : 'img/imgProfile/profile.png' }}"
                            class="user-avatar" id="currentAvatar" alt="Avatar">
                    </div>
                    
                    <h3 class="user-name">{{ Str::title(Auth::user()->name) }}</h3>
                    <div class="user-status-badge">{{ Auth::user()->status == 'admin' ? 'Admin' : 'User' }}</div>
                    
                    <div class="user-info-list">
                        <div class="info-item">
                            <span class="info-label">Email</span>
                            <span class="info-value">
                                <i class="bi bi-envelope-fill text-warning"></i>
                                {{ Auth::user()->email }}
                            </span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">No. Handphone</span>
                            <span class="info-value">
                                <i class="bi bi-telephone-fill text-warning"></i>
                                {{ Auth::user()->nohp ?: 'Belum diatur' }}
                            </span>
                        </div>
                    </div>
                </div>
                
                <!-- Right Side: Navigation Cards -->
                <div class="menu-panel">
                    <div class="menu-item-card" data-bs-toggle="modal" data-bs-target="#profil">
                        <div class="menu-item-content">
                            <div class="menu-icon"><i class="bi bi-person-fill"></i></div>
                            <span class="menu-title">Edit Profil</span>
                        </div>
                        <i class="bi bi-chevron-right arrow-icon"></i>
                    </div>
                    
                    <div class="menu-item-card" data-bs-toggle="modal" data-bs-target="#akun">
                        <div class="menu-item-content">
                            <div class="menu-icon"><i class="bi bi-envelope-fill"></i></div>
                            <span class="menu-title">Edit Akun</span>
                        </div>
                        <i class="bi bi-chevron-right arrow-icon"></i>
                    </div>
                    
                    <a href="{{ route('watchlist') }}" class="menu-item-card text-decoration-none">
                        <div class="menu-item-content">
                            <div class="menu-icon"><i class="bi bi-bookmark-check-fill"></i></div>
                            <span class="menu-title">Daftar Tonton</span>
                        </div>
                        <i class="bi bi-chevron-right arrow-icon"></i>
                    </a>
                    
                    <div class="menu-item-card" data-bs-toggle="modal" data-bs-target="#lapor">
                        <div class="menu-item-content">
                            <div class="menu-icon"><i class="bi bi-exclamation-triangle-fill"></i></div>
                            <span class="menu-title">Laporkan Kesalahan</span>
                        </div>
                        <i class="bi bi-chevron-right arrow-icon"></i>
                    </div>
                    
                    @if(!Auth::user()->google_id)
                    <div class="menu-item-card" data-bs-toggle="modal" data-bs-target="#password">
                        <div class="menu-item-content">
                            <div class="menu-icon"><i class="bi bi-key-fill"></i></div>
                            <span class="menu-title">Edit Sandi</span>
                        </div>
                        <i class="bi bi-chevron-right arrow-icon"></i>
                    </div>
                    @endif
                    
                    <div class="menu-item-card logout-card" data-bs-toggle="modal" data-bs-target="#logout">
                        <div class="menu-item-content">
                            <div class="menu-icon"><i class="bi bi-box-arrow-right text-danger"></i></div>
                            <span class="menu-title text-danger">Log Out</span>
                        </div>
                        <i class="bi bi-chevron-right arrow-icon text-danger"></i>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <!-- Floating Dock Menu -->
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
                    <a href="{{ route('favorit') }}">
                        <i class="bi bi-heart" aria-hidden="true"></i>
                        <span>Suka</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('profile') }}" class="active">
                        <img src="img/group-1.png" alt="Profil">
                        <span>Profil</span>
                    </a>
                </li>
            </div>
        </div>
    </footer>

    <!-- Modal Edit Profil -->
    <div class="modal fade bg-modal" id="profil" tabindex="-1" aria-labelledby="profilLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" x-data="{ name: '{{ Auth::user()->name }}', img: '' }">
            <form class="w-100" action="/profile/editProfil" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="text-center mb-4">
                            <img class="mx-auto mt-2 rounded-circle justify-content-center d-flex border" id="preview"
                                src="{{ Auth::user()->gambar ? (Str::startsWith(Auth::user()->gambar, ['http://', 'https://']) ? Auth::user()->gambar : 'imgprofil/' . Auth::user()->gambar) : 'img/imgProfile/profile.png' }}"
                                alt="Preview" height="100" width="100" style="object-fit: cover; border: 3px solid #FFAE1F !important;">
                            <h4 class="modal-title fs-5 mt-3" id="profilLabel">Edit Profil</h4>
                        </div>
                        <div class="d-grid gap-3">
                            <div>
                                <h6>Nama</h6>
                                <input type="text" name="name" id="name" value="{{ Auth::user()->name }}" x-model="name">
                            </div>
                            <div>
                                <h6>Foto Profil</h6>
                                <input type="file" name="gambar" hidden onchange="previewImage()" id="imgProfil" x-model="img">
                                <label for="imgProfil" class="label-upload" id="file-input-label">
                                    <i class="bi bi-upload"></i>Pilih File Gambar
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-center mt-4">
                        <button type="submit" id="simpanprofil" class="btn-simpan-profil btn" :class="name || img ? null : 'disabled'">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit Akun -->
    <div class="modal fade bg-modal" id="akun" tabindex="-1" aria-labelledby="akunLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" x-data="{ email: '{{ Auth::user()->email }}', no: '{{ Auth::user()->nohp }}' }">
            <form action="/profile/editAkun" class="w-100" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="text-center mb-4">
                        <img class="mx-auto d-block" src="img/email.png" style="width: 70px; height: 70px; object-fit: contain;">
                        <h4 class="modal-title fs-5 mt-3" id="akunLabel">Edit Akun</h4>
                    </div>
                    <div class="modal-body d-grid gap-3">
                        <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                        <div>
                            <h6>Email Baru</h6>
                            <input type="email" name="email" id="email" placeholder="Ketik email barumu..." x-model="email" value="{{ Auth::user()->email }}">
                        </div>
                        <div>
                            <h6>No. Handphone Baru</h6>
                            <input type="text" name="nohp" id="tlpn" placeholder="Ketik no barumu..." x-model="no" value="{{ Auth::user()->nohp }}">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-center mt-4">
                        <button type="submit" id="btn-save" class="btn text-center" :class="email || no ? null : 'disabled'">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Laporkan Kesalahan -->
    <div class="modal fade bg-modal" id="lapor" tabindex="-1" aria-labelledby="laporLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" x-data="{ lapor: '' }">
            <form action="/profile/laporkan" class="w-100" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="text-center mb-4">
                        <img class="mx-auto d-block" src="img/report.png" style="width: 70px; height: 70px; object-fit: contain;">
                        <h4 class="modal-title fs-5 mt-3" id="laporLabel">Laporkan Kesalahan</h4>
                    </div>
                    <div class="modal-body d-grid gap-2">
                        <textarea id="description" class="w-100 px-1 border" cols="30" rows="5" name="laporan"
                            placeholder="Tuliskan laporan Anda di sini..." x-model="lapor" onkeyup="charCount(this)"></textarea>
                        <div class="text-end">
                            <small class="text-secondary"><span id="textcount">0</span> / 230 kata</small>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-center mt-4">
                        <button type="submit" class="btn text-white" :class="lapor ? null : 'disabled'" id="btn-add">Kirim</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit Sandi -->
    <div class="modal fade bg-modal" id="password" tabindex="-1" aria-labelledby="passwordLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form id="editForm" class="w-100">
                @csrf
                <div class="modal-content" x-data="{ pwlama: '', pwbaru: '', confirmpw: '' }">
                    <div class="text-center mb-4">
                        <img class="mx-auto d-block" src="img/lock.png" style="width: 70px; height: 70px; object-fit: contain;">
                        <h4 class="modal-title fs-5 mt-3" id="passwordLabel">Edit Sandi</h4>
                    </div>
                    <div class="modal-body d-grid gap-3 text-start">
                        <div id="validation-errors" class="mb-2" style="display: none;"></div>
                        <div class="position-relative">
                            <h6>Kata Sandi Lama</h6>
                            <input type="password" name="password" id="pwlama" x-model="pwlama" placeholder="Ketik kata sandi lamamu...">
                            <i class="bi bi-eye icon-eye-pw" id="togglepwLama"></i>
                        </div>
                        <div class="position-relative">
                            <h6>Kata Sandi Baru</h6>
                            <input type="password" name="new_password" id="pwbaru" x-model="pwbaru" placeholder="Ketik kata sandi barumu...">
                            <i class="bi bi-eye icon-eye-pw" id="togglepwBaru"></i>
                        </div>
                        <div class="position-relative">
                            <h6>Konfirmasi Kata Sandi Baru</h6>
                            <input type="password" name="new_password_confirmation" id="confirmpw" x-model="confirmpw" placeholder="Ketik ulang kata sandi barumu...">
                            <i class="bi bi-eye icon-eye-pw" id="togglepwConfirm"></i>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-center gap-2 mt-4">
                        <button type="button" class="btn btn-secondary border py-2 text-white bg-transparent border-secondary" style="width: auto; min-width: 100px; border-radius: 12px;" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" id="btn-simpan" class="btn btn-simpan" :class="pwlama && pwbaru && confirmpw ? null : 'disabled'" style="width: auto; min-width: 100px;">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Logout -->
    <div class="modal fade bg-modal" id="logout" tabindex="-1" aria-labelledby="logoutLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center">
                <div class="mb-4">
                    <img class="mx-auto d-block" src="img/img-logout.png" style="width: 70px; height: 70px; object-fit: contain;">
                    <h4 class="modal-title fs-5 mt-3" id="logoutLabel">Anda Yakin Ingin Keluar?</h4>
                </div>
                <div class="modal-footer justify-content-center gap-3">
                    <a href="{{ route('logoutLogin') }}" class="btn btn-secondary text-white border-0 py-2 px-4" style="border-radius: 12px; background: rgba(255,255,255,0.08) !important;">Iya</a>
                    <button type="button" class="btn btn-danger border-0 py-2 px-4" data-bs-dismiss="modal" style="border-radius: 12px; background: #dc3545 !important;">Tidak</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Script Bundles -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Character counter for report description
        function charCount(textarea) {
            var max = 230;
            var length = textarea.value.length;
            if (length > max) {
                textarea.value = textarea.value.substring(0, 230);
            } else {
                $('#textcount').text(length);
            }
        }
        
        // Form submission for changing password (via Ajax)
        $(document).ready(function() {
            $('#editForm').submit(function(e) {
                e.preventDefault();
                var formData = $(this).serialize();

                $.ajax({
                    type: 'POST',
                    url: '/profile/editSandi',
                    data: formData,
                    success: function(data) {
                        $('#password').modal('hide');
                        alert(data.success);
                    },
                    error: function(data) {
                        var errors = data.responseJSON;
                        $('#validation-errors').html('');
                        $.each(errors.errors, function(key, value) {
                            $('#validation-errors').show();
                            $('#validation-errors').append(
                                '<div class="alert alert-danger p-2" style="font-size:13px; border-radius:8px;">' + value + '</div>'
                            );
                        });
                    }
                });
            });
        });

        // Image Preview logic
        function previewImage() {
            var preview = document.getElementById('preview');
            var imgProfilInput = document.getElementById('imgProfil');
            var file = imgProfilInput.files[0];
            var reader = new FileReader();

            reader.onloadend = function() {
                preview.src = reader.result;
            };

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = '{{ Auth::user()->gambar ? (Str::startsWith(Auth::user()->gambar, ["http://", "https://"]) ? Auth::user()->gambar : "imgprofil/" . Auth::user()->gambar) : "img/imgProfile/profile.png" }}';
            }
        }

        // Toggle password visibilities
        const setupPasswordToggle = (inputId, toggleId) => {
            const input = document.getElementById(inputId);
            const toggle = document.getElementById(toggleId);
            
            toggle.addEventListener("click", function() {
                const type = input.type === "password" ? "text" : "password";
                input.type = type;
                if (type === 'text') {
                    toggle.classList.remove("bi-eye");
                    toggle.classList.add("bi-eye-slash");
                } else {
                    toggle.classList.remove("bi-eye-slash");
                    toggle.classList.add("bi-eye");
                }
            });
        };

        if (document.getElementById("pwlama")) {
            setupPasswordToggle("pwlama", "togglepwLama");
            setupPasswordToggle("pwbaru", "togglepwBaru");
            setupPasswordToggle("confirmpw", "togglepwConfirm");
        }
    </script>
</body>

</html>
