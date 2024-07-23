<?php

use App\Models\Danhmuc\danhmuchanhchinh;
use App\Models\Danhmuc\dmdoituonguutien;
use App\Models\Danhmuc\dmdonvi;
use App\Models\Danhmuc\dmloaihinhhdkt;
use App\Models\Danhmuc\dmnganhnghe;
use App\Models\Danhmuc\dmtinhtrangthamgiahdkt;
use App\Models\Danhmuc\dmtinhtrangthamgiahdktct;
use App\Models\Danhmuc\dmtrinhdogdpt;
use App\Models\Danhmuc\dmtrinhdokythuat;
use App\Models\danhsach;
use App\Models\nhankhauModel;
use App\Models\tonghopcunglaodong;

function chkPhanQuyen($machucnang = null, $tenphanquyen = null)
{
    //return true;
    //Kiểm tra giao diện (danhmucchucnang)
    if (!chkGiaoDien($machucnang)) {
        return false;
    }
    $capdo = session('admin')->capdo;

    if (in_array($capdo, ['SSA', 'ssa',])) {
        return true;
    }
    // dd(session('phanquyen'));
    return session('phanquyen')[$machucnang][$tenphanquyen] ?? 0;
}

function chkGiaoDien($machucnang, $tentruong = 'trangthai')
{
    $chk = session('chucnang')[$machucnang] ?? ['trangthai' => 0, 'tencn' => $machucnang . '()'];
    // if($machucnang == 'quantrihethong'){
    // dd($chk);
    // }
    return $chk[$tentruong];
}


function getParamsByNametype($paramtype)
{
    $cats = array();
    $type = DB::table('paramtype')->where('name', $paramtype)->get()->first();
    if ($type) {
        $cats = DB::table('param')->where('type', $type->id)->get();
    }
    return $cats;
}

function getGioiTinh()
{
    return array(
        'NAM' => 'Nam',
        'NU' => 'Nữ',
        'KHAC' => 'Khác',
    );
}

function setArrayAll($array, $noidung = 'Tất cả', $giatri = 'ALL')
{
    $a_kq = [$giatri => $noidung];
    foreach ($array as $k => $v) {
        $a_kq[(string)$k] = $v;
    }
    return $a_kq;
}

function getDonVi($sadmin, $chucnang = null, $tenquyen = null)
{
    if (in_array($sadmin, ['SSA', 'ssa', 'ADMIN'])) {
        $m_donvi = dmdonvi::all();
    } else {
        $m_donvi = dmdonvi::where('madv', session('admin')->madv)->get();
    }

    // if ($chucnang != null) {
    //     $a_tk = App\Model\DanhMuc\dstaikhoan::wherein('madonvi', array_column($m_donvi->toarray(), 'madonvi'))->get('tendangnhap');
    //     $a_tk_pq = App\Model\DanhMuc\dstaikhoan_phanquyen::where('machucnang', $chucnang)->where('phanquyen', '1')
    //         ->wherein('tendangnhap', $a_tk)->get('tendangnhap');
    //     $m_donvi = App\Model\View\viewdiabandonvi::wherein('madonvi', function ($qr) use ($a_tk_pq) {
    //         $qr->select('madonvi')->from('dstaikhoan')->wherein('tendangnhap', $a_tk_pq)->distinct();
    //     })->get();
    // }
    return $m_donvi;
}

function getNgayThang($date)
{
    if ($date != null || $date != '')
        $newday = date('d/m/Y', strtotime($date));
    else
        $newday = '';
    return $newday;
}

function getMaXa($mahuyen)
{
    $m_donvi = danhmuchanhchinh::join('dmdonvi', 'dmdonvi.madiaban', 'danhmuchanhchinh.id')
        ->select('dmdonvi.madv', 'danhmuchanhchinh.name', 'dmdonvi.tendv')
        ->where('danhmuchanhchinh.parent', $mahuyen)
        ->get();
    return $m_donvi;
}

function getiDxa($mahuyen)
{
    $id_xa = danhmuchanhchinh::join('dmdonvi', 'dmdonvi.madiaban', 'danhmuchanhchinh.id')
        ->join('users', 'users.madv', 'dmdonvi.madv')
        ->select('users.id', 'danhmuchanhchinh.name', 'dmdonvi.madv', 'danhmuchanhchinh.parent')
        ->where('danhmuchanhchinh.parent', $mahuyen)
        ->get();

    return $id_xa;
}

