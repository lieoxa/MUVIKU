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
    </style>
@endsection

@section('content')
    <div class="widget-content searchable-container list">
        <!-- --------------------- start Contact ---------------- -->
        @if (count($films) > 0)
            <div class="card card-body px-4 p-2 mb-3">
                <div class="row">
                    <div class="col-md-4 col-xl-3 my-auto">
                        <h4 class="my-auto fw-medium" style="font-size: 18px">Daftar Film</h4>
                    </div>
                    <div
                        class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0 gap-1">
                        <a href="{{ route('film.create') }}" class="btn btn-warning d-flex align-items-center"
                            style="padding: 7px 16px 7px 10px;">
                            <i class="ti ti-plus fs-5"></i>Tambah
                        </a>
                        <a data-bs-toggle="modal" data-bs-target="#season" class="btn btn-warning d-flex align-items-center"
                            style="padding: 7px 16px 7px 10px;">
                            <i class="ti ti-plus fs-5"></i>Season
                        </a>
                        <a data-bs-toggle="modal" data-bs-target="#episode"
                            class="btn btn-warning d-flex align-items-center" style="padding: 7px 16px 7px 10px;">
                            <i class="ti ti-plus fs-5"></i>Episode
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
                            <th>No.</th>
                            <th>Thumbnail</th>
                            <th>Judul</th>
                            <th>Tipe</th>
                            <th>Kategori</th>
                            <th>View</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($films as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td><img src="{{ asset('imgfilm/' . $item->thumbnail) }}" alt="" width="60"
                                            height="90" class="rounded"></td>
                                    <td>{{ $item->judul }}</td>
                                    <td>{{ $item->tipe }}</td>
                                    <td>{{ $item->kategorifilm?->kategori }}</td>
                                    <td>{{ $item->view }}</td>
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
                                            <a href="{{ route('film.edit', $item->id) }}"
                                                class="btn btn-outline-warning ms-1" style="padding: 7px 18px">
                                                <i class="bi bi-pencil-square"></i></a>
                                            <button href="" class="btn btn-outline-success ms-1"
                                                style="padding: 7px 18px" data-bs-toggle="modal" data-bs-target="#detail">
                                                <i class="bi bi-eye"></i></button>
                                        </div>

                                        <div class="modal fade text-start" id="detail" data-bs-backdrop="static"
                                            tabindex="-1" data-bs-keyboard="false">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content px-3">
                                                    <div class="modal-header d-flex align-items-center">
                                                        <h5 class="modal-title fw-medium">Detail</h5>
                                                    </div>
                                                    <form action="{{ route('film.show', $item->id) }}" class="row"
                                                        method="POST">
                                                        <div class="modal-body">
                                                            <div class="add-contact-box">
                                                                <div class="add-contact-content">
                                                                    <form id="addContactModalTitle">
                                                                        <div class="row">
                                                                            <div class="col-md-3 pe-0">
                                                                                <div class="mb-3 contact-email">
                                                                                    <img src="{{ asset('imgfilm/' . $item->thumbnail) }}"
                                                                                        alt="" width="100"
                                                                                        height="130" class="rounded">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-9 ps-0">
                                                                                <div class="ms-2 d-block">
                                                                                    <h6 class="fw-medium">
                                                                                        {{ $item->judul }}</h6>
                                                                                    <div class="row">
                                                                                        <div class="col-3">
                                                                                            <p>{{ $item->tahun }}</p>
                                                                                            <p>{{ $item->usia }}</p>
                                                                                            <p>{{ $item->durasi }}</p>
                                                                                        </div>
                                                                                        <div class="col-9">
                                                                                            <p>{{ $item->kategori_id }}</p>
                                                                                            <p>{{ $item->perusahaan }}</p>
                                                                                            <p>{{ $item->sutradara }}</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-12" style="max-width: 100%;">
                                                                                <textarea style="height: 200px; resize: none; width: 100%;" class="rounded px-1 border-black" readonly>{{ $item->deskripsi }}</textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="img-profil mb-2">
                                                                            <img class="mx-auto rounded" id="preview"
                                                                                src="#" alt="Preview"
                                                                                height="150" width="266.66"
                                                                                style="display: none;">
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button"
                                                                class="btn btn-success">Publish</button>
                                                            <button data-bs-dismiss="modal" type="button"
                                                                class="btn btn-primary">Tutup</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
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
                        <h6 class="fw-medium">Belum Ada Film!</h6>
                        <a href="{{ route('film.create') }}" id="btn-add-contact"
                            class="btn btn-warning justify-content-center mt-1 align-items-center"
                            style="padding: 7px 16px 7px 10px;">
                            <i class="bi bi-plus fs-5" style="vertical-align: -0.1em;"></i>Tambah
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <div class="modal fade" id="season" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form action="{{ route('post.film') }}" method="POST" class="w-100">
                {{ csrf_field() }}
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Season</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body row">
                        <div class="col-12">
                            <label for="#film">Serial</label>
                            <select name="film_id[]" id="film" class="form-select">
                                <option value="">Pilih Serial...</option>
                                @foreach ($films->where('tipe', 'Serial') as $item)
                                    <option value="{{ $item->id }}">{{ $item->judul }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="#season">Season</label>
                            <input type="text" id="season" name="season" class="form-control"
                                placeholder="Ketik disini...">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-warning">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="episode" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form action="" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body row">
                        <div class="col-12 mb-3">
                            <label for="#film_season">Film - Season</label>
                            <input type="text" id="film_season" class="form-control">
                        </div>
                        <div class="col-12 mb-3 ">
                            <div class="dropdown">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false" data-bs-auto-close="outside">
                                    Dropdown form
                                </button>
                                <form class="dropdown-menu p-4">
                                    <div class="mb-3">
                                        <label for="exampleDropdownFormEmail2" class="form-label">Email address</label>
                                        <input type="email" class="form-control" id="exampleDropdownFormEmail2"
                                            placeholder="email@example.com">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleDropdownFormPassword2" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="exampleDropdownFormPassword2"
                                            placeholder="Password">
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="dropdownCheck2">
                                            <label class="form-check-label" for="dropdownCheck2">
                                                Remember me
                                            </label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Sign in</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
@endpush
