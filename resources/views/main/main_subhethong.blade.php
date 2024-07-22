@if (chkPhanQuyen('hethong', 'phanquyen'))
    <li class="menu-item menu-item-submenu menu-item-rel" data-menu-toggle="click" aria-haspopup="true">
        <a href="javascript:;" class="menu-link menu-toggle">
            <span class="menu-text">HỆ THỐNG</span>
            <span class="menu-desc"></span>
            <i class="menu-arrow"></i>
        </a>
        <div class="menu-submenu menu-submenu-classic menu-submenu-left">
            <ul class="menu-subnav">
                @if (chkPhanQuyen('danhmuc', 'phanquyen'))
                    <li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <span class="svg-icon menu-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-journal" viewBox="0 0 16 16">
                                    <path
                                        d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
                                    <path
                                        d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
                                </svg>
                            </span>
                            <span class="menu-text">Danh mục</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="menu-submenu menu-submenu-classic menu-submenu-right">
                            <ul class="menu-subnav">
                                @if (chkPhanQuyen('chucvu', 'phanquyen'))
                                    <li class="menu-item" aria-haspopup="true">
                                        <a href="{{ url('/danh_muc/dm_chuc_vu') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">Chức vụ</span>
                                        </a>
                                    </li>
                                @endif
                                @if (chkPhanQuyen('doituonguutien', 'phanquyen'))
                                    <li class="menu-item" aria-haspopup="true">
                                        <a href="{{ url('/danh_muc/dm_doi_tuong') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">Đối tượng ưu tiên</span>
                                        </a>
                                    </li>
                                @endif
                                @if (chkPhanQuyen('manghe', 'phanquyen'))
                                    <li class="menu-item" aria-haspopup="true">
                                        <a href="{{ url('/danh_muc/dm_ma_nghe_trinh_do') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">Mã nghề, trình độ</span>
                                        </a>
                                    </li>
                                @endif
                                @if (chkPhanQuyen('trinhdogdpt', 'phanquyen'))
                                    <li class="menu-item" aria-haspopup="true">
                                        <a href="{{ url('/danh_muc/dm_trinh_do_gdpt') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">Trình độ GDPT</span>
                                        </a>
                                    </li>
                                @endif
                                @if (chkPhanQuyen('trinhdochuyenmonkythuat', 'phanquyen'))
                                    <li class="menu-item" aria-haspopup="true">
                                        <a href="{{ url('/danh_muc/dm_trinh_do_ky_thuat') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">Trình độ chuyên môn kỹ thuật</span>
                                        </a>
                                    </li>
                                @endif
                                @if (chkPhanQuyen('nganhsanxuatkinhdoanh', 'phanquyen'))
                                    <li class="menu-item" aria-haspopup="true">
                                        <a href="{{ url('/danh_muc/dm_nganh_san_xuat_kinh_doanh') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">Ngành sản xuất kinh doanh</span>
                                        </a>
                                    </li>
                                @endif
                                @if (chkPhanQuyen('loailaodong', 'phanquyen'))
                                    <li class="menu-item" aria-haspopup="true">
                                        <a href="{{ url('/danh_muc/dm_loai_lao_dong') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">Loại lao động</span>
                                        </a>
                                    </li>
                                @endif
                                @if (chkPhanQuyen('loaihinhhoatdongkinhte', 'phanquyen'))
                                    <li class="menu-item" aria-haspopup="true">
                                        <a href="{{ url('/danh_muc/dm_loai_hinh_hdkt') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">Loại hình hoạt động kinh tế</span>
                                        </a>
                                    </li>
                                @endif
                                @if (chkPhanQuyen('loaihopdonglaodong', 'phanquyen'))
                                    <li class="menu-item" aria-haspopup="true">
                                        <a href="{{ url('/danh_muc/dm_loai_hieu_luc_hdld') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">Loại, hiệu lực hợp đồng lao động</span>
                                        </a>
                                    </li>
                                @endif
                                @if (chkPhanQuyen('thoiganthatnghiep', 'phanquyen'))
                                    <li class="menu-item" aria-haspopup="true">
                                        <a data-target="#thitruongld-modal" data-toggle="modal" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">Thời gian thất nghiệp</span>
                                        </a>
                                    </li>
                                @endif
                                @if (chkPhanQuyen('tinhtrangthamgiahdkt', 'phanquyen'))
                                    <li class="menu-item" aria-haspopup="true">
                                        <a href="{{ url('/danh_muc/dm_tinh_trang_tham_gia_hdkt') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">Tình trạng tham gia HĐKT</span>
                                        </a>
                                    </li>
                                @endif
                                @if (chkPhanQuyen('chuyenmondaotao', 'phanquyen'))
                                    <li class="menu-item" aria-haspopup="true">
                                        <a href="{{ url('/danh_muc/dm_chuyen_mon_dao_tao') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">Chuyên môn đào tạo</span>
                                        </a>
                                    </li>
                                @endif
                                @if (chkPhanQuyen('nghecongviec', 'phanquyen'))
                                    <li class="menu-item" aria-haspopup="true">
                                        <a href="{{ url('/danh_muc/nghe_cong_viec') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">Nghề công việc</span>
                                        </a>
                                    </li>
                                @endif
                                {{-- @if (chkPhanQuyen('nghecongviec', 'phanquyen')) --}}
                                <li class="menu-item" aria-haspopup="true">
                                    <a href="{{ url('/danh_muc/nguyen_nhan_that_nghiep') }}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Nguyên nhân thất nghiệp</span>
                                    </a>
                                </li>
                                {{-- @endif --}}
                                @if (chkPhanQuyen('hinhthuclamviec', 'phanquyen'))
                                    <li class="menu-item" aria-haspopup="true">
                                        <a href="{{ url('/danh_muc/dm_hinh_thuc_cong_viec') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">Hình thức làm việc</span>
                                        </a>
                                    </li>
                                @endif
                                @if (chkPhanQuyen('nganhnghe', 'phanquyen'))
                                    <li class="menu-item" aria-haspopup="true">
                                        <a href="{{ url('/danh_muc/dmnganhnghe') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">Ngành nghề</span>
                                        </a>
                                    </li>
                                @endif
                                @if (chkPhanQuyen('dmthonxom', 'phanquyen'))
                                    <li class="menu-item" aria-haspopup="true">
                                        <a href="{{ url('/dmthonxom/danhsach') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">Thôn, xóm</span>
                                        </a>
                                    </li>
                                @endif
                                {{-- @if (chkPhanQuyen('capbac', 'phanquyen')) --}}
                                <li class="menu-item" aria-haspopup="true">
                                    <a href="{{ url('/danh_muc/capbac') }}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Cấp bậc</span>
                                    </a>
                                </li>
                                {{-- @endif --}}
                            </ul>
                        </div>
                    </li>
                @endif
                @if (chkPhanQuyen('hethongchung', 'phanquyen'))
                    <li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <span class="svg-icon menu-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                                    <path
                                        d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z" />
                                    <path
                                        d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z" />
                                </svg>
                            </span>
                            <span class="menu-text">Hệ thống chung</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="menu-submenu menu-submenu-classic menu-submenu-right">
                            <ul class="menu-subnav">
                                @if (chkPhanQuyen('diaban', 'phanquyen'))
                                    <li class="menu-item" aria-haspopup="true">
                                        <a href="{{ url('/dia_ban/danhsach') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">Địa bàn</span>
                                        </a>
                                    </li>
                                @endif
                                @if (chkPhanQuyen('donvi', 'phanquyen'))
                                    <li class="menu-item" aria-haspopup="true">
                                        <a href="{{ url('/dmdonvi/danhsach') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">Đơn vị</span>
                                        </a>
                                    </li>
                                @endif
                                @if (chkPhanQuyen('taikhoan', 'phanquyen'))
                                    <li class="menu-item" aria-haspopup="true">
                                        <a href="{{ url('/TaiKhoan/ThongTin?phanloaitk=1') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">Tài khoản</span>
                                        </a>
                                    </li>
                                @endif
                                @if (chkPhanQuyen('chucnang', 'phanquyen'))
                                    <li class="menu-item" aria-haspopup="true">
                                        <a href="{{ url('/Chuc_nang/Thong_tin') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">Chức năng</span>
                                        </a>
                                    </li>
                                @endif
                                @if (chkPhanQuyen('nhomtaikhoan', 'phanquyen'))
                                    <li class="menu-item" aria-haspopup="true">
                                        <a href="{{ url('/nhomchucnang/danhsach') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">Nhóm chức năng</span>
                                        </a>
                                    </li>
                                @endif
                                @if (session('admin')->capdo == 'SSA')
                                    <li class="menu-item" aria-haspopup="true">
                                        <a href="{{ url('/TongHopSoLieu/ThongTin') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">Tổng hợp số liệu</span>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </li>
                @endif
            </ul>
        </div>
    </li>
@endif
