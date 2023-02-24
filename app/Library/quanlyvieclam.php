<?php

use App\Models\Danhmuc\danhmuchanhchinh;
use App\Models\Danhmuc\dmdonvi;

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