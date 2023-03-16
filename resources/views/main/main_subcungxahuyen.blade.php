<li class="menu-item" aria-haspopup="true">
    <a href="{{'/dieutra/TaoMoi'}}" class="menu-link">

        <i class="menu-bullet menu-bullet-dot">
            <span></span>
        </i>
        <span class="menu-text font-weight-bold">Tạo mới kỳ điều tra</span>
    </a>
</li>
@if (chkPhanQuyen('nhankhau', 'phanquyen'))
    <li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">
        <a href="{{ URL::to('/nhankhau/danhsach') }}" class="menu-link menu-toggle">
            <i class="menu-bullet menu-bullet-dot">
                <span></span>
            </i>
            <span class="menu-text font-weight-bold">Nhân khẩu</span>
        </a>
    </li>
@endif

<li class="menu-item" aria-haspopup="true">
    <a href="{{ '/biendong/danhsach_biendong' }}" class="menu-link">

        <i class="menu-bullet menu-bullet-dot">
            <span></span>
        </i>
        <span class="menu-text font-weight-bold">Biến động</span>
    </a>
</li>

<li class="menu-item" aria-haspopup="true">
    <a href="{{ '/baocao_tonghop' }}" class="menu-link">

        <i class="menu-bullet menu-bullet-dot">
            <span></span>
        </i>
        <span class="menu-text font-weight-bold">Tổng hợp - báo cáo</span>
    </a>
</li>

@if (chkPhanQuyen('hopthuttdvvl', 'phanquyen'))
    <?php $count = \App\Models\hopthu::where('matinh', 'ttdvvl')
        ->where('trangthai', 'DAGUI')
        ->where('status', 0)
        ->count(); ?>
    <li class="menu-item" aria-haspopup="true">
        <a href="{{ '/hopthu' }}" class="menu-link">

            <i class="menu-bullet menu-bullet-dot">
                <span></span>
            </i>
            <span class="menu-text font-weight-bold">Hộp thư
                @if ($count > 0)
                    <i class="fa fa-envelope ml-30 mr-1" style="color:#FDB45E;"></i>{{ $count }}
                @endif

            </span>
        </a>
    </li>
@endif
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
    <li class="menu-item" aria-haspopup="true">
        <a href="{{ '/hopthu/huyen' }}" class="menu-link">

            <i class="menu-bullet menu-bullet-dot">
                <span></span>
            </i>
            <span class="menu-text font-weight-bold">Hộp thư
                @if ($count_huyen > 0)
                    <i class="fa fa-envelope ml-30 mr-1" style="color:#FDB45E;"></i>{{ $count_huyen }}
                @endif

            </span>
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
    <li class="menu-item" aria-haspopup="true">
        <a href="{{ '/hopthu/xa' }}" class="menu-link">

            <i class="menu-bullet menu-bullet-dot">
                <span></span>
            </i>
            <span class="menu-text font-weight-bold">Hộp thư
                @if ($model_ttdvvl > 0)
                    <i class="fa fa-envelope ml-30 mr-1" style="color:#FDB45E;"></i>{{ $model_ttdvvl + $model_tralai }}
                @endif
            </span>
        </a>
    </li>
@endif
