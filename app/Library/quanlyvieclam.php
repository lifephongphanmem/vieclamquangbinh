<?php

use App\Models\Danhmuc\danhmuchanhchinh;
use App\Models\Danhmuc\dmdoituonguutien;
use App\Models\Danhmuc\dmdonvi;
use App\Models\Danhmuc\dmloaihinhhdkt;
use App\Models\Danhmuc\dmtinhtrangthamgiahdkt;
use App\Models\Danhmuc\dmtinhtrangthamgiahdktct;
use App\Models\Danhmuc\dmtrinhdogdpt;
use App\Models\Danhmuc\dmtrinhdokythuat;
use App\Models\danhsach;

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
    if (in_array($sadmin, ['SSA', 'ssa','ADMIN'])) {
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
    $m_donvi=danhmuchanhchinh::join('dmdonvi','dmdonvi.madiaban','danhmuchanhchinh.id')
                                ->select('dmdonvi.madv','danhmuchanhchinh.name','dmdonvi.tendv')
                                ->where('danhmuchanhchinh.parent',$mahuyen)
                                ->get();
    return $m_donvi;
}

function getiDxa($mahuyen){
    $id_xa=danhmuchanhchinh::join('dmdonvi','dmdonvi.madiaban','danhmuchanhchinh.id')
                                    ->join('users','users.madv','dmdonvi.madv')
                                    ->select('users.id','danhmuchanhchinh.name','dmdonvi.madv','danhmuchanhchinh.parent')
                                    ->where('danhmuchanhchinh.parent',$mahuyen)
                                    ->get();

                                    return $id_xa;
}

function getKydieutra($kydieutra){
    $a_kydieutra=explode(';',$kydieutra);

    return $a_kydieutra;
}

function getdanhmuc()
{

    $dm = DB::table('danhmuchanhchinh')->where('public', '1')->get();
    return $dm;
}

function getdulieubaocao(){
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

    $arr=array(
        'm_xa'=>$m_xa,
        'm_huyen'=>$m_huyen,
        'a_kydieutra'=>$a_kydieutra,
        'kydieutra'=>$kydieutra,
        'trinhdoGDPT'=>$trinhdoGDPT,
        'trinhdocmkt'=>$trinhdocmkt,
        'dmuutien'=>$dmuutien,
        'dmtinhtranghdkt'=>$dmtinhtranghdkt,
        'a_khongthamgia'=>$a_khongthamgia,
        'a_thatnghiep'=>$a_thatnghiep,
        'loaihinh'=>$loaihinh
        
    );

    return $arr;
}

