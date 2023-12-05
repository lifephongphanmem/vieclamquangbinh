@extends ('main_page')
@section('content')
    <div class="banner_main slick-initialized slick-slider">
        <div class="slick-list draggable">
            <div class="slick-track" style="opacity: 1; width: 1915px;">
                <div class="slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false"
                    style="width: 1915px; position: relative; left: 0px; top: 0px; z-index: 999; opacity: 1;">
                    <div>
                        <div class="item" style="width: 100%; display: inline-block;">
                            <a href="#" tabindex="0"><img
                                    src="{{ '/assets2/media/files/banners/450_1601007131_505f6d6e1b8b727.jpg' }}"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <body class="home   fixed">
        <div class="search_form mg-b3">
            <div class="container max-w160">
                <div class="content_form">
                    <form id="search-form" action="/tat-ca-viec-lam.html" method="GET" role="form">
                        <div class="group_form w40 bd-r1">
                            <input type="text" class="" name="k" value=""
                                placeholder="Nhập tiêu đề công việc, tên công ty, vị trí địa điểm..." autocomplete="off">
                        </div>
                        <div class="group_form w25 bd-r1">
                            <img src="{{ '/assets2/images/nn.png' }}" alt="ngành nghề">
                            <select class="js-example-basic-single select2-hidden-accessible" name="c"
                                data-select2-id="select2-data-1-ljje" tabindex="-1" aria-hidden="true">
                                <option value="" data-select2-id="select2-data-3-cwnj">Tất cả ngành nghề</option>
                                <option value="8">Khác</option>
                                <option value="1">Ngành Điện - điện tử</option>
                                <option value="4">Văn phòng</option>
                                <option value="6">Kỹ sư </option>
                                <option value="2">Kinh doanh</option>
                                <option value="3">Tài chính</option>
                                <option value="5">Lao động phổ thông</option>
                                <option value="11">Nhân viên văn phòng</option>
                                <option value="7">Kỹ thuật</option>
                                <option value="10">Kế toán</option>
                                <option value="12">Trợ lý sản xuất</option>
                                <option value="13">Giáo viên</option>
                                <option value="14">LÁI XE</option>
                                <option value="9">Quản Trị Kinh Doanh</option>
                                <option value="15">Xây dựng</option>
                                <option value="16">Đầu bếp</option>
                                <option value="17">Dịch vụ</option>
                            </select><span class="select2 select2-container select2-container--default" dir="ltr"
                                data-select2-id="select2-data-2-72ls" style="width: 90px;"><span class="selection"><span
                                        class="select2-selection select2-selection--single" role="combobox"
                                        aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false"
                                        aria-labelledby="select2-c-20-container"><span class="select2-selection__rendered"
                                            id="select2-c-20-container" role="textbox" aria-readonly="true"
                                            title="Tất cả ngành nghề">Tất cả ngành nghề</span><span
                                            class="select2-selection__arrow" role="presentation"><b
                                                role="presentation"></b></span></span></span><span class="dropdown-wrapper"
                                    aria-hidden="true"></span></span>
                        </div>
                        <div class="group_form w25 bd-r1">
                            <img src="{{ '/assets2/images/dd.png' }}" alt="địa điểm">
                            <select id="search-location-index" class="js-example-basic-single select2-hidden-accessible"
                                name="a" data-select2-id="select2-data-search-location-index" tabindex="-1"
                                aria-hidden="true">
                                <option value="" selected="" data-select2-id="select2-data-5-bu94">Tất cả địa
                                    điểm</option>
                                <option value="1">Việt Nam</option>
                                <option value="2">Nhật Bản</option>
                                <option value="3">Hàn Quốc</option>
                                <option value="4">Mỹ</option>
                                <option value="6">Đài loan</option>
                                <option value="7">SLOVAKIA</option>
                                <option value="8">Đức</option>
                                <option value="9">Canada</option>
                                <option value="10">Trà Vinh</option>
                                <option value="11">NGA</option>
                                <option value="12">RUMANI</option>
                                <option value="13">HUNGARY</option>
                                <option value="14">HUNGGARY</option>
                                <option value="15">Ba Lan</option>
                                <option value="16">ĐAN MẠCH</option>
                                <option value="17">Hy lạp</option>
                            </select><span class="select2 select2-container select2-container--default" dir="ltr"
                                data-select2-id="select2-data-4-ieyi" style="width: 90px;"><span class="selection"><span
                                        class="select2-selection select2-selection--single" role="combobox"
                                        aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false"
                                        aria-labelledby="select2-search-location-index-container"><span
                                            class="select2-selection__rendered"
                                            id="select2-search-location-index-container" role="textbox"
                                            aria-readonly="true" title="Tất cả địa điểm">Tất cả địa điểm</span><span
                                            class="select2-selection__arrow" role="presentation"><b
                                                role="presentation"></b></span></span></span><span
                                    class="dropdown-wrapper" aria-hidden="true"></span></span>
                        </div>
                        <div class="group_form w16">
                            <button type="submit" class="btn_submit"><i class="fa fa-search" aria-hidden="true"></i>Tìm
                                kiếm</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

        <div class="main">

            <div class="uv mg-b3">
                <div class="container max-w160">
                    <div class="row list_item">
                        <div class="col-xs-6 col-sm-6 col-md-4 col-lg-25">
                            <div class="item_c">
                                <div class="content">
                                    <input type="text" id="count_vl" value="{{$count_vieclam}}" hidden>
                                    <h3>
                                        <span class="count_vieclam" id="count_vieclam"> </span>+
                                    </h3>
                                    <p>Việc làm đang tuyển dụng</p>
                                </div>

                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-4 col-lg-25">
                            <div class="item_c">
                                <div class="content">
                                    <input type="text" id="count_uv" value="{{$count_ungvien}}" hidden>
                                    <h3>
                                        <span class="count_ungvien" id="count_ungvien"> </span>+
                                    </h3>
                                    <p>Hồ sơ ứng viên</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-4 col-lg-25">
                            <div class="item_c">
                                <a href="/laodong-fn">
                                    <div class="content">
                                        <h3><img src="{{ '/assets2/media/images/siteinfo/2022_11_10/icon-kb.png' }}"
                                                alt="icon"></h3>
                                        <p>Khai báo thay đổi lao động cho doanh nghiệp</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-4 col-lg-25">
                            <div class="item_c bg-b">
                 
                                <a href="{{ session('admin') != null ? '' : '/' }}">
                                    <div class="content">
                                        <img src="{{ '/assets2/images/1.png' }}" alt="Đăng ký tìm việc">
                                        <p>Đăng ký tìm việc</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-4 col-lg-25">
                            <a href="/dang-ky.html?type=2">
                                <div class="item_c">
                                    <div class="content">
                                        <img src="{{ '/assets2/images/d.png' }}" alt="Đăng ký tuyển dụng">
                                        <p>Đăng ký tuyển dụng</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="main_g">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">

                            {{-- <style>
                                @media (max-width: 575px) {
                                    .title_mobile2.title_p>a {
                                        display: block;
                                        display: flex;
                                        align-items: center;
                                        max-width: 200px;
                                        bottom: 0;
                                    }

                                    .title_mobile2.title_p>a span {
                                        float: right;
                                        /* width: 45%; */
                                    }

                                    .title_mobile2.title_p>a i {
                                        display: block;
                                    }
                                }
                            </style> --}}
                            <!-- job -->
                            <div class="list_job">
                                <div class="title_p wow fadeInUp" {{-- style="visibility: hidden; animation-name: none;" --}}>
                                    <h3>Việc làm mới nhất </h3>
                                    <a href="{{ '/page/vieclam' }}"><span>Xem thêm</span>
                                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="content mg-b20">
                                    @if (isset($vieclam))
                                        @foreach ($vieclam as $item)
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
                                                        <p><span><i class="fa fa-map-marker"
                                                                    aria-hidden="true"></i></span>
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

                            <div class="list_job">
                                <div class="title_p wow fadeInUp">
                                    <h3>Ứng viên mới nhất </h3>
                                    <a href="{{ '/page/ungvien' }}"><span>Xem thêm</span>
                                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="content mg-b20">
                                    @if (isset($ungvien))
                                        @foreach ($ungvien as $item)
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
                                                        <h3>{{ $item->hoten }}</h3>
                                                    </a>
                                                    <div class="text_extra d_flex d_flex_center">
                                                        <p><span>$</span>
                                                            {{ isset($item->luong) ? 'Tối thiểu ' . $item->luong . ' Triệu' : 'Thỏa thuận' }}
                                                        </p>
                                                        <p><span><img
                                                                    src="{{ url('assets2/images/ft.png') }}"></span>{{ $item->hinhthuclv }}
                                                        </p>
                                                        <p><span><img
                                                                    src="{{ url('assets2/images/time_l.png') }}"></span>{{ getDayVn($item->created_at) == date('d/m/Y') ? 'Hôm nay' : getDayVn($item->created_at) }}
                                                        </p>
                                                        <p><span><i class="fa fa-map-marker"
                                                                    aria-hidden="true"></i></span>
                                                            Quảng Bình </p>
                                                    </div>
                                                </div>
                                                <div class="btn_submit_job">
                                                    <a href="{{ '/page/ungvien/thongtin?user=' . $item->user }}"
                                                        target="bank" class="btn">Xem hồ sơ</a>
                                                </div>

                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                            <div class="group_lh mg-b20">
                                <div class="group_lh mg-b20">
                                    <div class="title_tab ">
                                        <h3 class="bg_r"><img src="{{ '/assets2/images/t1.png' }}"> Tư vấn online</h3>
                                    </div>
                                    <div class="group_content">
                                        <div class="item">
                                            <a href="tel:0949820258" class="d_flex d_flex_center">
                                                <img src="{{ '/assets2/images/sk.png' }}">
                                                <div class="text">
                                                    <p>Tư vấn đi làm việc ở nước ngoài</p>
                                                    <p class="color_r">0232.6250.909</p>
                                                    <p class="color_r">Nguyễn Thị Kiều Loan</p>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="item">
                                            <a href="tel:0932332792" class="d_flex d_flex_center">
                                                <img src="{{ '/assets2/images/sk.png' }}">
                                                <div class="text">
                                                    <p>Tư vấn du học - Đào tạo nghề:</p>
                                                    <p class="color_r">0904.739.898</p>
                                                    <p class="color_r">Hoàng Thị Diệu Hương</p>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="item">
                                            <a href="tel:0983936442" class="d_flex d_flex_center">
                                                <img src="{{ '/assets2/images/sk.png' }}">
                                                <div class="text">
                                                    <p>Tư vấn bảo hiểm thất nghiệp:</p>
                                                    <p class="color_r">0918.879.818</p>
                                                    <p class="color_r">Trần Thị Huyền Trang</p>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="item">
                                            <a href="tel:0948238533" class="d_flex d_flex_center">
                                                <img src="{{ '/assets2/images/sk.png' }}">
                                                <div class="text">
                                                    <p>Tư vấn việc làm trong tỉnh, trong nước:</p>
                                                    <p class="color_r">0948.238.533</p>
                                                    <p class="color_r">Lê Thị Nguyện</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="group_lh mg-b20">
                                <div class="title_tab ">
                                    <h3 class="">Thống kê thành viên</h3>
                                </div>
                                <div class="group_users">
                                    <div class="item d_flex d_flex_center">
                                        <div class="img">
                                            <img src="images/u.png">
                                        </div>
                                        <div class="text">
                                            <h3>1</h3>
                                            <p>Đang online</p>
                                        </div>
                                    </div>
                                    <div class="item d_flex d_flex_center">
                                        <div class="img">
                                            <img src="images/u1.png">
                                        </div>
                                        <div class="text">
                                            <h3>2297</h3>
                                            <p>Lượt ghé thăm trong ngày </p>
                                        </div>
                                    </div>
                                    <div class="item d_flex d_flex_center">
                                        <div class="img">
                                            <img src="images/u1.png">
                                        </div>
                                        <div class="text">
                                            <h3>2322704</h3>
                                            <p>Tổng lượt ghé thăm</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <script>
            function detectPrivateMode(cb) {
                var db,
                    on = cb.bind(null, true),
                    off = cb.bind(null, false)

                function tryls() {
                    try {
                        localStorage.length ? off() : (localStorage.x = 1, localStorage.removeItem("x"), off());
                    } catch (e) {
                        // Safari only enables cookie in private mode
                        // if cookie is disabled then all client side storage is disabled
                        // if all client side storage is disabled, then there is no point
                        // in using private mode
                        navigator.cookieEnabled ? on() : off();
                    }
                }

                // Blink (chrome & opera)
                window.webkitRequestFileSystem ? webkitRequestFileSystem(0, 0, off, on)
                    // FF
                    :
                    "MozAppearance" in document.documentElement.style ? (db = indexedDB.open("test"), db.onerror = on, db
                        .onsuccess = off)
                    // Safari
                    :
                    /constructor/i.test(window.HTMLElement) || window.safari ? tryls()
                    // IE10+ & edge
                    :
                    !window.indexedDB && (window.PointerEvent || window.MSPointerEvent) ? on()
                    // Rest
                    :
                    off()
            }
        </script> --}}
        <script>


            function animateNumber(finalNumber, duration = 5000, startNumber = 0, callback) {
                let currentNumber = startNumber
                const interval = window.setInterval(updateNumber, 17)

                function updateNumber() {
                    if (currentNumber >= finalNumber) {
                        clearInterval(interval)
                    } else {
                        let inc = Math.ceil(finalNumber / (duration / 17))
                        if (currentNumber + inc > finalNumber) {
                            currentNumber = finalNumber
                            clearInterval(interval)
                        } else {
                            currentNumber += inc
                        }
                        callback(currentNumber)
                    }
                }
            }

            document.addEventListener('DOMContentLoaded', function() {
                var vieclam = $('#count_vl').val();
                var ungvien = $('#count_uv').val();
                animateNumber(vieclam, 4000, 0, function(number) {
                    const formattedNumber = number.toLocaleString()
                    document.getElementById('count_vieclam').innerText = formattedNumber
                })
                animateNumber(ungvien, 4000, 0, function(number) {
                    const formattedNumber = number.toLocaleString()
                    document.getElementById('count_ungvien').innerText = formattedNumber
                })
            })
        </script>
    @endsection
