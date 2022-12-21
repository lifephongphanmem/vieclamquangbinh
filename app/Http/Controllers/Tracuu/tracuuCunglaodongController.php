<?php

namespace App\Http\Controllers\Tracuu;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Cunglaodong\tonghopdanhsachcungld_ct;
use App\Models\Danhmuc\danhmuchanhchinh;
use App\Models\Danhmuc\dmtinhtrangthamgiahdkt;
use App\Models\Danhmuc\dmtrinhdogdpt;
use Illuminate\Http\Request;

class tracuuCunglaodongController extends Controller
{
    public function ThongTin()
    {
        $diaban = danhmuchanhchinh::all();
        $a_xa = $diaban->wherein('level', ['Phường', 'Xã', 'Thị trấn']);
        $a_huyen = $diaban->wherein('level', ['Thành phố', 'Huyện', 'Thị xã']);
        $doanhnghiep = array_column(Company::all()->toarray(), 'name', 'madv');
        return view('tracuu.cunglaodong.index')
            ->with('a_xa', array_column($a_xa->toarray(), 'name', 'id'))
            ->with('a_huyen', array_column($a_huyen->toarray(), 'name', 'id'))
            ->with('doanhnghiep', $doanhnghiep);
    }
    public function KetQua(Request $request)
    {
        $inputs = $request->all();

        $model = tonghopdanhsachcungld_ct::join('dmdonvi', 'dmdonvi.madv', 'tonghopdanhsachcungld_ct.madb')
            ->join('danhmuchanhchinh', 'danhmuchanhchinh.id', 'dmdonvi.madiaban')
            ->select('tonghopdanhsachcungld_ct.*', 'danhmuchanhchinh.name','danhmuchanhchinh.level','danhmuchanhchinh.id AS diaban');
        if ($inputs['xa'] != 'ALL') {
            $model = $model->where('danhmuchanhchinh.id',$inputs['xa']);
        }
        if ($inputs['huyen'] != 'ALL') {
            $dmhanhchinh_huyen=danhmuchanhchinh::where('id',$inputs['huyen'])->first();
            $a_xa=array_column(danhmuchanhchinh::where('parent',$dmhanhchinh_huyen->maquocgia)->get()->toarray(),'id');
            $model = $model->wherein('danhmuchanhchinh.id',$a_xa);
        }
        if($inputs['hoten'] != null)
        {
            $model=$model->where('hoten','Like','%'.$inputs['hoten'].'%');
        }
        if($inputs['cmnd'] != null)
        {
            $model=$model->where('cmnd','Like','%'.$inputs['cmnd'].'%');
        }
        if($inputs['nam'] != 'ALL')
        {
            $model=$model->where('nam',$inputs['nam']);
        }
        if($inputs['gioitinh'] != 'ALL')
        {
            $model=$model->where('gioitinh',$inputs['gioitinh']);
        }
        $model=$model->get();
        $a_diaban=danhmuchanhchinh::all();
        foreach($model as $ct)
        {
            $xa=$a_diaban->where('id',$ct->diaban)->first();
            if(isset($xa)){
                $huyen=$a_diaban->where('maquocgia',$xa->parent)->first();
                $ct->huyen=$huyen->name;
            }else{
                $ct->huyen='';
            }
           
        }
        $a_trinhdovanhoa=array_column(dmtrinhdogdpt::all()->toarray(),'tengdpt','madmgdpt');
        $a_tinhtrangvl=array_column(dmtinhtrangthamgiahdkt::all()->toarray(),'tentgkt','madmtgkt');
        return view('tracuu.cunglaodong.ketqua')
                    ->with('model',$model)
                    ->with('a_diaban',$a_diaban)
                    ->with('a_trinhdovanhoa',$a_trinhdovanhoa)
                    ->with('a_tinhtrangvl',$a_tinhtrangvl)
                    ->with('inputs',$inputs);
    }

    public function InKetQua(Request $request)
    {
        $inputs = $request->all();

        $model = tonghopdanhsachcungld_ct::join('dmdonvi', 'dmdonvi.madv', 'tonghopdanhsachcungld_ct.madb')
            ->join('danhmuchanhchinh', 'danhmuchanhchinh.id', 'dmdonvi.madiaban')
            ->select('tonghopdanhsachcungld_ct.*', 'danhmuchanhchinh.name','danhmuchanhchinh.level','danhmuchanhchinh.id AS diaban');
        if ($inputs['xa'] != 'ALL') {
            $model = $model->where('danhmuchanhchinh.id',$inputs['xa']);
        }
        if ($inputs['huyen'] != 'ALL') {
            $dmhanhchinh_huyen=danhmuchanhchinh::where('id',$inputs['huyen'])->first();
            $a_xa=array_column(danhmuchanhchinh::where('parent',$dmhanhchinh_huyen->maquocgia)->get()->toarray(),'id');
            $model = $model->wherein('danhmuchanhchinh.id',$a_xa);
        }
        if($inputs['hoten'] != null)
        {
            $model=$model->where('hoten','Like','%'.$inputs['hoten'].'%');
        }
        if($inputs['cmnd'] != null)
        {
            $model=$model->where('cmnd','Like','%'.$inputs['cmnd'].'%');
        }
        if($inputs['nam'] != 'ALL')
        {
            $model=$model->where('nam',$inputs['nam']);
        }
        $model=$model->get();
        $a_diaban=danhmuchanhchinh::all();
        foreach($model as $ct)
        {
            $xa=$a_diaban->where('id',$ct->diaban)->first();
            if(isset($xa)){
                $huyen=$a_diaban->where('maquocgia',$xa->parent)->first();
                $ct->huyen=$huyen->name;
            }else{
                $ct->huyen='';
            }
           
        }
        $a_trinhdovanhoa=array_column(dmtrinhdogdpt::all()->toarray(),'tengdpt','madmgdpt');
        $a_tinhtrangvl=array_column(dmtinhtrangthamgiahdkt::all()->toarray(),'tentgkt','madmtgkt');
        return view('tracuu.cunglaodong.inketqua')
                    ->with('model',$model)
                    ->with('a_diaban',$a_diaban)
                    ->with('a_trinhdovanhoa',$a_trinhdovanhoa)
                    ->with('a_tinhtrangvl',$a_tinhtrangvl)
                    ->with('pageTitle','Thông tin kết quả tìm kiếm');
    }
}
