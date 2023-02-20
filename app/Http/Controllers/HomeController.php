<?php

namespace App\Http\Controllers;

use App\Models\Danhmuc\danhmuchanhchinh;
use App\Models\Danhmuc\dmdonvi;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function listusser(Request $request)
    {
        $inputs = $request->all();
        $model_diaban = array_column(danhmuchanhchinh::wherein('capdo', ['T', 'H'])->get()->toarray(),'name','maquocgia');
        $a_diaban = array('ALL' => '--Chọn địa bàn, khu vực--');
        foreach ($model_diaban as $key => $val) {
            $a_diaban[$key] = $val;
        }
        // $model_dv=dmdonvi::join('danhmuchanhchinh','danhmuchanhchinh.id','dmdonvi.madiaban')
        //                 ->where('danhmuchanhchinh.maquocgia',$inputs['mahuyen'])
        //                 ->orwhere('danhmuchanhchinh.parent',$inputs['mahuyen'])                        
        //                 ->get();
                        $model_dv=dmdonvi::join('danhmuchanhchinh','danhmuchanhchinh.id','dmdonvi.madiaban')
                        ->where(function($q) use ($inputs){
                            if($inputs['mahuyen']==44){
                                $q->where('danhmuchanhchinh.maquocgia',$inputs['mahuyen']);
                            }else{
                                $q->where('danhmuchanhchinh.maquocgia',$inputs['mahuyen'])
                                                ->orwhere('danhmuchanhchinh.parent',$inputs['mahuyen']);
                            }
                        })                        
                        ->get();
                        $model=User::wherein('madv',array_column($model_dv->toarray(),'madv'))->get();
                        $a_donvi = $model_dv->keyby('madv')->toarray();
                        $a_pl=['X'=>'Tài khoản cấp xã','H'=>'Tài khoản cấp huyện','T'=>'Tài khoản cấp tỉnh'];
                        foreach($model as $val){
                            $donvi = $a_donvi[$val->madv];
                            $val->tendv = $donvi['tendv'];
                            $val->phanloaitaikhoan = $a_pl[$donvi['capdo']];
                            $val->status = $val->status == '1' ? 'Kích hoạt' : 'Vô hiệu hóa';
                        }
                        // dd($model);
        return view('HeThong.manage.taikhoan.list_user')
                    ->with('a_diaban',$a_diaban)
                    ->with('inputs',$inputs)
                    ->with('model',$model)
                    ->with('pageTitle','Danh sách tài khoản');

    }
}
