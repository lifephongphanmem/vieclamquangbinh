@extends ('main_page')
@section('custom-style')
    <link rel="stylesheet" type="text/css"
        href="{{ url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css') }}" />
@stop

@section('custom-script')
    <script type="text/javascript" src="{{ url('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js') }}">
    </script>
    <script type="text/javascript"
        src="{{ url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js') }}"></script>

    <script src="{{ url('assets/admin/pages/scripts/table-lifesc.js') }}"></script>
    <script>
        jQuery(document).ready(function() {
            TableManaged3.init();

        });
    </script>
@stop
@section('content')
    <div class="page_in">
        <style>
            .content iframe {
                width: 100%;
                max-height: 600px;
            }

            .banner_in {
                min-height: 100px;
                max-height: 400px;
            }
        </style>
        <div class="banner_in">
            <div class="img">
                <img src="{{ '/assets2/media/images/default/s200_200/defaultimage.jpg' }}"
                    alt="Công ty TNHH Paradize Thiên Đường">
                <div class="name_uv">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 ">
                                <div>
                                    <h2>Công ty TNHH Paradize Thiên Đường</h2>
                                    <p>Địa chỉ: 76 Hữu Nghị </p>
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
                                <div class="avatar_uv">
                                    <p class="av"><img class="img-full-h"
                                            src="{{ isset($item->avatar) ? 'uploads/ungvien/' . $item->avatar : url('assets2/media/images/default/s100_100/defaultimage.jpg') }}"
                                            alt=""></p>
                                    <h2>Công ty TNHH Paradize Thiên Đường</h2>
                                    <p>Địa chỉ: 76 Hữu Nghị </p>
                                </div>
                                <div class="sk_one">
                                    <div>
                                        <span><img src="{{ '/assets2/images/ms.png' }}"></span>
                                        <div>
                                            <h4>Mã số thuế</h4>
                                            <p>{{ $Company->dkkd }}</p>
                                        </div>
                                    </div>
                                    {{-- <div>
                                    <span><img src="{{'/assets2/images/tl.png'}}"></span>
                                    <div>
                                        <h4>Thời gian thành lập:</h4>
                                        <p>01 - 1970</p>
                                    </div>
                                </div> --}}
                                    <div>
                                        <span><img src="{{ '/assets2/images/td.png' }}"></span>
                                        <div>
                                            <h4>Quy mô nhân sự:</h4>
                                            <p>{{ $Company->quymo }}</p>
                                        </div>
                                    </div>
                                    {{-- <div>
                                    <span><img src="{{'/assets2/images/lv.png'}}"></span>
                                    <div>
                                        <h4>Lĩnh vực hoạt động:</h4>
                                        <p>Dịch vụ</p>
                                    </div>
                                </div> --}}
                                    <div>
                                        <span><img src="{{ '/assets2/images/mail.png' }}"></span>
                                        <div>
                                            <h4>Email:</h4>
                                            <p>{{ $Company->email }}</p>
                                        </div>
                                    </div>
                                    <div>
                                        <span><img src="{{ '/assets2/images/phoe.png' }}"></span>
                                        <div>
                                            <h4>Số điện thoại:</h4>
                                            <p>{{ $Company->phone }}</p>
                                        </div>
                                    </div>
                                    <div>
                                        <span><img src="{{ '/assets2/images/w.png' }}"></span>
                                        <div>
                                            <h4>Website:</h4>
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 ">
                            <div class="detail_c">
                                <!-- job -->
                                <div class="list_job">
                                    <div class="title_p wow fadeInUp"
                                        style="visibility: visible; animation-name: fadeInUp;">
                                        <h3>Danh sách tuyển dụng </h3>
                                    </div>
                                    <table id="sample_3" class="table table-striped table-bordered table-hover dataTable no-footer">

                                        <div class="content mg-b25">
                                            @foreach ($model as $item)
                                                <div class="item_job d_flex d_flex_center wow fadeInUp"
                                                    style="visibility: visible; animation-name: fadeInUp;">
                                                    <div class="img">
                                                        <a href="/quan-ly-karaoke-j5948.html">
                                                            <img class="img-full-h"
                                                                src="{{ isset($item->avatar) ? 'uploads/ungvien/' . $item->avatar : url('assets2/media/images/default/s100_100/defaultimage.jpg') }}"
                                                                alt="Quản lý karaoke" title=" Quản lý karaoke">
                                                        </a>
                                                    </div>
                                                    <div class="text">
                                                        <a href="/quan-ly-karaoke-j5948.html">
                                                            <h3>{{ $item->name }}</h3>
                                                        </a>
                                                        <a href="/cong-ty-tnhh-paradize-thien-duong-e12049.html">
                                                            <h2>{{ $Company->name }}</h2>
                                                        </a>
                                                        <div class="text_extra d_flex d_flex_center">
                                                            <p> {{ $item->mucluong }}</p>
                                                            <p><span><img src="{{ '/assets2/images/ft.png' }}"></span>
                                                                {{ $item->hinhthuclv }}
                                                            </p>
                                                            <p><span><img src="{{ '/assets2/images/time_l.png' }}"></span>
                                                                {{ getDayVn($item->thoihan) == date('d/m/Y') ? 'Hôm nay' : getDayVn($item->thoihan) }}
                                                            </p>
                                                            <p><span><i class="fa fa-map-marker"
                                                                        aria-hidden="true"></i></span>
                                                                Quảng Bình </p>
                                                        </div>
                                                    </div>
                                                    <div class="btn_submit_job">
                                                        <a href="{{ '/page/vieclam/thongtin?id=' . $item->id }}" target="bank{{$item->id}}"
                                                            class="btn">Nộp hồ sơ</a>
                                                    </div>
                                                </div>
                                            @endforeach
                                    </table>
                                </div>
                                <div class="paginate float_clear">
                                </div>
                            </div>

                            {{-- <div class="info_c">
                                <div class="title_p wow fadeInUp"
                                    style="visibility: visible; animation-name: fadeInUp;">
                                    <h3 class="w-64p">GIỚI THIỆU </h3>
                                </div>
                                <div class="content">
                                    <p></p>
                                </div>
                            </div>
                            <div class="info_c">
                                <div class="title_p wow fadeInUp"
                                    style="visibility: visible; animation-name: fadeInUp;">
                                    <h3 class="w-64p">VỊ TRÍ </h3>
                                </div>
                                <div class="content">
                                    <iframe src=""></iframe>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
