@extends('layouts.admin.app')

@section('styles')
    <link rel="shortcut icon" type="image/png" href="{{ asset('admin') }}/dist/images/logos/favicon.ico" />
    <!-- --------------------------------------------------- -->

    <!-- --------------------------------------------------- -->
    <link id="themeColors" rel="stylesheet" href="{{ asset('admin') }}/dist/css/style.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@endsection

@section('content')
    <div class="widget-content searchable-container list">
        <!-- --------------------- start Contact ---------------- -->
        @if (count($users) > 0)
            <div class="card card-body px-4 p-2 mb-0 rounded-bottom-0">
                <div class="row">
                    <div class="col-md-4 col-xl-3 my-auto">
                        <h4 class="my-auto fw-bolder" style="font-size: 18px">Daftar Akun User</h4>
                    </div>
                    <div
                        class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                        <form class="position-relative">
                            <input type="text" class="form-control product-search ps-5" id="input-search"
                                placeholder="Cari nama user..." />
                            <i
                                class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card card-body rounded-top-0">
                <div class="table-responsive">
                    <table class="table search-table align-middle text-nowrap">
                        <thead class="header-item text-center">
                            <th>No.</th>
                            <th></th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No. Tlpn</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($users as $useracc)
                                <tr>
                                    <td>{{ $useracc->id }}</td>
                                    <td>
                                        <div class=" justify-content-center">
                                            <img src="{{ asset($useracc->gambar ? 'imgprofil/' . $useracc->gambar : 'img/imgProfile/profile.png') }}"
                                                class="rounded-circle" width="35" height="35" />
                                        </div>
                                    </td>
                                    <td>{{ $useracc->name }}</td>
                                    <td>{{ $useracc->email }}</td>
                                    <td>{{ $useracc->nohp }}</td>
                                    <td>{{ $useracc->status == 'block' ? 'Diblokir' : $useracc->statuss }}</td>
                                    <td class="px-0">
                                        <div class="action-btn d-flex justify-content-center">
                                            <form action="{{ route('user.destroy', $useracc->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button class="ms-0 btn btn-outline-danger ms-2">
                                                    <i class="ti ti-trash fs-5"></i>
                                                </button>
                                            </form>
                                            @if ($useracc->status == 'block')
                                                <button class="btn btn-danger ms-1" style="padding: 7px 18px"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#switchstatuss-{{ $useracc->id }}">
                                                    <i class="ti ti-lock-open"></i>
                                                </button>
                                            @else
                                                <button class="btn btn-danger ms-1" style="padding: 7px 18px"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#switchstatus-{{ $useracc->id }}">
                                                    <i class="ti ti-lock"></i>
                                                </button>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            <!-- start row -->
                        </tbody>
                    </table>
                </div>
            @else
                <div class="justify-content-center">
                    <div class="text-center">
                        <img src="img/empty-banner.png" width="300" style="margin-top: 120px; opacity: 0.5;"><br>
                        <h6 class="fw-medium">Belum Ada User!</h6>
                    </div>
                </div>
            </div>
        @endif
    </div>
    @foreach ($users as $user)
        <div class="modal bg-modal fade" id="switchstatus-{{ $user->id }}" tabindex="-1" aria-labelledby="logoutLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered container">
                <form action="/switchstatus/{{ $user->id }}" class="w-100" enctype="multipart/form-data"
                    method="POST">
                    @csrf
                    <div class="modal-content logout rounded-5">
                        <div class="modal-header border-bottom-0 text-center d-block pb-0">
                            <h1 class="modal-title fs-5" id="logoutLabel">Anda Yakin Ingin Mem block?</h1>
                        </div>
                        <div class="modal-footer border-top-0 justify-content-center gap-2">
                            <button type="submit" class="btn bg-secondary text-white px-3 py-2"
                                style="width: 72.53px">Iya</button>
                            <button type="button" class="btn btn-danger py-2 px-3" data-bs-dismiss="modal">Tidak</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal bg-modal fade" id="switchstatuss-{{ $user->id }}" tabindex="-1" aria-labelledby="logoutLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered container">
                <form action="/switchstatuss/{{ $user->id }}" class="w-100" enctype="multipart/form-data"
                    method="POST">
                    @csrf
                    <div class="modal-content logout rounded-5">
                        <div class="modal-header border-bottom-0 text-center d-block pb-0">
                            <h1 class="modal-title fs-5" id="logoutLabel">Anda Yakin Ingin Me unblock?</h1>
                        </div>
                        <div class="modal-footer border-top-0 justify-content-center gap-2">
                            <button type="submit" class="btn bg-secondary text-white px-3 py-2"
                                style="width: 72.53px">Iya</button>
                            <button type="button" class="btn btn-danger py-2 px-3" data-bs-dismiss="modal">Tidak</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
@endsection

@push('scripts')
    <script src="{{ asset('admin') }}/dist/js/apps/contact.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script>
        $(document).ready(function() {
            $('#input-search').on('keyup', function() {
                var searchText = $(this).val().toLowerCase();
                $('.search-table tbody tr').each(function() {
                    var nama = $(this).find('td:nth-child(3)').text().toLowerCase();
                    if (nama.includes(searchText)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
        });
    </script>
@endpush