function getKydieutra($kydieutra)
{
    $a_kydieutra = explode(';', $kydieutra);

    return $a_kydieutra;
}

function getdanhmuc()
{

    $dm = DB::table('danhmuchanhchinh')->where('public', '1')->get();
    return $dm;
}

function getdulieubaocao()
{
    if (session('admin')->capdo == 'T') {
        $m_xa = dmdonvi::join('danhmuchanhchinh', 'danhmuchanhchinh.id', 'dmdonvi.madiaban')
            ->select('danhmuchanhchinh.name', 'dmdonvi.madv')
            ->where('danhmuchanhchinh.capdo', 'X')
            ->get();
    } else if (session('admin')->capdo == 'H') {
        $m_xa = dmdonvi::join('danhmuchanhchinh', 'danhmuchanhchinh.id', 'dmdonvi.madiaban')
            ->select('danhmuchanhchinh.name', 'dmdonvi.madv')
            ->where('danhmuchanhchinh.parent', session('admin')->maquocgia)
            ->get();
    } else {
        $m_xa = dmdonvi::join('danhmuchanhchinh', 'danhmuchanhchinh.id', 'dmdonvi.madiaban')
            ->select('danhmuchanhchinh.name', 'dmdonvi.madv')
            ->where('danhmuchanhchinh.maquocgia', session('admin')->maquocgia)
            ->get();
    }
    // Session::put('m_xa', $m_xa);

    $a_kydieutra = array_column(danhsach::all()->toarray(), 'kydieutra', 'kydieutra');
    // Session::put('a_kydieutra', $a_kydieutra);

    $trinhdoGDPT = dmtrinhdogdpt::all();
    $trinhdocmkt = dmtrinhdokythuat::all();
    $dmuutien = dmdoituonguutien::all();
    $dmtinhtranghdkt = dmtinhtrangthamgiahdkt::all();
    $a_khongthamgia = dmtinhtrangthamgiahdktct::where('manhom', 20221220175728)->get();
    $a_thatnghiep = dmtinhtrangthamgiahdktct::where('manhom', 20221220175720)->get();
    $loaihinh = dmloaihinhhdkt::all();
    $nganhnghe = dmnganhnghe::all();
    // Session::put('trinhdoGDPT', $trinhdoGDPT);
    // Session::put('trinhdocmkt', $trinhdocmkt);
    // Session::put('dmuutien', $dmuutien);
    // Session::put('dmtinhtranghdkt', $dmtinhtranghdkt);
    // Session::put('a_khongthamgia', $a_khongthamgia);
    // Session::put('a_thatnghiep', $a_thatnghiep);
    // Session::put('loaihinh', $loaihinh);

    if (session('admin')->capdo == 'T') {
        $m_huyen = dmdonvi::join('danhmuchanhchinh', 'danhmuchanhchinh.id', 'dmdonvi.madiaban')
            ->select('danhmuchanhchinh.name', 'dmdonvi.madv')
            ->where('danhmuchanhchinh.capdo', 'H')
            ->get();
    } else {
        $m_huyen = dmdonvi::join('danhmuchanhchinh', 'danhmuchanhchinh.id', 'dmdonvi.madiaban')
            ->select('danhmuchanhchinh.name', 'dmdonvi.madv')
            ->where('danhmuchanhchinh.maquocgia', session('admin')->maquocgia)
            ->get();
    }

    if (in_array(session('admin')->sadmin, ['ADMIN', 'SSA'])) {
        $kydieutra = danhsach::max('kydieutra');
    } elseif (session('admin')->capdo == 'H') {
        $madv = array_column(getMaXa(session('admin')->maquocgia)->toarray(), 'madv');
        $kydieutra = danhsach::wherein('user_id', $madv)->max('kydieutra');
    } else {
        $kydieutra = danhsach::where('user_id', 3101104089)->max('kydieutra');
    }

    // Session::put('m_huyen', $m_huyen);

    $arr = array(
        'm_xa' => $m_xa,
        'm_huyen' => $m_huyen,
        'a_kydieutra' => $a_kydieutra,
        'kydieutra' => $kydieutra,
        'trinhdoGDPT' => $trinhdoGDPT,
        'trinhdocmkt' => $trinhdocmkt,
        'dmuutien' => $dmuutien,
        'dmtinhtranghdkt' => $dmtinhtranghdkt,
        'a_khongthamgia' => $a_khongthamgia,
        'a_thatnghiep' => $a_thatnghiep,
        'loaihinh' => $loaihinh,
        'nganhnghe' => $nganhnghe

    );

    return $arr;
}

