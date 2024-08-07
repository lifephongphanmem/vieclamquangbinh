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
                        <a href="" title="Ứng viên">Tin tuyển dụng</a>
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
                                <p class="text_result">Tìm thấy {{ $model->count() }} Việc làm đang tuyển dụng</p>

                                <div class="list-item" id="list-item">
                                    @if (isset($model))
                                        @foreach ($model as $item)
                                            <div class="item_job d_flex d_flex_center wow fadeInUp"
                                                style="visibility: visible; animation-name: fadeInUp;">
                                                <div class="img">
                                                    <a href="">
                                                        <img class="img-full-h"
                                                            src="{{ isset($item->avatar) ? 'uploads/ungvien/' . $item->avatar : url('assets2/media/images/default/s100_100/defaultimage.jpg') }}"
                                                            title="{{ $item->hoten }}">
                                                    </a>
                                                </div>
                                                <div class="text">
                                                    <a href="">
                                                        <h3>{{ $item->name }}</h3>
                                                    </a>
                                                    <a href="{{ '/page/vieclam/congty?user=' . $item->user }}">
                                                        <h2>{{ $item->congty }}</h2>
                                                    </a>
                                                    <div class="text_extra d_flex d_flex_center">
                                                        <p><span>$</span>
                                                            {{ $item->mucluong }}
                                                            {{-- {{ isset($item->luong) ? 'Tối thiểu ' . $item->luong . ' Triệu' : 'Thỏa thuận' }} --}}
                                                        </p>
                                                        <p><span><img
                                                                    src="{{ url('assets2/images/ft.png') }}"></span>{{ $item->hinhthuclv }}
                                                        </p>
                                                        <p><span><img
                                                                    src="{{ url('assets2/images/time_l.png') }}"></span>{{ getDayVn($item->thoihan) == date('d/m/Y') ? 'Hôm nay' : getDayVn($item->thoihan) }}
                                                        </p>
                                                        <p><span><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                                            Quảng Bình </p>
                                                    </div>
                                                </div>
                                                <div class="btn_submit_job">
                                                    <a href="{{ '/page/vieclam/thongtin?id=' . $item->id }}"
                                                        target="bank{{ $item->id }}" class="btn">Nộp hồ sơ</a>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
