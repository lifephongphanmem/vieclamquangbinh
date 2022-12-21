<?php

namespace App\Http\Controllers\Tracuu;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Danhmuc\dmchucvu;
use App\Models\Tinhhinhsudunglaodong\tinhhinhsudunglaodong_ct;
use Illuminate\Http\Request;

class tracuutinhhinhsudunglaodongController extends Controller
{
    public function ThongTin()
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

    public function KetQua(Request $request)
    {
        $inputs=$request->all();

        $model=tinhhinhsudunglaodong_ct::orderBy('id');

        if($inputs['hoten'] != null)
        {
            $model=$model->where('hoten','Like', '%' . $inputs['hoten'] . '%');
        }

        if($inputs['cmnd'] != null)
        {
            $model=$model->where('cmnd','Like', '%' . $inputs['cmnd'] . '%');
        }

        if($inputs['madv'] != 'ALL' && $inputs['madv'] != null)
        {
            $model=$model->where('madv', $inputs['madv']);
        }

        if($inputs['gioitinh'] != 'ALL')
        {
            $model=$model->where('gioitinh', $inputs['gioitinh']);
        }

        if($inputs['nam'] != 'ALL')
        {
            $model=$model->where('nam', $inputs['nam']);
        }

        if($inputs['tieude'] != 'ALL')
        {
            $model=$model->where('tieude', $inputs['tieude']);
        }
        $model=$model->get();

        $a_chucvu=array_column(dmchucvu::all()->toarray(),'tencv','id');
        $a_doanhnghiep=array_column(Company::all()->toarray(),'name','madv');
        $a_vitrivl=array_column(getParamsByNametype('Nghề nghiệp người lao động')->toarray(),'name','id');

        return view('tracuu.tinhhinhsudunglaodong.ketqua')
                ->with('model',$model)
                ->with('inputs',$inputs)
                ->with('a_chucvu',$a_chucvu)
                ->with('a_vitrivl',$a_vitrivl)
                ->with('a_doanhnghiep',$a_doanhnghiep);

    }

    public function InKetQua(Request $request)
    {
        $inputs=$request->all();

        $model=tinhhinhsudunglaodong_ct::orderBy('id');

        if($inputs['hoten'] != null)
        {
            $model=$model->where('hoten','Like', '%' . $inputs['hoten'] . '%');
        }

        if($inputs['cmnd'] != null)
        {
            $model=$model->where('cmnd','Like', '%' . $inputs['cmnd'] . '%');
        }

        if($inputs['madv'] != 'ALL' && $inputs['madv'] != null)
        {
            $model=$model->where('madv', $inputs['madv']);
        }

        if($inputs['gioitinh'] != 'ALL')
        {
            $model=$model->where('gioitinh', $inputs['gioitinh']);
        }

        if($inputs['nam'] != 'ALL')
        {
            $model=$model->where('nam', $inputs['nam']);
        }

        if($inputs['tieude'] != 'ALL')
        {
            $model=$model->where('tieude', $inputs['tieude']);
        }
        $model=$model->get();

        $a_chucvu=array_column(dmchucvu::all()->toarray(),'tencv','id');
        $a_doanhnghiep=array_column(Company::all()->toarray(),'name','madv');
        $a_vitrivl=array_column(getParamsByNametype('Nghề nghiệp người lao động')->toarray(),'name','id');

        return view('tracuu.tinhhinhsudunglaodong.inketqua')
                ->with('model',$model)
                ->with('inputs',$inputs)
                ->with('a_chucvu',$a_chucvu)
                ->with('a_vitrivl',$a_vitrivl)
                ->with('a_doanhnghiep',$a_doanhnghiep)
                ->with('pageTitle','Danh sách kết quả tìm kiếm');

    }



     function TimKiem($model,$inputs)

    {
        
        if($inputs['hoten'] != null)
        {
            $model=$model->where('hoten','Like', '%' . $inputs['hoten'] . '%');
        }
        
        if($inputs['cmnd'] != null)
        {
            $model=$model->where('cmnd','Like', '%' . $inputs['cmnd'] . '%');
        }
       
        if($inputs['madv'] != 'ALL' && $inputs['madv'] != null)
        {
            $model=$model->where('madv', $inputs['madv']);
        }

        if($inputs['gioitinh'] != 'ALL')
        {
            $model=$model->where('gioitinh', $inputs['gioitinh']);
        }

        if($inputs['nam'] != 'ALL')
        {
            $model=$model->where('nam', $inputs['nam']);
        }
        if($inputs['tieude'] != 'ALL')
        {
            $model=$model->where('tieude', $inputs['tieude']);
        }

        $model=$model->get();

    }
}
