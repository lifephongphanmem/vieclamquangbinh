<head>
    <title>Ứng viên {{ $ungvien->hoten }}</title>
    <meta name="robots" content="noindex, nofollow">
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/png" href="/static/media/images/siteinfo/2020_08_04/untitled-1.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description"
        content="Mạng Việc Làm ngành dược, Tuyển Dụng ngành dược lớn nhất Việt Nam. Tìm việc làm và ứng tuyển ngay việc làm ngành dược mới từ các doanh nghiệp hàng đầu tại Việt Nam">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900&amp;display=swap" rel="stylesheet">
    <link href="{{ url('assets2/css/vensdor/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ url('assets2/css/vensdor/plugin.css') }}" rel="stylesheet">
    <link href="{{ url('assets2/css/vensdor/jquery.fancybox.min.css') }}" rel="stylesheet">
    <script src="{{ url('assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('assets/global/plugins/jquery-migrate.min.js') }}" type="text/javascript"></script>
    <link href="{{ url('assets2/css/vensdor/slick.css') }}" rel="stylesheet">
    <link href="{{ url('assets2/css/root.css') }}" rel="stylesheet">
    <link href="{{ url('assets2/css/styles.css') }}" rel="stylesheet">
    <link href="{{ url('assets2/css/reponse.css') }}" rel="stylesheet">
    <link href="{{ url('assets2/css/fix.css') }}" rel="stylesheet">
    <link href="{{ url('assets2/css/fix_t.css') }}" rel="stylesheet">

    <style>
        body.alert {
            position: fixed;
            width: calc(100% - 100px);
            padding: 20px;
            margin: 50px;
            font-size: 14px;
            z-index: 9999;
        }
    </style>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=G-HTPQJ1MCPG"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-HTPQJ1MCPG');
    </script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script>
        $(document).on('click', 'body>.alert button', function() {
            $(this).closest('.alert').remove();
        });
    </script>
</head>

