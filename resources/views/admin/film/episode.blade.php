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

        .columns .columns-right .btn-group .float-right {
            display: none;
        }

        .form-control {
            display: block;
        }

        .published {
            color: rgb(0, 192, 0);
            font-weight: medium;
        }

        .Unpublish {
            color: red;
            font-weight: medium;
        }

        p {
            margin-bottom: 0px;
        }

        .ti-plus:before {
            vertical-align: 0.125rem;
            content: "\eb0b";
        }

        .form-select:focus {
            border-color: none;
            bottom: 0px;
            outline: 0;
            box-shadow: none;
        }

        .form-select:focus,
        .form-control:focus {
            border: 1px solid #dfe5ef;
        }

        .ti.ti-plus {
            line-height: 0px;
            vertical-align: -2px;
        }

        .form-label {
            color: #646464;
        }
    </style>
@endsection

@section('content')
    <div class="widget-content searchable-container list">
        <!-- --------------------- start Contact ---------------- -->
        @if (count($episodes) > 0)
            <div class="card card-body px-4 p-2 mb-3">
                <div class="row">
                    <div class="col-md-4 col-xl-3 my-auto">
                        <h4 class="my-auto fw-medium" style="font-size: 18px">Daftar Episode</h4>
                    </div>
                    <div
                        class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0 gap-1">
                        <a href="{{ route('film.index') }}" class="btn btn-warning d-flex align-items-center"
                            style="padding: 7px 16px 7px 16px;">
                            Daftar Film
                        </a>
                        <a href="/daftarseason" class="btn btn-warning d-flex align-items-center"
                            style="padding: 7px 16px 7px 16px;">
                            Daftar Season
                        </a>
                        <a data-bs-toggle="modal" data-bs-target="#episode"
                            class="btn btn-warning d-flex align-items-center" style="padding: 7px 16px 7px 10px;">
                            <i class="ti ti-plus fs-5"></i>Episode
                        </a>
                    </div>
                </div>
            </div>

            <div class="card card-body">
                <div class="table-responsive">
                    <table class="table search-table align-middle text-nowrap">
                        <thead class="header-item text-center">
                            <th>Season</th>
                            <th>Episode</th>
                            <th>Thumbnail</th>
                            <th>Judul</th>
                            <th>Video</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($episodes as $item)
                                <tr>
                                    <td>{{ $item->season_id }}</td>
                                    <td>{{ $item->episode }}</td>
                                    <td><img src="{{ asset('imgfilm/' . $item->thumbnail) }}" alt="" width="120"
                                            height="60" class="rounded"></td>
                                    <td>{{ $item->judul }}</td>
                                    <td>{{ $item->thumb_eps }}</td>
                                    <td><span
                                            class="usr-status-kost @if ($item->is_publish == 1) published @endif">{{ $item->is_publish ? 'Publish' : 'Unpublish' }}</span>
                                    </td>
                                    <td class="px-0">
                                        <div class="action-btn d-flex justify-content-center">
                                            <form action="{{ route('film.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button class="ms-0 btn btn-outline-danger ms-2">
                                                    <i class="ti ti-trash fs-5"></i>
                                                </button>
                                            </form>
                                            <a data-bs-toggle="modal" data-bs-target="#edit-{{ $item->id }}"
                                                class="btn btn-outline-warning ms-1" style="padding: 7px 18px">
                                                <i class="bi bi-pencil-square"></i></a>
                                            <button href="" class="btn btn-outline-success ms-1"
                                                style="padding: 7px 18px" data-bs-toggle="modal" data-bs-target="#detail">
                                                <i class="bi bi-eye"></i></button>
                                        </div>
                                        {{-- <div class="modal fade text-start" id="edit-{{ $item->id }}"
                                            data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <form action="{{ route('putEps', $item->id) }}" method="POST"
                                                        class="w-100">
                                                        {{ csrf_field() }}
                                                        @method('put')
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit
                                                                Episode</h1>
                                                        </div>
                                                        <div class="modal-body row">
                                                            <div class="col-6 mb-3 ">
                                                                <label class="form-label">Serial<span class="text-danger"
                                                                        x-model="">*</span></label>
                                                                <select name="serial" id="" class="form-select">
                                                                    <option value="">Pilih...</option>
                                                                    @foreach ($films->where('tipe', 'Serial') as $item)
                                                                        <option value="{{ $item->id }}">
                                                                            {{ $item->judul }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-6 mb-3">
                                                                <label for="1" class="form-label">Season<span
                                                                        class="text-danger" x-model="">*</span></label>
                                                                <select name="season_id" id="" class="form-select">
                                                                    <option value="">Pilih...</option>
                                                                    @foreach ($seasons as $item)
                                                                        <option value="{{ $item->id }}">
                                                                            {{ $item->season }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-12">
                                                                <label class="form-label d-block">Episode<span
                                                                        class="text-danger" x-model="">*</span></label>
                                                                <div class="btn-group w-100 mb-2">
                                                                    <button type="button"
                                                                        class="btn btn-light-primary text-primary dropdown-toggle rounded-end-0"
                                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false">
                                                                        Form Episode
                                                                    </button>
                                                                    <div id="rowAdder"><button type="button"
                                                                            class="btn btn-success text-white rounded-start-0"><i
                                                                                class="ti ti-plus"></i></button></div>
                                                                    <div class="dropdown-menu w-100 border"
                                                                        style="padding: 0.5rem 22px;">
                                                                        <div class="py-2">
                                                                            <div class="row">
                                                                                <div class="mb-2 col-6">
                                                                                    <label for="judul-episode"
                                                                                        class="form-label">Judul<span
                                                                                            class="text-danger"
                                                                                            x-model="">*</span></label>
                                                                                    <input type="text" name="judul"
                                                                                        class="form-control"
                                                                                        id="judul-episode"
                                                                                        placeholder="Ketik disini...">
                                                                                </div>
                                                                                <div class="mb-2 col-6">
                                                                                    <label
                                                                                        for="exampleDropdownFormPassword1"
                                                                                        class="form-label">Thumbnail<span
                                                                                            class="text-danger"
                                                                                            x-model="">*</span></label>
                                                                                    <input type="file"
                                                                                        class="form-control"
                                                                                        name="thumb_eps"
                                                                                        id="exampleDropdownFormPassword1">
                                                                                </div>
                                                                                <div class="mb-2 col-6">
                                                                                    <label
                                                                                        for="exampleDropdownFormPassword1"
                                                                                        class="form-label">Video<span
                                                                                            class="text-danger"
                                                                                            x-model="">*</span></label>
                                                                                    <input type="url"
                                                                                        class="form-control"
                                                                                        name="vid_eps"
                                                                                        id="exampleDropdownFormPassword1">
                                                                                </div>
                                                                                <div class="mb-2 col-6">
                                                                                    <label
                                                                                        for="exampleDropdownFormPassword1"
                                                                                        class="form-label">Status<span
                                                                                            class="text-danger"
                                                                                            x-model="">*</span></label>
                                                                                    <select name="is_publish"
                                                                                        class="form-select" required>
                                                                                        <option value="1">Publish
                                                                                        </option>
                                                                                        <option value="0" selected>
                                                                                            Unpublish</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="mb-2 col-12">
                                                                                    <label
                                                                                        for="exampleDropdownFormPassword1"
                                                                                        class="form-label d-block">Deskripsi<span
                                                                                            class="text-danger"
                                                                                            x-model="">*</span></label>
                                                                                    <textarea name="desk_eps" id="" class="d-block form-control py-1 px-2" style="resize: none; height: 85px;"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div id="row">
                                                                    </div>
                                                                    <div id="newinput"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light text-white"
                                                                style="background: #5c5c5c;"
                                                                data-bs-dismiss="modal">Tutup</button>
                                                            <button type="submit" class="btn btn-warning">Tambah</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="card card-body px-4 p-2 mb-3">
                    <div class="row">
                        <div class="col-md-4 col-xl-3 my-auto">
                            <h4 class="my-auto fw-medium" style="font-size: 18px">Daftar Episode</h4>
                        </div>
                        <div
                            class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0 gap-1">
                            <a href="{{ route('film.index') }}" class="btn btn-warning d-flex align-items-center"
                                style="padding: 7px 16px 7px 16px;">
                                Daftar Film
                            </a>
                            <a href="/daftarseason" class="btn btn-warning d-flex align-items-center"
                                style="padding: 7px 16px 7px 16px;">
                                Daftar Season
                            </a>
                            {{-- <a data-bs-toggle="modal" data-bs-target="#episode"
                                class="btn btn-warning d-flex align-items-center" style="padding: 7px 16px 7px 10px;">
                                <i class="ti ti-plus fs-5"></i>Episode
                            </a> --}}
                        </div>
                    </div>
                </div>
                <div class="justify-content-center">
                    <div class="text-center">
                        <img src="img/empty-banner.png" width="300" style="margin-top: 120px; opacity: 0.5;"><br>
                        <h6 class="fw-medium">Belum Ada Episode!</h6>
                        <a data-bs-toggle="modal" data-bs-target="#episode" id="btn-add-contact"
                            class="btn btn-warning justify-content-center mt-1 align-items-center"
                            style="padding: 7px 16px 7px 10px;">
                            <i class="bi bi-plus fs-5" style="vertical-align: -0.1em;"></i>Tambah
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <!-- Modal -->

    <div class="modal fade" id="episode" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('postEps') }}" method="POST" class="w-100">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Episode</h1>
                    </div>
                    <div class="modal-body row">
                        <div class="col-6 mb-3 ">
                            <label class="form-label">Serial<span class="text-danger" x-model="">*</span></label>
                            <select name="serial" id="film" class="form-select">
                                <option value="">Pilih...</option>
                                @foreach ($films->where('tipe', 'Serial') as $item)
                                    <option value="{{ $item->id }}">{{ $item->judul }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="1" class="form-label">Season<span class="text-danger"
                                    x-model="">*</span></label>
                            <select name="season_id" class="form-select" id="season">
                                {{-- <option value="">Pilih...</option>
                                @foreach ($seasons as $item)
                                    <option value="{{ $item->id }}">{{ $item->season }}</option>
                                @endforeach --}}
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Episode<span class="text-danger" x-model="">*</span></label>
                            <div class="btn-group w-100 mb-2">
                                <button type="button"
                                    class="btn btn-light-primary text-primary dropdown-toggle rounded-end-0"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Form Episode
                                </button>
                                <div id="rowAdder"><button type="button"
                                        class="btn btn-success text-white rounded-start-0"><i
                                            class="ti ti-plus"></i></button></div>
                                <div class="dropdown-menu w-100 border" style="padding: 0.5rem 22px;">
                                    <div class="py-2">
                                        <div class="row">
                                            <div class="mb-2 col-6">
                                                <label for="judul-episode" class="form-label">Judul<span
                                                        class="text-danger" x-model="">*</span></label>
                                                <input type="text" name="judul" class="form-control"
                                                    id="judul-episode" placeholder="Ketik disini...">
                                            </div>
                                            <div class="mb-2 col-6">
                                                <label for="exampleDropdownFormPassword1"
                                                    class="form-label">Thumbnail<span class="text-danger"
                                                        x-model="">*</span></label>
                                                <input type="file" class="form-control" name="thumb_eps"
                                                    id="exampleDropdownFormPassword1">
                                            </div>
                                            <div class="mb-2 col-6">
                                                <label for="exampleDropdownFormPassword1" class="form-label">Video<span
                                                        class="text-danger" x-model="">*</span></label>
                                                <input type="url" class="form-control" name="vid_eps"
                                                    id="exampleDropdownFormPassword1">
                                            </div>
                                            <div class="mb-2 col-6">
                                                <label for="exampleDropdownFormPassword1" class="form-label">Status<span
                                                        class="text-danger" x-model="">*</span></label>
                                                <select name="is_publish" class="form-select">
                                                    <option value="1">Publish</option>
                                                    <option value="0" selected>Unpublish</option>
                                                </select>
                                            </div>
                                            <div class="mb-2 col-12">
                                                <label for="exampleDropdownFormPassword1"
                                                    class="form-label d-block">Deskripsi<span class="text-danger"
                                                        x-model="">*</span></label>
                                                <textarea name="desk_eps" id="" class="d-block form-control py-1 px-2" style="resize: none; height: 85px;"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div id="row">
                                </div>
                                <div id="newinput"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light text-white" style="background: #5c5c5c;"
                            data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-warning">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="https://unpkg.com/tableexport.jquery.plugin/tableExport.min.js"></script>
    <script src="{{ asset('admin') }}/dist/libs/bootstrap-table/dist/bootstrap-table.min.js"></script>
    <script src="{{ asset('admin') }}/dist/js/plugins/tables/bootstrap-table.init.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="{{ asset('admin') }}/dist/libs/prismjs/prism.js"></script>
    <script type="text/javascript">
        $("#rowAdder").click(function() {
            newRowAdd =
                '<div id="row" class="row"> <div class="col-12 mb-2"> <div class="input-group-prepend"> <div class="btn-group w-100">' +
                '<button type="button" class="btn btn-light-primary text-primary dropdown-toggle rounded-end-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Form Episode </button>' +
                '<div><button class="btn btn-danger rounded-start-0" id="DeleteRow" type="button"> <i class="bi bi-trash"></i></button></div> ' +
                '<div class="dropdown-menu w-100 border" style="padding: 0.5rem 22px;"> <div class="py-2"> <div class="row"> <div class="mb-2 col-6">' +
                '<label for="exampleDropdownFormEmail1" class="form-label">Judul</label> <input type="text" class="form-control" name="judul" id=""placeholder="Ketik disini..." /></div>' +
                '<div class="mb-2 col-6"> <label for="" class="form-label">Thumbnail</label> <input type="file" class="form-control" name="thumb_eps" id=""></div>' +
                '<div class="mb-2 col-6"> <label for="" class="form-label">Video</label> <input type="url" class="form-control" id="" name="vid_eps"> </div>' +
                '<div class="mb-2 col-6"> <label for="" class="form-label">Status</label> <select name="is_publish" class="form-select" required> <option value="1">Publish</option> <option value="0" selected>Unpublish</option> </select> </div>' +
                '<div class="mb-2 col-12"> <label for="" class="form-label d-block">Deskripsi</label> <textarea name="desk_eps" id="" class="d-block form-control" style="resize: none; height: 85px;"></textarea> </div>' +
                '</div> </div> </div> </div> </div>'
            $('#newinput').append(newRowAdd);
        });
        $("body").on("click", "#DeleteRow", function() {
            $(this).parents("#row").remove();
        })
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $('document').ready(function(){
            $('#film').change(function(){
                let film_id = $(this).val();
                // $('input[name="idDivisi"]').val(film_id);
                if(film_id){
                    // console.log(film_id);
                    $.ajax({
                        type:"GET",
                        url:"{{ route('getSeason') }}",
                        data: {'film_id': film_id},
                        dataType: 'JSON',
                        success:function(response){
                            // console.log(response.season);
                            if(response){
                                $("#season").empty();
                                $("#season").append('<option>---Pilih Season---</option>');
                                $.each(response,function(key, value){
                                    // console.log(value);
                                    $("#season").append('<option value="'+value.id+'">'+value.season+'</option>');
                                });
                            }else{
                                $("#season").empty();
                            }
                        }
                    });
                }else{
                    $("#season").empty();
                }
            });
        });
    </script>
@endpush