function ckdulieuloi($id)
{
    $model = nhankhauModel::findOrFail($id);
    $maloi = array();
    //check lỗi loại 1
    if ($model->hoten == '' || $model->ngaysinh == '' || $model->ngaysinh == 0) {
        array_push($maloi, 'LOAI1');
    }

    //check lỗi loại 2

    $a_loi2 = array(
        'nguoicovieclam', 'congvieccuthe', 'thamgiabhxh', 'hdld', 'noilamviec',
        'loaihinhnoilamviec', 'diachinoilamviec', 'thatnghiep', 'thoigianthatnghiep'
    );

    if ($model->tinhtranghdkt == 3) {

        foreach ($a_loi2 as $tentruong) {
            if ($model->$tentruong != '') {
                array_push($maloi, 'LOAI2');
                break;
            }
        }
    }

    //check lỗi loại 3

    $a_loi3 = array(
        'nguoicovieclam', 'congvieccuthe', 'thamgiabhxh', 'hdld', 'noilamviec',
        'loaihinhnoilamviec', 'diachinoilamviec'
    );
    if ($model->tinhtranghdkt == 2) {
        foreach ($a_loi3 as $tentruong) {
            if ($model->$tentruong != '') {
                array_push($maloi, 'LOAI3');
            }
        }
    };

    //check lỗi loại 4
    if ($model->tinhtranghdkt == '') {
        array_push($maloi, 'LOAI4');
    }

    return $maloi;
}

function getHDLD()
{
    return [
        '1' => 'Không xác định thời hạn',
        '2' => 'Xác định thời hạn dưới 12 tháng',
        '3' => 'Xác định thời hạn từ 12 tháng đến 36 tháng'
    ];
}

function getYeucauthem()
{
    return [
        '1' => 'Làm ca',
        '2' => 'Đi công tác',
        '3' => 'Đi biết phái'
    ];
}

function getNoilamviec()
{
    return [
        '1' => 'Trong nhà',
        '2' => 'Ngoài trời',
        '3' => 'Hỗn hợp'
    ];
}

function getDklamviec()
{
    return [
        // 'noilamviec'=> [
        //     '1'=>'Trong nhà',
        //     '2'=>'Ngoài trời',
        //     '3'=>'Hỗn hợp'
        // ],
        'trongluongnang' => [
            '1' => 'Dưới 5kg',
            '2' => '5 - 20 kg',
            '3' => 'Trên 20kg'
        ],
        'dungvadilai' => [
            '1' => 'Hầu như không có',
            '2' => 'Mức trung bình',
            '3' => 'Cần đứng/đi lại nhiều'
        ],
        'nghenoi' => [
            '1' => 'Không cần thiết',
            '2' => 'Nghe nói cơ bản',
            '3' => 'Quan trọng'
        ],
        'thiluc' => [
            '1' => 'Mức bình thường',
            '2' => 'Nhìn được vật/chi tiết nhỏ'
        ],
        'thaotactay' => [
            '1' => 'Lắp ráp đồ vật lớn',
            '2' => 'Lắp ráp đồ vật nhỏ',
            '3' => 'Lắp ráp đồ vật rất nhỏ'
        ],
        'dungtay' => [
            '1' => 'Cần 2 tay',
            '2' => 'Đôi khi cần 2 tay',
            '3' => 'Chỉ cần 1 tay',
            '4' => 'Trái',
            '5' => 'Phải'
        ]
    ];
}
function DKLV()
{
    return [
        'trongluongnang' => 'Trọng lượng nâng',
        'dungvadilai' => 'Đứng hoặc là đi lại',
        'nghenoi' => 'Nghe nói',
        'thiluc' => 'Thị lực',
        'thaotactay' => 'Thao tác bằng tay',
        'dungtay' => 'Dùng 2 tay'
    ];
}

function uutien()
{
    return [
        '1' => 'Người khuyết tật',
        '2' => 'Bộ đội xuất ngủ',
        '3' => 'Người thuộc hộ nghèo, cận nghèo',
        '4' => 'Người dân tộc thiểu số'
    ];
}

