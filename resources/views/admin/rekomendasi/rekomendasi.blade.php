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
        @if (count($rekomendasis) > 0)
            <div class="card card-body px-4 p-2 mb-3">
                <div class="row">
                    <div class="col-md-4 col-xl-3 my-auto">
                        <h4 class="my-auto fw-bolder" style="font-size: 18px">Daftar</h4>
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

            <div class="card card-body">
                <div class="table-responsive">
                    <table class="table search-table align-middle text-nowrap">
                        <thead class="header-item">
                            {{-- <th>
                        <div class="n-chk align-self-center text-center">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input primary" id="contact-check-all" />
                                <label class="form-check-label" for="contact-check-all"></label>
                                <span class="new-control-indicator"></span>
                            </div>
                        </div>
                    </th> --}}
                            <th class="w-0">No.</th>
                            <th>Gambar</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Tgl. Publish</th>
                            <th>Jam Publish</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @foreach ($rekomendasis as $items)
                                <tr>
                                    <td class="w-0">{{ $items->id }}</td>
                                    <td><img src="{{ asset('imgdb/' . $items->gambar) }}" alt="" width="120"
                                            height="60" class="rounded"></td>
                                    <td>{{ $items->judul }}</td>
                                    <td>{{ $items->deskripsi }}</td>
                                    <td>{{ $items->tgl }}</td>
                                    <td>{{ $items->jam }}</td>
                                    <td>{{ $items->status }}</td>
                                    <td>
                                        <span
                                            class="usr-status-kost @if ($items->status == 'Publish') published @else Unpublish @endif">{{ $items->status }}</span>
                                    </td>
                                    <td class="px-0">
                                        <div class="action-btn d-flex">
                                            <form action="{{ route('rekomendasi.destroy', $items->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button class="ms-0 btn btn-outline-danger ms-2">
                                                    <i class="ti ti-trash fs-5"></i>
                                                </button>
                                            </form>
                                            <button type="button" class="btn btn-outline-warning ms-1"
                                                style="padding: 0px 18px;" data-bs-toggle="modal"
                                                data-bs-target="#edit-{{ $items->id }}"><i
                                                    class="bi bi-pencil-square"></i></button>
                                        </div>

                                        <div class="modal fade" id="edit-{{ $items->id }}" data-bs-backdrop="static"
                                            tabindex="-1" data-bs-keyboard="false">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content px-3">
                                                    <div class="modal-header d-flex align-items-center">
                                                        <h5 class="modal-title">Edit</h5>
                                                    </div>
                                                    <form action="{{ route('rekomendasi.update', $items->id) }}"
                                                        class="row" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('put')
                                                        <div class="modal-body">
                                                            <div class="add-contact-box">
                                                                <div class="add-contact-content">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="mb-3 contact-email">
                                                                                <label for="">
                                                                                    <h6>Judul
                                                                                    </h6>
                                                                                </label>
                                                                                <input name="judul" id="judul"
                                                                                    type="text" class="form-control"
                                                                                    value="{{ $items->judul }}"
                                                                                    placeholder="Ketik...">
                                                                                @error('judul')
                                                                                    {{ $message }}
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="mb-3 contact-phone">
                                                                                <label for="">
                                                                                    <h6>Tanggal Publish
                                                                                    </h6>
                                                                                </label>
                                                                                <input name="tgl" id="tgl"
                                                                                    type="date" class="form-control"
                                                                                    value="{{ $items->tgl }}">
                                                                                @error('tgl')
                                                                                    {{ $message }}
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="mb-3 contact-location">
                                                                                <label for="">
                                                                                    <h6>Jam Publish
                                                                                    </h6>
                                                                                </label>
                                                                                <input name="jam" id="jam"
                                                                                    type="time" class="form-control"
                                                                                    value="{{ $items->jam }}">
                                                                                @error('jam')
                                                                                    {{ $message }}
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="mb-3 contact-occupation">
                                                                                <label for="">
                                                                                    <h6>Status
                                                                                    </h6>
                                                                                </label>
                                                                                <select name="status"
                                                                                    class="form-select mr-sm-2"
                                                                                    id="status">
                                                                                    <option selected>Pilih...</option>
                                                                                    <option value="Publish"
                                                                                        {{ $items->status == 'Publish' ? 'selected' : '' }}>
                                                                                        Publish</option>
                                                                                    <option value="Unpublish"
                                                                                        {{ $items->status == 'Unpublish' ? 'selected' : '' }}>
                                                                                        Unpublish</option>
                                                                                    @error('status')
                                                                                        {{ $message }}
                                                                                    @enderror
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="mb-3 contact-name">
                                                                                <label for="">
                                                                                    <h6>Gambar
                                                                                    </h6>
                                                                                </label>
                                                                                <input name="gambar" id="gambar"
                                                                                    type="file"
                                                                                    value="{{ $items->gambar }}"
                                                                                    class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="mb-3 contact-occupation">
                                                                                <label for="">
                                                                                    <h6>Deksripsi
                                                                                    </h6>
                                                                                </label>
                                                                                <textarea class="d-block rounded px-2" name="deskripsi" id="" cols="141"
                                                                                    style="height: 250px; resize: none;">{{ $items->deskripsi }}</textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="rounded-2">
                                                            <img src="{{ asset('imgdb/' . $items->gambar) }}"
                                                                alt="" width="100%" height="200"
                                                                class="rounded-1"
                                                                style="border-radius: 0.5rem !important;">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="#" class="btn rounded-2 px-3"
                                                                data-bs-dismiss="modal"
                                                                style="background: #838383; color: white;">Batal</a>
                                                            <button type="submit" class="btn rounded-2 px-3"
                                                                style="background: #838383; color: white;">Simpan</button>
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
            </div>
        @else
            <div class="justify-content-center">
                <div class="text-center">
                    <img src="img/empty-banner.png" width="300" style="margin-top: 120px; opacity: 0.5;"><br>
                    <h6 class="fw-medium">Belum Ada !</h6>
                    <a data-bs-toggle="modal" data-bs-target="#create" id="btn-add-contact"
                        class="btn btn-warning justify-content-center mt-1 align-items-center"
                        style="padding: 7px 16px 7px 10px;">
                        <i class="bi bi-plus fs-5" style="vertical-align: -0.1em;"></i>Tambah
                    </a>
                </div>
            </div>
        @endif
    </div>
    <div class="modal fade" id="create" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" x-data="{ judul: '', gambar: '', tgl: '', jam: '', deskripsi: '', status: '' }">
            <form action="{{ route('rekomendasi.store') }}" class="row" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-content px-2">
                    <div class="modal-header d-flex align-items-center">
                        <h5 class="modal-title">Tambah</h5>
                    </div>
                    <div class="modal-body">
                        <div class="add-contact-box">
                            <div class="add-contact-content">
                                <form id="addContactModalTitle">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="col-md-12">
                                                <div class="mb-3 contact-email">
                                                    <label for="">
                                                        <h6>Judul <span class="text-danger">*</span></h6>
                                                    </label>
                                                    <input name="judul" id="judul" type="text" x-model="judul"
                                                        class="form-control input-with-bg required"
                                                        placeholder="Ketik...">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3 contact-location">
                                                    <label for="">
                                                        <h6>Jam Publish <span class="text-danger">*</span></h6>
                                                    </label>
                                                    <input name="jam" id="jam" x-model="jam" type="time"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3 contact-name">
                                                    <label for="">
                                                        <h6>Gambar <span class="text-danger">*</span></h6>
                                                    </label>
                                                    <input name="gambar" id="gambar" type="file"
                                                        class="form-control" x-model="gambar" onchange="previewImage()">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="col-md-12">
                                                <div class="mb-3 contact-phone">
                                                    <label for="">
                                                        <h6>Tanggal Publish <span class="text-danger">*</span></h6>
                                                    </label>
                                                    <input name="tgl" id="tgl" type="date"
                                                        class="form-control" x-model="tgl">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3 contact-occupation">
                                                    <label for="">
                                                        <h6>Lokasi <span class="text-danger">*</span></h6>
                                                    </label>
                                                    <textarea class="d-block rounded px-2" name="deskripsi" id="" cols="141"
                                                        style="height: 250px; resize: none;"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3 contact-occupation">
                                                    <label for="">
                                                        <h6>Status <span class="text-danger">*</span></h6>
                                                    </label>
                                                    <select name="status" class="form-select mr-sm-2" x-model="status"
                                                        id="status">
                                                        <option value="Unpublish">Unpublish</option>
                                                        <option value="Publish">Publish</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="img-profil mb-2">
                                        <img class="mx-auto rounded" id="preview" src="#" alt="Preview"
                                            width="100%" height="200" style="display: none;">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        {{-- <button class="btn btn-danger rounded-2 px-3" :class="name ? 'disabled' : null"
                            data-bs-dismiss="modal">Batal</button> --}}
                        <button type="button" class="btn rounded-2 px-3" style="background: #5c5c5c; color: white;"
                            data-bs-dismiss="modal">Batal</button>
                        <button type="submit" id="btn-add" class="rounded-2 px-3 btn btn-warning border-0"
                            :class="nama && gambar && tgl && jam && deskripsi && status ? null : 'disabled'">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('admin') }}/dist/libs/jquery/dist/jquery.min.js"></script>
    <script src="{{ asset('admin') }}/dist/libs/simplebar/dist/simplebar.min.js"></script>
    <script src="{{ asset('admin') }}/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('admin') }}/dist/js/app.min.js"></script>
    <script src="{{ asset('admin') }}/dist/js/app.init.js"></script>
    <script src="{{ asset('admin') }}/dist/js/app-style-switcher.js"></script>
    <script src="{{ asset('admin') }}/dist/js/sidebarmenu.js"></script>

    <script src="{{ asset('admin') }}/dist/js/custom.js"></script>

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