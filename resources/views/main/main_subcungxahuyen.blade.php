<ul class="menu-nav">
    @if (chkPhanQuyen('danhsachdieutra', 'thaydoi'))
        <li class="menu-item menu-item-submenu menu-item-rel" data-menu-toggle="click" aria-haspopup="true">
            <a data-target="#taomoi_kydieutra" data-toggle="modal" class="menu-link">
                <span class="menu-text">Tạo kỳ điều tra mới</span>
                <span class="menu-desc"></span>
                <i class="menu-arrow"></i>
            </a>
        </li>
    @endif
    @if (chkPhanQuyen('nhankhau', 'phanquyen'))
        {{-- <li class="menu-item menu-item-submenu menu-item-rel">
        <a href="{{ URL::to('/nhankhau/danhsach') }}" class="menu-link ">
            <span class="menu-text">Người tìm việc</span>
            <span class="menu-desc"></span>
            <i class="menu-arrow"></i>
        </a>

    </li> --}}

        @if (session('admin')->capdo == 'H')
            <li class="menu-item menu-item-submenu menu-item-rel" data-menu-toggle="click" aria-haspopup="true">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <span class="menu-text">Người tìm việc - Việc tìm người</span>
                    <span class="menu-desc"></span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu menu-submenu-classic menu-submenu-left">
                    <ul class="menu-subnav">
                        {{-- @if (chkPhanQuyen('nhankhau', 'phanquyen')) --}}
                        <li class="menu-item" aria-haspopup="true">
                            <a href="{{ URL::to('/nhankhau/danhsach') }}" class="menu-link">
                                <span class="svg-icon menu-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                                        <path
                                            d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z" />
                                    </svg>
                                </span>
                                <span class="menu-text">Người tìm việc</span>
                            </a>
                        </li>
                        {{-- @endif --}}

                        <li class="menu-item" aria-haspopup="true">
                            {{-- <a href="{{ URL::to('tuyendung-viectimnguoi') }}" class="menu-link"> --}}
                            <a class="menu-link">
                                <span class="svg-icon menu-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-phone-landscape" viewBox="0 0 16 16">
                                        <path
                                            d="M1 4.5a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v6a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-6zm-1 6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-6a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v6z" />
                                        <path d="M14 7.5a1 1 0 1 0-2 0 1 1 0 0 0 2 0z" />
                                    </svg>
                                </span>
                                <span class="menu-text">Việc tìm người</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
        @endif

        <li class="menu-item menu-item-submenu menu-item-rel">
            <a href="{{ URL::to('/nguoitimviec/danhsach') }}" class="menu-link ">
                <span class="menu-text">Người tìm việc</span>
                <span class="menu-desc"></span>
                <i class="menu-arrow"></i>
            </a>
        </li>

    @endif
    @if (session('admin')->capdo == 'H')
        <li class="menu-item" aria-haspopup="true">
            <a href="{{ '/biendong?madv=' . '&kydieutra=' . $baocao['kydieutra'] }}" class="menu-link">
                {{-- <span class="svg-icon menu-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-clipboard-pulse" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M10 1.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-1Zm-5 0A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5v1A1.5 1.5 0 0 1 9.5 4h-3A1.5 1.5 0 0 1 5 2.5v-1Zm-2 0h1v1H3a1 1 0 0 0-1 1V14a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V3.5a1 1 0 0 0-1-1h-1v-1h1a2 2 0 0 1 2 2V14a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V3.5a2 2 0 0 1 2-2Zm6.979 3.856a.5.5 0 0 0-.968.04L7.92 10.49l-.94-3.135a.5.5 0 0 0-.895-.133L4.232 10H3.5a.5.5 0 0 0 0 1h1a.5.5 0 0 0 .416-.223l1.41-2.115 1.195 3.982a.5.5 0 0 0 .968-.04L9.58 7.51l.94 3.135A.5.5 0 0 0 11 11h1.5a.5.5 0 0 0 0-1h-1.128L9.979 5.356Z" />
                    </svg>
                </span> --}}
                <span class="menu-text">Biến động</span>
            </a>
        </li>
    @else
        @if (chkPhanQuyen('biendongxa', 'phanquyen'))
            <li class="menu-item menu-item-submenu menu-item-rel">
                <a href="{{ '/biendong/danhsach_biendong' }}" class="menu-link">
                    <span class="menu-text">Biến động</span>
                    <span class="menu-desc"></span>
                    <i class="menu-arrow"></i>
                </a>
            </li>
        @endif
    @endif


    <li class="menu-item menu-item-submenu menu-item-rel" data-menu-toggle="click" aria-haspopup="true">
        <a href="javascript:;" class="menu-link menu-toggle">
            <span class="menu-text">Tổng hợp - báo cáo</span>
            <span class="menu-desc"></span>
            <i class="menu-arrow"></i>
        </a>
        <div class="menu-submenu menu-submenu-classic menu-submenu-left">
            <ul class="menu-subnav">
                <li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <span class="svg-icon menu-icon">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/General/Thunder-move.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path
                                        d="M16.3740377,19.9389434 L22.2226499,11.1660251 C22.4524142,10.8213786 22.3592838,10.3557266 22.0146373,10.1259623 C21.8914367,10.0438285 21.7466809,10 21.5986122,10 L17,10 L17,4.47708173 C17,4.06286817 16.6642136,3.72708173 16.25,3.72708173 C15.9992351,3.72708173 15.7650616,3.85240758 15.6259623,4.06105658 L9.7773501,12.8339749 C9.54758575,13.1786214 9.64071616,13.6442734 9.98536267,13.8740377 C10.1085633,13.9561715 10.2533191,14 10.4013878,14 L15,14 L15,19.5229183 C15,19.9371318 15.3357864,20.2729183 15.75,20.2729183 C16.0007649,20.2729183 16.2349384,20.1475924 16.3740377,19.9389434 Z"
                                        fill="#000000" />
                                    <path
                                        d="M4.5,5 L9.5,5 C10.3284271,5 11,5.67157288 11,6.5 C11,7.32842712 10.3284271,8 9.5,8 L4.5,8 C3.67157288,8 3,7.32842712 3,6.5 C3,5.67157288 3.67157288,5 4.5,5 Z M4.5,17 L9.5,17 C10.3284271,17 11,17.6715729 11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L4.5,20 C3.67157288,20 3,19.3284271 3,18.5 C3,17.6715729 3.67157288,17 4.5,17 Z M2.5,11 L6.5,11 C7.32842712,11 8,11.6715729 8,12.5 C8,13.3284271 7.32842712,14 6.5,14 L2.5,14 C1.67157288,14 1,13.3284271 1,12.5 C1,11.6715729 1.67157288,11 2.5,11 Z"
                                        fill="#000000" opacity="0.3" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-text">Báo cáo</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu menu-submenu-classic menu-submenu-right">
                        <ul class="menu-subnav">
                            {{-- @if (chkPhanQuyen('baocaoxa', 'phanquyen'))
                                <li class="menu-item" aria-haspopup="true">
                                    <a data-target="#modify-modal-xa" data-toggle="modal" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Báo cáo thông tin cung lao động - Mẫu 03</span>

                                    </a>
                                </li>
                            @endif --}}
                            {{-- @if (chkPhanQuyen('baocaohuyen', 'phanquyen'))
                                <li class="menu-item" aria-haspopup="true">
                                    <a data-target="#modify-modal-huyen" data-toggle="modal" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Báo cáo thông tin cung lao động - Mẫu 03</span>

                                    </a>
                                </li>
                            @endif --}}

                            @if (chkPhanQuyen('baocaoxa', 'phanquyen'))
                                <li class="menu-item" aria-haspopup="true">
                                    <a data-target="#modify-modal-xa-mau01b" data-toggle="modal" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>

                                        <span class="menu-text">Báo cáo thông tin cung lao động - Mẫu 01b</span>
                                    </a>
                                </li>
                            @endif
                            @if (chkPhanQuyen('baocaohuyen', 'phanquyen'))
                                <li class="menu-item" aria-haspopup="true">
                                    <a data-target="#modify-modal-huyen-mau01b" data-toggle="modal"
                                        class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Báo cáo thông tin cung lao động - Mẫu 01b</span>
                                    </a>
                                </li>
                            @endif
                            {{-- <li class="menu-item" aria-haspopup="true">
                                <a data-target="#thitruongld-cung-modal" data-toggle="modal" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Báo cáo thông tin thị trường cung lao động</span>
                                </a>
                            </li> --}}

                            @if (chkPhanQuyen('baocaohuyen', 'phanquyen'))
                                <li class="menu-item" aria-haspopup="true">
                                    <a data-target="#modify-modal-huyen-mau03" data-toggle="modal" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Báo cáo thông tin cung lao động - Mẫu 03 (Huyện)</span>
                                    </a>
                                </li>
                            @endif

                            @if (chkPhanQuyen('baocaoxa', 'phanquyen'))
                                <li class="menu-item" aria-haspopup="true">
                                    <a data-target="#modify-modal-xa-mau03" data-toggle="modal" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Báo cáo thông tin cung lao động - Mẫu 03 (Xã)</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </li>
                <li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <span class="svg-icon menu-icon">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Clipboard-list.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path
                                        d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z"
                                        fill="#000000" opacity="0.3" />
                                    <path
                                        d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z"
                                        fill="#000000" />
                                    <rect fill="#000000" opacity="0.3" x="10" y="9" width="7" height="2"
                                        rx="1" />
                                    <rect fill="#000000" opacity="0.3" x="7" y="9" width="2" height="2"
                                        rx="1" />
                                    <rect fill="#000000" opacity="0.3" x="7" y="13" width="2" height="2"
                                        rx="1" />
                                    <rect fill="#000000" opacity="0.3" x="10" y="13" width="7" height="2"
                                        rx="1" />
                                    <rect fill="#000000" opacity="0.3" x="7" y="17" width="2" height="2"
                                        rx="1" />
                                    <rect fill="#000000" opacity="0.3" x="10" y="17" width="7" height="2"
                                        rx="1" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-text">Tổng hợp</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu menu-submenu-classic menu-submenu-right">
                        <ul class="menu-subnav">

                            <li class="menu-item" aria-haspopup="true">
                                <a data-target="#modify-modal-tonghop" data-toggle="modal" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Tổng hợp</span>
                                </a>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a data-target="#modify-modal-biendong-xa" data-toggle="modal" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Danh sách biến động - Mẫu A3</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </li>

    @if (chkPhanQuyen('hopthuhuyen', 'phanquyen'))
        <?php
        $model_ttdvvl = \App\Models\hopthu::join('donvinhanthongbao', 'donvinhanthongbao.mahopthu', 'hopthu.dvnhan')
            ->select('hopthu.*', 'donvinhanthongbao.isRead')
            ->where('donvinhanthongbao.madv', session('admin')->madv)
            ->where('isRead', 0)
            ->count();
        $model_xa = \App\Models\hopthu::where('mahuyen', session('admin')->maquocgia)
            ->where('trangthai', 'DAGUI')
            ->where('status', 0)
            ->count();
        $model_tralai = \App\Models\hopthu::where('madv', session('admin')->madv)
            ->where('trangthai', 'TRALAI')
            ->where('status', 0)
            ->count();
        $count_huyen = $model_ttdvvl + $model_xa + $model_tralai;
        ?>
        <li class="menu-item menu-item-submenu" data-menu-toggle="click" aria-haspopup="true">
            <a href="{{ '/hopthu/huyen' }}" class="menu-link">
                <span class="menu-text">Hộp thư
                    @if ($model_ttdvvl > 0)
                        <i class="fa fa-envelope ml- mr-1" style="color:#FDB45E;"></i>{{ $count_huyen }}
                    @endif
                </span>
                <span class="menu-desc"></span>
                <i class="menu-arrow"></i>
            </a>
        </li>
    @endif
    @if (chkPhanQuyen('hopthuxa', 'phanquyen'))
        <?php
        $model_ttdvvl = \App\Models\hopthu::join('donvinhanthongbao', 'donvinhanthongbao.mahopthu', 'hopthu.dvnhan')
            ->select('hopthu.*', 'donvinhanthongbao.isRead')
            ->where('donvinhanthongbao.madv', session('admin')->madv)
            ->where('isRead', 0)
            ->count();
        
        $model_tralai = \App\Models\hopthu::where('madv', session('admin')->madv)
            ->where('trangthai', 'TRALAI')
            ->where('status', 0)
            ->count();
        ?>
        <li class="menu-item menu-item-submenu " data-menu-toggle="click" aria-haspopup="true">
            <a href="{{ '/hopthu/xa' }}" class="menu-link">
                <span class="menu-text">Hộp thư
                    @if ($model_ttdvvl > 0)
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-envelope-exclamation-fill ml-2 text-warning" viewBox="0 0 16 16">
                            <path
                                d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.026A2 2 0 0 0 2 14h6.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586l-1.239-.757ZM16 4.697v4.974A4.491 4.491 0 0 0 12.5 8a4.49 4.49 0 0 0-1.965.45l-.338-.207L16 4.697Z" />
                            <path
                                d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1.5a.5.5 0 0 1-1 0V11a.5.5 0 0 1 1 0Zm0 3a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Z" />
                        </svg>
                    @endif
                </span>
                @if ($model_ttdvvl > 0)
                    <span class="text-warning ml-1">{{ $model_ttdvvl + $model_tralai }}</span>
                @endif
                <i class="menu-arrow"></i>
            </a>
        </li>
    @endif


</ul>
