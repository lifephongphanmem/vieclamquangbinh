<ul class="menu-nav">
    <li class="menu-item menu-item-submenu menu-item-rel" data-menu-toggle="click" aria-haspopup="true">
        <a href="javascript:;" class="menu-link menu-toggle ">

            <span class="menu-text font-weight-bold">TUYỂN DỤNG</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="menu-submenu">
            <i class="menu-arrow"></i>
            <ul class="menu-subnav">
                <li class="menu-item" aria-haspopup="true" data-menu-toggle="click">
                    <a href="{{ URL::to('tuyendung-fn') }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot">
                            <span></span>
                        </i>
                        <span class="menu-text font-weight-bold">Đăng tuyển dụng</span>
                    </a>
                </li>

                <li class="menu-item" aria-haspopup="true">
                    <a href="{{ URL::to('tuyendung-fa') }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot">
                            <span></span>
                        </i>
                        <span class="menu-text font-weight-bold">Lịch sử tuyển dụng</span>
                    </a>
                </li>
                <li class="menu-item" aria-haspopup="true">
                    <a href="{{ URL::to('tuyendung-hosodanop') }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot">
                            <span></span>
                        </i>
                        <span class="menu-text font-weight-bold">Hồ sơ ứng tuyển</span>
                    </a>
                </li>
                
            </ul>
        </div>
    </li>

    <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="click">
        <a class="menu-link menu-toggle ">

            </span>
            <span class="menu-text font-weight-bold">BÁO CÁO</span>
            {{-- <i class="menu-arrow"></i> --}}
        </a>
        <div class="menu-submenu">
            <i class="menu-arrow"></i>
            <ul class="menu-subnav">
                <li class="menu-item" aria-haspopup="true">
                    <a href="{{'/doanhnghiep/mau01pli/'.session('admin')->company_id.'?user='.session('admin')->id}}" target="_blank" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot">
                            <span></span>
                        </i>
                        <span class="menu-text font-weight-bold">Mẫu 01/PLI</span>
                    </a>
                </li>
            </ul>
        </div>
        {{-- <div class="menu-submenu">
            <i class="menu-arrow"></i>
            <ul class="menu-subnav">
                <li class="menu-item" aria-haspopup="true">
                    <a href="{{ URL::to('tuyendung-fn') }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot">
                            <span></span>
                        </i>
                        <span class="menu-text font-weight-bold">Đăng tuyển dụng</span>
                    </a>
                </li>

                <li class="menu-item" aria-haspopup="true">
                    <a href="{{ URL::to('tuyendung-fa') }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot">
                            <span></span>
                        </i>
                        <span class="menu-text font-weight-bold">Lịch sử tuyển dụng</span>
                    </a>
                </li>
            </ul>
        </div> --}}
    </li>
</ul>
