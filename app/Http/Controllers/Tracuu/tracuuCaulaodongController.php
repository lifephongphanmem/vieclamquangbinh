<?php

namespace App\Http\Controllers\Tracuu;

use App\Http\Controllers\Controller;
use App\Models\Caulaodong\nhucautuyendung;
use App\Models\Company;
use App\Models\Danhmuc\dmmanghetrinhdo;
use App\Models\Danhmuc\dmtrinhdogdpt;
use Illuminate\Http\Request;

class tracuuCaulaodongController extends Controller
{
    public function ThongTin()
    {
        $a_doanhnghiep = array_column(Company::all()->toarray(), 'name', 'madv');
        return view('tracuu.caulaodong.index')
            ->with('a_doanhnghiep', $a_doanhnghiep);
    }

    public function KetQua(Request $request)
    {
        $inputs = $request->all();
        $model = nhucautuyendung::join('nhucautuyendungct', 'nhucautuyendungct.mahs', 'nhucautuyendung.mahs')
            ->select('nhucautuyendungct.*', 'nhucautuyendung.madn');
        if ($inputs['nam'] != 'ALL') {
            $model = $model->where('nhucautuyendungct.nam',$inputs['nam']);
        }

        if ($inputs['madv'] != 'ALL' && $inputs['madv'] != null) {
            $model = $model->where('madn', $inputs['madv']);
        }
        $model=$model->get();
        $a_doanhnghiep=array_column(Company::all()->toarray(),'name','madv');
        $a_congviec=array_column(dmmanghetrinhdo::all()->toarray(),'tenmntd','madmmntd');
        $a_trinhdovanhoa=array_column(dmtrinhdogdpt::all()->toarray(),'tengdpt','madmgdpt');
        return view('tracuu.caulaodong.ketqua')
                    ->with('model',$model)
                    ->with('a_doanhnghiep',$a_doanhnghiep)
                    ->with('a_congviec',$a_congviec)
                    ->with('a_trinhdovanhoa',$a_trinhdovanhoa)
                    ->with('inputs',$inputs);
    }

    public function InKetQua(Request $request)
    {
        $inputs = $request->all();
        $model = nhucautuyendung::join('nhucautuyendungct', 'nhucautuyendungct.mahs', 'nhucautuyendung.mahs')
            ->select('nhucautuyendungct.*', 'nhucautuyendung.madn');
        if ($inputs['nam'] != 'ALL') {
            $model = $model->where('nhucautuyendung.nam',$inputs['nam']);
        }

        if ($inputs['madv'] != 'ALL' && $inputs['madv'] != null) {
            $model = $model->where('madn', $inputs['madv']);
        }
        $model=$model->get();
        $a_doanhnghiep=array_column(Company::all()->toarray(),'name','madv');
        $a_congviec=array_column(dmmanghetrinhdo::all()->toarray(),'tenmntd','madmmntd');
        $a_trinhdovanhoa=array_column(dmtrinhdogdpt::all()->toarray(),'tengdpt','madmgdpt');
        return view('tracuu.caulaodong.inketqua')
                    ->with('model',$model)
                    ->with('a_doanhnghiep',$a_doanhnghiep)
                    ->with('a_congviec',$a_congviec)
                    ->with('a_trinhdovanhoa',$a_trinhdovanhoa)
                    ->with('pageTitle','Thông tin tìm kiếm');
    }
}
