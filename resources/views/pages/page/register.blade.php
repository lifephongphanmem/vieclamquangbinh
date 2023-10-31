@extends ('main_page')
@section('content')
    <div id="w0">
        <style type="text/css">
            .am_auth_form label {
                position: absolute;
                left: 0px;
                top: 8px;
            }

            .am_auth_form .radio label {
                position: unset;
            }

            .am_auth_form .radio {
                padding-bottom: 15px;
                width: 40%;
                float: left;
                margin-left: 10px;
                padding: 0px;
                clear: both;
                margin-top: 10px;
            }

            .am_auth_form .radio span {
                float: left;
                padding-top: 4px;
                display: inline-block;
            }

            .box-desc-ky {
                font-size: 14px;
                text-align: left;
                padding: 0px 20px;
            }

            .box-desc-ky li {
                margin-bottom: 10px;
                list-style: none;
                position: relative;
            }

            .box-desc-ky li::before {
                content: '.';
                position: absolute;
                left: -14px;
                font-size: 29px;
                line-height: 0px;
                top: 1px;
                color: #007cbd;
            }

            .box-left h2 {
                font: normal bold 21px/25px "Roboto";
                color: #000000;
                margin-top: 0;
                margin-bottom: 2rem;
                text-transform: uppercase;
                padding-top: 3rem;
            }

            .box-desc-ky li .bc {
                font-weight: bold;
            }

            .auth_main .am_row .am_img_container {
                overflow: hidden;
            }

            .sty-image {
                max-height: 275px;
                display: block;
                overflow: hidden;
            }

            .sty-image img {
                width: 100%;
                height: auto !important;
            }

            @media only screen and (max-width: 1199px) and (min-width: 992px) {
                .box-left h2 {
                    padding-top: 1.5rem;
                }
            }
        </style>

        <div class="auth_main">
            <div class="container">
                <div class="am_row">
                    <div class="am_img_container">
                        <div class="box-left text-center">
                            <div class="box-title-dky">
                                <h2 class="af_title">Hướng dẫn đăng ký</h2>
                            </div>
                            <div class="box-desc-ky">
                                <ul>
                                    <li>
                                        <span class="bc">Bước 1:</span>
                                        <span>Bấm vào nút “Đăng ký” tại góc phải trên màn hình.</span>
                                    </li>
                                    <li>
                                        <span class="bc">Bước 2:</span>
                                        <span>Bạn nhập thông tin trường vào ô khai báo tương ứng như: Họ tên, email,....
                                            Nếu bạn là "ứng viên" bạn tích chọn và mục ứng viện, nếu bạn là "Nhà tuyển
                                            dụng", bạn chọn là nhà tuyển dụng</span>
                                    </li>
                                    <li>
                                        <span class="bc">Bước 3:</span>
                                        <span>Sau khi đăng ký thành công, bạn vào địa chỉ email để xác nhận và Trung tâm
                                            dịch vụ việc làm Quảng Bình sẽ xác nhận tài khoản.</span>
                                    </li>
                                    <li>
                                        <span class="bc">Bước 4:</span>
                                        <span>Sau khi tài khoản đã xác nhận, bạn vào web đăng nhập và điền các thông tin
                                            đăng nhập gồm: Địa chỉ mail và mật khẩu.</span>
                                    </li>
                                    <li>
                                        <span class="bc">Bước 5:</span>
                                        <span>Khi đã đăng nhập vào Sàn với các tài khoản tương ứng khi đăng ký, bạn được
                                            sử dụng các chức năng, tiện ích tương ứng mỗi đối tượng trên website.</span>
                                    </li>
                                </ul>
                            </div>
                        </div> <a href="#" class="sty-image">
                            <img src="{{'/assets2/media/files/banners/709_1598519583_9825f47791fbb7ba.png'}}"
                                alt="đăng ký">
                        </a>
                    </div>
                    <form id="form-signup" class="am_auth_form" action="{{ '/page/register' }}" method="post" autocomplete="off">
                        @csrf
                        {{-- <input type="hidden" name="_csrf-frontend"
                            value="dWlwS1I2QnIZJkYdJn0wGT0TQj83YQtfL1A0DANsIxlNIRJ4IVw4HQ=="> --}}
                        <h2 class="af_title">Đăng ký</h2>

                        <div class="rela_input">
                            <input type="text" id="signupform-username" class="af_input" name="hoten"
                                placeholder="Họ và tên"> <i class="af_input_suffix fa fa-user" aria-hidden="true"></i>
                        </div>
                        <div class="error"></div>
                        {{-- <div class="rela_input">
                            <input type="text" id="signupform-phone" class="af_input" name="SignupForm[phone]"
                                placeholder="Số điện thoại"> <i class="af_input_suffix fa fa-phone" aria-hidden="true"></i>
                        </div>
                        <div class="error"></div> --}}

                        <div class="rela_input">
                            <input type="text" id="signupform-email" class="af_input" name="email"
                                placeholder="Email"> <i class="af_input_suffix fa fa-envelope" aria-hidden="true"></i>
                        </div>
                        <div class="error"></div>

                        <div class="rela_input">
                            <input type="password" id="signupform-password" class="af_input" name="password"
                                placeholder="Mật khẩu"> <i class="af_input_suffix fa fa-lock" aria-hidden="true"></i>
                        </div>
                        <div class="error"></div>
                        <div class="rela_input">
                            <input type="password" id="signupform-passwordre" class="af_input" name="repassword"
                                placeholder="Nhập lại mật khẩu"> <i class="af_input_suffix fa fa-lock"
                                aria-hidden="true"></i>
                        </div>
                        <div class="error"></div>
                        {{-- <div class="rela_input">
                            <div class="radio"><label><input type="radio" name="SignupForm[type]" value="1">
                                    <span>Ứng viên</span></label></div>
                            <div class="radio"><label><input type="radio" name="SignupForm[type]" value="2">
                                    <span>Nhà tuyển dụng</span></label></div>
                        </div> --}}
                        <div class="error"></div> <!-- <p style="font-size: 14px">
                        Nhấp vào <a target="_blank" href="/huong-dan-dang-ky-t9.html">hướng dẫn đăng ký</a> để được hướng dẫn về quyền và lợi ích của ứng viên và nhà tuyển dụng.
                    </p> -->
                        <button type="submit" class="af_btn_submit">Đăng ký</button>
                        {{-- <p class="af_p">Hãy đăng ký nhanh bằng</p>
                        <div class="af_social_login">
                            <a class="sb-facebook auth-link" href="/site/auth.html?authclient=facebook" title="Facebook"
                                data-popup-width="860" data-popup-height="480"><i class="fa fa-facebook"></i>Facebook</a> <a
                                class="btn btn-md btn-google push-top-xs"
                                href="https://accounts.google.com/o/oauth2/auth?response_type=code&amp;access_type=online&amp;client_id=693205346130-d4bk8u9hkeaqbhcd4l8afhlbihv3chr3.apps.googleusercontent.com&amp;redirect_uri=https://vieclamquangbinh.gov.vn/site/login-goole.html&amp;state&amp;scope=email%20profile&amp;approval_prompt=auto"><i
                                    class="fa fa-google" aria-hidden="true" target=""></i> Google</a>
                        </div> --}}
                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#signup-forms').click(function() {
                    if ($('#password').val() != $('#repasswor').val()) {
                        $('#get-passre').html('Mật khẩu nhập lại không trùng!');
                        return false;
                    } else {
                        $('#get-passre').html('');
                    }
                });
            })
        </script>
    @endsection
