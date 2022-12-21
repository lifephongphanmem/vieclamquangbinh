<!DOCTYPE html>
<!--
Template Name: Metronic - Bootstrap 4 HTML, React, Angular 11 & VueJS Admin Dashboard Theme
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: https://1.envato.market/EA4JP
Renew Support: https://1.envato.market/EA4JP
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">
<!--begin::Head-->

<head>
    <base href="../../../../">
    <meta charset="utf-8" />
    <title>Đăng nhập | QLVL</title>
    <meta name="description" content="Đăng nhập hệ thống" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="canonical" href="https://phanmemcuocsong.com/" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Custom Styles(used by this page)-->
    <link href="{{ url('assets/css/pages/login/classic/login-6.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Page Custom Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{ url('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <!--end::Layout Themes-->
    <link rel="shortcut icon" href="{{ url('assets/media/logos/LIFESOFT.png') }}" />
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body"
    class="header-mobile-fixed subheader-enabled aside-enabled aside-fixed aside-secondary-enabled page-loading">
    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Login-->
        <div class="login login-6 login-signin-on login-signin-on d-flex flex-column-fluid" id="kt_login">
            <div class="d-flex flex-column flex-lg-row flex-row-fluid text-center"
                style="background-image: url(assets/media/bg/bg-3.jpg);">
                <!--begin:Aside-->
                <div class="d-flex w-100 flex-center p-15">
                    <div class="login-wrapper">
                        <!--begin:Aside Content-->
                        <div class="text-dark-75">
                            <a href="#">
                                <img src="{{ url('assets/media/logos/LIFESOFT.png') }}" class="max-h-75px"
                                    alt="" />
                            </a>
                            <h3 class="mb-8 mt-22 font-weight-bold text-uppercase">Phần mềm quản lý việc làm</h3>
                            <p class="mb-15 text-muted font-weight-bold text-uppercase">
                                <a href="https://phanmemcuocsong.com/" target="_blank">
                                    Tiện ích hơn - hiệu quả hơn
                                </a>
                            </p>
                            <button type="button" id="kt_login_signup"
                                class="btn btn-outline-primary btn-pill py-4 px-9 font-weight-bold">ĐĂNG KÝ MỚI</button>
                        </div>
                        <!--end:Aside Content-->
                    </div>
                </div>
                <!--end:Aside-->
                <!--begin:Divider-->
                <div class="login-divider">
                    <div></div>
                </div>
                <!--end:Divider-->
                <!--begin:Content-->
                <div class="d-flex w-100 flex-center p-15 position-relative overflow-hidden">
                    <div class="login-wrapper">
                        <!--begin:Sign In Form-->
                        <div class="login-signin">
                            <div class="text-center mb-10 mb-lg-20">
                                <h2 class="font-weight-bold">ĐĂNG NHẬP HỆ THỐNG</h2>
                                <p class="text-muted font-weight-bold">Nhập thông tin tài khoản</p>
                            </div>

                            <div class="flash-message text-center">
                                @if (Session::has('message'))
                                    <p class="alert alert-info ">{{ Session::get('message') }}</p>
                                @endif
                                @if ($errors->has('message'))
                                    <p class="alert alert-danger ">{{ $errors->first('message') }}</p>
                                @endif
                            </div>

                            {!! Form::open(['url' => '/DangNhap', 'class' => 'form text-left', 'id' => 'kt_login_signin_form']) !!}
                            <div class="input-group form-group py-2 m-0">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-user"></i>
                                    </span>
                                </div>
                                <input class="form-control border-1 px-5 placeholder-dark-75" title="Tên tài khoản"
                                    type="text" placeholder="Tên tài khoản truy cập" id="username" name="username"
                                    value="{{ $input['username'] ?? '' }}" required autocomplete="off" />
                            </div>

                            <div class="input-group form-group py-2 m-0">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                </div>
                                <input class="form-control border-1 px-5 placeholder-dark-75" title="Mật khẩu đăng nhập"
                                    type="Password" placeholder="Mật khẩu" id="password" name="password" required />
                            </div>
                            <div class="form-group d-flex flex-wrap justify-content-between align-items-center mt-5">
                                <div class="checkbox-inline">
                                    <label class="checkbox m-0 text-muted font-weight-bold">
                                        <input type="checkbox" name="remember" />
                                        <span></span>Nhớ thông tin tài khoản</label>
                                </div>
                                <a href="javascript:;" class="text-muted text-hover-primary font-weight-bold">Quên mật
                                    khẩu ?</a>
                            </div>

                            <div class="text-center mt-15">
                                <button id="kt_login_signin_submit" type="submit"
                                    class="btn btn-primary btn-pill shadow-sm py-4 px-9 font-weight-bold">ĐĂNG NHẬP</button>
                            </div>
                            </form>
                        </div>
                        <!--end:Sign In Form-->
                        <!--begin:Sign Up Form-->
                        <div class="login-signup">
                            <div class="text-center mb-10 mb-lg-20">
								<h3 class="">ĐĂNG KÝ MỚI</h3>
                                <p class="text-muted font-weight-bold">Nhập thông tin doanh nghiệp</p>
							</div>

							{!! Form::open(['url' => '/DangKy', 'class' => 'form text-left', 'id' => 'kt_login_signup_form']) !!}                            
                                <div class="form-group py-2 m-0">
                                    <input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="text"
                                        placeholder="Tên công ty" name="name" required />
                                </div>

                                <div class="form-group py-2 m-0 border-top">
                                    <input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="text"
                                        placeholder="Tên tài khoản" name="username" required />
                                </div>

                                <div class="form-group py-2 m-0 border-top">                                    
                                    <input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="text"
                                        placeholder="Mã số DKKD (* Không thể thay đổi sau này )" name="dkkd"
                                        required />
                                </div>

                                <div class="form-group py-2 m-0 border-top">
                                    <input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="text"
                                        placeholder="Email Address (* Không thể thay đổi sau này)" name="email"
                                        autocomplete="off" />
                                </div>

                                <div class="form-group py-2 m-0 border-top">
                                    @if ($errors->has('password'))
                                        <span class="text-danger">
                                            <i>Mật khẩu chưa trùng khớp</i>
                                        </span>
                                    @endif
                                    <input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="password"
                                        placeholder="Mật khẩu" name="password" />
                                </div>
                                <div class="form-group py-2 m-0 border-top">
                                    <input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="password"
                                        placeholder="Xác nhận lại mật khẩu" name="password_confirmation" />
                                </div>

                                <div class="form-group d-flex flex-wrap flex-center">
                                    <button id="kt_login_signup_submit"
                                        class="btn btn-primary btn-pill font-weight-bold px-9 py-4 my-3 mx-2">ĐĂNG KÝ</button>
                                    <button id="kt_login_signup_cancel"
                                        class="btn btn-outline-primary btn-pill font-weight-bold px-9 py-4 my-3 mx-2">HỦY BỎ</button>
                                </div>
                            </form>
                        </div>
                        <!--end:Sign Up Form-->
                        <!--begin:Forgot Password Form-->
                        <div class="login-forgot">
                            <div class="text-center mb-10 mb-lg-20">
                                <h3 class="">Forgotten Password ?</h3>
                                <p class="text-muted font-weight-bold">Enter your email to reset your password</p>
                            </div>
                            <form class="form text-left" id="kt_login_forgot_form">
                                <div class="form-group py-2 m-0 border-bottom">
                                    <input class="form-control h-auto border-0 px-0 placeholder-dark-75"
                                        type="text" placeholder="Email" name="email" autocomplete="off" />
                                </div>
                                <div class="form-group d-flex flex-wrap flex-center mt-10">
                                    <button id="kt_login_forgot_submit"
                                        class="btn btn-primary btn-pill font-weight-bold px-9 py-4 my-3 mx-2">Submit</button>
                                    <button id="kt_login_forgot_cancel"
                                        class="btn btn-outline-primary btn-pill font-weight-bold px-9 py-4 my-3 mx-2">Cancel</button>
                                </div>
                            </form>
                        </div>
                        <!--end:Forgot Password Form-->
                    </div>
                </div>
                <!--end:Content-->
            </div>
        </div>
        <!--end::Login-->
    </div>
    <!--end::Main-->
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
                        "primary": "#1BC5BD",
                        "secondary": "#E5EAEE",
                        "success": "#1BC5BD",
                        "info": "#6993FF",
                        "warning": "#FFA800",
                        "danger": "#F64E60",
                        "light": "#F3F6F9",
                        "dark": "#212121"
                    },
                    "light": {
                        "white": "#ffffff",
                        "primary": "#1BC5BD",
                        "secondary": "#ECF0F3",
                        "success": "#C9F7F5",
                        "info": "#E1E9FF",
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
    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script src="assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
    <script src="assets/js/scripts.bundle.js"></script>
    <!--end::Global Theme Bundle-->
    <!--begin::Page Scripts(used by this page)-->
    <script src="assets/js/pages/custom/login/login-general.js"></script>
    <!--end::Page Scripts-->
</body>
<!--end::Body-->

</html>