function getchucvu()
{
    return [
        '1' => 'Nhân viên',
        '2' => 'Quản lý',
        '3' => 'Lãnh đạo'
    ];
}

function getkynangmem()
{
    return [
        'Giao tiếp', 'Thuyết trình', 'Quản lý thời gian', 'Quản lý nhân sự', 'Tổng hợp báo cáo', 'Thích ứng', 'Làm việc nhóm', 'Làm việc độc lập', 'Chịu được áp lực công việc', 'Theo dõi giám sát', 'Tư duy phản biện', 'Kỹ năng mềm khác :'
    ];
}

function NganhDKthi()
{
    return [
        'SXCT' => 'SXCT',
        'XD' => 'Xây dựng',
        'NgN' => 'Ngư nghiệp',
        'NN' => 'Nông nghiệp',
        'KHAC' => 'Mục khác'
    ];
}

function NgheDK()
{
    return [
        'SXCT' => [
            'DODAC' => 'Đo đạc',
            'NOI' => 'Nối',
            'LAPRAP' => 'Lắp ráp'
        ],
        'XD' => [
            'MOC' => 'Mộc',
            'THEP' => 'Thép'
        ],
        'NgN' => [
            'NTHAISAN' => 'Nuôi trồng hải sản',
            'DBGANBO' => 'Đánh bắt gần bờ'
        ],
        'NN' => [
            'TRONGTROT' => 'Trồng trọt',
            'CHANNUOI' => 'Chăn nuôi'
        ]
    ];
}
function Nghe()
{
    return [
        'DODAC' => 'Đo đạc (SXCT)',
        'NOI' => 'Nối (SXCT)',
        'LAPRAP' => 'Lắp ráp (SXCT)',
        'MOC' => 'Mộc (XD)',
        'THEP' => 'Thép  (XD)',
        'NTHAISAN' => 'Nuôi trồng hải sản (Ngư nghiệp)',
        'DBGANBO' => 'Đánh bắt gần bờ (Ngư nghiệp)',
        'TRONGTROT' => 'Trồng trọt (Nông nghiệp)',
        'CHANNUOI' => 'Chăn nuôi (Nông nghiệp)'

    ];
}
function phanloai()
{
    return [
        '0' => 'Chưa từng đi làm việc tại Hàn Quốc',
        '1' => 'Tự nguyện về nước',
        '2' => 'Về nước đúng hạn'
    ];
}
function doituong()
{
    return [
        '0' => 'Không thuộc các đối tượng trên',
        '1' => 'Huyện nghèo',
        '2' => 'Xã bãi ngang, ven biển hải đảo',
        '3' => 'Hộ nghèo',
        '4' => 'Dân tộc thiểu số'
    ];
}

function capnhatdulieu($madv)
{
    $a_kydieutra = array(
        date('Y'), (date('Y') - 1)
    );
    // dd($a_kydieutra);
    $model = tonghopcunglaodong::where('madv',$madv)->wherein('kydieutra', $a_kydieutra)->get();
    foreach ($model as $ct) {
      
        $laodong = nhankhauModel::select('kydieutra', 'vieclammongmuon', 'nganhnghemuonhoc', 'tinhtranghdkt', 'gioitinh')->where('madv',$madv)->where('kydieutra', $ct->kydieutra)->where('loaibiendong', '<>', '2')->get(); 
            //Tổng hợp lại danh sách của từng đơn vị
            $ct->ldtren15 = count($laodong);
            $ct->trongnuoc = count($laodong->wherein('vieclammongmuon', ['1', '3']));
            $ct->nuocngoai = count($laodong->wherein('vieclammongmuon', ['2', '3']));
            $ct->hocnghe = count($laodong->wherenotnull('nganhnghemuonhoc'));
            $ct->ldcovieclam = count($laodong->where('tinhtranghdkt', '1'));
            $ct->ldthatnghiep = count($laodong->where('tinhtranghdkt', '2'));
            $ct->ldkhongthamgia = count($laodong->where('tinhtranghdkt', '3'));
            $ct->nam = count($laodong->wherein('gioitinh', ['Nam', 'nam']));
            $ct->nu = count($laodong->wherenotin('gioitinh', ['Nam', 'nam']));
            $ct->save();
        
    }
}
