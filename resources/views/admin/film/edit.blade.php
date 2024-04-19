@extends('layouts.admin.app')

@section('styles')
    <link rel="shortcut icon" type="image/png" href="{{ asset('admin') }}/dist/images/logos/favicon.ico" />
    <link rel="stylesheet" href="{{ asset('admin') }}/dist/libs/bootstrap-table/dist/bootstrap-table.min.css">
    <!-- --------------------------------------------------- -->
    <!-- Core Css -->
    <!-- --------------------------------------------------- -->
    <link id="themeColors" rel="stylesheet" href="{{ asset('admin') }}/dist/css/style.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet'>
    <style>
        * {
            font-family: 'Ubuntu';
        }
    </style>
@endsection

@section('content')
    <div class="widget-content searchable-container list">
        <!-- --------------------- start Contact ---------------- -->
        <div class="card card-body px-4 p-2 mb-3">
            <div class="row">
                <div class="col-md-4 col-xl-3 my-auto">
                    <h4 class="my-auto fw-bolder" style="font-size: 18px">Edit   Film</h4>
                </div>
                <div class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                    <a href="{{ route('film.index') }}" class="btn btn-warning d-flex align-items-center"
                        style="padding: 7px 16px 7px 8px;">
                        <i class="ti ti-chevron-left fs-6 me-1"></i>Daftar Film
                    </a>
                </div>
            </div>
        </div>
    
        
        <form action="{{ route('film.update', $films->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Judul<span class="text-danger">*</span></label>
                    <input type="text" name="judul" class="form-control" value="{{ $films->judul }}" placeholder="Ketik di sini...">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Tahun Release<span class="text-danger">*</span></label>
                    <input type="number" name="tahun" min="1000" max="3000" step="1" value="{{ $films->tahun }}" class="d-block form-control">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Rating Usia<span class="text-danger">*</span></label>
                    <select name="usia" class="form-select mr-sm-2">
                        <option value="">Pilih...</option>
                        <option value="SU" {{ $films->usia == 'SU' ? 'selected' : '' }}>SU</option>
                        <option value="13+" {{ $films->usia == '13+' ? 'selected' : '' }}>13+</option>
                        <option value="17+" {{ $films->usia == '17+' ? 'selected' : '' }}>17+</option>
                        <option value="21+" {{ $films->usia == '21+' ? 'selected' : '' }}>21+</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Durasi FIlm<span class="text-danger">*</span></label>
                    <input type="time" name="durasi" class="form-control" value="{{ $films->durasi }}">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Perusahaan Produksi<span class="text-danger">*</span></label>
                    <input type="Text" name="perusahaan" class="form-control" placeholder="Ketik di sini..." value="{{ $films->perusahaan }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Sutradara<span class="text-danger">*</span></label>
                    <input type="text" name="sutradara" class="form-control" placeholder="Ketik di sini..." value="{{ $films->sutradara }}">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Kategori<span class="text-danger">*</span></label>
                    <select name="  " class="form-select mr-sm-2" x-model="kategori">
                        <option selected>Pilih...</option>
                        @foreach ($categories as $categorie)
                            <option value="{{ $categorie->id }}"
                                {{ $films->kategori_id == $categorie->id ? 'selected' : '' }}>{{ $categorie->kategori }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Status<span class="text-danger">*</span></label>
                    <select name="status" class="form-select mr-sm-2">
                        <option value="">Pilih...</option>
                        <option value="Publish" {{ $films->status == 'Publish' ? 'selected' : '' }}>Publish</option>
                        <option value="Unpublish" {{ $films->status == 'Unpublish' ? 'selected' : '' }}>Unpublish</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label d-block">Thumbnail Film<span class="text-danger">*</span></label>
                    <input type="file" name="thumbnail" class="form-control" value="{{ $films->thumbnail }}">
                    @if ($imgfilm)
                        
                    <img src="{{ asset('imgdb/' . $imgfilm) }}" alt="" width="80" height="120" class="rounded mt-3">
                    @endif
                </div>
                <div class="col-md-6">
                    <label class="form-label">Video<span class="text-danger">*</span></label>
                    <input type="url" name="video" class="form-control" value="{{ $films->video }}">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <label class="d-block form-label">Deskripsi Film<span class="text-danger">*</span></label>
                    <textarea class="d-block rounded px-2" name="deskripsi" id="" cols="141" style="height: 250px; resize: none;">{{ $films->deskripsi }}</textarea>
                </div>
            </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-warning">Simpan</button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script src="https://unpkg.com/tableexport.jquery.plugin/tableExport.min.js"></script>
    <script src="{{ asset('admin') }}/dist/libs/bootstrap-table/dist/bootstrap-table.min.js"></script>
    <script src="{{ asset('admin') }}/dist/js/plugins/tables/bootstrap-table.init.js"></script>
@endpush
