@extends('layouts.admin.app')

@section('styles')
    <link rel="shortcut icon" type="image/png" href="{{ asset('admin') }}/dist/images/logos/favicon.ico" />
    <link rel="stylesheet" href="{{ asset('admin') }}/dist/libs/bootstrap-table/dist/bootstrap-table.min.css">
    <!-- --------------------------------------------------- -->
    <style>
        * {
            font-family: 'Ubuntu';
        }

        .btn.disabled {
            background-color: black !important;
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
    <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet'>
@endsection

@section('content')
    <div class="widget-content searchable-container list">
        <!-- --------------------- start Contact ---------------- -->
        <div class="card card-body px-4 p-2 mb-3">
            <div class="row">
                <div class="col-md-4 col-xl-3 my-auto">
                    <h4 class="my-auto fw-bolder" style="font-size: 18px">Tambah Film</h4>
                </div>
                <div class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                    <a href="{{ route('film.index') }}" class="btn btn-warning d-flex align-items-center"
                        style="padding: 7px 16px 7px 8px;">
                        <i class="ti ti-chevron-left fs-6 me-1"></i>Daftar Film
                    </a>
                </div>
            </div>
        </div>
        <!-- ---------------------
                                                                                                                end Contact
                                                                                                            ---------------- -->
        <!-- Modal -->
        <div x-data="{ judul: '', tahun: '', usia: '', perusahaan: '', sutradara: '', kategori: '', thumbnail: '', status: 'Unpublish', deskripsi: '', durasi: '', tipe: '', video: '', }">
            <form action="{{ route('film.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row d-flex">
                    <div class="col-md-12 mb-3" id="judul">
                        <label class="form-label">Judul<span class="text-danger">*</span></label>
                        <input required type="text" name="judul" class="form-control" placeholder="Ketik di sini..."
                            x-model="judul">
                    </div>
                    {{-- </div> --}}
                    {{-- <div class="row mb-3"> --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tipe<span class="text-danger">*</span></label>
                        <select name="tipe" class="form-select mr-sm-2" id="tipe" x-model="tipe">
                            <option selected>Pilih...</option>
                            <option value="Serial">Serial</option>
                            <option value="Film">FIlm</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tahun Release<span class="text-danger">*</span></label>
                        <input required type="number" name="tahun" min="1000" max="3000" step="1" value=""
                            class="d-block form-control" x-model="tahun">
                    </div>
                    {{-- </div> --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Perusahaan Produksi<span class="text-danger">*</span></label>
                        <input required type="Text" name="perusahaan" class="form-control" placeholder="Ketik di sini..."
                            x-model="perusahaan">
                    </div>
                    <div class="col-md-6 mb-3" id="video">
                        <label class="form-label">Video<span class="text-danger">*</span></label>
                        <input required type="url" name="video" class="d-block form-control" x-model="video">
                    </div>
                    {{-- <div class="row mb-3"> --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Sutradara<span class="text-danger">*</span></label>
                        <input required type="text" name="sutradara" class="form-control" placeholder="Ketik di sini..."
                            x-model="sutradara">
                    </div>
                    <div class="col-md-6 mb-3" id="kategori">
                        <label class="form-label">Kategori<span class="text-danger">*</span></label>
                        <select name="kategori_id" class="form-select mr-sm-2" x-model="kategori">
                            <option value="">Pilih...</option>
                            @foreach ($categories as $categorie)
                                <option value="{{ $categorie->id }}">{{ $categorie->kategori }}</option>
                            @endforeach
                            @error('kategori_id')
                                {{ $message }}
                            @enderror
                        </select>
                    </div>
                    {{-- </div> --}}
                    {{-- <div class="row mb-3"> --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Durasi/Season<span class="text-danger">*</span></label>
                        <input required type="Text" name="durasi" class="form-control" placeholder="Ketik di sini..."
                            x-model="durasi">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Rating Usia<span class="text-danger">*</span></label>
                        <select name="usia" class="form-select mr-sm-2" x-model="usia">
                            <option value="">Pilih...</option>
                            <option value="SU">SU</option>
                            <option value="13+">13+</option>
                            <option value="17+">17+</option>
                            <option value="21+">21+</option>
                        </select>
                    </div>
                    {{-- </div> --}}
                    {{-- <div class="row mb-3"> --}}
                    <div class="col-6">
                        <label class="form-label">Thumbnail Film<span class="text-danger">*</span></label>
                        <input required name="thumbnail" id="thumbnail" type="file" class="form-control" x-model="thumbnail"
                            onchange="previewImage()">
                        <div class="img-profil mb-2">
                            <img class="mt-3 rounded" id="preview" src="#" alt="Preview" width="80"
                                height="120" style="display: none;">
                        </div>
                    </div>
                    <div class="col-6">
                        <label class="form-label">Status<span class="text-danger" x-model="status">*</span></label>
                        <select name="is_publish" class="form-select mr-sm-2" required>
                            <option value="1">Publish</option>
                            <option value="0" selected>Unpublish</option>
                        </select>
                    </div>
                    {{-- </div> --}}
                </div>
                <div class="row mb-3">
                    <div class="col-md-12 mb-3">
                        <label class="d-block form-label">Deskripsi Film<span class="text-danger">*</span></label>
                        <textarea class="d-block rounded px-2" name="deskripsi" id="" cols="141"
                            style="height: 250px; resize: none;" x-model="deskripsi" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btn-add" class="btn rounded-2 px-3"
                        :class="judul && tahun && usia && perusahaan && sutradara && durasi && status &&
                            thumbnail && deskripsi && kategori || tipe || video ? null : 'disabled'">Tambah</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://unpkg.com/tableexport.jquery.plugin/tableExport.min.js"></script>
    <script src="{{ asset('admin') }}/dist/libs/bootstrap-table/dist/bootstrap-table.min.js"></script>
    <script src="{{ asset('admin') }}/dist/js/plugins/tables/bootstrap-table.init.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var tipeSelect = document.getElementById('tipe');
            var videoField = document.getElementById('video');
            var kategoriField = document.getElementById('kategori');

            videoField.style.display = 'block';
            kategoriField.style.display = 'block';

            tipeSelect.addEventListener('change', function() {
                if (tipeSelect.value === 'Film') {
                    videoField.style.display = 'block';
                    kategoriField.style.display = 'block';
                } else {

                    videoField.style.display = 'none';
                    kategoriField.style.display = 'none';
                }
            });
        });
    </script>
    <script>
        function previewImage() {
            var imgProfil = document.getElementById('thumbnail');
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
