<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <div class="mx-auto">
                <a href="../admin/dashboard" class="text-nowrap logo-img">
                    <img src="{{ asset('img') }}/muviku-dark.png" class="logo-muviku fw-bolder" width="130">
                    {{-- <img src="{{ asset('admin') }}/dist/images/logos/dark-logo.svg" class="dark-logo" width="180"
                        alt="" /> --}}
                    {{-- <img src="{{ asset('admin') }}/dist/images/logos/light-logo.svg" class="light-logo" width="180"
                        alt="" /> --}}
                </a>
            </div>
            <div class="close-btn d-lg-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8 text-muted"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar px-2" data-simplebar>
            <ul id="sidebarnav">
                <!-- ============================= -->
                <!-- Home -->
                <!-- ============================= -->
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="/admin/dashboard" aria-expanded="false">
                        <span>
                            <i class="ti ti-clipboard"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <!-- =================== -->
                <!-- Dashboard -->
                <!-- =================== -->
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('user.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-users"></i>
                        </span>
                        <span class="hide-menu">Akun User</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ Request::is('film', 'film/*', 'daftareps', 'daftarseason') ? 'active' : null }}"
                        href="{{ route('film.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-movie"></i>
                        </span>
                        <span class="hide-menu">Film</span>
                    </a>
                </li>
                {{-- <li class="sidebar-item">
                    <a class="sidebar-link {{ Request::is('serial', 'serial/*') ? 'active' : null }}" href="{{ route('serial.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-brand-youtube"></i>
                        </span>
                        <span class="hide-menu">Serial</span>
                    </a>
                </li> --}}
                <li class="sidebar-item">
                    <a class="sidebar-link {{ Request::is('broadcast', 'broadcast/*') ? 'active' : null }}"
                        href="{{ route('broadcast.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-broadcast"></i>
                        </span>
                        <span class="hide-menu">Podcast</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ Request::is('banner', 'banner/*') ? 'active' : null }}" href="{{ route('banner.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-badge-ad"></i>
                        </span>
                        <span class="hide-menu">Banner</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ Request::is('rekomendasi', 'rekomendasi/*') ? 'active' : null }}" href="{{ route('rekomendasi.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-photo-search"></i>
                        </span>
                        <span class="hide-menu">Rekomendasi</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link {{ Request::is('laporan', 'laporan/*') ? 'active' : null }}" href="{{ route('laporan.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-clipboard-text"></i>
                        </span>
                        <span class="hide-menu">Laporan</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('kategori.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-square-plus"></i>
                        </span>
                        <span class="hide-menu">Tambah Kategori</span>
                    </a>
                </li>

            </ul>
        </nav>
        <div class="fixed-profile p-3 bg-light-secondary rounded sidebar-ad mt-3">
            <div class="hstack gap-3">
                <div class="john-img">
                    <img src="{{ asset('admin') }}/dist/images/profile/user-1.jpg" class="rounded-circle" width="40"
                        height="40" alt="">
                </div>
                <div class="john-title">
                    <h6 class="mb-0 fs-4 fw-semibold">Mathew</h6>
                    <span class="fs-2 text-dark">Designer</span>
                </div>
                <button class="border-0 bg-transparent text-primary ms-auto" tabindex="0" type="button"
                    aria-label="logout" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="logout">
                    <i class="ti ti-power fs-6"></i>
                </button>
            </div>
        </div>
        <!-- End Sidebar navigation -->
    </div>
</aside>
