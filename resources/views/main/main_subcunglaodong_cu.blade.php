@if (chkPhanQuyen('cunglaodong', 'phanquyen'))
    {{-- <li class="menu-section">
        <h4 class="menu-text">QUẢN LÝ CUNG LAO ĐỘNG</h4>
        <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
    </li> --}}
    {{-- @if (session('admin')->capdo == 'T') --}}

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
            <span class="menu-text font-weight-bold">CUNG LAO ĐỘNG</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="menu-submenu">
            <i class="menu-arrow"></i>
            <ul class="menu-subnav">
                @if (chkPhanQuyen('danhsachdieutra', 'phanquyen'))
                <li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <i class="menu-bullet menu-bullet-dot">
                            <span></span>
                        </i>
                        <span class="menu-text font-weight-bold">Danh sách điều tra</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu menu-submenu-classic menu-submenu-right">
                        <ul class="menu-subnav">
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{URL::to('/dieutra/danhsach?madv='.'&kydieutra='.(date('Y') - 1).'&mahuyen=450')}}" class="menu-link">
    
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text font-weight-bold">Danh sách</span>
                                </a>
                            </li>
                            @if (chkPhanQuyen('danhsachdieutra', 'thaydoi'))
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{URL::to('/dieutra/ThemMoi')}}" class="menu-link">
    
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text font-weight-bold">Tạo mới</span>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li>
                @endif
                @if (chkPhanQuyen('nhankhau', 'phanquyen'))
                <li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <i class="menu-bullet menu-bullet-dot">
                            <span></span>
                        </i>
                        <span class="menu-text font-weight-bold">Nhân khẩu</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu menu-submenu-classic menu-submenu-right">
                        <ul class="menu-subnav">
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{URL::to('/nhankhau/danhsach')}}" class="menu-link">
    
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text font-weight-bold">Danh sách</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endif
                @if (chkPhanQuyen('hogiadinh', 'phanquyen'))
                <li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <i class="menu-bullet menu-bullet-dot">
                            <span></span>
                        </i>
                        <span class="menu-text font-weight-bold">Hộ gia đình</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu menu-submenu-classic menu-submenu-right">
                        <ul class="menu-subnav">
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{ URL::to('/nhankhau/hogiadinh') }}" class="menu-link">
    
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text font-weight-bold">Danh sách</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endif
                <li class="menu-item" aria-haspopup="true">
                    <a href="{{'/biendong?madv='.'&kydieutra='.(date('Y') - 1)}}" class="menu-link">

                        <i class="menu-bullet menu-bullet-dot">
                            <span></span>
                        </i>
                        <span class="menu-text font-weight-bold">Biến động</span>
                    </a>
                </li>
                @if (chkPhanQuyen('hopthuttdvvl', 'phanquyen'))
                <?php $count=\App\Models\hopthu::where('matinh','ttdvvl')->where('trangthai','DAGUI')->where('status',0)->count(); ?>
                <li class="menu-item" aria-haspopup="true">
                    <a href="{{'/hopthu'}}" class="menu-link">

                        <i class="menu-bullet menu-bullet-dot">
                            <span></span>
                        </i>
                        <span class="menu-text font-weight-bold" >Hộp thư 
                            @if ($count > 0)
                            <i class="fa fa-envelope ml-30 mr-1" style="color:#FDB45E;"></i>{{$count}}
                            @endif
                           
                        </span> 
                    </a>
                </li>
                @endif
                @if (chkPhanQuyen('hopthuhuyen', 'phanquyen'))
                <?php 
                $model_ttdvvl=\App\Models\hopthu::join('donvinhanthongbao','donvinhanthongbao.mahopthu','hopthu.dvnhan')
                ->select('hopthu.*','donvinhanthongbao.isRead')
                ->where('donvinhanthongbao.madv',session('admin')->madv)
                ->where('isRead',0)
                ->count();
                    $model_xa=\App\Models\hopthu::where('mahuyen',session('admin')->maquocgia)->where('trangthai','DAGUI')->where('status',0)->count();
                    $model_tralai=\App\Models\hopthu::where('madv',session('admin')->madv)->where('trangthai','TRALAI')->where('status',0)->count();
                    $count_huyen=$model_ttdvvl + $model_xa + $model_tralai;
                    ?>
                <li class="menu-item" aria-haspopup="true">
                    <a href="{{'/hopthu/huyen'}}" class="menu-link">

                        <i class="menu-bullet menu-bullet-dot">
                            <span></span>
                        </i>
                        <span class="menu-text font-weight-bold">Hộp thư
                            @if ($count_huyen > 0)
                            <i class="fa fa-envelope ml-30 mr-1" style="color:#FDB45E;"></i>{{$count_huyen}}
                            @endif

                        </span>
                    </a>
                </li>
                @endif
                @if (chkPhanQuyen('hopthuxa', 'phanquyen'))
                <?php 
                $model_ttdvvl=\App\Models\hopthu::join('donvinhanthongbao','donvinhanthongbao.mahopthu','hopthu.dvnhan')
                ->select('hopthu.*','donvinhanthongbao.isRead')
                ->where('donvinhanthongbao.madv',session('admin')->madv)
                ->where('isRead',0)
                ->count();

                $model_tralai=\App\Models\hopthu::where('madv',session('admin')->madv)->where('trangthai','TRALAI')->where('status',0)->count();
                ?>
                <li class="menu-item" aria-haspopup="true">
                    <a href="{{'/hopthu/xa'}}" class="menu-link">

                        <i class="menu-bullet menu-bullet-dot">
                            <span></span>
                        </i>
                        <span class="menu-text font-weight-bold">Hộp thư
                            @if ($model_ttdvvl > 0)
                            <i class="fa fa-envelope ml-30 mr-1" style="color:#FDB45E;"></i>{{$model_ttdvvl + $model_tralai}}
                            @endif
                        </span>
                    </a>
                </li>
                @endif
            </ul>
        </div>
    </li>
    
            
@endif
