@if (chkPhanQuyen('cunglaodong', 'phanquyen'))
    <li class="menu-item menu-item-submenu menu-item-rel" data-menu-toggle="click" aria-haspopup="true">
        <a href="javascript:;" class="menu-link menu-toggle">
            <span class="menu-text">QUẢN LÝ CUNG LAO ĐỘNG</span>
            <span class="menu-desc"></span>
            <i class="menu-arrow"></i>
        </a>
        <div class="menu-submenu menu-submenu-classic menu-submenu-left">
            <ul class="menu-subnav">
                @if (chkPhanQuyen('danhsachdieutra', 'phanquyen'))
                    <li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <span class="svg-icon menu-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-card-list" viewBox="0 0 16 16">
                                    <path
                                        d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                                    <path
                                        d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z" />
                                </svg>
                            </span>
                            <span class="menu-text">Danh sách điều tra</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="menu-submenu menu-submenu-classic menu-submenu-right">
                            <ul class="menu-subnav">

                                <li class="menu-item" aria-haspopup="true">
                                    <a href="{{ URL::to('/dieutra/danhsach?madv=' . '&kydieutra=' . (date('Y') - 1) . '&mahuyen=450') }}"
                                        class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Danh sách</span>
                                    </a>
                                </li>
                                @if (chkPhanQuyen('danhsachdieutra', 'thaydoi'))
                                    <li class="menu-item" aria-haspopup="true">
                                        <a href="{{ URL::to('/dieutra/ThemMoi') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">Tạo mới</span>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </li>
                @endif
                @if (chkPhanQuyen('nhankhau', 'phanquyen'))
                    <li class="menu-item" aria-haspopup="true">
                        <a href="{{ URL::to('/nhankhau/danhsach') }}" class="menu-link">
                            <span class="svg-icon menu-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                                    <path
                                        d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z" />
                                </svg>
                            </span>
                            <span class="menu-text">Nhân khẩu</span>
                        </a>
                    </li>
                @endif
                {{-- <li class="menu-item" aria-haspopup="true">
                    <a href="{{ '/biendong?madv=' . '&kydieutra=' . $baocao['kydieutra'] }}" class="menu-link">
                        <span class="svg-icon menu-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-clipboard-pulse" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M10 1.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-1Zm-5 0A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5v1A1.5 1.5 0 0 1 9.5 4h-3A1.5 1.5 0 0 1 5 2.5v-1Zm-2 0h1v1H3a1 1 0 0 0-1 1V14a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V3.5a1 1 0 0 0-1-1h-1v-1h1a2 2 0 0 1 2 2V14a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V3.5a2 2 0 0 1 2-2Zm6.979 3.856a.5.5 0 0 0-.968.04L7.92 10.49l-.94-3.135a.5.5 0 0 0-.895-.133L4.232 10H3.5a.5.5 0 0 0 0 1h1a.5.5 0 0 0 .416-.223l1.41-2.115 1.195 3.982a.5.5 0 0 0 .968-.04L9.58 7.51l.94 3.135A.5.5 0 0 0 11 11h1.5a.5.5 0 0 0 0-1h-1.128L9.979 5.356Z" />
                            </svg>
                        </span>
                        <span class="menu-text">Biến động</span>
                    </a>
                </li> --}}
                @if (chkPhanQuyen('hopthuttdvvl', 'phanquyen'))
                    <?php $count = \App\Models\hopthu::where('matinh', 'ttdvvl')->where('trangthai', 'DAGUI')->where('loaithu', 2)->where('status', 0)->count(); ?>
                    <li class="menu-item" aria-haspopup="true">
                        <a href="{{ '/hopthu' }}" class="menu-link">
                            <span class="svg-icon menu-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                                </svg>
                            </span>
                            <span class="menu-text">Hộp thư
                                @if ($count > 0)
                                    <i class="fa fa-envelope ml-30 mr-1" style="color:#FDB45E;"></i>{{ $count }}
                                @endif
                            </span>
                        </a>
                    </li>
                @endif

                {{-- <li class="menu-item" aria-haspopup="true">
                    <a href="{{'/dsthatnghiep'}}" class="menu-link">

                        <span class="menu-text">Danh sách thất nghiệp </span>
                    </a>
                </li> --}}
                @if (chkPhanQuyen('baocao', 'phanquyen'))
                    <li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <span class="svg-icon menu-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-card-list" viewBox="0 0 16 16">
                                    <path
                                        d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                                    <path
                                        d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z" />
                                </svg>
                            </span>
                            <span class="menu-text">Báo cáo</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="menu-submenu menu-submenu-classic menu-submenu-right">
                            <ul class="menu-subnav">

                                {{-- <li class="menu-item" aria-haspopup="true">
                                    <a data-target="#modify-modal-tinh" data-toggle="modal" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Báo cáo thông tin cung lao động - Mẫu 03</span>

                                    </a>
                                </li> --}}
                                @if (chkPhanQuyen('baocaohuyen', 'phanquyen'))
                                    <li class="menu-item" aria-haspopup="true">
                                        <a data-target="#modify-modal-huyen" data-toggle="modal" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">Báo cáo thông tin cung lao động - Mẫu 03
                                                (Huyện)</span>
                                        </a>
                                    </li>
                                @endif
                                @if (chkPhanQuyen('baocaoxa', 'phanquyen'))
                                    <li class="menu-item" aria-haspopup="true">
                                        <a data-target="#modify-modal-xa" data-toggle="modal" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">Báo cáo thông tin cung lao động - Mẫu 03
                                                (Xã)</span>
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
