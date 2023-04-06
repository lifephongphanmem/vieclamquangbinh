<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="">
    <meta charset="utf-8" />
    <title>Trung tâm dịch vụ việc làm Quảng Bình</title>
    <meta name="description" content="Quản lý việc làm" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="canonical" href="https://phanmemcuocsong.com" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="{{ url('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <!--end::Page Vendors Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{ url('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <!--end::Layout Themes-->
    <link href="{{ url('assets/css/custom-style.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ url('assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('assets/global/plugins/jquery-migrate.min.js') }}" type="text/javascript"></script>

    {{-- <script src="{{ url('assets/global/plugins/bootstrap-toastr/toastr.min.js') }}"></script>
    <link href="{{ url('assets/global/plugins/bootstrap-toastr/toastr.min.css') }}" rel="stylesheet" type="text/css" /> --}}
    <script src="{{ url('assets/global/plugins/bootstrap-toastr/toastr.min.js') }}"></script>
    <link href="{{ url('assets/global/plugins/bootstrap-toastr/toastr.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="{{ url('assets/media/logos/ttdvvl.png') }}" />
    @yield('custom-style')
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" style="background-image: url({{ url('assets/media/bg/bg-10.jpg') }})"
    class="quick-panel-right demo-panel-right offcanvas-right header-fixed subheader-enabled page-loading">
    <!--begin::Main-->
    <!--begin::Header Mobile-->
    <div id="kt_header_mobile" class="header-mobile">
        <!--begin::Logo-->
        <a href="{{ '/dashboard' }}">
            <img alt="Logo" src="{{ url('assets/media/logos/ttdvvl.png') }}" class="logo-default max-h-30px" />
        </a>
        <!--end::Logo-->
        <!--begin::Toolbar-->
        <div class="d-flex align-items-center">
            <button class="btn p-0 burger-icon burger-icon-left ml-4" id="kt_header_mobile_toggle">
                <span></span>
            </button>
            <button class="btn btn-icon btn-hover-transparent-white p-0 ml-3" id="kt_header_mobile_topbar_toggle">
                <span class="svg-icon svg-icon-xl">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
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
                    <!--end::Svg Icon-->
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
                    <div class="d-flex align-items-stretch justify-content-between" style=" width: 90%;margin: 0 auto;">
                        <!--begin::Left-->
                        <div class="d-flex align-items-stretch mr-3">
                            <!--begin::Header Logo-->
                            <div class="header-logo">
                                @if (session('admin')->phanloaitk == 1 )
                                    <a href="{{ '/dashboard' }}">
                                    <img alt="Logo" src="{{ url('assets/media/logos/ttdvvl.png') }}"
                                        class="logo-default max-h-40px" />
                                    <img alt="Logo" src="{{ url('assets/media/logos/ttdvvl.png') }}"
                                        class="logo-sticky max-h-40px" />
                                </a>
                                @else
                                    <a href="{{ '/doanhnghieppanel' }}">
                                    <img alt="Logo" src="{{ url('assets/media/logos/ttdvvl.png') }}"
                                        class="logo-default max-h-40px" />
                                    <img alt="Logo" src="{{ url('assets/media/logos/ttdvvl.png') }}"
                                        class="logo-sticky max-h-40px" />
                                </a>
                                @endif
                          
                            </div>
                            <!--end::Header Logo-->
                            <!--begin::Header Menu Wrapper-->
                            <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
                                <!--begin::Header Menu-->
                                <div id="kt_header_menu"
                                    class="header-menu header-menu-left header-menu-mobile header-menu-layout-default">
                                    <!--begin::Header Nav-->
                                    @include('main_sub_menu')
                                    <!--end::Header Nav-->
                                </div>
                                <!--end::Header Menu-->
                            </div>
                            <!--end::Header Menu Wrapper-->
                        </div>
                        <!--end::Left-->
                        <!--begin::Topbar-->
                        <div class="topbar">
                            <!--begin::Notifications-->
                            <div class="dropdown">
                                <!--begin::Toggle-->
                                <div class="topbar-item" data-offset="10px,0px">
                                    <a href="#" title="Hướng dẫn sử dụng">
                                        <div class="btn btn-icon btn-hover-transparent-white btn-dropdown btn-lg mr-1 pulse pulse-primary">
                                            <span class="svg-icon svg-icon-xl">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                                                    <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                                                </svg>
                                            </span>
                                        </div>
                                    </a>
                                </div>
                                <!--end::Toggle-->
                            </div>
                            <!--end::Notifications-->
                            <!--begin::Notifications-->
                            <div class="dropdown">
                                <!--begin::Toggle-->
                                <div class="topbar-item" data-offset="10px,0px">
                                    <a href="{{ '/thongtinhotro' }}"  target="_blank" title="Trợ giúp">
                                        <div
                                            class="btn btn-icon btn-hover-transparent-white btn-dropdown btn-lg mr-1 pulse pulse-primary">

                                            <span class="svg-icon svg-icon-xl">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Active-call.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24"
                                                            height="24" />
                                                        <path
                                                            d="M13.0799676,14.7839934 L15.2839934,12.5799676 C15.8927139,11.9712471 16.0436229,11.0413042 15.6586342,10.2713269 L15.5337539,10.0215663 C15.1487653,9.25158901 15.2996742,8.3216461 15.9083948,7.71292558 L18.6411989,4.98012149 C18.836461,4.78485934 19.1530435,4.78485934 19.3483056,4.98012149 C19.3863063,5.01812215 19.4179321,5.06200062 19.4419658,5.11006808 L20.5459415,7.31801948 C21.3904962,9.0071287 21.0594452,11.0471565 19.7240871,12.3825146 L13.7252616,18.3813401 C12.2717221,19.8348796 10.1217008,20.3424308 8.17157288,19.6923882 L5.75709327,18.8875616 C5.49512161,18.8002377 5.35354162,18.5170777 5.4408655,18.2551061 C5.46541191,18.1814669 5.50676633,18.114554 5.56165376,18.0596666 L8.21292558,15.4083948 C8.8216461,14.7996742 9.75158901,14.6487653 10.5215663,15.0337539 L10.7713269,15.1586342 C11.5413042,15.5436229 12.4712471,15.3927139 13.0799676,14.7839934 Z"
                                                            fill="#000000" />
                                                        <path
                                                            d="M14.1480759,6.00715131 L13.9566988,7.99797396 C12.4781389,7.8558405 11.0097207,8.36895892 9.93933983,9.43933983 C8.8724631,10.5062166 8.35911588,11.9685602 8.49664195,13.4426352 L6.50528978,13.6284215 C6.31304559,11.5678496 7.03283934,9.51741319 8.52512627,8.02512627 C10.0223249,6.52792766 12.0812426,5.80846733 14.1480759,6.00715131 Z M14.4980938,2.02230302 L14.313049,4.01372424 C11.6618299,3.76737046 9.03000738,4.69181803 7.1109127,6.6109127 C5.19447112,8.52735429 4.26985715,11.1545872 4.51274152,13.802405 L2.52110319,13.985098 C2.22450978,10.7517681 3.35562581,7.53777247 5.69669914,5.19669914 C8.04101739,2.85238089 11.2606138,1.72147333 14.4980938,2.02230302 Z"
                                                            fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>

                                            <span class="pulse-ring">Trợ giúp</span>
                                            {{-- <span class="menu-text">Trợ giúp</span> --}}
                                        </div>
                                    </a>
                                </div>
                                <!--end::Toggle-->
                            </div>
                            <!--end::Notifications-->
                            <!--begin::User-->
                            <div class="dropdown">
                                <!--begin::Toggle-->
                                <div class="topbar-item">
                                    <div class="btn btn-icon btn-hover-transparent-white d-flex align-items-center btn-lg px-md-2 w-md-auto"
                                        id="kt_quick_user_toggle">
                                        {{-- <span class="text-white opacity-70 font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span> --}}
                                        <span
                                            class="text-white opacity-90 font-weight-bolder font-size-base d-none d-md-inline mr-4">{{ session('admin') ? session('admin')->name : '' }}</span>
                                        <span class="symbol symbol-35">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none"
                                                    fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                    <path
                                                        d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                                        fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                    <path
                                                        d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                                        fill="#000000" fill-rule="nonzero"></path>
                                                </g>
                                            </svg>
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
                    <!--begin::Subheader-->
                    <div class="subheader py-2 py-lg-12 subheader-transparent" id="kt_subheader">
                        <div class=" d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                        </div>
                    </div>
                    <!--end::Subheader-->
                    <!--begin::Entry-->
                    <div style="width:90%;margin: 0 auto">
                        <!--begin::Container-->
                        <div>
                            @yield('content')
                            @if (session('admin')->phanloaitk == 1 && session('admin')->sadmin != 'SSA')
                            @include('includes.modal')
                            @endif
                                
            <!-- modal khai báo không biến động -->
            <form method="get" action="{{'/laodong-fnothing'}}" accept-charset="UTF-8" id="frm_khongbiendong" >
                @csrf
                <div id="modal-khongbiendong" tabindex="-1" class="modal fade kt_select2_modal" style="display: none;"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xs">
                        <div class="modal-content">
                            <div class="modal-header modal-header-primary">
                                <h4 id="modal-header-primary-label" class="modal-title">Không có biến động trong kỳ?</h4>
                                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
                            </div>
                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                            <button type="submit" id="submit" name="submit" value="submit" class="btn btn-primary">Đồng
                                ý</button>
                        </div>
                    </div>
                </div>
                </div>
            </form>
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Entry-->
                </div>
                <!--end::Content-->
                <!--begin::Footer-->
                <div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">
                    <!--begin::Container-->
                    <!--begin::Container-->
                    <div class="d-flex flex-column flex-md-row align-items-center justify-content-between"
                        style="width:90%; margin:0 auto;">
                        <!--begin::Copyright-->
                        <div class="text-dark order-2 order-md-1">
                            <span class="text-muted font-weight-bold mr-2">Copyright © 2013-2023</span>
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
    <div id="kt_quick_user" class="offcanvas offcanvas-right p-10">
        <!--begin::Header-->
        {{-- <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
				<h3 class="font-weight-bold m-0">User Profile
				<small class="text-muted font-size-sm ml-2">12 messages</small></h3>
				<a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
					<i class="ki ki-close icon-xs text-muted"></i>
				</a>
			</div> --}}
        <!--end::Header-->
        <!--begin::Content-->
        <div class="offcanvas-content pr-5 mr-n5">
            <!--begin::Header-->
            <div class="d-flex align-items-center mt-5">
                <div class="symbol symbol-100 mr-5">
                    <div class="symbol-label"
                        style="background-image:url({{ url('assets/media/users/default.jpg') }})"></div>
                    <i class="symbol-badge bg-success"></i>
                </div>
                <div class="d-flex flex-column">
                    <a href="#"
                        class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">{{ session('admin') ? session('admin')->name : '' }}</a>
                    {{-- <div class="text-muted mt-1">Application Developer</div> --}}
                    <div class="navi mt-2">
                        <a href="{{ url('/TaiKhoan/DoiMatKhau') }}" class="navi-item">
                            <span class="navi-link p-0 pb-2">
                                <span class="navi-icon mr-1">
                                    <span class="svg-icon svg-icon-lg svg-icon-primary">
                                        <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\General\Unlock.svg-->
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <mask fill="white">
                                                    <use xlink:href="#path-1" />
                                                </mask>
                                                <g />
                                                <path
                                                    d="M15.6274517,4.55882251 L14.4693753,6.2959371 C13.9280401,5.51296885 13.0239252,5 12,5 C10.3431458,5 9,6.34314575 9,8 L9,10 L14,10 L17,10 L18,10 C19.1045695,10 20,10.8954305 20,12 L20,18 C20,19.1045695 19.1045695,20 18,20 L6,20 C4.8954305,20 4,19.1045695 4,18 L4,12 C4,10.8954305 4.8954305,10 6,10 L7,10 L7,8 C7,5.23857625 9.23857625,3 12,3 C13.4280904,3 14.7163444,3.59871093 15.6274517,4.55882251 Z"
                                                    fill="#000000" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </span>
                                <span class="navi-text text-muted text-hover-primary">Đổi mật khẩu</span>
                            </span>
                        </a>
                        <a href="{{ url('/DangXuat') }}"
                            class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5">Đăng xuất</a>
                    </div>
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Separator-->
            <div class="separator separator-dashed mt-8 mb-5"></div>
            <!--end::Separator-->
            <!--begin::Nav-->
            <div class="navi navi-spacer-x-0 p-0">
                <!--begin::Item-->
                {{-- <a href="custom/apps/user/profile-1/personal-information.html" class="navi-item">
						<div class="navi-link">
							<div class="symbol symbol-40 bg-light mr-3">
								<div class="symbol-label">
									<span class="svg-icon svg-icon-md svg-icon-success">
										<!--begin::Svg Icon | path:assets/media/svg/icons/General/Notification2.svg-->
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24" />
												<path d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z" fill="#000000" />
												<circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5" />
											</g>
										</svg>
										<!--end::Svg Icon-->
									</span>
								</div>
							</div>
							<div class="navi-text">
								<div class="font-weight-bold">My Profile</div>
								<div class="text-muted">Account settings and more
								<span class="label label-light-danger label-inline font-weight-bold">update</span></div>
							</div>
						</div>
					</a> --}}
                <!--end:Item-->
            </div>
            <!--end::Nav-->

        </div>
        <!--end::Content-->
    </div>
    <!-- end::User Panel-->
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
    <script>
        var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";
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
    <!--end::Global Config-->
    <!--begin::Global Theme Bundle(used by all pages)-->
    <script src="{{ url('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ url('assets/plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
    <script src="{{ url('assets/js/scripts.bundle.js') }}"></script>
    <!--end::Global Theme Bundle-->
    <!--begin::Page Vendors(used by this page)-->
    <script src="{{ url('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
    {{-- <script src="assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script> --}}
    <!--end::Page Vendors-->
    <!--begin::Page Scripts(used by this page)-->
    <script src="{{ url('assets/js/pages/widgets.js') }}"></script>
    <script src="{{ url('assets/js/pages/main.js') }}"></script>
    <script src="{{ url('assets/js/pages/select2.js') }}"></script>
    <!--end::Page Scripts-->
    @yield('custom-script')
    <script src="{{ url('js/baocaoxa.js') }}"></script>
</body>
<!--end::Body-->

</html>