<body class="home  style-inpage fixed">
    <h1 style="line-height: 0px;opacity: 0; filter: alpha(opacity=0); text-indent: -9999px;margin: 0px;">
        {{ $ungvien->hoten }}</h1>

    <div class="page-loader-wrapper" style="display: none;">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="page_in">

        <div class="breadcrumbs">
            <div class="container">
            </div>
        </div>
        <div class="banner_in">
            <div class="box-images">
                <img src="{{ url('assets2/images/uv.png') }}">
                <div class="name_uv">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 ">
                                <div>
                                    <h2>{{ $ungvien->hoten }}</h2>
                                    <p>Địa chỉ:
                                        {{ (isset($ungvien->address) ? $ungvien->address . ' - ' : '') . (isset($xa->name) ? $xa->name . ' - ' : '') . (isset($huyen->name) ? $huyen->name . ' - ' : '') . 'Quảng Bình' }}
                                    </p>
                                    {{-- <a target="_blank"
                                        href="{{ url('assets2/profile/profile/download-file-cv.html?id=f169285092264e6daeadde40') }}"><img
                                            src="/images/icon_d.png"> Tải CV ứng viên</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="main">
            <div class="page_if_uv mg-b20 page_c_detail">
                <div class="container">
                    <div class="row bg_w">
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 bg_F8">
                            <div class="skill_uv">
                                @if (session('admin') != null)
                                    @if (session('admin')->id == $ungvien->user)
                                        <div class="avatar_uv" onclick="capnhap_coban()">
                                            <p class="av" style="position: relative;">
                                                <img src="{{$ungvien->avatar != null ? '/uploads/ungvien/'. $ungvien->avatar : '/assets2/media/images/default/s200_200/defaultimage.jpg' }}"
                                                    alt="{{ $ungvien->hoten }}" style="height: 100%;">
                                                <a href="#" class="editin-img open-task-iframe"
                                                    style="border: 0px; background-color: #6199b8;color: white;width: 100%;position: absolute;bottom: 0%;left: 0;"><i
                                                        class="glyphicon glyphicon-pencil"></i> <span>cập nhật thông tin
                                                    </span></a>
                                            </p>
                                            <h2>{{ $ungvien->hoten }}</h2>
                                            <p></p>
                                        </div>
                                    @else
                                        <div class="avatar_uv">
                                            <p class="av" style="position: relative;">
                                                <img src="{{$ungvien->avatar != null ? '/uploads/ungvien/'. $ungvien->avatar : '/assets2/media/images/default/s200_200/defaultimage.jpg' }}"
                                                alt="{{ $ungvien->hoten }}" style="height: 100%;">
                                            </p>
                                            <h2>{{ $ungvien->hoten }}</h2>
                                            <p></p>
                                        </div>
                                    @endif
                                @endif
                         
                            <div class="sk_one">
                                <div>
                                    <span><img src="{{ url('assets2/images/l1.png') }}"></span>
                                    <div>
                                        <h4>Mức lương mong muốn</h4>
                                        <p>{{ isset($ungvien->luong) ? 'Tối thiểu ' . $ungvien->luong . ' Triệu' : '' }}
                                        </p>
                                    </div>
                                </div>
                                <div>
                                    <span><img src="{{ url('assets2/images/nh.png') }}"></span>
                                    <div>
                                        <h4>Hình thức làm việc:</h4>
                                        <p>{{ $ungvien->hinhthuclv }}</p>
                                    </div>
                                </div>
                                <div>
                                    <span><img src="{{ url('assets2/images/td.png') }}"></span>
                                    <div>
                                        <h4>Trình độ học vấn:</h4>
                                        <p>{{ isset($trinhdocmkt->tentdkt) ? $trinhdocmkt->tentdkt : '' }}</p>
                                    </div>
                                </div>
                                <div>
                                    <span><img src="{{ url('assets2/images/kn.png') }}"></span>
                                    <div>
                                        <h4>Kinh nghiệm làm việc:</h4>
                                        <p> </p>
                                    </div>
                                </div>
                            </div>
                            <div class="sk_two">
                                <h3 class="w-64p">MỤC TIÊU NGHỀ NGHIỆP:</h3>
                                <div class="content_text">
                                    <p>{{ $ungvien->muctieu }}</p>
                                </div>
                            </div>
                            {{-- <div class="sk_two">
                                </div> --}}
                            <div class="sk_two">
                                <h3>TIN HỌC:</h3>
                                <div class="content_text">
                                    <p class="dot">
                                        <span>Word</span>
                                        <span class="item">
                                            <span class="{{ $ungvien->word >= '1' ? 'tick' : '' }}"></span>
                                            <span class="{{ $ungvien->word >= '2' ? 'tick' : '' }}"></span>
                                            <span class="{{ $ungvien->word >= '3' ? 'tick' : '' }}"></span>
                                            <span class="{{ $ungvien->word >= '4' ? 'tick' : '' }}"></span>
                                            <span class="{{ $ungvien->word >= '5' ? 'tick' : '' }}"></span>
                                            <span class="{{ $ungvien->word >= '6' ? 'tick' : '' }}"></span>
                                            <span class="{{ $ungvien->word >= '7' ? 'tick' : '' }}"></span>
                                            <span class="{{ $ungvien->word >= '8' ? 'tick' : '' }}"></span>
                                            <span class="{{ $ungvien->word >= '9' ? 'tick' : '' }}"></span>
                                            <span class="{{ $ungvien->word >= '10' ? 'tick' : '' }}"></span>
                                        </span>
                                    </p>
                                    <p class="dot">
                                        <span>Excel</span>
                                        <span class="item">
                                            <span class="{{ $ungvien->excel >= '1' ? 'tick' : '' }}"></span>
                                            <span class="{{ $ungvien->excel >= '2' ? 'tick' : '' }}"></span>
                                            <span class="{{ $ungvien->excel >= '3' ? 'tick' : '' }}"></span>
                                            <span class="{{ $ungvien->excel >= '4' ? 'tick' : '' }}"></span>
                                            <span class="{{ $ungvien->excel >= '5' ? 'tick' : '' }}"></span>
                                            <span class="{{ $ungvien->excel >= '6' ? 'tick' : '' }}"></span>
                                            <span class="{{ $ungvien->excel >= '7' ? 'tick' : '' }}"></span>
                                            <span class="{{ $ungvien->excel >= '8' ? 'tick' : '' }}"></span>
                                            <span class="{{ $ungvien->excel >= '9' ? 'tick' : '' }}"></span>
                                            <span class="{{ $ungvien->excel >= '10' ? 'tick' : '' }}"></span>
                                        </span>
                                    </p>
                                    <p class="dot">
                                        <span>PowerPoint</span>
                                        <span class="item">
                                            <span class="{{ $ungvien->powerpoint >= '1' ? 'tick' : '' }}"></span>
                                            <span class="{{ $ungvien->powerpoint >= '2' ? 'tick' : '' }}"></span>
                                            <span class="{{ $ungvien->powerpoint >= '3' ? 'tick' : '' }}"></span>
                                            <span class="{{ $ungvien->powerpoint >= '4' ? 'tick' : '' }}"></span>
                                            <span class="{{ $ungvien->powerpoint >= '5' ? 'tick' : '' }}"></span>
                                            <span class="{{ $ungvien->powerpoint >= '6' ? 'tick' : '' }}"></span>
                                            <span class="{{ $ungvien->powerpoint >= '7' ? 'tick' : '' }}"></span>
                                            <span class="{{ $ungvien->powerpoint >= '8' ? 'tick' : '' }}"></span>
                                            <span class="{{ $ungvien->powerpoint >= '9' ? 'tick' : '' }}"></span>
                                            <span class="{{ $ungvien->powerpoint >= '10' ? 'tick' : '' }}"></span>


                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 pad_r">
                        <div class="title_p wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                            <h3 class="w-64p">LIÊN HỆ</h3>
                        </div>
                        <div class="content_text_one">
                            <p class="d_flex_center d_flex">
                                <span>
                                    <span><img src="{{ url('assets2/images/sn.png') }}"
                                            style="margin-top: -7px">{{ getDayVn($ungvien->ngaysinh) }}</span>
                                </span>
                                <span>
                                    <img src="{{ url('assets2/images/add_u.png') }}" style="margin-top: -7px">
                                    {{ (isset($ungvien->address) ? $ungvien->address . ' - ' : '') . (isset($xa->name) ? $xa->name . ' - ' : '') . (isset($huyen->name) ? $huyen->name . ' - ' : '') . 'Quảng Bình' }}
                                </span>
                            </p>
                            <p class="d_flex_center d_flex">
                                <span>
                                    <span><img src="{{ url('assets2/images/email_u.png') }}"></span>
                                    <a href="{{ 'mailto:' . $model->email }}">{{ $model->email }}</a>
                                </span>
                            </p>
                        </div>
                        <div class="title_p wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                            <h3 class="w-64p">KINH NGHIỆM LÀM VIỆC:</h3>
                        </div>
                        @if (session('admin') != null)
                            @if (session('admin')->id == $ungvien->user)
                                <a href="#" class="update_infop open-task-iframe"
                                    onclick="capnhap_kinhnghiem()" style="font-size: 12px;margin-left: 92%"><i
                                        class="glyphicon glyphicon-pencil"></i>
                                    Cập nhật</a>
                            @endif
                        @endif
                        <div class="content_text_two">

                            @foreach ($ungvienkinhnghiem as $kinhnghiem)
                                <div class="d_flex item_time">
                                    <div class="time">
                                        <h4> {{ isset($kinhnghiem->ngayvao) ? 'Từ ' . $kinhnghiem->ngayvao : '' }}<br>
                                            {{ isset($kinhnghiem->ngaynghi) ? 'Đến ' . $kinhnghiem->ngaynghi : '' }}
                                        </h4>
                                    </div>
                                    <div class="text">
                                        <h5>{{ $kinhnghiem->chucdanh }}</h5>
                                        <p style="font-style: italic;">{{ $kinhnghiem->congty }}</p>
                                        <h5>Mô tả: </h5>
                                        <p>{{ $kinhnghiem->mota }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="title_p wow fadeInUp">
                            <h3 class="w-64p">TRÌNH ĐỘ HỌC VẤN:</h3>
                        </div>
                        @if (session('admin') != null)
                            @if (session('admin')->id == $ungvien->user)
                                <a href="#" class="update_infop open-task-iframe" onclick="capnhap_hocvan()"
                                    style="font-size: 12px;margin-left: 92%"><i
                                        class="glyphicon glyphicon-pencil"></i>
                                    Cập nhật</a>
                            @endif
                        @endif
                        <div class="content_text_two">
                            @foreach ($ungvienhocvan as $hocvan)
                                <div class="d_flex item_time">
                                    <div class="time">
                                        <h4> {{ isset($hocvan->tungay) ? 'Từ ' . $hocvan->tungay : '' }} <br>
                                            {{ isset($hocvan->denngay) ? 'Đến ' . $hocvan->denngay : '' }}</h4>
                                    </div>
                                    <div class="text">
                                        <p><strong>Trường:</strong> {{ $hocvan->truong }}</p>
                                        <p><strong>Chuyên ngành:</strong> {{ $hocvan->chuyennganh }} </p>
                                        <p><strong>Bằng cấp:</strong> {{ $hocvan->bangcap }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <style>
        .content_text_one p span:first-child {
            display: flex;
            align-items: center;
        }
    </style>
    </div>


    @include('pages.page.includes.footer')
    <div id="hocvan" style="display: none">
        <div id="box-img-view" class="box-img-view open">
            <div id="box-img-view-in" class="box-img-view-in">
                <a href="" style="color: red"><span class="close-box-img-view" onclick="close_hocvan()"><i
                            class="fa fa-times"></i></span></a>
                <div class="input-img " id="input-img">
                    <iframe src="{{ '/page/ungvien/iframe_hocvan?user=' . $ungvien->user }}"></iframe>
                </div>
            </div>
        </div>
    </div>
    <div id="kinhnghiem" style="display: none">
        <div id="box-img-view" class="box-img-view open">
            <div id="box-img-view-in" class="box-img-view-in">
                <a href="" style="color: red"> <span class="close-box-img-view"
                        onclick="close_kinhnghiem()"><i class="fa fa-times"></i></span></a>
                <div class="input-img " id="input-img">
                    <iframe src="{{ '/page/ungvien/iframe_kinhnghiem?user=' . $ungvien->user }}"></iframe>
                </div>
            </div>
        </div>
    </div>
    <div id="coban" style="display: none">
        <div id="box-img-view" class="box-img-view open">
            <div id="box-img-view-in" class="box-img-view-in">
                <a href="" style="color: red"><span class="close-box-img-view" onclick="close_coban()"><i
                            class="fa fa-times"></i></span></a>
                <div class="input-img " id="input-img">
                    <iframe src="{{ '/page/ungvien/iframe_coban?user=' . $ungvien->user }}"></iframe>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    function capnhap_hocvan() {
        $("#hocvan").css("display", "block");
    }

    function close_hocvan() {

        $("#hocvan").css("display", "none");
    }

    function capnhap_kinhnghiem() {
        $("#kinhnghiem").css("display", "block");
    }

    function close_kinhnghiem() {

        $("#kinhnghiem").css("display", "none");
    }

    function capnhap_coban() {
        $("#coban").css("display", "block");
    }

    function close_coban() {

        $("#coban").css("display", "none");
    }
</script>
