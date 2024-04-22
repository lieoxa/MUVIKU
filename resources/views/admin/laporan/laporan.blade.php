@extends('layouts.admin.app')

@section('styles')
    <link rel="shortcut icon" type="image/png" href="{{ asset('admin') }}/dist/images/logos/favicon.ico" />
    <link rel="stylesheet" href="{{ asset('admin') }}/dist/libs/bootstrap-table/dist/bootstrap-table.min.css">
    <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet'>
    <!-- --------------------------------------------------- -->
    <style>
        * {
            font-family: 'Ubuntu';
        }
        p {
            margin-bottom: 0px;
        }
    </style>
    <!-- --------------------------------------------------- -->
    <link id="themeColors" rel="stylesheet" href="{{ asset('admin') }}/dist/css/style.min.css" />
@endsection

@section('content')
    <div class="widget-content searchable-container list">
        @if (count($laporans) > 0)
            <ul class="nav nav-pills p-3 mb-3 rounded align-items-center card flex-row px-4">
                <div class="my-auto">
                    <h4 class="card-title mb-0 fw-bolder">Tabel Laporan</h4>
                </div>
            </ul>
            <div class="tab-content">
                <div id="note-full-container" class="note-has-grid row">
                    @foreach ($laporans as $items)
                        <div class="col-md-4 single-note-item all-category">
                            <div class="card card-body" style="height: 236.8px; margin-bottom: 24px;">
                                <span class="side-stick"></span>
                                <div class="d-flex justify-content-between mb-2">
                                    <div class="div">
                                        <p class="note-date my-auto fs-2">{{ $items->name }}</p>
                                        <h6>{{ $items->lokasi }}</h6>
                                    </div>
                                    <form action="{{ route('laporan.destroy', $items->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="bg-transparent border-0 text-danger px-2 py-1 ms-auto"
                                            style="font-size: 13px; text-decoration: underline;">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                                <div class="note-content">
                                    <p class="note-inner-content mb-0"
                                        data-noteContent="Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis.">
                                        {{ $items->laporan }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <div class="justify-content-center">
                <div class="text-center">
                    <img src="img/empty-banner.png" width="300" style="margin-top: 120px; opacity: 0.5;"><br>
                    <h6 class="fw-medium">Belum Ada Laporan!</h6>
                </div>
            </div>
        @endif
    </div>
    <!-- Modal Add notes -->
@endsection
@push('scripts')
    <script src="{{ asset('admin') }}/dist/js/apps/notes.js"></script>
@endpush
