<?php

namespace App\Http\Controllers\Tracuu;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class tracuuController extends Controller
{
    public function cunglaodong()
    {
        return view('tracuu.cunglaodong.index');
    }


    public function tinhhinhsudunglaodong()
    {
        $doanhnghiep=array_column(Company::all()->toarray(),'name','madv');
        $loaibaocao=array(
            '0'=>'Báo cáo tình hình sử dụng lao động định kỳ 6 tháng',
            '1'=>'Báo cáo tình hình sử dụng lao động hằng năm'
        );
        return view('tracuu.tinhhinhsudunglaodong.index')
                    ->with('doanhnghiep',$doanhnghiep)
                    ->with('loaibaocao',$loaibaocao);
    }
}
