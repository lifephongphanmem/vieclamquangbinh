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
                        <a href="" title="Ứng viên">Ứng viên</a>
                    </li>
                </ul>
            </div>
        </div>
        @include('pages.page.includes.filter-top')

        <div class="main">
            <div class="page_job">
                <div class="container">
                    <div class="row">

                        @include('pages.page.includes.filter-left')


                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 pd-l10">
                            <div class="list_job_page bg_w">
                                <div class="icon_filter">
                                    <i class="fa fa-bars" aria-hidden="true"></i>
                                </div>
                                <p class="text_result">Tìm thấy () việc làm đang tuyển dụng </p>

                                <div class="list-item">
                                    @foreach ($model as $item)
                                        <div class="item_job d_flex d_flex_center wow fadeInUp"
                                            style="visibility: visible; animation-name: fadeInUp;">
                                            <div class="img">
                                                <a href="/vuong-tran-long-c11977.html">
                                                    <img class="img-full-h"
                                                        src="{{ isset($item->avatar) ? 'uploads/ungvien/'.$item->avatar : url('assets2/media/images/default/s100_100/defaultimage.jpg') }}"
                                                        alt="Vương Trần Long" title=" Vương Trần Long">
                                                </a>
                                            </div>
                                            <div class="text">
                                                <a href="/vuong-tran-long-c11977.html">
                                                    <h3>{{ $item->hoten }}</h3>
                                                </a>
                                                <div class="text_extra d_flex d_flex_center">
                                                    <p><span>$</span> {{ isset($item->luong) ? 'Tối thiểu '.$item->luong.' Triệu' : 'Thỏa thuận' }} </p>
                                                    <p><span><img src="{{ url('assets2/images/ft.png') }}"></span>{{ $item->hinhthuclv }}</p>
                                                    <p><span><img src="{{ url('assets2/images/time_l.png') }}"></span>{{ $item->created_at }}</p>
                                                    <p><span><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                                        Quảng Bình </p>
                                                </div>
                                            </div>
                                            <div class="btn_submit_job">
                                                <a href="{{'/page/ungvien/thongtin?user='.$item->user}}" class="btn">Xem hồ sơ</a>
                                            </div>
                                        </div>
                                    @endforeach


                                    {{-- <div class="item_job d_flex d_flex_center wow fadeInUp"
                                        style="visibility: visible; animation-name: fadeInUp;">
                                        <div class="img">
                                            <a href="/vo-thi-giang-c11976.html">
                                                <img class="img-full-h"
                                                    src="{{ url('assets2/media/images/default/s100_100/defaultimage.jpg')}}"
                                                    alt="Vo thi giang" title=" Vo thi giang">
                                            </a>
                                        </div>
                                        <div class="text">
                                            <a href="/vo-thi-giang-c11976.html">
                                                <h3>Vo thi giang</h3>
                                            </a>
                                            <div class="text_extra d_flex d_flex_center">
                                                <p><span>$</span> Thỏa thuận</p>
                                                <p><span><img src="{{ url('assets2/images/ft.png')}}"></span> Full time</p>
                                                <p><span><img src="{{ url('assets2/images/time_l.png')}}"></span> 23/08/2023</p>
                                                <p><span><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="btn_submit_job">
                                            <a href="/vo-thi-giang-c11976.html" class="btn">Xem hồ sơ</a>
                                        </div>
                                    </div>

 --}}

                                </div>
                                {{-- <div class="paginate float_clear">
                                    <ul class="pagination">
                                        <li class="first disabled"><span>Trang đầu</span></li>
                                        <li class="prev disabled"><span>«</span></li>
                                        <li class="active"><a href="/danh-sach-ung-vien.html?page=1"
                                                data-page="0">1</a></li>
                                        <li><a href="/danh-sach-ung-vien.html?page=2" data-page="1">2</a></li>
                                        <li><a href="/danh-sach-ung-vien.html?page=3" data-page="2">3</a></li>
                                        <li><a href="/danh-sach-ung-vien.html?page=4" data-page="3">4</a></li>
                                        <li><a href="/danh-sach-ung-vien.html?page=5" data-page="4">5</a></li>
                                        <li><a href="/danh-sach-ung-vien.html?page=6" data-page="5">6</a></li>
                                        <li><a href="/danh-sach-ung-vien.html?page=7" data-page="6">7</a></li>
                                        <li><a href="/danh-sach-ung-vien.html?page=8" data-page="7">8</a></li>
                                        <li><a href="/danh-sach-ung-vien.html?page=9" data-page="8">9</a></li>
                                        <li class="next"><a href="/danh-sach-ung-vien.html?page=2"
                                                data-page="1">Trang sau</a></li>
                                    </ul>
                                </div> --}}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
