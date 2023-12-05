<head>
    <title>Vị trí đã ứng tuyển</title>
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
                                <div class="avatar_uv" onclick="capnhap_coban()">
                                    <p class="av" style="position: relative;">
                                        <img src="{{$ungvien->avatar != null ? '/uploads/ungvien/'. $ungvien->avatar : '/assets2/media/images/default/s200_200/defaultimage.jpg' }}"
                                        alt="{{ $ungvien->hoten }}" style="height: 100%;">
                                        {{-- <a class="editin-img open-task-iframe"
                                            style="border: 0px; background-color: #6199b8;color: white;width: 100%;position: absolute;bottom: 0%;left: 0;"><i
                                                class="glyphicon glyphicon-pencil"></i> <span>cập nhật thông tin
                                            </span></a> --}}
                                    </p>

                                    <h2>{{ $ungvien->hoten }}</h2>
                                    <p></p>
                                </div>
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
                            <style>
                                .section-summary table {
                                    width: 100%;
                                    font-size: 14px;
                                }

                                .section-summary table td,
                                .section-summary table th {
                                    padding: 6px 15px;
                                }

                                .remove-apply {
                                    cursor: pointer;
                                }
                            </style>
                            <div class="title_p wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                                <h3 class="w-64p">Đơn đã ứng tuyển</h3>
                            </div>
                            <div class="section-summary section-edit-user">
                                <div class="view-control">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <th>STT</th>
                                                <th>Tên công ty</th>
                                                <th>Vị trí ứng tuyển</th>
                                                <th>Ngày ứng tuyển</th>
                                                <th>Hủy bỏ</th>
                                            </tr>
                                            @foreach ($vitriungtuyen as $key => $item)
                                                <tr>
                                                    <td>{{ ++$key }}</td>
                                                    <td>
                                                        <a target="_bank" href="">
                                                            {{ $item->tencongty }}
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a title="tìm việc: test" target="_bank"
                                                            href="">{{ $item->tenvitri }}</a>
                                                    </td>
                                                    <td>{{ getDayVn($item->created_at) }}</td>
                                                    <td><a class="remove-apply" href="{{'/page/ungvien/delete_apply?id='.$item->id}}"  title="Xóa đơn"><i class="fa fa-times"
                                                                aria-hidden="true"></i></a></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
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
 
</body>

<script>

</script>
