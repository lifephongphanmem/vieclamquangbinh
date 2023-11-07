@extends ('main_page')
@section('content')
    <div class="page_in">

        <div class="breadcrumbs">
            <div class="container">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item ">
                        <a href="/" title="Trang chủ">Trang chủ</a>
                    </li>
                    <li class="breadcrumb-item ">
                        <a href="/cong-ty-tnhh-paradize-thien-duong-e12049.html"
                            title="{{ $Company->name }}">{{ $Company->name }}</a>
                    </li>
                    <li class="breadcrumb-item ">
                        <a href="" title="{{ $model->name }}">{{ $model->name }}</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main">
            <div class="page_job_detail">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 pd-r10">
                            <div class="job_detail bg_w group_page">
                                <div class="title_detail">
                                    <h2>{{ $model->name }}</h2>
                                    <p>
                                        <span class="ct"><img src="{{ '/assets2/images/ct.png' }}"
                                                alt="company"><span>{{ $Company->name }}</span></span>
                                        <span class="color_r">Hạn nộp hồ sơ: {{ getDayVn($Tuyendung->thoihan) }}</span>
                                    </p>
                                </div>
                                <div class="content_page">
                                    <div class="request_job">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                                <ul>
                                                    <li><strong>Mức lương:</strong> {{ $model->mucluong }}</li>
                                                    <li><strong>Kinh nghiệm:</strong> {{ $model->yeucaukn }}</li>
                                                    <li><strong>Yêu cầu bằng cấp:</strong> {{ $model->tdcmkt }}</li>
                                                    <li><strong>Số lượng cần tuyển:</strong> {{ $model->soluong }}</li>
                                                    {{-- <li>
                                                        <strong> Ngành nghề:</strong>
                                                        <a href="/tat-ca-viec-lam.html?c=17">Dịch vụ</a>
                                                    </li> --}}
                                                </ul>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                                                <ul>
                                                    <li><strong>Địa điểm làm việc:</strong> {{ $model->diadiem }}</li>
                                                    {{-- <li><strong>Chức vụ:</strong></li> --}}
                                                    <li><strong>Hình thức làm việc:</strong> {{ $model->hinhthuclv }}</li>
                                                    {{-- <li><strong>Yêu cầu giới tính:</strong> Nam</li> --}}
                                                    {{-- <li><strong>Yêu cầu độ tuổi:</strong> Không yêu cầu</li> --}}
                                                </ul>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                                <a href="/dang-nhap.html"
                                                    data-confirm="Bạn cần đăng nhập để tạo hồ sơ ứng tuyển. Bạn có muốn đến đăng nhập ngay để có thể nộp đơn?"
                                                    class="btn_nop">Nộp hồ sơ </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="info">
                                        <h3>MÔ TẢ CÔNG VIỆC: </h3>
                                        <div class="content_info">
                                            <ul>
                                                <li>{{ $model->description }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="info">
                                        <h3>QUYỀN LỢI ỨNG VIÊN: </h3>
                                        <div class="content_info">
                                            <ul>
                                                <li>{{ $model->phucloi }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    {{-- <div class="info">
                                        <h3>YÊU CẦU CHUYÊN MÔN: </h3>
                                        <div class="content_info">
                                            <ul>
                                                <li>Tốt nghiệp THPT trở lên</li>
                                                <li>Khả năng giao tiếp tốt</li>
                                            </ul>
                                        </div>
                                    </div> --}}
                                    <div class="info">
                                        <h3>BẠN NÊN CÓ KỸ NĂNG: </h3>
                                        <div class="content_info">
                                            <ul>
                                                <li>{{ $model->kynangmem }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="info">
                                        <div class="content_info d_flex d_flex_center">
                                            <p>Bấm vào nút <a>NỘP HỒ SƠ</a> để ứng tuyển</p>
                                            <a href="/dang-nhap.html"
                                                data-confirm="Bạn cần đăng nhập để tạo hồ sơ ứng tuyển. Bạn có muốn đến đăng nhập ngay để có thể nộp đơn?"
                                                class="btn_nop">Nộp hồ sơ </a>
                                        </div>
                                    </div>
                                    <div class="info">
                                        <h3>LIÊN HỆ PHỎNG VẤN: </h3>
                                        <div class="content_info">
                                            <ul>
                                                <li>Người liên hệ: Trung tâm Dịch vụ việc làm Quảng Bình</li>
                                                <li>Địa chỉ liên hệ: số 76 Đường Hữu Nghị - TP. Đồng Hới - Quảng Bình.
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="group_page" style="padding: 0px;">
                                <div class="banner_in_td  owl-carousel owl-theme wow fadeInUp owl-loaded owl-drag"
                                    style="visibility: visible; animation-name: fadeInUp;">

                                    <div class="owl-stage-outer">
                                        <div class="owl-stage"
                                            style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 895px;">
                                            <div class="owl-item active" style="width: 875px; margin-right: 20px;">
                                                <div class="item">
                                                    <a href="#"><img
                                                            src="{{ '/assets2/media/files/banners/501_1597721620_285f3b4c144ccc3.png' }}"
                                                            alt="Quảng cáo chi tiết tin tuyển dụng"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-nav disabled"><button type="button" role="presentation"
                                            class="owl-prev disabled"><span aria-label="Previous">‹</span></button><button
                                            type="button" role="presentation" class="owl-next disabled"><span
                                                aria-label="Next">›</span></button></div>
                                    <div class="owl-dots disabled"><button role="button"
                                            class="owl-dot active"><span></span></button></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 pd-l10">
                            <div class="info_company ">
                                <div class="info_c mg-b20 bg_w">
                                    <div class="logo_c">
                                        <a href=""><img src=""></a>
                                        <h2>{{ $Company->name }}</h2>
                                        <p>{{ $Company->adress }}</p>
                                        <a href="{{ '/page/vieclam/congty?user=' . $Company->user }}"
                                            class="more"><span>Thông
                                                tin chi tiết</span>
                                            <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <div class="content_info_c">
                                        <h3>Việc làm cùng công ty:</h3>
                                        <div class="list_job_c">
                                            @foreach ($list_vitrikhac as $item)
                                                <a class="item  d_flex" href="{{ '/page/vieclam/thongtin?id='. $item->id  }}">
                                                    <img src="{{ '/assets2/images/star.png' }}">
                                                    <div>
                                                        <h4>{{ $item->name }}</h4>
                                                        <p> Hạn nộp hồ sơ: {{ getDayVn($item->thoihan) }}</p>
                                                    </div>
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <style>
            #myModals textarea {
                width: 100%;
                height: 150px;
            }
        </style>
        <div id="myModals" class="modal fade" role="dialog" style="display: none;">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header center">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <a href="/recruitment/recruitment/redirect-edit.html?id=5948&amp;alias=quan-ly-karaoke"
                            class="btn btn-warning">Chỉnh sửa thông tin trước khi gửi</a>
                    </div>
                    <form id="form-apply" action="/recruitment/apply/apply.html" method="get" role="form">
                        <div class="modal-body noiv">
                            <p>Hoặc gửi ngay.</p>
                            <input type="hidden" name="id" value="5948">
                            <textarea name="content" placeholder="Nội dung gửi đến nhà ứng tuyển." required=""></textarea>
                            <input id="location-select" name="location" value="29" type="hidden">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="sent-form" class="btn btn-primary">Gửi ngay</button>
                            <a class="btn btn-default" data-dismiss="modal">Hủy</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
