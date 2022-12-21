
{{-- @if (chkPhanQuyen('quantrihethong', 'phanquyen')) --}}
{{-- <li class="menu-section">
    <h4 class="menu-text">HỆ THỐNG</h4>
    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
</li> --}}
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
                    <rect fill="#000000" opacity="0.3" x="2" y="4" width="5"
                        height="16" rx="1"></rect>
                </g>
            </svg>
        </span>
        <span class="menu-text font-weight-bold">HỆ THỐNG</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="menu-submenu">
        <i class="menu-arrow"></i>
        <ul class="menu-subnav">
            {{-- @if (chkPhanQuyen('danhmuc', 'phanquyen')) --}}
            <li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <i class="menu-bullet menu-bullet-dot">
                        <span></span>
                    </i>
                    <span class="menu-text font-weight-bold">Danh mục</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu menu-submenu-classic menu-submenu-right">
                    <ul class="menu-subnav">
                        {{-- <li class="menu-item" aria-haspopup="true">
                            <a href="{{ url('/ptype-ba') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text font-weight-bold">Tham số</span>
                            </a>
                        </li> --}}
                        {{-- @if (chkPhanQuyen('chucvu', 'phanquyen')) --}}
                        <li class="menu-item" aria-haspopup="true">
                            <a href="{{ url('/danh_muc/dm_chuc_vu') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span active class=" menu-text font-weight-bold">Chức vụ</span>
                            </a>
                        </li>
                        {{-- @endif --}}
                        {{-- @if (chkPhanQuyen('doituonguutien', 'phanquyen')) --}}
                        <li class="menu-item" aria-haspopup="true">
                            <a href="{{ url('/danh_muc/dm_doi_tuong') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span active class=" menu-text font-weight-bold">Đối tượng ưu tiên</span>
                            </a>
                        </li>
                        {{-- @endif --}}
                        {{-- @if (chkPhanQuyen('manghe', 'phanquyen')) --}}
                        <li class="menu-item" aria-haspopup="true">
                            <a href="{{ url('/danh_muc/dm_ma_nghe_trinh_do') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text font-weight-bold">Mã nghề, trình độ</span>
                            </a>
                        </li>
                        {{-- @endif --}}
                        {{-- @if (chkPhanQuyen('trinhdogdpt', 'phanquyen')) --}}
                        <li class="menu-item" aria-haspopup="true">
                            <a href="{{ url('/danh_muc/dm_trinh_do_gdpt') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text font-weight-bold">Trình độ GDPT đạt được</span>
                            </a>
                        </li>
                        {{-- @endif --}}
                        {{-- @if (chkPhanQuyen('trinhdochuyenmonkythuat', 'phanquyen')) --}}
                        <li class="menu-item" aria-haspopup="true">
                            <a href="{{ url('/danh_muc/dm_trinh_do_ky_thuat') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text font-weight-bold">Trình độ chuyên môn kỹ thuật</span>
                            </a>
                        </li>
                        {{-- @endif --}}
                        {{-- @if (chkPhanQuyen('nganhsanxuatkinhdoanh', 'phanquyen')) --}}
                        <li class="menu-item" aria-haspopup="true">
                            <a href="{{ url('/danh_muc/dm_nganh_san_xuat_kinh_doanh') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text font-weight-bold">Ngành sản xuất kinh doanh</span>
                            </a>
                        </li>
                        {{-- @endif --}}
                        {{-- @if (chkPhanQuyen('loailaodong', 'phanquyen')) --}}
                        <li class="menu-item" aria-haspopup="true">
                            <a href="{{ url('/danh_muc/dm_loai_lao_dong') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text font-weight-bold">Loại lao động</span>
                            </a>
                        </li>
                        {{-- @endif --}}
                        {{-- @if (chkPhanQuyen('loaihinhhoatdongkinhte', 'phanquyen')) --}}
                        <li class="menu-item" aria-haspopup="true">
                            <a href="{{ url('/danh_muc/dm_loai_hinh_hdkt') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text font-weight-bold">Loại hình hoạt động kinh tế</span>
                            </a>
                        </li>
                        {{-- @endif --}}
                        {{-- @if (chkPhanQuyen('loaihopdonglaodong', 'phanquyen')) --}}
                        <li class="menu-item" aria-haspopup="true">
                            <a href="{{ url('/danh_muc/dm_loai_hieu_luc_hdld') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text font-weight-bold">Loại, hiệu lực hợp đồng lao động</span>
                            </a>
                        </li>
                        {{-- @endif --}}
                        {{-- @if (chkPhanQuyen('thoiganthatnghiep', 'phanquyen')) --}}
                        <li class="menu-item" aria-haspopup="true">
                            <a href="{{ url('/danh_muc/dm_thoi_gian_that_nghiep') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text font-weight-bold">Thời gian thất nghiệp</span>
                            </a>
                        </li>
                        {{-- @endif --}}
                        {{-- @if (chkPhanQuyen('tinhtrangthamgiahdkt', 'phanquyen')) --}}
                        <li class="menu-item" aria-haspopup="true">
                            <a href="{{ url('/danh_muc/dm_tinh_trang_tham_gia_hdkt') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text font-weight-bold">Tình trạng tham gia hoạt động kinh tế</span>
                            </a>
                        </li>
                        {{-- @endif --}}
                        {{-- @if (chkPhanQuyen('chuyenmondaotao', 'phanquyen')) --}}
                        <li class="menu-item" aria-haspopup="true">
                            <a href="{{ url('/danh_muc/dm_chuyen_mon_dao_tao') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text font-weight-bold">Chuyên môn đào tạo</span>
                            </a>
                        </li>
                        {{-- @endif --}}
                        {{-- @if (chkPhanQuyen('nghecongviec', 'phanquyen')) --}}
                        <li class="menu-item" aria-haspopup="true">
                            <a href="{{ url('/danh_muc/nghe_cong_viec') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text font-weight-bold">Nghề công việc</span>
                            </a>
                        </li>
                        {{-- @endif --}}
                        {{-- @if (chkPhanQuyen('hinhthuclamviec', 'phanquyen')) --}}
                        <li class="menu-item" aria-haspopup="true">
                            <a href="{{ url('/danh_muc/dm_hinh_thuc_cong_viec') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text font-weight-bold">Hình thức làm việc</span>
                            </a>
                        </li>
                        {{-- @endif --}}
                        {{-- @if (chkPhanQuyen('dmthonxom', 'phanquyen')) --}}
                        <li class="menu-item" aria-haspopup="true">
                            <a href="{{ url('/dmthonxom/danhsach') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text font-weight-bold">Thôn xóm</span>
                            </a>
                        </li>
                        {{-- @endif --}}
                    </ul>
                </div>
            {{-- @endif --}}
            {{-- @if (chkPhanQuyen('hethongchung', 'phanquyen')) --}}
            <li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <i class="menu-bullet menu-bullet-dot">
                        <span></span>
                    </i>
                    <span class="menu-text font-weight-bold">Hệ thống chung</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu menu-submenu-classic menu-submenu-right">
                    <ul class="menu-subnav">
                        {{-- @if (chkPhanQuyen('diaban', 'phanquyen')) --}}
                        <li class="menu-item" aria-haspopup="true">
                            <a href="{{ url('/dia_ban/danhsach') }}" class="menu-link">

                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text font-weight-bold">Địa bàn</span>
                            </a>
                        </li>
                        {{-- @endif --}}
                        {{-- @if (chkPhanQuyen('donvi', 'phanquyen')) --}}
                        <li class="menu-item" aria-haspopup="true">
                            <a href="{{ url('/dmdonvi/danhsach') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text font-weight-bold">Đơn vị</span>
                            </a>
                        </li>
                        {{-- @endif --}}
                        {{-- @if (chkPhanQuyen('taikhoan', 'phanquyen')) --}}
                        <li class="menu-item" aria-haspopup="true">
                            <a href="{{ url('/TaiKhoan/ThongTin?phanloaitk=1') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text font-weight-bold">Tài khoản</span>
                            </a>
                        </li>
                        {{-- @endif --}}
                        {{-- @if (chkPhanQuyen('chucnang', 'phanquyen')) --}}
                        <li class="menu-item" aria-haspopup="true">
                            <a href="{{ url('/Chuc_nang/Thong_tin') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text font-weight-bold">Chức năng</span>
                            </a>
                        </li>
                        {{-- @endif --}}
                        {{-- @if (chkPhanQuyen('nhomtaikhoan', 'phanquyen')) --}}
                        <li class="menu-item" aria-haspopup="true">
                            <a href="{{ url('/nhomchucnang/danhsach') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text font-weight-bold">Nhóm chức năng</span>
                            </a>
                        </li>
                        {{-- @endif --}}
                    </ul>
                </div>
            </li>
            {{-- @endif --}}
        </ul>
    </div>
</li>
{{-- @endif --}}