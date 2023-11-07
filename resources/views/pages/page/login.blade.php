@extends ('main_page')
@section('content')
    <div class="auth_main">
        <div class="container">
            <div class="am_row">
                <div class="am_img_container">
                    <a class="sty-image">
                        <img src="{{ url('assets2/media/files/banners/123_1598519320_3765f4778181ef71.png') }}"
                            alt="login">
                    </a>
                </div>
                <form id="login-form" class="am_auth_form" action="/DangNhap" method="post">
                    @csrf

                    <h4 class="af_title">Đăng nhập</h4>
                    <div class="rela_input">
                        <input value="" class="af_input" name="username" type="text"
                            placeholder="Tên tài khoản" required="">
                        <i class="af_input_suffix fa fa-envelope" aria-hidden="true"></i>
                    </div>
                    <div class="rela_input">
                        <input class="af_input" name="password" type="password" placeholder="Password"
                           minlength="8" maxlength="16">
                        <i class="af_input_suffix fa fa-lock" aria-hidden="true"></i>
                    </div>
                    <div class="af-flex">
                        {{-- <div class="aff-check">
                            <input type="checkbox" name="LoginForm[rememberMe]" id="remember">
                            <label for="remember">Ghi nhớ mật khẩu</label>
                        </div> --}}
                        <a href="/lay-lai-mat-khau.html" class="aff-forgot">Quên mật khẩu?</a>
                    </div>
                    <button href="#" type="submit" class="af_btn_submit">Đăng nhập</button>
                    {{-- <p class="af_p">Hãy đăng nhập nhanh bằng</p>
                    <div class="af_social_login">
                        <a class="sb-facebook auth-link" href="/site/auth.html?authclient=facebook"
                            title="Facebook" data-popup-width="860" data-popup-height="480"><i
                                class="fa fa-facebook"></i>Facebook</a> <a
                            class="btn btn-md btn-google push-top-xs"
                            href="https://accounts.google.com/o/oauth2/auth?response_type=code&amp;access_type=online&amp;client_id=693205346130-d4bk8u9hkeaqbhcd4l8afhlbihv3chr3.apps.googleusercontent.com&amp;redirect_uri=https://vieclamquangbinh.gov.vn/site/login-goole.html&amp;state&amp;scope=email%20profile&amp;approval_prompt=auto"><i
                                class="fa fa-google" aria-hidden="true" target=""></i> Google</a>
                    </div> --}}
                    <p class="af_register_link">Bạn chưa có tài khoản? <a href="/page/dangky">Đăng ký ngay.</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
@endsection
