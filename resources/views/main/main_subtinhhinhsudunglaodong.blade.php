@if (chkPhanQuyen('tinhhinhsudunglaodong', 'phanquyen'))
    {{-- <li class="menu-section">
        <h4 class="menu-text">QUẢN LÝ TÌNH HÌNH SỬ DỤNG LAO ĐỘNG</h4>
        <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
    </li> --}}
    @if(session('admin')->phanloaitk == 1)
    <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
        <a href="javascript:;" class="menu-link menu-toggle">
            <span class="svg-icon menu-icon">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                    height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24"></rect>
                        <path
                            d="M10,4 L21,4 C21.5522847,4 22,4.44771525 22,5 L22,7 C22,7.55228475 21.5522847,8 21,8 L10,8 C9.44771525,8 9,7.55228475 9,7 L9,5 C9,4.44771525 9.44771525,4 10,4 Z M10,10 L21,10 C21.5522847,10 22,10.4477153 22,11 L22,13 C22,13.5522847 21.5522847,14 21,14 L10,14 C9.44771525,14 9,13.5522847 9,13 L9,11 C9,10.4477153 9.44771525,10 10,10 Z M10,16 L21,16 C21.5522847,16 22,16.4477153 22,17 L22,19 C22,19.5522847 21.5522847,20 21,20 L10,20 C9.44771525,20 9,19.5522847 9,19 L9,17 C9,16.4477153 9.44771525,16 10,16 Z"
                            fill="#000000"></path>
                        <rect fill="#000000" opacity="0.3" x="2" y="4" width="5" height="16"
                            rx="1"></rect>
                    </g>
                </svg>
            </span>
            <span class="menu-text font-weight-bold"> Quản lý thông tin tình hình sử dụng lao động</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="menu-submenu">
            <i class="menu-arrow"></i>
            <ul class="menu-subnav">
                {{-- @if (chkPhanQuyen('tonghopdulieutinhhinhsudunglaodongdonvi', 'phanquyen'))
                    <li class="menu-item" aria-haspopup="true">
                        <a href="{{ url('/tinhhinhsudungld/don_vi/danhsach') }}" class="menu-link">
                            <i class="menu-bullet menu-bullet-dot">
                                <span></span>
                            </i>
                            <span class="menu-text font-weight-bold">Tổng hợp dữ liệu đơn vị</span>
                        </a>
                    </li>
                @endif --}}
                @if (chkPhanQuyen('tonghopdulieutinhhinhsudungld', 'phanquyen'))
                    <li class="menu-item" aria-haspopup="true">
                        <a href="{{ url('/tinhhinhsudungld/tinh/tonghop?nam=' . date('Y')) }}" class="menu-link">
                            <i class="menu-bullet menu-bullet-dot">
                                <span></span>
                            </i>
                            <span class="menu-text font-weight-bold">Tổng hợp dữ liệu</span>
                        </a>
                    </li>
                    <li class="menu-item" aria-haspopup="true">
                        <a href="{{ url('/tinhhinhsudungld/tinh/xem_du_lieu?nam=' . date('Y') . '&tieude=0') }}"
                            class="menu-link">
                            <i class="menu-bullet menu-bullet-dot">
                                <span></span>
                            </i>
                            <span class="menu-text font-weight-bold">Xem dữ liệu chi tiết</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
        @endif
        {{-- <li class="menu-item" aria-haspopup="true">
    <a href="{{ url('/doanhnghiep/nguoilaodong') }}" class="menu-link">
        <i class="menu-bullet menu-bullet-dot">
            <span></span>
        </i>
        <span class="menu-text font-weight-bold">Thông tin người lao động</span>
    </a>
        </li> --}}
    </li>


@endif
