<?php

namespace App\Http\Controllers\Tracuu;

use App\Http\Controllers\Controller;
use App\Models\Nguoilaodong\nguoilaodong;
use Illuminate\Http\Request;

class tracuulaodongnuocngoaiController extends Controller
{
    public function ThongTin()
    {
        return view('tracuu.nguoinuocngoai.index');
    }

    public function KetQua(Request $request)
    {
        $inputs=$request->all();

        $model=nguoilaodong::wherenotin('nation', ['VN', 'Việt Nam','Viet Nam']);

        if($inputs['hoten'] != null)
        {
            $model=$model->where('hoten','Like', '%' . $inputs['hoten'] . '%');
        }

        if($inputs['cmnd'] != null)
        {
            $model=$model->where('cmnd','Like', '%' . $inputs['cmnd'] . '%');
        }

        if($inputs['gioitinh'] != 'ALL')
        {
            $model=$model->where('gioitinh', $inputs['gioitinh']);
        }

        if($inputs['nation'] != 'ALL')
        {
            $model=$model->where('nation', $inputs['nation']);
        }

        $model=$model->get();



        return view('tracuu.nguoinuocngoai.ketqua')
                ->with('model',$model)
                ->with('inputs',$inputs);

    }

    public function InKetQua(Request $request)
    {
        $inputs=$request->all();

        $model=nguoilaodong::wherenotin('nation', ['VN', 'Việt Nam','Viet Nam']);

        if($inputs['hoten'] != null)
        {
            $model=$model->where('hoten','Like', '%' . $inputs['hoten'] . '%');
        }

        if($inputs['cmnd'] != null)
        {
            $model=$model->where('cmnd','Like', '%' . $inputs['cmnd'] . '%');
        }

        if($inputs['gioitinh'] != 'ALL')
        {
            $model=$model->where('gioitinh', $inputs['gioitinh']);
        }

        if($inputs['nation'] != 'ALL')
        {
            $model=$model->where('nation', $inputs['nation']);
        }

        $model=$model->get();



        return view('tracuu.nguoinuocngoai.inketqua')
                ->with('model',$model)
                ->with('pageTitle','Thông tin tìm kiếm lao động nước ngoài');
    }
}
