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
    <div class="container-fluid">
        <div class="card card-body px-4 p-2 mb-3">
            <div class="row">
                <div class="col-md-4 col-xl-3 my-auto">
                    <h4 class="my-auto fw-medium" style="font-size: 18px">Daftar Season dan Episode</h4>
                </div>
                <div
                    class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0 gap-1">
                    <a href="{{ route('film.index') }}" class="btn btn-warning d-flex align-items-center"
                        style="padding: 7px 16px 7px 16px;">
                        Daftar Film
                    </a>
                    <a data-bs-toggle="modal" data-bs-target="#modal_season"
                        class="btn btn-warning d-flex align-items-center" style="padding: 7px 16px 7px 8px;">
                        <i class="ti ti-plus fs-5"></i>Season
                    </a>
                    <a data-bs-toggle="modal" data-bs-target="#episode" class="btn btn-warning d-flex align-items-center"
                        style="padding: 7px 16px 7px 10px;">
                        <i class="ti ti-plus fs-5"></i>Episode
                    </a>
                </div>
            </div>
        </div>
        <div class="card overflow-hidden invoice-application">
            <div class="d-flex align-items-center justify-content-between gap-3 m-3 d-lg-none">
                <button class="btn btn-primary d-flex" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#chat-sidebar" aria-controls="chat-sidebar">
                    <i class="ti ti-menu-2 fs-5"></i>
                </button>
                <form class="position-relative w-100">
                    <input type="text" class="form-control search-chat py-2 ps-5" id="text-srh"
                        placeholder="Search Contact">
                    <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                </form>
            </div>
            <div class="d-flex">
                <div class="w-25 d-none d-lg-block border-end user-chat-box">
                    <div class="p-3 border-bottom">
                        <form class="position-relative">
                            <input type="search" class="form-control search-invoice ps-5" id="text-srh"
                                placeholder="Cari Serial..." />
                            <i
                                class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                        </form>
                    </div>
                    <div class="app-invoice">
                        <ul class="overflow-auto invoice-users" style="height: calc(100vh - 262px)" data-simplebar>
                            @foreach ($seasons as $item)
                                <li>
                                    {{-- <input type="radio" name="" id="season_id" value="{{ $item->id }}" hidden> --}}
                                    <label href="javascript:void(0)"
                                        class="p-3 bg-hover-light-black border-bottom d-flex align-items-start invoice-user listing-user bg-light"
                                        id="invoice-123">
                                        <div class="rounded d-flex align-items-center justify-content-center gap-2">
                                            <input type="radio" id="season_id" name="season" value="{{ $item->id }}" class="pe-2 season">
                                            <img src="{{ asset('imgfilm/' . $item->film->thumbnail) }}" alt=""
                                                width="34" height="45" class="rounded">
                                        </div>
                                        <div class="ms-3 d-inline-block w-75">
                                            <h6 class="mb-0 invoice-customer">{{ $item->film->judul }}</h6>

                                            <span class="fs-3 invoice-id text-truncate text-body-color d-block w-85">Season
                                                {{ $item->season }}</span>
                                            {{-- <span class="fs-3 invoice-date text-nowrap text-body-color d-block">9 Fab
                                                    2020</span> --}}
                                        </div>
                                    </label>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
                <div class="w-75 w-xs-100 chat-container">
                    <div class="invoice-inner-part h-100">
                        <div class="invoiceing-box">
                            <div class="p-3" id="custom-invoice">
                                <div class="invoice-123">
                                    <div class="row">
                                        {{-- <div class="col-md-12">
                                            <div class="">
                                                <address>
                                                    <h6>&nbsp;From,</h6>
                                                    <h6 class="fw-bold">&nbsp;Steve Jobs</h6>
                                                    <p class="ms-1">
                                                        1108, Clair Street, <br />Massachusetts,
                                                        <br />Woods Hole - 02543
                                                    </p>
                                                </address>
                                            </div>
                                            <div class="text-end">
                                                <address>
                                                    <h6>To,</h6>
                                                    <h6 class="fw-bold invoice-customer">
                                                        James Anderson,
                                                    </h6>
                                                    <p class="ms-4">
                                                        455, Shobe Lane, <br />Colorado, <br />Fort
                                                        Collins - 80524
                                                    </p>
                                                    <p class="mt-4 mb-1">
                                                        <span>Invoice Date :</span>
                                                        <i class="ti ti-calendar"></i>
                                                        23rd Jan 2021
                                                    </p>
                                                    <p>
                                                        <span>Due Date :</span>
                                                        <i class="ti ti-calendar"></i>
                                                        25th Jan 2021
                                                    </p>
                                                </address>
                                            </div>
                                        </div> --}}
                                        <div class="col-md-12">
                                            <div class="table-responsive" style="clear: both">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <!-- start row -->
                                                        <tr>
                                                            <th class="text-center">Eps.</th>
                                                            <th class="text-center">Judul</th>
                                                            <th class="text-center">Thumbnail</th>
                                                            <th class="text-center">Status</th>
                                                            <th class="text-center">Aksi</th>
                                                        </tr>
                                                        <!-- end row -->
                                                    </thead>
                                                    <tbody id="data-episode">
                                                        <!-- start row -->
                                                        {{-- <tr>
                                                            <td class="text-center">1</td>
                                                            <td class="text-center">Milk Powder</td>
                                                            <td class="text-center">2</td>
                                                            <td class="text-center">$24</td>
                                                            <td class="text-center">
                                                                <button class="ms-0 btn btn-outline-danger ms-2">
                                                                    <i class="ti ti-trash fs-5"></i>
                                                                </button>
                                                                <a href=""
                                                                    class="btn btn-outline-warning ms-1"
                                                                    style="padding: 7px 18px">
                                                                    <i class="bi bi-pencil-square"></i>
                                                                </a>
                                                            </td>
                                                        </tr> --}}
                                                        <!-- end row -->
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-12">
                                            <div class="pull-right mt-4 text-end">
                                                <p>Sub - Total amount: $20,858</p>
                                                <p>vat (10%) : $2,085</p>
                                                <hr />
                                                <h3><b>Total :</b> $22,943</h3>
                                            </div>
                                            <div class="clearfix"></div>
                                            <hr />
                                            <div class="text-end">
                                                <button class="btn btn-danger" type="submit">
                                                    Proceed to payment
                                                </button>
                                                <button class="btn btn-default print-page" type="button">
                                                    <span><i class="ti ti-printer fs-5"></i>
                                                        Print</span>
                                                </button>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                                {{-- <div class="row pt-3">
                                    <div class="col-md-12">
                                        <div class="">
                                            <address>
                                                <h6>&nbsp;From,</h6>
                                                <h6 class="fw-bold">&nbsp;Steve Jobs</h6>
                                                <p class="ms-1">
                                                    1108, Clair Street, <br />Massachusetts,
                                                    <br />Woods Hole - 02543
                                                </p>
                                            </address>
                                        </div>
                                        <div class="text-end">
                                            <address>
                                                <h6>To,</h6>
                                                <h6 class="fw-bold invoice-customer">
                                                    Gabriel Jobs,
                                                </h6>
                                                <p class="ms-4">
                                                    455, Shobe Lane, <br />Colorado, <br />Fort
                                                    Collins - 80524
                                                </p>
                                                <p class="mt-4 mb-1">
                                                    <span>Invoice Date :</span>
                                                    <i class="ti ti-calendar"></i>
                                                    23rd Jan 2021
                                                </p>
                                                <p>
                                                    <span>Due Date :</span>
                                                    <i class="ti ti-calendar"></i>
                                                    25th Jan 2021
                                                </p>
                                            </address>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="table-responsive mt-5" style="clear: both">
                                            <table class="table table-hover">
                                                <thead>
                                                    <!-- start row -->
                                                    <tr>
                                                        <th class="text-center">#</th>
                                                        <th>Description</th>
                                                        <th class="text-end">Quantity</th>
                                                        <th class="text-end">Unit Cost</th>
                                                        <th class="text-end">Total</th>
                                                    </tr>
                                                    <!-- end row -->
                                                </thead>
                                                <tbody>
                                                    <!-- start row -->
                                                    <tr>
                                                        <td class="text-center">1</td>
                                                        <td>Milk Powder</td>
                                                        <td class="text-end">2</td>
                                                        <td class="text-end">$24</td>
                                                        <td class="text-end">$48</td>
                                                    </tr>
                                                    <!-- end row -->
                                                    <!-- start row -->
                                                    <tr>
                                                        <td class="text-center">2</td>
                                                        <td>Air Conditioner</td>
                                                        <td class="text-end">5</td>
                                                        <td class="text-end">$500</td>
                                                        <td class="text-end">$2500</td>
                                                    </tr>
                                                    <!-- end row -->
                                                    <!-- start row -->
                                                    <tr>
                                                        <td class="text-center">3</td>
                                                        <td>RC Cars</td>
                                                        <td class="text-end">30</td>
                                                        <td class="text-end">$600</td>
                                                        <td class="text-end">$18000</td>
                                                    </tr>
                                                    <!-- end row -->
                                                    <!-- start row -->
                                                    <tr>
                                                        <td class="text-center">4</td>
                                                        <td>Down Coat</td>
                                                        <td class="text-end">62</td>
                                                        <td class="text-end">$5</td>
                                                        <td class="text-end">$310</td>
                                                    </tr>
                                                    <!-- end row -->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="pull-right mt-4 text-end">
                                            <p>Sub - Total amount: $20,858</p>
                                            <p>vat (10%) : $2,085</p>
                                            <hr />
                                            <h3><b>Total :</b> $22,943</h3>
                                        </div>
                                        <div class="clearfix"></div>
                                        <hr />
                                        <div class="text-end">
                                            <button class="btn btn-danger" type="submit">
                                                Proceed to payment
                                            </button>
                                            <button class="btn btn-default print-page" type="button">
                                                <span><i class="ti ti-printer fs-5"></i>
                                                    Print</span>
                                            </button>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="offcanvas offcanvas-start user-chat-box" tabindex="-1" id="chat-sidebar"
                aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasExampleLabel">
                        Invoice
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="p-3 border-bottom">
                    <form class="position-relative">
                        <input type="search" class="form-control search-invoice ps-5" id="text-srh"
                            placeholder="Search Invoice">
                        <i
                            class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                    </form>
                </div>
                {{-- <div class="app-invoice overflow-auto">
                    <ul class="invoice-users">
                        <li>
                            <a href="javascript:void(0)"
                                class="p-3 bg-hover-light-black border-bottom d-flex align-items-start invoice-user listing-user bg-light"
                                id="invoice-123" data-invoice-id="123">
                                <div
                                    class="btn btn-primary round rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="ti ti-user fs-6"></i>
                                </div>
                                <div class="ms-3 d-inline-block w-75">
                                    <h6 class="mb-0 invoice-customer">James Anderson</h6>

                                    <span class="fs-3 invoice-id text-truncate text-body-color d-block w-85">Id:
                                        #123</span>
                                    <span class="fs-3 invoice-date text-nowrap text-body-color d-block">9 Fab
                                        2020</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"
                                class="p-3 bg-hover-light-black border-bottom d-flex align-items-start invoice-user listing-user"
                                id="invoice-124" data-invoice-id="124">
                                <div
                                    class="btn btn-danger round rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="ti ti-user fs-6"></i>
                                </div>
                                <div class="ms-3 d-inline-block w-75">
                                    <h6 class="mb-0 invoice-customer">Bianca Doe</h6>
                                    <span class="fs-3 invoice-id text-truncate text-body-color d-block w-85">#124</span>
                                    <span class="fs-3 invoice-date text-nowrap text-body-color d-block">9 Fab
                                        2020</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"
                                class="p-3 bg-hover-light-black border-bottom d-flex align-items-start invoice-user listing-user"
                                id="invoice-125" data-invoice-id="125">
                                <div
                                    class="btn btn-info round rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="ti ti-user fs-6"></i>
                                </div>
                                <div class="ms-3 d-inline-block w-75">
                                    <h6 class="mb-0 invoice-customer">Angelina Rhodes</h6>
                                    <span class="fs-3 invoice-id text-truncate text-body-color d-block w-85">#125</span>
                                    <span class="fs-3 invoice-date text-nowrap text-body-color d-block">9 Fab
                                        2020</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"
                                class="p-3 bg-hover-light-black border-bottom d-flex align-items-start invoice-user listing-user"
                                id="invoice-126" data-invoice-id="126">
                                <div
                                    class="btn btn-warning round rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="ti ti-user fs-6"></i>
                                </div>
                                <div class="ms-3 d-inline-block w-75">
                                    <h6 class="mb-0 invoice-customer">Samuel Smith</h6>
                                    <span class="fs-3 invoice-id text-truncate text-body-color d-block w-85">#126</span>
                                    <span class="fs-3 invoice-date text-nowrap text-body-color d-block">9 Fab
                                        2020</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"
                                class="p-3 bg-hover-light-black border-bottom d-flex align-items-start invoice-user listing-user"
                                id="invoice-127" data-invoice-id="127">
                                <div
                                    class="btn btn-primary round rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="ti ti-user fs-6"></i>
                                </div>
                                <div class="ms-3 d-inline-block w-75">
                                    <h6 class="mb-0 invoice-customer">Gabriel Jobs</h6>
                                    <span class="fs-3 invoice-id text-truncate text-body-color d-block w-85">#127</span>
                                    <span class="fs-3 invoice-date text-nowrap text-body-color d-block">9 Fab
                                        2020</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div> --}}
            </div>
        </div>
    </div>
    </div>
    <div class="modal fade" id="modal_season" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form action="{{ route('postSeason') }}" method="POST" class="w-100">
                {{ csrf_field() }}
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Season</h5>
                    </div>
                    <div class="modal-body row">
                        <div class="col-6 mb-3">
                            <label for="#film"class="form-label">Serial<span class="text-danger"
                                    x-model="">*</span></label>
                            <select name="film_id[]" id="film" class="form-select">
                                <option value="">Pilih Serial...</option>
                                @foreach ($films->where('tipe', 'Serial') as $item)
                                    <option value="{{ $item->id }}">{{ $item->judul }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6 mb-3">
                            <label class="form-label">Status<span class="text-danger" x-model="">*</span></label>
                            <select name="is_publish" class="form-select mr-sm-2" required>
                                <option value="1">Publish</option>
                                <option value="0" selected>Unpublish</option>
                            </select>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="#input_season" class="form-label">Season<span class="text-danger"
                                    x-model="">*</span></label>
                            <input type="text" id="input_season" name="season" class="form-control"
                                placeholder="Ketik disini...">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light text-white" style="background: #5c5c5c;"
                            data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-warning">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id="episode" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('postEps') }}" method="POST" class="w-100" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Tambah Episode</h1>
                    </div>
                    <div class="modal-body row">
                        <div class="col-6 mb-3 ">
                            <label class="form-label">Serial<span class="text-danger" x-model="">*</span></label>
                            <select name="serial" id="getSeason" class="form-select">
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
                                            <div class="mb-2 col-12">
                                                <label for="judul-episode" class="form-label">Judul<span
                                                        class="text-danger" x-model="">*</span></label>
                                                <input type="text" name="judul" class="form-control"
                                                    id="judul-episode" placeholder="Ketik disini...">
                                            </div>
                                            <div class="mb-2 col-6">
                                                <label for="judul-episode" class="form-label">Episode<span
                                                        class="text-danger" x-model="">*</span></label>
                                                <input type="text" name="episode" class="form-control"
                                                    id="judul-episode" placeholder="Ketik disini...">
                                            </div>
                                            <div class="mb-2 col-6">
                                                <label for="exampleDropdownFormPassword1"
                                                    class="form-label">Thumbnail<span class="text-danger"
                                                        x-model="">*</span></label>
                                                <input type="file" class="form-control" name="thumb_eps">
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
    <script src="{{ asset('admin') }}/dist/js/apps/jquery.PrintArea.js"></script>
    <script src="{{ asset('admin') }}/dist/js/apps/invoice.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://unpkg.com/tableexport.jquery.plugin/tableExport.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script type="text/javascript">
        $("#rowAdder").click(function() {
            newRowAdd =
                '<div id="row" class="row"> <div class="col-12 mb-2"> <div class="input-group-prepend"> <div class="btn-group w-100">' +
                '<button type="button" class="btn btn-light-primary text-primary dropdown-toggle rounded-end-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Form Episode </button>' +
                '<div><button class="btn btn-danger rounded-start-0" id="DeleteRow" type="button"> <i class="bi bi-trash"></i></button></div> ' +
                '<div class="dropdown-menu w-100 border" style="padding: 0.5rem 22px;"> <div class="py-2"> <div class="row"> <div class="mb-2 col-12">' +
                '<label for="exampleDropdownFormEmail1" class="form-label">Judul</label> <input type="text" class="form-control" name="judul" id=""placeholder="Ketik disini..." /></div>' +
                '<div class="mb-2 col-6"> <label for = "judul-episode" class = "form-label" > Episode <span class = "text-danger" x - model = "" > * </span></label ><input type = "text" name = "episode" class = "form-control" id = "judul-episode" placeholder = "Ketik disini..." ></div>' +
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
        // 
        // $('document').ready(function() {
            
        // });
    </script>
    <script>
        $('document').ready(function() {
            $('.season').change(function() {
                let season_id = $(this).val();
                // $('input[name="idDivisi"]').val(season_id);
                console.log(season_id);
                if (season_id) {
                    $.ajax({
                        type: "GET",
                        url: "{{ route('getEpisode') }}",
                        data: {
                            'season_id': season_id
                        },
                        dataType: 'JSON',
                        success: function(response) {
                            console.log(response);
                            $('#data-episode').empty();
                            $('#data-episode').html(response.table_episode);

                        }
                    });
                } else {
                    $('#data-episode').empty();
                }
            });
            $('#getSeason').change(function() {
                let film_id = $(this).val();
                // $('input[name="idDivisi"]').val(film_id);
                if (film_id) {
                    console.log(film_id);
                    $.ajax({
                        type: "GET",
                        url: "{{ route('getSeason') }}",
                        data: {
                            'film_id': film_id
                        },
                        dataType: 'JSON',
                        success: function(response) {
                            // console.log(response.season);
                            if (response) {
                                $("#season").empty();
                                $("#season").append('<option>---Pilih Season---</option>');
                                $.each(response, function(key, value) {
                                    // console.log(value);
                                    $("#season").append('<option value="' + value.id +
                                        '">' + value.season + '</option>');
                                });
                            } else {
                                $("#season").empty();
                            }
                        }
                    });
                } else {
                    $("#season").empty();
                }
            });
        });
    </script>
    <script>
        // the selector will match all input controls of type :checkbox
        // and attach a click event handler 
        $("input:checkbox").on('click', function() {
            // in the handler, 'this' refers to the box clicked on
            var $box = $(this);
            if ($box.is(":checked")) {
                // the name of the box is retrieved using the .attr() method
                // as it is assumed and expected to be immutable
                var group = "input:checkbox[name='" + $box.attr("name") + "']";
                // the checked state of the group/box on the other hand will change
                // and the current value is retrieved using .prop() method
                $(group).prop("checked", false);
                $box.prop("checked", true);
            } else {
                $box.prop("checked", false);
            }
        });
    </script>
@endpush
