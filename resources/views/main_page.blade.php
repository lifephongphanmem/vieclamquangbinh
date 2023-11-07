<!DOCTYPE html>
<html lang="en">

<head>
    <title>Trung tâm dịch vụ việc làm Quảng Bình</title>
    <meta name="robots" content="noindex, nofollow">
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/png" href="/static/media/images/siteinfo/2020_08_04/untitled-1.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <link href="{{ url('assets2/assets/76353db0/authchoice.css" rel="stylesheet') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900&display=swap" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" />
    <script src="{{ url('assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('assets/global/plugins/jquery-migrate.min.js') }}" type="text/javascript"></script>

    <link href="{{ url('assets2/css/vensdor/font-awesome.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets2/css/vensdor/plugin.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets2/css/vensdor/jquery.fancybox.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets2/css/vensdor/slick.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets2/css/root.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets2/css/styles.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets2/css/reponse.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets2/css/fix.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets2/css/fix_t.css') }}" rel="stylesheet" type="text/css" />

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900&amp;display=swap" rel="stylesheet">



</head>

<body class="home  style-inpage fixed">

    <header>
        <div class="header_top">
            <div class="container">
                <div class="logo_slogan">
                    <a href="/">
                        <img src="{{ url('assets2/media/images/siteinfo/2020_08_27/untitled-2.png') }}"
                            alt="Trung tâm Dịch vụ việc làm Quảng Bình">
                        <div class="text">
                            <h3>SỞ LAO ĐỘNG THƯƠNG BINH VÀ XÃ HỘI TỈNH QUẢNG BÌNH</h3>
                            <h2>TRUNG TÂM DỊCH VỤ VIỆC LÀM QUẢNG BÌNH </h2>
                        </div>
                        <img src="{{ url('assets2/images/bac.png') }}">
                    </a>
                </div>
                <div class="hotline_account d_flex d_flex_center">
                    <div class="hotline " style="margin-right: 15%">
                        <a class="d_flex d_flex_center" href="tel:0232.6250999">
                            <img src="{{ url('assets2/images/hl.png') }}">
                            <p><strong>Hotline:</strong><span>0232.6250999</span></p>
                        </a>
                    </div>
                    @if (session('admin') != null)

                        @if (session('admin')->phanloaitk == 1)
                            <div class="account ">
                                <p>
                                    <span>
                                        <a href="javascript:void(0);">
                                            <img src="{{ url('assets2/media/images/default/defaultimage.jpg') }}"
                                                alt="{{ session('admin')->name }}"
                                                style="margin-top:-5px; margin-right:6px; max-height: 100px; display: none">{{ session('admin')->name }}
                                        </a>
                                    </span>
                                </p>
                                <ul class="sub-account">
                                    <li class="target-user display-xs">
                                        <ul class="sub-accounts">
                                            <li>
                                                <a href="/DangXuat" title="Thoát">Thoát</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        @elseif (session('admin')->phanloaitk == 2)

                            <div class="account ">
                                <p>
                                    <span>
                                        <a href="javascript:void(0);">
                                            <img src="{{ url('assets2/media/images/default/defaultimage.jpg') }}"
                                                alt="{{ session('admin')->name }}"
                                                style="margin-top:-5px; margin-right:6px; max-height: 100px; display: none">{{ session('admin')->name }}
                                        </a>
                                    </span>
                                </p>
                                <ul class="sub-account">
                                    <li class="target-user display-xs">
                                        <ul class="sub-accounts">
                                            <li>
                                                <a href="{{ '/doanhnghieppanel' }}"
                                                    title="Quản lý doanh nghiệp">Quản lý doanh nghiệp</a>
                                            </li>
                                            <li>
                                                <a href="{{ '/page/vieclam/congty?user='.session('admin')->id}}"
                                                    title="Thông tin tuyển dụng">Thông tin tuyển dụng</a>
                                            </li>
                                            <li>
                                                <a href="/tuyendung-hosodanop" title="Hồ sơ ứng tuyển">Hồ sơ ứng tuyển</a>
                                            </li>
                                            <li>
                                                <a href="tuyendung-fn" title="Đăng tin tuyển dụng">Đăng tin tuyển dụng</a>
                                            </li>
                                            <li>
                                                <a href="/DangXuat" title="Thoát">Thoát</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        @else
                            <div class="account ">
                                <p>
                                    <span>
                                        <a href="javascript:void(0);">
                                            <img src="{{ url('assets2/media/images/default/defaultimage.jpg') }}"
                                                alt="{{ session('admin')->name }}"
                                                style="margin-top:-5px; margin-right:6px; max-height: 100px; display: none">{{ session('admin')->name }}
                                        </a>
                                    </span>
                                </p>
                                <ul class="sub-account">
                                    <li class="target-user display-xs">
                                        <ul class="sub-accounts">
                                            <li>
                                                <a href="{{ '/page/ungvien/thongtin?user=' . session('admin')->id }}"
                                                    title="Cập nhật hồ sơ">Cập nhật hồ sơ</a>
                                            </li>
                                            <li>
                                                <a href="/page/ungvien/vi-tri-da-ung-tuyen" title="Vị trí đã ứng tuyển">Vị
                                                    trí đã ứng tuyển</a>
                                            </li>
                                            <li>
                                                <a href="/DangXuat" title="Thoát">Thoát</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        @endif
                    @else
                        <div class="account ">
                            <a class="d_flex d_flex_center" href="{{ '/page/dangnhap' }}">
                                <img src="{{ url('assets2/images/us.png') }}">
                                <p><span>TÀI KHOẢN</span></p>
                            </a>
                        </div>
                    @endif

                </div>
            </div>
        </div>
        <div class="menu_header">
            <div class="container">
                <div class="menu_pc">
                    <div class="menu_main">
                        <ul>
                            <li>
                                <a href="{{'/page/trangchu'}}">Trang chủ</a>
                            </li>
                            <li>
                                <a href="{{ '/page/gioithieu' }}">giới thiệu</a>
                            </li>
                            <li>
                                <a href="{{ '/page/vieclam' }}">Việc tìm người </a>
                            </li>
                            <li>
                                <a href="{{ '/page/ungvien' }}">Người tìm việc</a>
                            </li>

                        </ul>
                    </div>
                    <div class="menu-btn-show iconmenu">
                        <span class="border-style"></span>
                        <span class="border-style"></span>
                        <span class="border-style"></span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    @yield('content')

    @include('pages.page.includes.footer')

</body>
