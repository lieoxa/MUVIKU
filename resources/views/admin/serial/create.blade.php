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
                    <h4 class="my-auto fw-bolder" style="font-size: 18px">Tambah Serial</h4>
                </div>
                <div class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                    <a href="{{ route('serial.index') }}" class="btn btn-warning d-flex align-items-center"
                        style="padding: 7px 16px 7px 8px;">
                        <i class="ti ti-chevron-left fs-6 me-1"></i>Daftar Serial
                    </a>
                </div>
            </div>
        </div>

        <div x-data="{ judul: '', tahun: '', usia: '', season: '', perusahaan: '', sutradara: '',  thumbnail: '', status: 'Unpublish', video: '', deskripsi: '', }">
            <form action="{{ route('serial.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label class="form-label">Judul<span class="text-danger">*</span></label>
                        <input type="text" name="judul" class="form-control" placeholder="Ketik di sini..."
                            x-model="judul">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Tahun Release<span class="text-danger">*</span></label>
                        <input type="number" name="tahun" min="1000" max="3000" step="1" value=""
                            class="d-block form-control" x-model="tahun">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Rating Usia<span class="text-danger">*</span></label>
                        <select name="usia" class="form-select mr-sm-2" x-model="usia">
                            <option value="">Pilih...</option>
                            <option value="SU">SU</option>
                            <option value="13+">13+</option>
                            <option value="17+">17+</option>
                            <option value="21+">21+</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Season<span class="text-danger">*</span></label>
                        <input type="number" name="season" class="form-control" x-model="season">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Perusahaan Produksi<span class="text-danger">*</span></label>
                        <input type="Text" name="perusahaan" class="form-control" placeholder="Ketik di sini..."
                            x-model="perusahaan">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Sutradara<span class="text-danger">*</span></label>
                        <input type="text" name="sutradara" class="form-control" placeholder="Ketik di sini..."
                            x-model="sutradara">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Status<span class="text-danger" x-model="status">*</span></label>
                        <select name="status" class="form-select mr-sm-2" x-model="status">
                            <option value="Publish">Publish</option>
                            <option value="Unpublish">Unpublish</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Thumbnail Serial<span class="text-danger">*</span></label>
                        <input name="thumbnail" id="thumbnail" type="file" class="form-control" x-model="thumbnail"
                            onchange="previewImage()">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Video<span class="text-danger">*</span></label>
                        <input type="url" name="video" class="form-control" x-model="video" placeholder="URL Video...">
                    </div>
                </div>
                <div class="img-profil mb-2">
                    <img class="mt-3 rounded" id="preview" src="#" alt="Preview"
                    width="80" height="120" style="display: none;">
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label class="d-block form-label">Deskripsi Serial<span class="text-danger">*</span></label>
                        <textarea class="d-block rounded px-2" name="deskripsi" id="" cols="141"
                            style="height: 250px; resize: none;" x-model="deskripsi"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btn-add" class="btn rounded-2 px-3"
                        :class="judul && tahun && usia && season && perusahaan && sutradara && status &&
                            thumbnail && video && deskripsi ? null : 'disabled'">Tambah</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('admin') }}/dist/libs/jquery/dist/jquery.min.js"></script>
    <script src="{{ asset('admin') }}/dist/libs/simplebar/dist/simplebar.min.js"></script>
    <script src="{{ asset('admin') }}/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <!-- ---------------------------------------------- -->
    <!-- core files -->
    <!-- ---------------------------------------------- -->
    <script src="{{ asset('admin') }}/dist/js/app.min.js"></script>
    <script src="{{ asset('admin') }}/dist/js/app.init.js"></script>
    <script src="{{ asset('admin') }}/dist/js/app-style-switcher.js"></script>
    <script src="{{ asset('admin') }}/dist/js/sidebarmenu.js"></script>

    <script src="{{ asset('admin') }}/dist/js/custom.js"></script>
    <!-- ---------------------------------------------- -->
    <!-- current page js files -->
    <!-- ---------------------------------------------- -->
    <script src="https://unpkg.com/tableexport.jquery.plugin/tableExport.min.js"></script>
    <script src="{{ asset('admin') }}/dist/libs/bootstrap-table/dist/bootstrap-table.min.js"></script>
    <script src="{{ asset('admin') }}/dist/js/plugins/tables/bootstrap-table.init.js"></script>

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
