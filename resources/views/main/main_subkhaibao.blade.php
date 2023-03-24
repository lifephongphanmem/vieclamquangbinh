<ul class="menu-nav">
    <li class="menu-item menu-item-submenu menu-item-rel" data-menu-toggle="click" aria-haspopup="true">
        <a href="javascript:;" class="menu-link menu-toggle">
            <span class="menu-text font-weight-bold">KHAI BÁO BIẾN ĐỘNG ĐỊNH KỲ</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="menu-submenu">
            <i class="menu-arrow"></i>
            <ul class="menu-subnav">
                <li class="menu-item" aria-haspopup="true">
                    <a href="{{ URL::to('laodong-fn') }}" class="menu-link ">
                        <i class="menu-bullet menu-bullet-dot">
                            <span></span>
                        </i>
                        <span class="menu-text font-weight-bold">Báo tăng</span>
                    </a>
                </li>

                <li class="menu-item" aria-haspopup="true">
                    <a href="{{ URL::to('laodong-fa') . '/delete' }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot">
                            <span></span>
                        </i>
                        <span class="menu-text font-weight-bold">Báo giảm</span>
                    </a>
                </li>

                <li class="menu-item" aria-haspopup="true">
                    <a href="{{ URL::to('laodong-fa') . '/tamdung' }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot">
                            <span></span>
                        </i>
                        <span class="menu-text font-weight-bold">Tạm dừng</span>
                    </a>
                </li>
                <li class="menu-item" aria-haspopup="true">
                    <a href="{{ URL::to('laodong-fa') . '/kethuctamdung' }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot">
                            <span></span>
                        </i>
                        <span class="menu-text font-weight-bold">Kết thúc tạm dừng</span>
                    </a>
                </li>
                <li class="menu-item" aria-haspopup="true">
                    <a href="{{ URL::to('laodong-fa') . '/update' }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot">
                            <span></span>
                        </i>
                        <span class="menu-text font-weight-bold">Thay đổi thông tin</span>
                    </a>
                </li>
                <li class="menu-item" aria-haspopup="true">
                    <a data-toggle="modal" data-target="#modal-khongbiendong" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot">
                            <span></span>
                        </i>
                        <span class="menu-text font-weight-bold">Báo không có biến động</span>
                    </a>
                </li>

                <li class="menu-item" aria-haspopup="true">
                    <a href="{{ URL::to('report-fa') }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot">
                            <span></span>
                        </i>
                        <span class="menu-text font-weight-bold">Lịch sử biến động</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
</ul>
