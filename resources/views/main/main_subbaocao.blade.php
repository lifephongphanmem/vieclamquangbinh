@if (chkPhanQuyen('baocao', 'phanquyen'))
    <li class="menu-item menu-item-submenu menu-item-rel" data-menu-toggle="click" aria-haspopup="true">
        <a href="javascript:;" class="menu-link menu-toggle">
            <span class="menu-text">BÁO CÁO</span>
            <span class="menu-desc"></span>
            <i class="menu-arrow"></i>
        </a>
        <div class="menu-submenu menu-submenu-classic menu-submenu-left">
            <ul class="menu-subnav">
                <li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <span class="svg-icon menu-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-building-fill-check" viewBox="0 0 16 16">
                                <path
                                    d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514Z" />
                                <path
                                    d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v7.256A4.493 4.493 0 0 0 12.5 8a4.493 4.493 0 0 0-3.59 1.787A.498.498 0 0 0 9 9.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .39-.187A4.476 4.476 0 0 0 8.027 12H6.5a.5.5 0 0 0-.5.5V16H3a1 1 0 0 1-1-1V1Zm2 1.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5Zm3 0v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5Zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1ZM4 5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5ZM7.5 5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm2.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5ZM4.5 8a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Z" />
                            </svg>
                        </span>
                        <span class="menu-text">Doanh nghiệp</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu menu-submenu-classic menu-submenu-right">
                        <ul class="menu-subnav">

                            {{-- <li class="menu-item mau02" aria-haspopup="true" style="margin-left:41px">

                                <form class="form-inline" method="GET">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <button class="btn btn-sm btn-clean text-dark" style="padding-left:0"
                                    name="export" value="1" type="submit">Mẫu số 02/PLI</button>
                                </form>
                            </li> --}}
                            <li class="menu-item" aria-haspopup="true">
                                <a href="#" data-toggle="modal" data-target="#moda-mau02pli" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Mẫu 02/PLI1</span>
                                </a>
                            </li>

                            <li class="menu-item" aria-haspopup="true">
                                <a data-target="#thitruongld-modal" data-toggle="modal" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Mẫu 04 - Báo cáo về thông tin thị trường lao động</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <span class="svg-icon menu-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-layout-text-sidebar" viewBox="0 0 16 16">
                                <path
                                    d="M3.5 3a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 3a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM3 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5z" />
                                <path
                                    d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm12-1v14h2a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1h-2zm-1 0H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h9V1z" />
                            </svg>
                        </span>
                        <span class="menu-text">Cung lao động</span>
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
                            </li>
                            @if (chkPhanQuyen('baocaohuyen', 'phanquyen'))
                                <li class="menu-item" aria-haspopup="true">
                                    <a data-target="#modify-modal-huyen" data-toggle="modal" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Báo cáo thông tin cung lao động - Mẫu 03 (Huyện)</span>
                                    </a>
                                </li>
                            @endif
                            @if (chkPhanQuyen('baocaoxa', 'phanquyen'))
                                <li class="menu-item" aria-haspopup="true">
                                    <a data-target="#modify-modal-xa" data-toggle="modal" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Báo cáo thông tin cung lao động - Mẫu 03 (Xã)</span>
                                    </a>
                                </li>
                            @endif --}}

                            <li class="menu-item" aria-haspopup="true">
                                <a data-target="#modify-modal-tinh-mau01b" data-toggle="modal" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Báo cáo thông tin cung lao động - Mẫu 01b</span>
                                </a>
                            </li>
                            @if (chkPhanQuyen('baocaohuyen', 'phanquyen'))
                                <li class="menu-item" aria-haspopup="true">
                                    <a data-target="#modify-modal-huyen-mau01b" data-toggle="modal" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Báo cáo thông tin cung lao động - Mẫu 01b (huyện)</span>
                                    </a>
                                </li>
                            @endif
                            @if (chkPhanQuyen('baocaoxa', 'phanquyen'))
                                <li class="menu-item" aria-haspopup="true">
                                    <a data-target="#modify-modal-xa-mau01b" data-toggle="modal" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>


                                        <span class="menu-text">Báo cáo thông tin cung lao động - Mẫu 01b (xã)</span>
                                    </a>
                                </li>
                            @endif

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

                        <li class="menu-item" aria-haspopup="true">
                            <a data-target="#modify-modal-tonghop" data-toggle="modal" class="menu-link">
                                <span class="svg-icon menu-icon">
        
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
                                            <rect fill="#000000" opacity="0.3" x="10" y="9"
                                                width="7" height="2" rx="1" />
                                            <rect fill="#000000" opacity="0.3" x="7" y="9"
                                                width="2" height="2" rx="1" />
                                            <rect fill="#000000" opacity="0.3" x="7" y="13"
                                                width="2" height="2" rx="1" />
                                            <rect fill="#000000" opacity="0.3" x="10" y="13"
                                                width="7" height="2" rx="1" />
                                            <rect fill="#000000" opacity="0.3" x="7" y="17"
                                                width="2" height="2" rx="1" />
                                            <rect fill="#000000" opacity="0.3" x="10" y="17"
                                                width="7" height="2" rx="1" />
                                        </g>
                                    </svg>
        
                                </span>
        
                                <span class="menu-text">Tổng hợp</span>
                            </a>
                        </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </li>
@endif
