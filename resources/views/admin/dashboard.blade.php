{{-- @extends ('admin.layout') --}}
@extends ('main')
{{-- @section('custom-style')
    <link rel="stylesheet" type="text/css"
        href="{{ url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css') }}" />
    <style>
        .col-md-3 {
            float: left;
        }

        .wrapper {
            margin-top: 0px;
            padding: 0px 15px;
        }
    </style>
@stop --}}

@section('custom-script')
    <script type="text/javascript" src="{{ url('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js') }}">
    </script>
    <script type="text/javascript"
        src="{{ url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js') }}"></script>

    <script src="{{ url('assets/admin/pages/scripts/table-lifesc.js') }}"></script>
    <script>
        jQuery(document).ready(function() {
            TableManaged3.init();
        });
    </script>
@stop
@section('content')


    <!-- //market-->
    @if (chkPhanQuyen('trangchutinh', 'phanquyen'))
        <div class="row">
            <div class="col-md-12">
                <div class="card card-custom">

                    <div class="card-header card-header-tabs-line">
                        <div class="card-title">
                            <h3 class="card-label text-uppercase">Doanh nghiệp</h3>
                        </div>
                        <div class="card-toolbar">
                        </div>
                    </div>
                    <div class="row mt-3" style="width:100%;margin: 0 auto">
                        <div class="col-md-3">
                            <div class="card card-custom bg-primary gutter-b" style="height: 150px">
                                <div class="card-body">
                                    <span class="svg-icon svg-icon-3x svg-icon-white ml-n2">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                <path
                                                    d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                                    fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                <path
                                                    d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                                    fill="#000000" fill-rule="nonzero" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <div>
                                        <a href="#"
                                            class="text-inverse-primary font-weight-bold font-size-lg mt-1">Doanh nghiệp</a>
                                    </div>
                                    <div class="text-inverse-primary font-weight-bolder font-size-h2">
                                        {{ $dinfo['pcompany'] }}/{{ $dinfo['upcompany'] }}</div>
                                    <div class="text-inverse-primary font-weight-bold font-size-xs">
                                        Hoạt động/ Dừng</div>
                                    {{-- <p> Hoạt động/ Dừng</p> --}}

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card card-custom bg-success gutter-b" style="height: 150px">
                                <div class="card-body">
                                    <span class="svg-icon svg-icon-3x svg-icon-white ml-n2">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                <path
                                                    d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                                    fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                <path
                                                    d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                                    fill="#000000" fill-rule="nonzero" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <div>
                                        <a href="#"
                                            class="text-inverse-primary font-weight-bold font-size-lg mt-1">Lao động</a>
                                    </div>
                                    <div class="text-inverse-primary font-weight-bolder font-size-h2">
                                        {{ $dinfo['laodong'] }}/{{ $einfo['tong'] }}</div>
                                    <div class="text-inverse-primary font-weight-bold font-size-xs">
                                        Tổng số LĐ / Số LĐ được sử dụng</div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card card-custom bg-danger gutter-b" style="height: 150px;">
                                <div class="card-body">
                                    <span class="svg-icon svg-icon-3x svg-icon-white ml-n2">
                                        <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\Communication\Delete-user.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                <path
                                                    d="M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z M21,8 L17,8 C16.4477153,8 16,7.55228475 16,7 C16,6.44771525 16.4477153,6 17,6 L21,6 C21.5522847,6 22,6.44771525 22,7 C22,7.55228475 21.5522847,8 21,8 Z"
                                                    fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                <path
                                                    d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                                    fill="#000000" fill-rule="nonzero" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <div>
                                        <a href="#"
                                            class="text-inverse-primary font-weight-bold font-size-lg mt-1">Tuyển dụng</a>
                                    </div>
                                    <div class="text-inverse-primary font-weight-bolder font-size-h2 mt-3">
                                        {{ $dinfo['tuyendung'] }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card card-custom bg-dark gutter-b" style="height: 150px;">
                                <div class="card-body">
                                    <span class="svg-icon svg-icon-3x svg-icon-white ml-n2">
                                        <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\General\User.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                <path
                                                    d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                                    fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                <path
                                                    d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                                    fill="#000000" fill-rule="nonzero" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <div>
                                        <a href="#"
                                            class="text-inverse-primary font-weight-bold font-size-lg mt-1">Khai báo</a>
                                    </div>
                                    <div class="text-inverse-primary font-weight-bolder font-size-h2 mt-3">
                                        {{ $dinfo['dnkhaibao'] }}</div>

                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <form class="form-inline" method="GET">
                        <button class="btn btn-sm btn-primary mb-3 ml-3" name="export" value="1" type="submit">Xuất
                            Báo cáo theo mẫu Mẫu số 02/PLI</button>
                    </form> --}}
                </div>

            </div>
        </div>
    @endif
    @if (chkPhanQuyen('trangchuxa', 'phanquyen'))
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card card-custom">

                    <div class="card-header card-header-tabs-line">
                        <div class="card-title">
                            <h3 class="card-label text-uppercase">CUNG LAO ĐỘNG</h3>
                        </div>
                        <div class="card-toolbar">
                        </div>
                    </div>
                    <!-- Kỳ điều tra trước -->
                    @if ($kydieutra_truoc != null && $kydieutra_truoc != 2022)
                        <div class="card-header card-header-tabs-line" style="border-bottom: none">
                            <div class="card-title">
                                <h6 class="card-label text-uppercase">Kỳ điều tra năm {{ $kydieutra_truoc }}</h6>
                            </div>
                        </div>
                        <div class="row" style="width:100%;margin: 0 auto">
                            <div class="col-md-3">
                                <div class="card card-custom bg-primary gutter-b" style="height: 150px">
                                    <div class="card-body">
                                        <span class="svg-icon svg-icon-3x svg-icon-white ml-n2">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                    <path
                                                        d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                                        fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                    <path
                                                        d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                                        fill="#000000" fill-rule="nonzero" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <div class="text-inverse-primary font-weight-bolder font-size-h2 mt-3">
                                            {{ $tongsonhankhau['kytruoc'] }}</div>
                                        <a href="#"
                                            class="text-inverse-primary font-weight-bold font-size-lg mt-1">LĐ
                                            trên 15 tuổi</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card card-custom bg-success gutter-b" style="height: 150px">
                                    <div class="card-body">
                                        <span class="svg-icon svg-icon-3x svg-icon-white ml-n2">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                    <path
                                                        d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                                        fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                    <path
                                                        d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                                        fill="#000000" fill-rule="nonzero" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <div class="text-inverse-primary font-weight-bolder font-size-h2 mt-3">
                                            {{ $ldcovieclam['kytruoc'] }}</div>
                                        <a href="#"
                                            class="text-inverse-primary font-weight-bold font-size-lg mt-1">LĐ
                                            có việc làm</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card card-custom bg-danger gutter-b" style="height: 150px;">
                                    <div class="card-body">
                                        <span class="svg-icon svg-icon-3x svg-icon-white ml-n2">
                                            <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\Communication\Delete-user.svg--><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                    <path
                                                        d="M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z M21,8 L17,8 C16.4477153,8 16,7.55228475 16,7 C16,6.44771525 16.4477153,6 17,6 L21,6 C21.5522847,6 22,6.44771525 22,7 C22,7.55228475 21.5522847,8 21,8 Z"
                                                        fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                    <path
                                                        d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                                        fill="#000000" fill-rule="nonzero" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <div class="text-inverse-primary font-weight-bolder font-size-h2 mt-3">
                                            {{ $ldthatnghiep['kytruoc'] }}</div>
                                        <a href="#"
                                            class="text-inverse-primary font-weight-bold font-size-lg mt-1">LĐ thất
                                            nghiệp</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card card-custom bg-dark gutter-b" style="height: 150px;">
                                    <div class="card-body">
                                        <span class="svg-icon svg-icon-3x svg-icon-white ml-n2">
                                            <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\General\User.svg--><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                    <path
                                                        d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                                        fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                    <path
                                                        d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                                        fill="#000000" fill-rule="nonzero" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <div class="text-inverse-primary font-weight-bolder font-size-h2 mt-3">
                                            {{ $ldkhongthamgia['kytruoc'] }}</div>
                                        <a href="#"
                                            class="text-inverse-primary font-weight-bold font-size-lg mt-1">LĐ không tham
                                            gia HĐKT</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Kỳ điều tra hiện tại -->
                    <div class="card-header card-header-tabs-line" style="border-bottom: none">
                        <div class="card-title">
                            <h6 class="card-label text-uppercase">Kỳ điều tra năm {{ $kydieutra_hientai??date('Y') }}</h6>
                        </div>
                    </div>
                    <div class="row" style="width:100%;margin: 0 auto">
                        <div class="col-md-3">
                            <div class="card card-custom bg-primary gutter-b" style="height: 150px">
                                <div class="card-body">
                                    <span class="svg-icon svg-icon-3x svg-icon-white ml-n2">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                <path
                                                    d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                                    fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                <path
                                                    d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                                    fill="#000000" fill-rule="nonzero" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <div class="text-inverse-primary font-weight-bolder font-size-h2 mt-3">
                                        {{ $tongsonhankhau['kyhientai'] }}</div>
                                    <a href="#" class="text-inverse-primary font-weight-bold font-size-lg mt-1">LĐ
                                        trên 15 tuổi</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card card-custom bg-success gutter-b" style="height: 150px">
                                <div class="card-body">
                                    <span class="svg-icon svg-icon-3x svg-icon-white ml-n2">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                <path
                                                    d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                                    fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                <path
                                                    d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                                    fill="#000000" fill-rule="nonzero" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <div class="text-inverse-primary font-weight-bolder font-size-h2 mt-3">
                                        {{ $ldcovieclam['kyhientai'] }}</div>
                                    <a href="#" class="text-inverse-primary font-weight-bold font-size-lg mt-1">LĐ
                                        có việc làm</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card card-custom bg-danger gutter-b" style="height: 150px;">
                                <div class="card-body">
                                    <span class="svg-icon svg-icon-3x svg-icon-white ml-n2">
                                        <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\Communication\Delete-user.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                <path
                                                    d="M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z M21,8 L17,8 C16.4477153,8 16,7.55228475 16,7 C16,6.44771525 16.4477153,6 17,6 L21,6 C21.5522847,6 22,6.44771525 22,7 C22,7.55228475 21.5522847,8 21,8 Z"
                                                    fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                <path
                                                    d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                                    fill="#000000" fill-rule="nonzero" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <div class="text-inverse-primary font-weight-bolder font-size-h2 mt-3">
                                        {{ $ldthatnghiep['kyhientai'] }}</div>
                                    <a href="#" class="text-inverse-primary font-weight-bold font-size-lg mt-1">LĐ
                                        thất nghiệp</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card card-custom bg-dark gutter-b" style="height: 150px;">
                                <div class="card-body">
                                    <span class="svg-icon svg-icon-3x svg-icon-white ml-n2">
                                        <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\General\User.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                <path
                                                    d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                                    fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                <path
                                                    d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                                    fill="#000000" fill-rule="nonzero" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <div class="text-inverse-primary font-weight-bolder font-size-h2 mt-3">
                                        {{ $ldkhongthamgia['kyhientai'] }}</div>
                                    <a href="#" class="text-inverse-primary font-weight-bold font-size-lg mt-1">LĐ
                                        không tham gia HĐKT</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($kydieutra_truoc != null && $kydieutra_truoc != 2022)
                        <!-- Biến động -->
                        <div class="card-header card-header-tabs-line" style="border-bottom: none">
                            <div class="card-title">
                                <h6 class="card-label text-uppercase">Biến động</h6>
                            </div>
                        </div>
                        <div class="row" style="width:100%;margin: 0 auto">
                            <div class="col-md-3">
                                <div class="card card-custom bg-primary gutter-b" style="height: 150px">
                                    <div class="card-body">
                                        <span class="svg-icon svg-icon-3x svg-icon-white ml-n2">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                    <path
                                                        d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                                        fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                    <path
                                                        d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                                        fill="#000000" fill-rule="nonzero" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <div class="text-inverse-primary font-weight-bolder font-size-h2 mt-3">
                                            @if ($tongso_biendong == 0)
                                                {{ $tongso_biendong }}
                                            @elseif ($tongso_biendong > 0)
                                                Tăng : {{ $tongso_biendong }}
                                            @else
                                                Giảm : {{ abs($tongso_biendong) }}
                                            @endif
                                        </div>
                                        <a href="#"
                                            class="text-inverse-primary font-weight-bold font-size-lg mt-1">LĐ
                                            trên 15 tuổi</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card card-custom bg-success gutter-b" style="height: 150px">
                                    <div class="card-body">
                                        <span class="svg-icon svg-icon-3x svg-icon-white ml-n2">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                    <path
                                                        d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                                        fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                    <path
                                                        d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                                        fill="#000000" fill-rule="nonzero" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <div class="text-inverse-primary font-weight-bolder font-size-h2 mt-3">
                                            @if ($ldcovieclam_biendong == 0)
                                                {{ $ldcovieclam_biendong }}
                                            @elseif ($ldcovieclam_biendong > 0)
                                                Tăng : {{ $ldcovieclam_biendong }}
                                            @else
                                                Giảm : {{ abs($ldcovieclam_biendong) }}
                                            @endif
                                        </div>
                                        <a href="#"
                                            class="text-inverse-primary font-weight-bold font-size-lg mt-1">LĐ có
                                            việc
                                            làm</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card card-custom bg-danger gutter-b" style="height: 150px;">
                                    <div class="card-body">
                                        <span class="svg-icon svg-icon-3x svg-icon-white ml-n2">
                                            <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\Communication\Delete-user.svg--><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                    <path
                                                        d="M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z M21,8 L17,8 C16.4477153,8 16,7.55228475 16,7 C16,6.44771525 16.4477153,6 17,6 L21,6 C21.5522847,6 22,6.44771525 22,7 C22,7.55228475 21.5522847,8 21,8 Z"
                                                        fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                    <path
                                                        d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                                        fill="#000000" fill-rule="nonzero" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <div class="text-inverse-primary font-weight-bolder font-size-h2 mt-3">
                                            @if ($ldthatnghiep_biendong == 0)
                                                {{ $ldthatnghiep_biendong }}
                                            @elseif ($ldthatnghiep_biendong > 0)
                                                Tăng : {{ $ldthatnghiep_biendong }}
                                            @else
                                                Giảm : {{ abs($ldthatnghiep_biendong) }}
                                            @endif
                                        </div>
                                        <a href="#"
                                            class="text-inverse-primary font-weight-bold font-size-lg mt-1">LĐ thất
                                            nghiệp</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card card-custom bg-dark gutter-b" style="height: 150px;">
                                    <div class="card-body">
                                        <span class="svg-icon svg-icon-3x svg-icon-white ml-n2">
                                            <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\General\User.svg--><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                    <path
                                                        d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                                        fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                    <path
                                                        d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                                        fill="#000000" fill-rule="nonzero" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <div class="text-inverse-primary font-weight-bolder font-size-h2 mt-3">
                                            @if ($ldkhongthamgia_biendong == 0)
                                                {{ $ldkhongthamgia_biendong }}
                                            @elseif ($ldkhongthamgia_biendong > 0)
                                                Tăng : {{ $ldkhongthamgia_biendong }}
                                            @else
                                                Giảm : {{ abs($ldkhongthamgia_biendong) }}
                                            @endif
                                        </div>
                                        <a href="#"
                                            class="text-inverse-primary font-weight-bold font-size-lg mt-1">LĐ
                                            không tham
                                            gia HĐKT</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

            </div>
        </div>

    @endif
    <!-- //market-->
    {{-- <div class="row mb-3"  >
			<div class="col-xl-12">
				<div class="card card-custom">
				<div class="card-header card-header-tabs-line">
					<div class="card-title">
                        <h3 class="card-label text-uppercase">Thông tin Sử dụng lao động</h3>
                    </div>
				  <div class="card-heading">Thông tin Sử dụng lao động</div>
				</div>
				  <div class="card-body">
				  <table class="table table-bordered centered">
					<thead>
					  <tr>
						<th rowspan=2>Người sử dụng lao động</th>
						<th colspan= 4>Tổng số lao động được sữ dụng</th>
						<th colspan= 4>Vị trí việc làm </th>
						<th colspan= 3>Loại và hiệu lực hợp đồng lao động</th>
					  </tr>
					  <tr>
						<th>Tổng</th>
						<th>Nữ </th>
						<th>Trên 35 tuổi</th>
						<th>Tham gia BHXH bắt buộc</th>
						<th>Nhà quản lý	</th>
						<th>Chuyên môn kỹ thuật bậc cao</th>
						<th>Chuyên môn kỹ thuật bậc trung</th>
						<th>Khác</th>
						<th>Số lao động tham gia HĐLĐ không xác định thời hạn</th>
						<th>Số lao động tham gia HĐLĐ xác định thời hạn</th>
						<th>Số lao động tham gia HĐLĐ khác (dưới 1 tháng, thử việc)</th>
						
					  </tr>
					</thead>
					<tbody>
					  <tr>
						<td>Tổng</td>
						<td>{{$einfo['tong']}}</td>
						<td>{{$einfo['nu']}}</td>
						<td>{{$einfo['age']}}</td>
						<td>{{$einfo['bhxh']}}</td>
						<td>{{$einfo['quanly']}}</td>
						<td>{{$einfo['cmktcao']}}</td>
						<td>{{$einfo['cmkttrung']}}</td>
						<td>{{$einfo['cmktkhac']}}</td>
						<td>{{$einfo['hdkhongthoihan']}}</td>
						<td>{{$einfo['hdcothoihan']}}</td>
						<td>{{$einfo['hdkhac']}}</td>
					  </tr>
					 
					</tbody>
				  </table>
				 <form class="form-inline" method="GET">
					<button class="btn btn-sm btn-default" name="export" value="1" type="submit">Xuất Báo cáo theo mẫu Mẫu số 02/PLI</button>
				</form>
				  </div>
				</div>
				
			</div>
		</div> --}}
    {{-- <div class="row"  >
			<div class="col-xl-12">
				<div class="card card-custom">
					<div class="card-header card-header-tabs-line">
						<div class="card-title">
							<h3 class="card-label text-uppercase">Thông tin Sử dụng lao động</h3>
						</div>
					  <div class="card-heading">Thông tin Sử dụng lao động</div>
					</div>
					<div class="card-body">				  
				  <table class="table table-bordered centered">
					<caption style="text-align:center;"><div> Kỳ hiện tại (tháng <?php echo date('m / Y'); ?>)</div></caption>
					<thead>
					  <tr>
						<th rowspan=2>Biến động </th>
						<th colspan= 4>Tổng số lao động </th>
						<th colspan= 4>Vị trí việc làm </th>
						<th colspan= 3>Loại và hiệu lực hợp đồng lao động</th>
					  </tr>
					  <tr>
						<th>Tổng</th>
						<th>Nữ </th>
						<th>Trên 35 tuổi</th>
						<th>Tham gia BHXH bắt buộc</th>
						<th>Nhà quản lý	</th>
						<th>Chuyên môn kỹ thuật bậc cao</th>
						<th>Chuyên môn kỹ thuật bậc trung</th>
						<th>Khác</th>
						<th>Số lao động tham gia HĐLĐ không xác định thời hạn</th>
						<th>Số lao động tham gia HĐLĐ xác định thời hạn</th>
						<th>Số lao động tham gia HĐLĐ khác (dưới 1 tháng, thử việc)</th>
						
					  </tr>
					</thead>
					<tbody>
					  <tr>
						<td>Tăng</td>
						<td>{{$rinfoup['tong']}}</td>
						<td>{{$rinfoup['nu']}}</td>
						<td>{{$rinfoup['age']}}</td>
						<td>{{$rinfoup['bhxh']}}</td>
						<td>{{$rinfoup['quanly']}}</td>
						<td>{{$rinfoup['cmktcao']}}</td>
						<td>{{$rinfoup['cmkttrung']}}</td>
						<td>{{$rinfoup['cmktkhac']}}</td>
						<td>{{$rinfoup['hdkhongthoihan']}}</td>
						<td>{{$rinfoup['hdcothoihan']}}</td>
						<td>{{$rinfoup['hdkhac']}}</td>
					  </tr>
					 <tr>
						<td>Giảm</td>
						<td>{{$rinfodown['tong']}}</td>
						<td>{{$rinfodown['nu']}}</td>
						<td>{{$rinfodown['age']}}</td>
						<td>{{$rinfodown['bhxh']}}</td>
						<td>{{$rinfodown['quanly']}}</td>
						<td>{{$rinfodown['cmktcao']}}</td>
						<td>{{$rinfodown['cmkttrung']}}</td>
						<td>{{$rinfodown['cmktkhac']}}</td>
						<td>{{$rinfodown['hdkhongthoihan']}}</td>
						<td>{{$rinfodown['hdcothoihan']}}</td>
						<td>{{$rinfodown['hdkhac']}}</td>
					  </tr>
					  <tr>
						<td>Tổng</td>
						<td>{{$rinfoup['tong']-$rinfodown['tong']}}</td>
						<td>{{$rinfoup['nu']-$rinfodown['nu']}}</td>
						<td>{{$rinfoup['age']-$rinfodown['age']}}</td>
						<td>{{$rinfoup['bhxh']-$rinfodown['bhxh']}}</td>
						<td>{{$rinfoup['quanly']-$rinfodown['quanly']}}</td>
						<td>{{$rinfoup['cmktcao']-$rinfodown['cmktcao']}}</td>
						<td>{{$rinfoup['cmkttrung']-$rinfodown['cmkttrung']}}</td>
						<td>{{$rinfoup['cmktkhac']-$rinfodown['cmktkhac']}}</td>
						<td>{{$rinfoup['hdkhongthoihan']-$rinfodown['hdkhongthoihan']}}</td>
						<td>{{$rinfoup['hdcothoihan']-$rinfodown['hdcothoihan']}}</td>
						<td>{{$rinfoup['hdkhac']-$rinfodown['hdkhac']}}</td>
					  </tr>
					</tbody>
				  </table>
				
				
				
				  <table class="table table-bordered centered">
					<caption style="text-align:center;"><div>Kỳ trước(tháng <?php echo date('m / Y', strtotime(date('Y-m-d', strtotime(date('Y-m-d'))) . '-1 month')); ?>)</div></caption>
					<thead>
					  <tr>
						<th rowspan=2>Biến động </th>
						<th colspan= 4>Tổng số lao động </th>
						<th colspan= 4>Vị trí việc làm </th>
						<th colspan= 3>Loại và hiệu lực hợp đồng lao động</th>
					  </tr>
					  <tr>
						<th>Tổng</th>
						<th>Nữ </th>
						<th>Trên 35 tuổi</th>
						<th>Tham gia BHXH bắt buộc</th>
						<th>Nhà quản lý	</th>
						<th>Chuyên môn kỹ thuật bậc cao</th>
						<th>Chuyên môn kỹ thuật bậc trung</th>
						<th>Khác</th>
						<th>Số lao động tham gia HĐLĐ không xác định thời hạn</th>
						<th>Số lao động tham gia HĐLĐ xác định thời hạn</th>
						<th>Số lao động tham gia HĐLĐ khác (dưới 1 tháng, thử việc)</th>
						
					  </tr>
					</thead>
					<tbody>
					  <tr>
						<td>Tăng</td>
						<td>{{$last_rinfoup['tong']}}</td>
						<td>{{$last_rinfoup['nu']}}</td>
						<td>{{$last_rinfoup['age']}}</td>
						<td>{{$last_rinfoup['bhxh']}}</td>
						<td>{{$last_rinfoup['quanly']}}</td>
						<td>{{$last_rinfoup['cmktcao']}}</td>
						<td>{{$last_rinfoup['cmkttrung']}}</td>
						<td>{{$last_rinfoup['cmktkhac']}}</td>
						<td>{{$last_rinfoup['hdkhongthoihan']}}</td>
						<td>{{$last_rinfoup['hdcothoihan']}}</td>
						<td>{{$last_rinfoup['hdkhac']}}</td>
					  </tr>
					 <tr>
						<td>Giảm</td>
						<td>{{$last_rinfodown['tong']}}</td>
						<td>{{$last_rinfodown['nu']}}</td>
						<td>{{$last_rinfodown['age']}}</td>
						<td>{{$last_rinfodown['bhxh']}}</td>
						<td>{{$last_rinfodown['quanly']}}</td>
						<td>{{$last_rinfodown['cmktcao']}}</td>
						<td>{{$last_rinfodown['cmkttrung']}}</td>
						<td>{{$last_rinfodown['cmktkhac']}}</td>
						<td>{{$last_rinfodown['hdkhongthoihan']}}</td>
						<td>{{$last_rinfodown['hdcothoihan']}}</td>
						<td>{{$last_rinfodown['hdkhac']}}</td>
					  </tr>
					  <tr>
						<td>Tổng</td>
						<td>{{$last_rinfoup['tong']-$last_rinfodown['tong']}}</td>
						<td>{{$last_rinfoup['nu']-$last_rinfodown['nu']}}</td>
						<td>{{$last_rinfoup['age']-$last_rinfodown['age']}}</td>
						<td>{{$last_rinfoup['bhxh']-$last_rinfodown['bhxh']}}</td>
						<td>{{$last_rinfoup['quanly']-$last_rinfodown['quanly']}}</td>
						<td>{{$last_rinfoup['cmktcao']-$last_rinfodown['cmktcao']}}</td>
						<td>{{$last_rinfoup['cmkttrung']-$last_rinfodown['cmkttrung']}}</td>
						<td>{{$last_rinfoup['cmktkhac']-$last_rinfodown['cmktkhac']}}</td>
						<td>{{$last_rinfoup['hdkhongthoihan']-$last_rinfodown['hdkhongthoihan']}}</td>
						<td>{{$last_rinfoup['hdcothoihan']-$last_rinfodown['hdcothoihan']}}</td>
						<td>{{$last_rinfoup['hdkhac']-$last_rinfodown['hdkhac']}}</td>
					  </tr>
					</tbody>
				  </table>
			<form class="form-inline" method="GET">	
				<table class="table table-bordered centered">
					<caption style="text-align:center;"><div>
					Bắt đầu
					<input  type="month" name="m_filter_s" value="{{$m_filter_s}}" class="form-control "  onchange="this.form.submit();"  /> </td>
					Kết thúc
					<input type="month" name="m_filter_e" value="{{$m_filter_e}}" class="form-control "  onchange="this.form.submit();"  /> </td>
		
					</div></caption>
					<thead>
					  <tr>
						<th rowspan=2>Biến động </th>
						<th colspan= 4>Tổng số lao động </th>
						<th colspan= 4>Vị trí việc làm </th>
						<th colspan= 3>Loại và hiệu lực hợp đồng lao động</th>
					  </tr>
					  <tr>
						<th>Tổng</th>
						<th>Nữ </th>
						<th>Trên 35 tuổi</th>
						<th>Tham gia BHXH bắt buộc</th>
						<th>Nhà quản lý	</th>
						<th>Chuyên môn kỹ thuật bậc cao</th>
						<th>Chuyên môn kỹ thuật bậc trung</th>
						<th>Khác</th>
						<th>Số lao động tham gia HĐLĐ không xác định thời hạn</th>
						<th>Số lao động tham gia HĐLĐ xác định thời hạn</th>
						<th>Số lao động tham gia HĐLĐ khác (dưới 1 tháng, thử việc)</th>
						
					  </tr>
					</thead>
					<tbody>
					  <tr>
						<td>Tăng</td>
						<td>{{$cus_rinfoup['tong']}}</td>
						<td>{{$cus_rinfoup['nu']}}</td>
						<td>{{$cus_rinfoup['age']}}</td>
						<td>{{$cus_rinfoup['bhxh']}}</td>
						<td>{{$cus_rinfoup['quanly']}}</td>
						<td>{{$cus_rinfoup['cmktcao']}}</td>
						<td>{{$cus_rinfoup['cmkttrung']}}</td>
						<td>{{$cus_rinfoup['cmktkhac']}}</td>
						<td>{{$cus_rinfoup['hdkhongthoihan']}}</td>
						<td>{{$cus_rinfoup['hdcothoihan']}}</td>
						<td>{{$cus_rinfoup['hdkhac']}}</td>
					  </tr>
					 <tr>
						<td>Giảm</td>
						<td>{{$cus_rinfodown['tong']}}</td>
						<td>{{$cus_rinfodown['nu']}}</td>
						<td>{{$cus_rinfodown['age']}}</td>
						<td>{{$cus_rinfodown['bhxh']}}</td>
						<td>{{$cus_rinfodown['quanly']}}</td>
						<td>{{$cus_rinfodown['cmktcao']}}</td>
						<td>{{$cus_rinfodown['cmkttrung']}}</td>
						<td>{{$cus_rinfodown['cmktkhac']}}</td>
						<td>{{$cus_rinfodown['hdkhongthoihan']}}</td>
						<td>{{$cus_rinfodown['hdcothoihan']}}</td>
						<td>{{$cus_rinfodown['hdkhac']}}</td>
					  </tr>
					  <tr>
						<td>Tổng</td>
						<td>{{$cus_rinfoup['tong']-$cus_rinfodown['tong']}}</td>
						<td>{{$cus_rinfoup['nu']-$cus_rinfodown['nu']}}</td>
						<td>{{$cus_rinfoup['age']-$cus_rinfodown['age']}}</td>
						<td>{{$cus_rinfoup['bhxh']-$cus_rinfodown['bhxh']}}</td>
						<td>{{$cus_rinfoup['quanly']-$cus_rinfodown['quanly']}}</td>
						<td>{{$cus_rinfoup['cmktcao']-$cus_rinfodown['cmktcao']}}</td>
						<td>{{$cus_rinfoup['cmkttrung']-$cus_rinfodown['cmkttrung']}}</td>
						<td>{{$cus_rinfoup['cmktkhac']-$cus_rinfodown['cmktkhac']}}</td>
						<td>{{$cus_rinfoup['hdkhongthoihan']-$cus_rinfodown['hdkhongthoihan']}}</td>
						<td>{{$cus_rinfoup['hdcothoihan']-$cus_rinfodown['hdcothoihan']}}</td>
						<td>{{$cus_rinfoup['hdkhac']-$cus_rinfodown['hdkhac']}}</td>
					  </tr>
					</tbody>
				</table>
			</form>
				  </div>
				</div>
				
			</div>
		</div> --}}

    {{-- <div class="row"  style="display:none;">
			<div class="panel-body">
				<div class="col-md-12 w3ls-graph">
					<!--agileinfo-grap-->
						<div class="agileinfo-grap">
							<div class="agileits-box">
								<header class="agileits-box-header clearfix">
									<h3>Thống kê tình trạng thất nghiệp</h3>
										<div class="toolbar">
											
											
										</div>
								</header>
								<div class="agileits-box-body clearfix">
									<div id="hero-area"></div>
								</div>
							</div>
						</div>
	<!--//agileinfo-grap-->

				</div>
			</div>
		</div>
		
				</div>
			</div>
			<div class="clearfix"> </div>
		</div> --}}

    <div class="agileits-w3layouts-stats" style="display:none;">
        <div class="col-md-4 stats-info widget">
            <div class="stats-info-agileits">
                <div class="stats-title">
                    <h4 class="title">Phân bố nhu cầu tuyển dụng</h4>
                </div>
                <div class="stats-body">
                    <ul class="list-unstyled">
                        <li>Lao động phổ thông <span class="pull-right">85%</span>
                            <div class="progress progress-striped active progress-right">
                                <div class="bar green" style="width:85%;"></div>
                            </div>
                        </li>
                        <li>Trung cấp <span class="pull-right">35%</span>
                            <div class="progress progress-striped active progress-right">
                                <div class="bar yellow" style="width:35%;"></div>
                            </div>
                        </li>
                        <li>Cao đẳng <span class="pull-right">78%</span>
                            <div class="progress progress-striped active progress-right">
                                <div class="bar red" style="width:78%;"></div>
                            </div>
                        </li>
                        <li>Đại học <span class="pull-right">50%</span>
                            <div class="progress progress-striped active progress-right">
                                <div class="bar blue" style="width:50%;"></div>
                            </div>
                        </li>
                        <li>Sau đại học <span class="pull-right">80%</span>
                            <div class="progress progress-striped active progress-right">
                                <div class="bar light-blue" style="width:80%;"></div>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4 stats-info widget">
            <div class="stats-info-agileits">
                <div class="stats-title">
                    <h4 class="title">Phân bố doanh nghiệp hoạt động</h4>
                </div>
                <div class="stats-body">
                    <ul class="list-unstyled">
                        <li>Du lịch<span class="pull-right">85%</span>
                            <div class="progress progress-striped active progress-right">
                                <div class="bar green" style="width:85%;"></div>
                            </div>
                        </li>
                        <li>Điện <span class="pull-right">35%</span>
                            <div class="progress progress-striped active progress-right">
                                <div class="bar yellow" style="width:35%;"></div>
                            </div>
                        </li>
                        <li>Điện lạnh <span class="pull-right">78%</span>
                            <div class="progress progress-striped active progress-right">
                                <div class="bar red" style="width:78%;"></div>
                            </div>
                        </li>
                        <li>Giáo viên <span class="pull-right">50%</span>
                            <div class="progress progress-striped active progress-right">
                                <div class="bar blue" style="width:50%;"></div>
                            </div>
                        </li>
                        <li>Khác <span class="pull-right">80%</span>
                            <div class="progress progress-striped active progress-right">
                                <div class="bar light-blue" style="width:80%;"></div>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-4 stats-info widget">
            <div class="stats-info-agileits">
                <div class="stats-title">
                    <h4 class="title">Phân bố thất nghiệp</h4>
                </div>
                <div class="stats-body">
                    <ul class="list-unstyled">
                        <li>Đồng Hới <span class="pull-right">85%</span>
                            <div class="progress progress-striped active progress-right">
                                <div class="bar green" style="width:85%;"></div>
                            </div>
                        </li>
                        <li>Quảng Trạch <span class="pull-right">35%</span>
                            <div class="progress progress-striped active progress-right">
                                <div class="bar yellow" style="width:35%;"></div>
                            </div>
                        </li>
                        <li>Bố Trạch <span class="pull-right">78%</span>
                            <div class="progress progress-striped active progress-right">
                                <div class="bar red" style="width:78%;"></div>
                            </div>
                        </li>
                        <li>Lệ Thủy <span class="pull-right">50%</span>
                            <div class="progress progress-striped active progress-right">
                                <div class="bar blue" style="width:50%;"></div>
                            </div>
                        </li>
                        <li>Tuyên Hóa <span class="pull-right">80%</span>
                            <div class="progress progress-striped active progress-right">
                                <div class="bar light-blue" style="width:80%;"></div>
                            </div>
                        </li>
                        <li>Minh Hóa <span class="pull-right">80%</span>
                            <div class="progress progress-striped active progress-right">
                                <div class="bar light-blue" style="width:80%;"></div>
                            </div>
                        </li>
                        <li>Quảng Ninh <span class="pull-right">80%</span>
                            <div class="progress progress-striped active progress-right">
                                <div class="bar light-blue" style="width:80%;"></div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
    <div class="taskoverview" style="display:none;">
        <div class="col-md-12 stats-info stats-last widget-shadow">
            <div class="stats-last-agile">
                <table class="table stats-table ">
                    <thead>
                        <tr>
                            <th>S.NO</th>
                            <th>Công việc</th>
                            <th>Tình trạng</th>
                            <th>Tiến trình</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Tổ chức tuyển dụng trong kỳ</td>
                            <td><span class="label label-success">Đang tiến hành</span></td>
                            <td>
                                <h5>85% <i class="fa fa-level-up"></i></h5>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Báo cáo định kỳ cho sở</td>
                            <td><span class="label label-warning">Sắp tới deadline</span></td>
                            <td>
                                <h5>35% <i class="fa fa-level-up"></i></h5>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Tập huấn phần mềm cho cán bộ</td>
                            <td><span class="label label-danger">Quá hạn</span></td>
                            <td>
                                <h5 class="down">40% <i class="fa fa-level-down"></i></h5>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
    {{-- <script>
        $(document).ready(function() {

            //CHARTS
            function gd(year, day, month) {
                return new Date(year, month - 1, day).getTime();
            }

            graphArea2 = Morris.Area({
                element: 'hero-area',
                padding: 10,
                behaveLikeLine: true,
                gridEnabled: false,
                gridLineColor: '#dddddd',
                axes: true,
                resize: true,
                smooth: true,
                pointSize: 0,
                lineWidth: 0,
                fillOpacity: 0.85,
                data: [{
                        period: '2019 Q1',
                        cung: 2668,
                        cau: null
                    },
                    {
                        period: '2019 Q2',
                        cung: 15780,
                        cau: 13799
                    },
                    {
                        period: '2019 Q3',
                        cung: 12920,
                        cau: 10975
                    },
                    {
                        period: '2019 Q4',
                        cung: 8770,
                        cau: 6600
                    },
                    {
                        period: '2020 Q1',
                        cung: 10820,
                        cau: 10924
                    },
                    {
                        period: '2020 Q2',
                        cung: 9680,
                        cau: 9010
                    },
                    {
                        period: '2020 Q3',
                        cung: 4830,
                        cau: 3805
                    },
                    {
                        period: '2020 Q4',
                        cung: 15083,
                        cau: 8977
                    },
                    {
                        period: '2021 Q1',
                        cung: 10697,
                        cau: 4470
                    },

                ],
                lineColors: ['#eb6f6f', '#926383'],
                xkey: 'period',
                redraw: true,
                ykeys: ['cung', 'cau'],
                labels: ['Thất nghiệp', 'Nhu cầu'],
                pointSize: 2,
                hideHover: 'auto',
                resize: true
            });


        });
    </script> --}}

@endsection
