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
                                placeholder="Search Invoice" />
                            <i
                                class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                        </form>
                    </div>
                    <div class="app-invoice">
                        <ul class="overflow-auto invoice-users" style="height: calc(100vh - 262px)" data-simplebar>
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
                            
                        </ul>
                    </div>
                </div>
                <div class="w-75 w-xs-100 chat-container">
                    <div class="invoice-inner-part h-100">
                        <div class="invoiceing-box">
                            <div class="invoice-header d-flex align-items-center border-bottom p-3">
                                <h4 class="font-medium text-uppercase mb-0">Episode</h4>
                                <div class="ms-auto">
                                    <h4 class="invoice-number"></h4>
                                </div>
                            </div>
                            <div class="p-3" id="custom-invoice">
                                <div class="invoice-123" id="printableArea">
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
                                                            <th class="text-center">Eps</th>
                                                            <th class="text-center">Judul</th>
                                                            <th class="text-center">Quantity</th>
                                                            <th class="text-center">Unit Cost</th>
                                                            <th class="text-center">Total</th>
                                                        </tr>
                                                        <!-- end row -->
                                                    </thead>
                                                    <tbody>
                                                        <!-- start row -->
                                                        <tr>
                                                            <td class="text-center">1</td>
                                                            <td>Milk Powder</td>
                                                            <td class="text-center">2</td>
                                                            <td class="text-center">$24</td>
                                                            <td class="text-center">$48</td>
                                                        </tr>
                                                        <!-- end row -->
                                                        <!-- start row -->
                                                        <tr>
                                                            <td class="text-center">2</td>
                                                            <td>Air Conditioner</td>
                                                            <td class="text-center">5</td>
                                                            <td class="text-center">$500</td>
                                                            <td class="text-center">$2500</td>
                                                        </tr>
                                                        <!-- center row -->
                                                        <!-- start row -->
                                                        <tr>
                                                            <td class="text-center">3</td>
                                                            <td>RC Cars</td>
                                                            <td class="text-center">30</td>
                                                            <td class="text-center">$600</td>
                                                            <td class="text-center">$18000</td>
                                                        </tr>
                                                        <!-- center row -->
                                                        <!-- start row -->
                                                        <tr>
                                                            <td class="text-center">4</td>
                                                            <td>Down Coat</td>
                                                            <td class="text-center">62</td>
                                                            <td class="text-center">$5</td>
                                                            <td class="text-center">$310</td>
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
                                    </div>
                                </div>

                                    <div class="row pt-3">
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
                                    </div>
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
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="p-3 border-bottom">
                        <form class="position-relative">
                            <input type="search" class="form-control search-invoice ps-5" id="text-srh"
                                placeholder="Search Invoice">
                            <i
                                class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                        </form>
                    </div>
                    <div class="app-invoice overflow-auto">
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
                                        <span
                                            class="fs-3 invoice-id text-truncate text-body-color d-block w-85">#124</span>
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
                                        <span
                                            class="fs-3 invoice-id text-truncate text-body-color d-block w-85">#125</span>
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
                                        <span
                                            class="fs-3 invoice-id text-truncate text-body-color d-block w-85">#126</span>
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
                                        <span
                                            class="fs-3 invoice-id text-truncate text-body-color d-block w-85">#127</span>
                                        <span class="fs-3 invoice-date text-nowrap text-body-color d-block">9 Fab
                                            2020</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
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
@endpush
