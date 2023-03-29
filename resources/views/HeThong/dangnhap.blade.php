
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
	<head><base href="../../../../">
		<meta charset="utf-8" />
		<title>Đăng nhập | QLVL</title>
		<meta name="description" content="Login page example" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<link rel="canonical" href="https://keenthemes.com/metronic" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Custom Styles(used by this page)-->
		<link href="{{url('assets/css/pages/login/classic/login-4.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Page Custom Styles-->
		<!--begin::Global Theme Styles(used by all pages)-->
        <link href="{{ url('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		{{-- <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" /> --}}
        <link href="{{ url('assets/plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css" />
		{{-- <link href="assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" /> --}}
        <link href="{{ url('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
		{{-- <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" /> --}}
		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		<!--end::Layout Themes-->
		{{-- <link rel="shortcut icon" href="assets/media/logos/favicon.ico" /> --}}

    <link rel="shortcut icon" href="{{ url('assets/media/logos/ttdvvl.png') }}" />
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled page-loading">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Login-->
			<div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
				<div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat" style="background-image: url('assets/media/bg/bg-3.jpg');">
					<div class="login-form text-center p-7 position-relative overflow-hidden">
						<!--begin::Login Header-->
						<div class="d-flex flex-center mb-15">
							<a href="#">
								<img src="{{ url('assets/media/logos/ttdvvl.png') }}" class="max-h-150px" alt="" />
							</a>
						</div>
						<!--end::Login Header-->
						<!--begin::Login Sign in form-->
						<div class="login-signin">
							<div class="mb-20">
								<h3>ĐĂNG NHẬP HỆ THỐNG</h3>
								<div class="text-muted font-weight-bold">Nhập thông tin tài khoản:</div>
							</div>
                            <div class="flash-message text-center">
                                @if (Session::has('message'))
                                    <p class="alert alert-info ">{{ Session::get('message') }}</p>
                                @endif
                                @if ($errors->has('message'))
                                    <p class="alert alert-danger ">{{ $errors->first('message') }}</p>
                                @endif
                                @if ($errors->has('email') || $errors->has('dkkd') || $errors->has('password'))
                                    <p class="alert alert-danger">Đăng ký lỗi. Trở lại trang đăng ký để kiểm tra.</p>
                                @endif

                            </div>
							{{-- <form class="form" id="kt_login_signin_form"> --}}
                                {!! Form::open(['url' => '/DangNhap', 'class' => 'form text-left', 'id' => 'kt_login_signin_form']) !!}
								<div class="form-group mb-5">
									<input class="form-control h-auto form-control-solid py-4 px-8" type="text" placeholder="Tên tài khoản truy cập" id="username"  value="{{ $username ?? '' }}" name="username" required autocomplete="off" />
								</div>
								<div class="form-group mb-5">
									<input class="form-control h-auto form-control-solid py-4 px-8" type="password" placeholder="Mật khẩu" id="password" name="password" required  />
								</div>
								{{-- <div class="form-group d-flex flex-wrap justify-content-between align-items-center">
									<div class="checkbox-inline">
										<label class="checkbox m-0 text-muted">
										<input type="checkbox" name="remember" />
										<span></span>Remember me</label>
									</div>
									<a href="javascript:;" id="kt_login_forgot" class="text-muted text-hover-primary">Forget Password ?</a>
								</div> --}}
								<button id="kt_login_signin_submit" type="submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">Đăng nhập</button>
                                <a href="{{'/danh_sach_tai_khoan?mahuyen=ALL'}}"
                                class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">DANH SÁCH TÀI KHOẢN</a>
							</form>
							<div class="mt-10">
								<span class="opacity-70 mr-4">Đăng ký tài khoản cho doanh nghiệp</span>
								<a href="javascript:;" id="kt_login_signup" class="text-muted text-hover-primary font-weight-bold">Đăng ký!</a>
							</div>
						</div>
						<!--end::Login Sign in form-->
						<!--begin::Login Sign up form-->
						<div class="login-signup">
							<div class="mb-20">
								<h3>ĐĂNG KÝ</h3>
								<div class="text-muted font-weight-bold">Nhập thông tin doanh nghiệp</div>
							</div>
							{{-- <form class="form" id="kt_login_signup_form"> --}}
								{!! Form::open(['url' => '/DangKy', 'class' => 'form text-left', 'id' => 'kt_login_signup_form']) !!} 
								<div class="form-group mb-5">
                                    <input class="form-control h-auto form-control-solid py-4 px-8" type="text"
                                    placeholder="Tên công ty" name="name" required />
								</div>
								<div class="form-group mb-5">
                                    @if ($errors->has('dkkd'))
                                    <p class="text-danger ">{{ $errors->first('dkkd') }}</p>
                                    @endif                                   
                                    <input class="form-control h-auto form-control-solid py-4 px-8" type="text"
                                        placeholder="Mã số DKKD (* Không thể thay đổi sau này )" name="dkkd"
                                        required />
								</div>
								<div class="form-group mb-5">
                                    @if ($errors->has('email'))
                                    <p class="text-danger ">{{ $errors->first('email') }}</p>
                                    @endif  
                                    <input class="form-control h-auto form-control-solid py-4 px-8" type="text"
                                        placeholder="Email Address (* Không thể thay đổi sau này)" name="email"
                                        autocomplete="off" />
								</div>
								<div class="form-group mb-5">
                                    @if ($errors->has('password'))
                                    <p class="text-danger ">{{ $errors->first('password') }}</p>
                                    @endif  
                                    <input class="form-control h-auto form-control-solid py-4 px-8" type="password"
                                        placeholder="Mật khẩu" name="password" />
								</div>
                                <div class="form-group mb-5">
                                    <input class="form-control h-auto form-control-solid py-4 px-8" type="password"
                                        placeholder="Xác nhận lại mật khẩu" name="password_confirmation" />
								</div>
								<div class="form-group mb-5 text-left">
									<div class="checkbox-inline">
										<label class="checkbox m-0">
										<input type="checkbox" name="agree" />
										<span></span>I Agree the
										<a href="#" class="font-weight-bold ml-1">terms and conditions</a>.</label>
									</div>
									<div class="form-text text-muted text-center"></div>
								</div>
								<div class="form-group d-flex flex-wrap flex-center mt-10">
									<button id="kt_login_signup_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-2">Đăng ký</button>
									<button id="kt_login_signup_cancel" class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-2">Quay lại</button>
								</div>
							</form>
						</div>
						<!--end::Login Sign up form-->
						<!--begin::Login forgot password form-->
						<div class="login-forgot">
							<div class="mb-20">
								<h3>Forgotten Password ?</h3>
								<div class="text-muted font-weight-bold">Enter your email to reset your password</div>
							</div>
							<form class="form" id="kt_login_forgot_form">
								<div class="form-group mb-10">
									<input class="form-control form-control-solid h-auto py-4 px-8" type="text" placeholder="Email" name="email" autocomplete="off" />
								</div>
								<div class="form-group d-flex flex-wrap flex-center mt-10">
									<button id="kt_login_forgot_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-2">Request</button>
									<button id="kt_login_forgot_cancel" class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-2">Cancel</button>
								</div>
							</form>
						</div>
						<!--end::Login forgot password form-->
					</div>
				</div>
			</div>
			<!--end::Login-->
		</div>
		<!--end::Main-->
		<script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
		<!--begin::Global Config(global config for global JS scripts)-->
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#0BB783", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#D7F9EF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
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