@extends('layouts.admin.app')

@section('styles')
    <link rel="shortcut icon" type="image/png" href="{{ asset('admin') }}/dist/images/logos/favicon.ico" />
    <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet'>
    <!-- --------------------------------------------------- -->
    <style>
        * {
            font-family: 'Ubuntu';
        }

        .published {
            color: rgb(0, 192, 0);
            /* Warna font hijau untuk status publish */
        }

        .unpublished {
            color: red;
            /* Warna font merah untuk status unpublish */
        }

        .btn.disabled {
            background-color: black;
            /* Warna latar belakang hitam saat dinonaktifkan */
            color: white;
            /* Warna teks putih saat dinonaktifkan */
            cursor: not-allowed;
            /* Mengubah kursor menjadi not-allowed saat dinonaktifkan */
        }

        .bi::before,
        [class*=" bi-"]::before {
            line-height: 2;
            vertical-align: -0.2215em;
        }

        .btn.disabled {
            background: #5c5c5c !important;
            color: white !important;
        }

        #btn-add {
            background: #FFAE1F;
            color: white;
        }
    </style>
    <!-- --------------------------------------------------- -->
    <link id="themeColors" rel="stylesheet" href="{{ asset('admin') }}/dist/css/style.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@endsection

@section('content')
    <div class="widget-content searchable-container list">
        <!-- --------------------- start Contact ---------------- -->
        @if (count($kategoris) > 0)
            <div class="card card-body px-4 p-2 mb-3">
                <div class="row">
                    <div class="col-md-4 col-xl-3 my-auto">
                        <h4 class="my-auto fw-bolder" style="font-size: 18px">Daftar Kategori</h4>
                    </div>
                    <div
                        class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">

                        <a data-bs-toggle="modal" data-bs-target="#create" id="btn-add-contact"
                            class="btn btn-warning d-flex align-items-center" style="padding: 7px 16px 7px 10px;">
                            <i class="bi bi-plus fs-5"></i>Tambah
                        </a>
                    </div>
                </div>
            </div>
            <!-- ---------------------
                                                                            end Contact
                                                                            ---------------- -->
            <!-- Modal -->

            <div class="card card-body">
                <div class="table-responsive">
                    <table class="table search-table align-middle text-nowrap">
                        <thead class="header-item text-center">
                            <th class="w-0">No.</th>
                            <th>Nama Kategori</th>
                            <th>Status</th>
                            <th class="text-center justify-content-center">Aksi</th>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($kategoris as $items)
                                <tr>
                                    <td class="w-0">{{ $loop->iteration }}</td>
                                    <td>{{ $items->kategori }}</td>
                                    <td><span
                                            class="usr-status-kost {{ $items->is_publish ? 'published' : 'unpublished' }}">
                                            {{ $items->is_publish ? 'Publish' : 'Unpublish' }}</span>
                                    </td>
                                    <td class="px-0">
                                        <div class="action-btn d-flex justify-content-center">
                                                <button class="ms-0 btn btn-outline-danger ms-2" data-bs-toggle="modal" data-bs-target="#modaldelete-{{ $items->id }}">
                                                    <i class="ti ti-trash fs-5"></i>
                                                </button>
                                            <button type="button" class="btn btn-outline-warning ms-1"
                                                style="padding: 0px 18px;" data-bs-toggle="modal"
                                                data-bs-target="#edit-{{ $items->id }}"><i
                                                    class="bi bi-pencil-square"></i></button>
                                        </div>

                                        <div class="modal fade text-start" id="edit-{{ $items->id }}"
                                            data-bs-backdrop="static" tabindex="-1" data-bs-keyboard="false">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content px-3">
                                                    <div class="modal-header d-flex align-items-center">
                                                        <h5 class="modal-title">Edit</h5>
                                                    </div>
                                                    <form action="{{ route('kategori.update', $items->id) }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        @method('put')
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class=" contact-name">
                                                                    <label for="">Nama Kategori</label><span
                                                                        class="text-danger">*</span>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Ketik..." name="kategori"
                                                                        value="{{ $items->kategori }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class=" contact-name">
                                                                    <label for="">Status</label><span
                                                                        class="text-danger">*</span>
                                                                    <select name="is_publish" class="form-select"
                                                                        x-model="status">
                                                                        <option value="1"
                                                                            {{ $items->is_publish == 1 ? 'selected' : '' }}>
                                                                            Publish</option>
                                                                        <option value="0"
                                                                            {{ $items->is_publish == 0 ? 'selected' : '' }}>
                                                                            Unpublish</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn rounded-2 px-3"
                                                                style="background: #5c5c5c; color: white;"
                                                                data-bs-dismiss="modal">Batal</button>
                                                            <button type="submit" id="btn-add"
                                                                class="rounded-2 px-3 btn btn-warning border-0"
                                                                :class="kategori ? null : 'disabled'">Tambah</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="justify-content-center">
                    <div class="text-center">
                        <img src="img/empty-banner.png" width="300" style="margin-top: 120px; opacity: 0.5;"><br>
                        <h6 class="fw-medium">Belum Ada Banner!</h6>
                        <a data-bs-toggle="modal" data-bs-target="#create" id="btn-add-contact"
                            class="btn btn-warning justify-content-center mt-1 align-items-center"
                            style="padding: 7px 16px 7px 10px;">
                            <i class="bi bi-plus fs-5" style="vertical-align: -0.1em;"></i>Tambah
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <div class="modal fade" id="create" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" x-data="{ kategori: '', status: 'Unpublish', }">
            <div class="modal-content px-2">
                <div class="modal-header d-flex align-items-center">
                    <h5 class="modal-title">Tambah Kategori</h5>
                </div>
                <div class="modal-body">
                    <div class="add-contact-box">
                        <div class="add-contact-content">
                            <form action="{{ route('kategori.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class=" contact-name">
                                            <label for="">Nama Kategori</label><span class="text-danger">*</span>
                                            <input type="text" class="form-control" placeholder="Ketik..."
                                                name="kategori" x-model="kategori" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class=" contact-name">
                                            <label for="">Status</label><span class="text-danger">*</span>
                                            <select name="is_publish" class="form-select" x-model="status">
                                                <option value="0" selected>Unpublish</option>
                                                <option value="1">Publish</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn rounded-2 px-3"
                                        style="background: #5c5c5c; color: white;" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" id="btn-add" class="rounded-2 px-3 btn btn-warning border-0"
                                        :class="kategori && status ? null : 'disabled'">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach ($kategoris as $item)
        <div class="modal bg-modal fade" id="modaldelete-{{ $item->id }}" tabindex="-1" aria-labelledby="logoutLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered  container">
                <div class="modal-content logout rounded-5">
                    <div class="modal-header border-bottom-0 text-center d-block pb-0">
                        <h1 class="modal-title fs-5" id="logoutLabel">Apakah Anda Yakin Ingin Menghapus Kategori Ini?</h1>
                    </div>
                    <div class="modal-footer border-top-0 justify-content-center gap-2">
                        <form action="{{ route('kategori.destroy', $item->id) }}" enctype="multipart/form-data"
                            method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn bg-secondary text-white px-3 py-2"
                                style="width: 72.53px">Iya</button>
                        </form>
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

    <script>
        function previewImage() {
            var imgProfil = document.getElementById('gambar');
            var preview = document.getElementById('preview');

            if (imgProfil.files && imgProfil.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }

                reader.readAsDataURL(imgProfil.files[0]);
            }
        }
    </script>
@endpush
