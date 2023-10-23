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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900&display=swap" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" />
    <link href="{{ url('assets2/css/vensdor/font-awesome.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets2/css/vensdor/plugin.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets2/css/vensdor/jquery.fancybox.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets2/css/vensdor/slick.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets2/css/root.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets2/css/styles.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets2/css/reponse.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets2/css/fix.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets2/css/fix_t.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ url('assets2/css/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets2/css/responsive.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets2/css/account-info.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets2/css/site.css') }}" rel="stylesheet" type="text/css" /> {{-- backgroud --}}
    <link href="{{ url('assets2/gentelella/nprogress/nprogress.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets2/gentelella/select2/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets2/gentelella/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet"
        type="text/css" />

    <link href="{{ url('assets2/gentelella/iCheck/skins/flat/green.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('gentelella/switchery/dist/switchery.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('gentelella/build/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets2/css/fix_t.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets2/gentelella/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet"
        type="text/css" />


</head>

<body>
    @include('admin/nguoitimviec/filter-top')

    <div class="main">
        <div class="page_job">
            <div class="container">
                <div class="row">

                    @include('admin/nguoitimviec/filter-left')

                    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 pd-l10">
                        <div class="list_job_page bg_w">
                            <div class="icon_filter">
                                <i class="fa fa-bars" aria-hidden="true"></i>
                            </div>
                            {{-- <?php if (isset($data) && $data) { ?> --}}
                            <p class="text_result">Tìm thấy 2 việc làm đang tuyển dụng </p>
                            <div class="list-item">
                                <div class="item_job d_flex d_flex_center wow fadeInUp"
                                    style="visibility: visible; animation-name: fadeInUp;">
                                    <div class="img">
                                        <a href="/chuyen-vien-kinh-doanh-j5809.html">
                                            <img class="img-full-h"
                                            src="{{ url('assets2/images/defaultimage.jpg') }}"
                                                alt="Chuyên viên kinh doanh" title=" Chuyên viên kinh doanh">
                                        </a>
                                    </div>
                                    <div class="text">
                                        <a href="/chuyen-vien-kinh-doanh-j5809.html">
                                            <h3>Chuyên viên kinh doanh <span>Hot</span></h3>
                                        </a>
                                        <a href="/cong-ty-bao-hiem-mic-quang-binh-e9218.html">
                                            <h2>CÔNG TY BẢO HIỂM MIC QUẢNG BÌNH</h2>
                                        </a>
                                        <div class=" d_flex d_flex_center">
                                            <p><span>$</span> Thỏa thuận</p>
                                            <p style="margin-left: 10%"><span><img
                                                        src="{{ url('assets2/images/ft.png') }}"></span> Full
                                                time
                                            </p>
                                            <p style="margin-left: 10%"><span><img
                                                        src="{{ url('assets2/images/time_l.png') }}"></span>
                                                11/08/2023</p>
                                            <p style="margin-left: 10%;font-size: 1.4rem"><span><i
                                                        class="fa fa-map-marker" aria-hidden="true"></i></span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="btn_submit_job">
                                        <a href="/chuyen-vien-kinh-doanh-j5809.html" class="btn">Nộp hồ sơ</a>
                                    </div>
                                </div>

                                <div class="item_job d_flex d_flex_center wow fadeInUp"
                                    style="visibility: visible; animation-name: fadeInUp;">
                                    <div class="img">
                                        <a href="/truong-pho-phong-kinh-doanh-j5808.html">
                                            <img class="img-full-h"
                                            src="{{ url('assets2/images/defaultimage.jpg') }}"
                                                alt="Trưởng phó phòng kinh doanh"
                                                title=" Trưởng phó phòng kinh doanh">
                                        </a>
                                    </div>
                                    <div class="text">
                                        <a href="/truong-pho-phong-kinh-doanh-j5808.html">
                                            <h3>Trưởng phó phòng kinh doanh <span>Hot</span></h3>
                                        </a>
                                        <a href="/cong-ty-bao-hiem-mic-quang-binh-e9218.html">
                                            <h2>CÔNG TY BẢO HIỂM MIC QUẢNG BÌNH</h2>
                                        </a>
                                        <div class=" d_flex d_flex_center">
                                            <p><span>$</span> Thỏa thuận</p>
                                            <p style="margin-left: 10%"><span><img
                                                        src="{{ url('assets2/images/ft.png') }}"></span> Full
                                                time
                                            </p>
                                            <p style="margin-left: 10%"><span><img
                                                        src="{{ url('assets2/images/time_l.png') }}"></span>
                                                11/08/2023</p>
                                            <p style="margin-left: 10%;font-size: 1.4rem"><span><i
                                                        class="fa fa-map-marker" aria-hidden="true"></i></span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="btn_submit_job">
                                        <a href="/truong-pho-phong-kinh-doanh-j5808.html" class="btn">Nộp hồ sơ</a>
                                    </div>
                                </div>



                                <div class="paginate float_clear">
                                    <ul class="pagination">
                                        <li class="first disabled"><span>Trang đầu</span></li>
                                        <li class="prev disabled"><span>«</span></li>
                                        <li class="active"><a href="" data-page="0">1</a>
                                        </li>
                                        <li><a href="" data-page="1">2</a></li>
                                        <li><a href="" data-page="2">3</a></li>
                                        <li><a href="" data-page="3">4</a></li>
                                        <li><a href="" data-page="4">5</a></li>
                                        <li><a href="" data-page="5">6</a></li>
                                        <li><a href="" data-page="6">7</a></li>
                                        <li><a href="" data-page="7">8</a></li>
                                        <li><a href="" data-page="8">9</a></li>
                                        <li class="next"><a href="" data-page="1">Trang
                                                sau</a></li>
                                    </ul>
                                </div>


                                {{-- <?php } ?> --}}
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>



        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
        <script src="{{ url('assets2/js/jquery.fancybox.min.js') }}"></script>
        <script src="{{ url('assets2/js/owl.carousel.min.js') }}"></script>
        <script src="{{ url('assets2/js/wow.min.js') }}"></script>
        <script src="{{ url('assets2/js/slick.js') }}"></script>
        <script src="{{ url('assets2/js/waypoints.min.js') }}"></script>
        <script src="{{ url('assets2/js/jquery.counterup.min.js') }}"></script>
        <script src="{{ url('assets2/js/menu.js') }}"></script>
        <script src="{{ url('assets2/js/slider.js') }}"></script>
        <script src="{{ url('assets2/js/main.js') }}"></script>
        <script src="{{ url('assets2/js/add.js') }}"></script>

        <script src="{{ url('assets2/js/jquery.lazyload.min.js') }}"></script>
        <script src="{{ url('assets2/js/bootstrap.min.js') }}"></script>
        <script src="{{ url('assets2/js/owl.carousel.js') }}"></script>
        <script src="{{ url('assets2/js/jquery.slimmenu.min.js') }}"></script>
        <script src="{{ url('assets2/js/modernizr.js') }}"></script>
        <script src="{{ url('assets2/js/jquery.sliderPro.min.js') }}"></script>
        <script src="{{ url('assets2/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
        <script src="{{ url('assets2/js/jquery.selectric.js') }}"></script>
        <script src="{{ url('assets2/js/snap.svg-min.js') }}"></script>
        <script src="{{ url('assets2/js/classie.js') }}"></script>
        <script src="{{ url('assets2/js/main4.js') }}"></script>

        <script src="{{ url('assets2/gentelella/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <script src="{{ url('assets2/gentelella/nprogress/nprogress.js') }}"></script>
        <script src="{{ url('assets2/gentelella/select2/dist/js/select2.full.min.js') }}"></script>
        <script src="{{ url('assets2/gentelella/moment/min/moment.min.js') }}"></script>
        <script src="{{ url('assets2/gentelella/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
        <script src="{{ url('assets2/gentelella/iCheck/icheck.min.js') }}"></script>
        <script src="{{ url('assets2/gentelella/devbridge-autocomplete/dist/jquery.autocomplete.min.js') }}"></script>
        <script src="{{ url('assets2/gentelella/jquery.tagsinput/src/jquery.tagsinput.js') }}"></script>
        <script src="{{ url('assets2/gentelella/switchery/dist/switchery.min.js') }}"></script>
        <script src="{{ url('assets2/gentelella/build/js/custom.min.js') }}"></script>

        <script src="{{ url('assets2/js/jquery.fancybox.min.js') }}"></script>
        <script src="{{ url('assets2/js/main_profile.js') }}"></script>
        <script src="{{ url('assets2/plugins') }}"></script>
        <script src="{{ url('assets2/plugins') }}"></script>
        <script src="{{ url('assets2/plugins') }}"></script>
        <script src="{{ url('assets2/plugins') }}"></script>


</body>
