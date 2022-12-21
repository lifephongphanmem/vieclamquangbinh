@section('sidebar')
    <!-- sidebar menu start-->
    <div class="leftside-navigation">
        <ul class="sidebar-menu" id="nav-accordion">
            <li class="sub-menu">
                <a class=" {{ Request::is('dmhc*') ? 'active' : '' }} {{ request()->is('ptype*') ? 'active' : '' }} {{ request()->is('param*') ? 'active' : '' }} {{ Request::is('user*') ? 'active' : '' }}"
                    href="#">
                    <i class="fa fa-cogs"></i>
                    <span>
                        <h4>HỆ THỐNG</h4>
                    </span>
                </a>
                <ul>
                    <li class="sub-menu">
                        <a href="{{ URL::to('user-ba') }}" class="{{ Request::is('user*') ? 'active' : '' }}">
                            <i class="fa fa-users"></i>
                            <span>Người dùng</span>
                        </a>
                    </li>
                    <li class="sub-menu">
                        <a href="{{ URL::to('dmhc-ba') }}" class="{{ Request::is('dmhc*') ? 'active' : '' }}">
                            <i class="fa fa-users"></i>
                            <span>Danh mục hành chính</span>
                        </a>

                    </li>
                    <li class="sub-menu">
                        <a href="{{ URL::to('ptype-ba') }}"
                            class="{{ request()->is('param*') ? 'active' : '' }}{{ request()->is('ptype*') ? 'active' : '' }}">
                            <i class="fa fa-users"></i> Tham số</a>

                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-users"></i>
                            <span>Sao lưu / Phục hồi</span>
                        </a>

                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>Nhật ký hoạt động</span>
                        </a>

                    </li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="#"
                    class="{{ Request::is('admessages*') ? 'active' : '' }} {{ Request::is('tuyendung*') ? 'active' : '' }}{{ Request::is('employer*') ? 'active' : '' }}{{ Request::is('doanhnghiep*') ? 'active' : '' }} {{ Request::is('report*') ? 'active' : '' }}">
                    <i class="fa fa-dashboard"></i>
                    <span>
                        <h4>DOANH NGHIỆP</h4>
                    </span>
                </a>
                <ul>
                    <li class="sub">
                        <a href="{{ URL::to('doanhnghiep-ba') }}"
                            class="{{ Request::is('doanhnghiep*') ? 'active' : '' }} ">
                            <i class="fa fa-list"></i>
                            <span>Danh sách</span>
                        </a>

                    </li>
                    <li class="sub">
                        <a href="{{ URL::to('admessages') }}" class="{{ Request::is('admessages*') ? 'active' : '' }}">
                            <i class="fa fa-envelope"></i>
                            <span>Hộp thư doanh nghiệp</span>
                        </a>

                    </li>
                    <li class="sub">
                        <a href="{{ URL::to('report-ba') }}" class="{{ Request::is('report*') ? 'active' : '' }}">
                            <i class="fa fa-user"></i>
                            <span>Khai báo</span>
                        </a>

                    </li>
                    <li class="sub">
                        <a href="{{ URL::to('tuyendung-ba') }}" class="{{ Request::is('tuyendung*') ? 'active' : '' }}">
                            <i class="fa fa-users"></i>
                            <span>Tuyển dụng</span>
                        </a>


                    </li>
                    <li class="sub">
                        <a href="{{ URL::to('employer-ba') }}" class="{{ Request::is('employer*') ? 'active' : '' }}">
                            <i class="fa fa-users"></i>
                            <span>Người lao động</span>
                        </a>


                    </li>
                    <li class="sub hidden">
                        <a href="{{ URL::to('dichvu-ba') }}">
                            <i class="fa fa-users"></i>
                            <span>Dịch vụ</span>
                        </a>


                    </li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="#"
                    class="{{ Request::is('nhankhau*') ? 'active' : '' }} {{ Request::is('dieutra*') ? 'active' : '' }}">
                    <i class="fa fa-dashboard"></i>
                    <span>
                        <h4>CUNG LAO ĐỘNG </h4>
                    </span>
                </a>
                <ul>
                    <li class="sub">
                        <a href="javascript:;" class="{{ Request::is('dieutra*') ? 'active' : '' }}">
                            <i class="fa fa-list"></i>
                            <span>Danh sách điều tra</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{ URL::to('dieutra-ba') }}"
                                    class="{{ Request::is('dieutra*') ? 'active' : '' }}">Tìm kiếm</a></li>
                            <li><a href="{{ URL::to('dieutra-bn') }}"
                                    class="{{ Request::is('dieutra*') ? 'active' : '' }}">Tạo mới</a></li>
                        </ul>
                    </li>
                    <li class="sub">
                        <a href="javascript:;" class="{{ Request::is('nhankhau-ba*') ? 'active' : '' }}">
                            <i class="fa fa-user"></i>
                            <span>Nhân khẩu</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{ URL::to('nhankhau-ba') }}">Danh sách </a></li>

                        </ul>
                    </li>
                    <li class="sub">
                        <a href="javascript:;"class="{{ Request::is('nhankhau-ba*') ? 'active' : '' }}>
                        <i class="fa
                            fa-user"></i>
                            <span>Hộ gia đình</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{ URL::to('nhankhau-bho') }}">Danh sách </a></li>

                        </ul>
                    </li>
                    <li class="sub" style="display:none;">
                        <a href="javascript:;">
                            <i class="fa fa-user"></i>
                            <span> Danh sách biến động </span>
                        </a>
                        <ul class="sub">
                            <li><a href="#">Biến động hộ gia đình </a></li>
                            <li><a href="#">Biến động thành viên</a></li>
                            <li><a href="#">Tổng hợp biến động theo địa phương</a></li>
                        </ul>
                    </li>
                    <li class="sub" style="display:none;">
                        <a href="javascript:;">
                            <i class="fa fa-user"></i>
                            <span> Thị trường lao động </span>
                        </a>
                        <ul class="sub">
                            <li><a href="#">Thống kê theo mẫu 27 </a></li>
                            <li><a href="#">Xem chi tiết TTLD</a></li>
                        </ul>
                    </li>
                    <li class="sub"style="display:none;">
                        <a href="javascript:;">
                            <i class="fa fa-user"></i>
                            <span> Khai thác dữ liệu </span>
                        </a>
                        <ul class="sub">
                            <li><a href="#">Danh sách thất nghiệp </a></li>
                            <li><a href="#">Danh sách không hoạt động kinh tế</a></li>
                            <li><a href="#">Danh sách đạt chỉ tiêu Nông thôn mới</a></li>
                            <li><a href="#">Danh sách lao động làm việc tại nước ngoài</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="sub-menu" style="display:none;">
                <a class="" href="#">
                    <i class="fa fa-tasks"></i>
                    <span>
                        <h4>QUẢN LÝ CÔNG VIỆC</h4>
                    </span>
                </a>
            </li>
            <li class="sub-menu" style="display:none;">
                <a class="" href="#">
                    <i class="fa fa-tasks"></i>
                    <span>
                        <h4>SÀN GIAO DỊCH</h4>
                    </span>
                </a>
                <ul>
                    <li class="sub">
                        <a href="javascript:;">
                            <i class="fa fa-list"></i>
                            <span>Hồ sơ ứng tuyển</span>
                        </a>

                    </li>

                </ul>
            </li>

        </ul>

    </div>
    <!-- sidebar menu end-->
@endsection
