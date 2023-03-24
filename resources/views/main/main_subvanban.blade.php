<ul class="menu-nav">
    <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="click">
        <a href="javascript:;" class="menu-link menu-toggle">
            <span class="menu-text font-weight-bold">GỬI/NHẬN VĂN BẢN</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="menu-submenu">
            <i class="menu-arrow"></i>
            <ul class="menu-subnav">
                <li class="menu-item" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="{{ URL::to('messages') }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot">
                            <span></span>
                        </i>
                        <span class="menu-text font-weight-bold">Văn bản đã lưu trữ</span>
                    </a>
                </li>

                <li class="menu-item" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="{{ URL::to('messages') }}/create" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot">
                            <span></span>
                        </i>
                        <span class="menu-text font-weight-bold">Gửi văn bản</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
</ul>
