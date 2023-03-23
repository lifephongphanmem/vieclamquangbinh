<!DOCTYPE html>

<html lang="en">

<!--begin::Head-->

<head>
    <base href="">
    <meta charset="utf-8" />
    {{-- <title>Quản lý việc làm | LifeSoft</title> --}}
    <title>Trung tâm dịch vụ việc làm Quảng Bình</title>
    <meta name="description" content="Quản lý việc làm" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    <link rel="canonical" href="https://phanmemcuocsong.com" />
    <!--begin::hethongcu-->
    {{-- <link rel="stylesheet" href="{{URL::asset('')}}backend/css/bootstrap.min.css" > --}}
    <link href="{{ URL::asset('') }}backend/css/style.css" rel='stylesheet' type='text/css' />
    {{-- <link href="{{URL::asset('')}}backend/css/style-responsive.css" rel="stylesheet"/> --}}

    <!-- font CSS -->
    <link
        href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
        rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="{{ URL::asset('') }}backend/css/font.css" type="text/css" />
    <link href="{{ URL::asset('') }}backend/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('') }}backend/css/morris.css" type="text/css" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    {{-- <link href="{{ url('assets/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet"
    type="text/css" /> --}}
    <!--end::Fonts-->

    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="{{ url('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    {{-- <link href="{{ url('assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" /> --}}
    <!--end::Page Vendors Styles-->
    <script src="{{ url('assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('assets/global/plugins/jquery-migrate.min.js') }}" type="text/javascript"></script>


    {{-- <link href="{{ url('backend/css/style.css') }}" rel="stylesheet" type="text/css" /> --}}

    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{ url('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ url('assets/global/plugins/bootstrap-toastr/toastr.min.js') }}"></script>
    <link href="{{ url('assets/global/plugins/bootstrap-toastr/toastr.min.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ url('assets/global/plugins/bootstrap-toastr/toastr.min.js') }}"></script>
    <link href="{{ url('assets/global/plugins/bootstrap-toastr/toastr.min.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->
    {{-- <link href="{{ url('assets/global/plugins/bootstrap-toastr/toastr.min.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ url('assets/global/plugins/bootstrap-toastr/toastr.min.js') }}"></script> --}}
    <!--begin::Layout Themes(used by all pages)-->
    <!--end::Layout Themes-->


{{-- CSS mới  --}}
    		{{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" /> --}}
		<!--end::Fonts-->
		<!--begin::Page Vendors Styles(used by this page)-->
		{{-- <link href="assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" /> --}}
		<!--end::Page Vendors Styles-->
		<!--begin::Global Theme Styles(used by all pages)-->
		{{-- <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" /> --}}
		{{-- <link href="assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" /> --}}
		{{-- <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" /> --}}
		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		<!--end::Layout Themes-->
		<link rel="shortcut icon" href="{{ url('assets/media/logos/ttdvvl.png') }}" />
    @yield('custom-style')
    {{-- <link rel="shortcut icon" href="{{ url('assets/media/logos/ttdvvl.png') }}" /> --}}
</head>

<!--end::Head-->

<!--begin::Body-->

<body id="kt_body" style="background-image: url({{ url('assets/media/bg/bg-10.jpg') }})"
    class="page-loading-enabled page-loading quick-panel-right demo-panel-right offcanvas-right header-static aside-enabled aside-static page-loading">

    <!--begin::Page loader-->
    <div class="page-loader page-loader-logo">
        <img alt="Logo" class="max-h-75px" src="{{ url('assets/media/logos/Icon_Life.png') }}" />
        <div class="spinner spinner-primary"></div>
    </div>
    <!--end::Page Loader-->

    <!--begin::Main-->
    <!--begin::Header Mobile-->
    <div id="kt_header_mobile" class="header-mobile">
        <!--begin::Logo-->
        <a href="index.html">
            <img alt="Logo" src="{{ url('assets/media/logos/Icon_Life.png') }}" class="logo-default max-h-30px" />
        </a>

        <!--end::Logo-->

        <!--begin::Toolbar-->
        <div class="d-flex align-items-center">
            <button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
                <span></span>
            </button>

            <button class="btn btn-icon btn-hover-transparent-white p-0 ml-3" id="kt_header_mobile_topbar_toggle">
                <span class="svg-icon svg-icon-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                        height="24px" viewBox="0 0 24 24" version="1.1">
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
                </span>
            </button>
        </div>

        <!--end::Toolbar-->
    </div>
    <!--end::Header Mobile-->

    <div class="d-flex flex-column flex-root">

        <!--begin::Page-->
        <div class="d-flex flex-row flex-column-fluid page">

            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">

                <!--begin::Header-->
                <div id="kt_header" class="header header-fixed">

                    <!--begin::Container-->
                    <div class="container-fluid d-flex align-items-stretch justify-content-between">

                        <!--begin::Left-->
                        <div class="d-flex align-items-stretch mr-3">
                        </div>
                        <!--end::Left-->

                        <!--begin::Topbar-->
                        <div class="topbar">
                            <!--begin::Notifications-->
                            <div class="dropdown">
                                <!--begin::Toggle-->
                                <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px" title="Trợ giúp">
                                    <div class="btn btn-icon btn-hover-transparent-white btn-dropdown btn-lg mr-1 pulse pulse-primary w-md-auto">
                                        <span class="text-white font-weight-bold font-size-base d-none d-md-inline mr-1">Trợ giúp</span>
                                        <span class="svg-icon svg-icon-xl">
                                            <img src="assets/media/svg/icons/Code/Compiling.svg" />
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Code/Compiling.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none"
                                                    fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24"
                                                        height="24" />
                                                    <path
                                                        d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z"
                                                        fill="#000000" opacity="0.3" />
                                                    <path
                                                        d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z"
                                                        fill="#000000" />
                                                </g>
                                            </svg>

                                            <!--end::Svg Icon-->
                                        </span>
                                        <span class="pulse-ring"></span>
                                    </div>
                                </div>

                                <!--end::Toggle-->

                                <!--begin::Dropdown-->
                                <div
                                    class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
                                    <form>
                                        <!--begin::Header-->
                                        <div class="d-flex flex-column bgi-size-cover bgi-no-repeat rounded-top"
                                            style="background-image: url(assets/media/misc/bg-1.jpg)">
                                            <!--begin::Tabs-->
                                            <ul class="nav nav-bold nav-tabs nav-tabs-line nav-tabs-line-3x nav-tabs-line-transparent-white nav-tabs-line-active-border-success mt-3 px-8"
                                                role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active show" data-toggle="tab"
                                                        href="#topbar_notifications_notifications">Thông tin trợ
                                                        giúp</a>
                                                </li>
                                            </ul>
                                            <!--end::Tabs-->
                                        </div>

                                        <!--end::Header-->

                                        <!--begin::Content-->
                                        <div class="tab-content">

                                            <!--begin::Tabpane-->
                                            <div class="tab-pane active show p-8"
                                                id="topbar_notifications_notifications" role="tabpanel">

                                                <!--begin::Scroll-->
                                                <div class="scroll pr-7 mr-n7" data-scroll="true" data-height="300"
                                                    data-mobile-height="200">

                                                    <!--begin::Item-->
                                                    <div class="d-flex align-items-center mb-6">

                                                        <!--begin::Symbol-->
                                                        <div class="symbol symbol-40 symbol-light-primary mr-5">
                                                            <span class="symbol-label">
                                                                <span class="svg-icon svg-icon-lg svg-icon-primary">

                                                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        width="24px" height="24px"
                                                                        viewBox="0 0 24 24" version="1.1">
                                                                        <g stroke="none" stroke-width="1"
                                                                            fill="none" fill-rule="evenodd">
                                                                            <rect x="0" y="0"
                                                                                width="24" height="24" />
                                                                            <path
                                                                                d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z"
                                                                                fill="#000000" />
                                                                            <rect fill="#000000" opacity="0.3"
                                                                                transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)"
                                                                                x="16.3255682" y="2.94551858"
                                                                                width="3" height="18"
                                                                                rx="1" />
                                                                        </g>
                                                                    </svg>

                                                                    <!--end::Svg Icon-->
                                                                </span>
                                                            </span>
                                                        </div>

                                                        <!--end::Symbol-->

                                                        <!--begin::Text-->
                                                        <div class="d-flex flex-column font-weight-bold">
                                                            <a href="#"
                                                                class="text-dark text-hover-primary mb-1 font-size-lg">Hỗ
                                                                trợ</a>
                                                            <span class="text-muted">Thông tin văn phòng hỗ trợ</span>
                                                        </div>

                                                        <!--end::Text-->
                                                    </div>

                                                    <!--end::Item-->

                                                    <!--begin::Item-->
                                                    <div class="d-flex align-items-center mb-6">

                                                        <!--begin::Symbol-->
                                                        <div class="symbol symbol-40 symbol-light-warning mr-5">
                                                            <span class="symbol-label">
                                                                <span class="svg-icon svg-icon-lg svg-icon-warning">

                                                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg-->
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        width="24px" height="24px"
                                                                        viewBox="0 0 24 24" version="1.1">
                                                                        <g stroke="none" stroke-width="1"
                                                                            fill="none" fill-rule="evenodd">
                                                                            <rect x="0" y="0"
                                                                                width="24" height="24" />
                                                                            <path
                                                                                d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z"
                                                                                fill="#000000" fill-rule="nonzero"
                                                                                transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                                                            <path
                                                                                d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z"
                                                                                fill="#000000" fill-rule="nonzero"
                                                                                opacity="0.3" />
                                                                        </g>
                                                                    </svg>

                                                                    <!--end::Svg Icon-->
                                                                </span>
                                                            </span>
                                                        </div>

                                                        <!--end::Symbol-->

                                                        <!--begin::Text-->
                                                        <div class="d-flex flex-column font-weight-bold">
                                                            <a href="#"
                                                                class="text-dark-75 text-hover-primary mb-1 font-size-lg">Tài
                                                                liệu</a>
                                                            <span class="text-muted">Tài liệu hướng dẫn sử dụng</span>
                                                        </div>

                                                        <!--end::Text-->
                                                    </div>

                                                    <!--end::Item-->
                                                </div>
                                                <!--end::Scroll-->
                                            </div>
                                            <!--end::Tabpane-->
                                        </div>
                                        <!--end::Content-->
                                    </form>
                                </div>

                                <!--end::Dropdown-->
                            </div>

                            <!--end::Notifications-->


                            <!--begin::User-->
                            <div class="dropdown">
                                <!--begin::Toggle-->
                                <div class="topbar-item">
                                    <div class="btn btn-icon btn-hover-transparent-white d-flex align-items-center btn-lg px-md-2 w-md-auto"
                                        id="kt_quick_user_toggle">
                                        <span
                                            class="text-white opacity-70 font-weight-bold font-size-base d-none d-md-inline mr-1">Xin
                                            chào,</span>
                                        <span
                                            class="text-white font-weight-bolder font-size-base d-none d-md-inline mr-4">{{ session('admin') ? session('admin')->name : '' }}</span>
                                        {{-- class="text-white font-weight-bolder font-size-base d-none d-md-inline mr-4"> {{Auth::user()->name}}</span> --}}
                                        <span class="symbol symbol-35">
                                            <span class="symbol-label bg-white-o-50">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24" />
                                                        <path
                                                            d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                                            fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                        <path
                                                            d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                                            fill="#000000" fill-rule="nonzero" />
                                                    </g>
                                                </svg>
                                            </span>
                                        </span>
                                    </div>
                                </div>

                                <!--end::Toggle-->
                            </div>

                            <!--end::User-->
                        </div>

                        <!--end::Topbar-->
                    </div>

                    <!--end::Container-->
                </div>

                <!--end::Header-->

                <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <!--begin::Entry-->
                    <div class="d-flex flex-column-fluid">
                        <!--begin::Container-->
                        <div class="container-fluid">
                            <div class="d-lg-flex flex-row-fluid">
                                <!--begin::Aside-->
                                @include('main_sub_menu')
                                <!--end::Aside-->

                                <div class="content-wrapper flex-row-fluid">
                                    @yield('content')

                                </div>
                            </div>
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Entry-->
                </div>

                <!--end::Content-->

                <!--begin::Footer-->
                <div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">
                    <!--begin::Container-->
                    <div class="container d-flex flex-column flex-md-row align-items-center justify-content-between">
                        <!--begin::Copyright-->
                        <div class="text-dark order-2 order-md-1">
                            <span class="text-muted font-weight-bold mr-2">Copyright © 2013-2022</span>
                            <a href="https://phanmemcuocsong.com/" target="_blank"
                                class="text-dark-75 text-hover-primary">LifeSoft</a>
                            <span class="text-muted font-weight-bold mr-2">Tiện ích hơn - Hiệu quả hơn</span>
                        </div>
                        <!--end::Copyright-->
                        <!--begin::Nav-->
                        <div class="nav nav-dark">
                            <a href="https://phanmemcuocsong.com/gioi-thieu/" target="_blank"
                                class="nav-link pl-0 pr-5">Về chúng tôi</a>
                            <a href="https://phanmemcuocsong.com/lien-he/" target="_blank"
                                class="nav-link pl-0 pr-0">Liên hệ</a>
                        </div>
                        <!--end::Nav-->
                    </div>
                    <!--end::Container-->
                </div>

                <!--end::Footer-->
            </div>

            <!--end::Wrapper-->
        </div>

        <!--end::Page-->
    </div>
    <!--end::Main-->

    <!-- begin::User Panel-->
    <div id="kt_quick_user" class="offcanvas offcanvas-right p-10" style="background-color: #1BC5BD">

        <!--begin::Header-->
        <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
            {{-- <h3 class="font-weight-bold m-0">User Profile
					<small class="text-muted font-size-sm ml-2">12 messages</small>
				</h3> --}}
            <div class="btn btn-icon btn-hover-transparent-white d-flex align-items-center btn-lg px-md-2 w-md-auto"
                id="kt_quick_user_toggle">
                {{-- <span
                    class="text-white opacity-70 font-weight-bold font-size-base d-none d-md-inline mr-1">Xin chào,</span> --}}
                <span
                    class="font-weight-bolder font-size-base d-none d-md-inline mr-4">{{ session('admin') ? session('admin')->name : '' }}</span>
                <span class="symbol symbol-35">
                    <span class="symbol-label bg-white-o-50">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
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
                    </span>
                </span>
            </div>
            <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
                <i class="ki ki-close icon-xs text-muted"></i>
            </a>
        </div>

        <!--end::Header-->

        <!--begin::Content-->
        <div class="offcanvas-content pr-5 mr-n5">


            <!--begin::Separator-->
            <div class="separator separator-dashed mt-8 mb-5"></div>

            <!--end::Separator-->

            <!--begin::Nav-->
            <div class="navi navi-spacer-x-0 p-0">

                <!--begin::Item-->
                <a href="{{ url('/TaiKhoan/DoiMatKhau') }}" class="navi-item">
                    <div class="navi-link">
                        <div class="symbol symbol-40 bg-light mr-3">
                            <div class="symbol-label">
                                <span class="svg-icon svg-icon-md svg-icon-success">

                                    <!--begin::Svg Icon | path:assets/media/svg/icons/General/Notification2.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path
                                                d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z"
                                                fill="#000000" />
                                            <circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5"
                                                r="2.5" />
                                        </g>
                                    </svg>

                                    <!--end::Svg Icon-->
                                </span>
                            </div>
                        </div>
                        <div class="navi-text">
                            <div class="font-weight-bold">Đổi mật khẩu</div>
                        </div>
                    </div>
                </a>

                <!--end:Item-->

                <!--begin::Item-->
                {{-- <a href="{{url('/doanhnghiep/taikhoan')}}" class="navi-item">
						<div class="navi-link">
							<div class="symbol symbol-40 bg-light mr-3">
								<div class="symbol-label">
									<span class="svg-icon svg-icon-md svg-icon-warning">

										<!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Chart-bar1.svg-->
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24" />
												<rect fill="#000000" opacity="0.3" x="12" y="4" width="3" height="13" rx="1.5" />
												<rect fill="#000000" opacity="0.3" x="7" y="9" width="3" height="8" rx="1.5" />
												<path d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z" fill="#000000" fill-rule="nonzero" />
												<rect fill="#000000" opacity="0.3" x="17" y="11" width="3" height="6" rx="1.5" />
											</g>
										</svg>

										<!--end::Svg Icon-->
									</span>
								</div>
							</div>
							<div class="navi-text">
								<div class="font-weight-bold">Thông báo</div>
							</div>
						</div>
					</a> --}}

                <!--end:Item-->

                <!--begin::Item-->
                <a href="{{ url('/DangXuat') }}" class="navi-item">
                    <div class="navi-link">
                        <div class="symbol symbol-40 bg-light mr-3">
                            <div class="symbol-label">
                                <span class="svg-icon svg-icon-md svg-icon-danger">

                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Files/Selected-file.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24" />
                                            <path
                                                d="M4.85714286,1 L11.7364114,1 C12.0910962,1 12.4343066,1.12568431 12.7051108,1.35473959 L17.4686994,5.3839416 C17.8056532,5.66894833 18,6.08787823 18,6.52920201 L18,19.0833333 C18,20.8738751 17.9795521,21 16.1428571,21 L4.85714286,21 C3.02044787,21 3,20.8738751 3,19.0833333 L3,2.91666667 C3,1.12612489 3.02044787,1 4.85714286,1 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z"
                                                fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                            <path
                                                d="M6.85714286,3 L14.7364114,3 C15.0910962,3 15.4343066,3.12568431 15.7051108,3.35473959 L20.4686994,7.3839416 C20.8056532,7.66894833 21,8.08787823 21,8.52920201 L21,21.0833333 C21,22.8738751 20.9795521,23 19.1428571,23 L6.85714286,23 C5.02044787,23 5,22.8738751 5,21.0833333 L5,4.91666667 C5,3.12612489 5.02044787,3 6.85714286,3 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z"
                                                fill="#000000" fill-rule="nonzero" />
                                        </g>
                                    </svg>

                                    <!--end::Svg Icon-->
                                </span>
                            </div>
                        </div>
                        <div class="navi-text">
                            <div class="font-weight-bold">Đăng xuất</div>
                        </div>
                    </div>
                </a>

                <!--end:Item-->
            </div>

            <!--end::Nav-->
        </div>

        <!--end::Content-->
    </div>

    <!-- end::User Panel-->

    <!--[html-partial:include:{"file":"partials/_extras/offcanvas/quick-panel.html"}]/-->

    <!--[html-partial:include:{"file":"partials/_extras/chat.html"}]/-->

    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop">
        <span class="svg-icon">

            <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Up-2.svg-->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24" />
                    <rect fill="#000000" opacity="0.3" x="11" y="10" width="2"
                        height="10" rx="1" />
                    <path
                        d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z"
                        fill="#000000" fill-rule="nonzero" />
                </g>
            </svg>

            <!--end::Svg Icon-->
        </span>
    </div>

    <!--end::Scrolltop-->
    <script>
        var HOST_URL = "https://phanmemcuocsong.com";
    </script>

    <!--begin::Global Config(global config for global JS scripts)-->
    <script>
        var KTAppSettings = {
            "breakpoints": {
                "sm": 576,
                "md": 768,
                "lg": 992,
                "xl": 1200,
                "xxl": 1200
            },
            "colors": {
                "theme": {
                    "base": {
                        "white": "#ffffff",
                        "primary": "#6993FF",
                        "secondary": "#E5EAEE",
                        "success": "#1BC5BD",
                        "info": "#8950FC",
                        "warning": "#FFA800",
                        "danger": "#F64E60",
                        "light": "#F3F6F9",
                        "dark": "#212121"
                    },
                    "light": {
                        "white": "#ffffff",
                        "primary": "#E1E9FF",
                        "secondary": "#ECF0F3",
                        "success": "#C9F7F5",
                        "info": "#EEE5FF",
                        "warning": "#FFF4DE",
                        "danger": "#FFE2E5",
                        "light": "#F3F6F9",
                        "dark": "#D6D6E0"
                    },
                    "inverse": {
                        "white": "#ffffff",
                        "primary": "#ffffff",
                        "secondary": "#212121",
                        "success": "#ffffff",
                        "info": "#ffffff",
                        "warning": "#ffffff",
                        "danger": "#ffffff",
                        "light": "#464E5F",
                        "dark": "#ffffff"
                    }
                },
                "gray": {
                    "gray-100": "#F3F6F9",
                    "gray-200": "#ECF0F3",
                    "gray-300": "#E5EAEE",
                    "gray-400": "#D6D6E0",
                    "gray-500": "#B5B5C3",
                    "gray-600": "#80808F",
                    "gray-700": "#464E5F",
                    "gray-800": "#1B283F",
                    "gray-900": "#212121"
                }
            },
            "font-family": "Poppins"
        };
    </script>

    @if (Session::has('success'))
        <script>
            toastr.success("{!! Session::get('success') !!}");
        </script>
    @endif

    @if (Session::has('error'))
        <script>
            toastr.error("{!! Session::get('success') !!}");
        </script>
    @endif


    <!--end::Global Config-->

    <!--begin::Global Theme Bundle(used by all pages)-->
    <script src="{{ url('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ url('assets/plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
    <script src="{{ url('assets/js/scripts.bundle.js') }}"></script>
    <!--end::Global Theme Bundle-->
    <script src="{{ url('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
    <!--begin::Page Vendors(used by this page)-->
    <script src="{{ url('assets/js/pages/widgets.js') }}"></script>
    <script src="{{ url('assets/js/pages/main.js') }}"></script>
    <script src="{{ url('assets/js/pages/select2.js') }}"></script>
    {{-- <script src="{{ url('assets/js/pages/bootstrap.js') }}"></script> --}}
    <script src="{{ URL::asset('') }}backend/js/jquery.scrollTo.js"></script>
    {{-- <script src="{{ url('assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script> --}}
    {{-- <script src="{{ url('assets/global/plugins/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script> --}}
    <script src="{{ url('assets/global/plugins/bootstrap-toastr/toastr.min.js') }}"></script>

    <!--end::Page Vendors-->
    {{-- <script src="{{ url('assets/global/plugins/bootstrap-toastr/toastr.min.js') }}"></script> --}}
    <!--begin::Page Scripts(used by this page)-->

    @yield('custom-script')
    <!--end::Page Scripts-->
</body>

<!--end::Body-->

</html>
