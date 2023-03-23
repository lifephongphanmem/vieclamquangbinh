<?php

namespace App\Http\Controllers;

use App\Models\vanphonghotro;
use Illuminate\Http\Request;

class vanphonghotroController extends Controller
{
    public function thongtinhotro(){
        $model_vp = vanphonghotro::orderBy('sapxep')->get();
        $a_vp = a_unique(array_column($model_vp->toArray(),'vanphong'));
        return view('HeThong.dashboard')
            ->with('model_vp',$model_vp)
            ->with('a_vp',$a_vp)
            ->with('pageTitle', 'Thông tin hỗ trợ');
    }

    public function index(){
            $model = vanphonghotro::all();
            $a_vp = array_column($model->toArray(),'vanphong','vanphong');
            $col =(int) 12 / (count($a_vp)>0?count($a_vp) : 1);
            $col = $col < 4 ? 4 : $col;
            return view('system.vanphonghotro.index')
                ->with('model', $model)
                ->with('a_vp', $a_vp)
                ->with('col', $col)
                ->with('pageTitle', 'Danh sách cán bộ hỗ trợ');
    }

    public function store(Request $request){
            $inputs = $request->all();
            $check = vanphonghotro::where('maso',$inputs['maso'])->first();

            if ($check == null) {
                $inputs['maso'] = getdate()[0];
                vanphonghotro::create($inputs);
            } else {
                $check->update($inputs);
            }
            return redirect('/van_phong/danh_sach');
    }

    public function edit(Request $request)
    {

        // if (!Session::has('admin')) {
        //     $result = array(
        //         'status' => 'fail',
        //         'message' => 'permission denied',
        //     );
        //     die(json_encode($result));
        // }

        $inputs = $request->all();
        $model = vanphonghotro::where('maso', $inputs['maso'])->first();
        die($model);
    }

    public function destroy(Request $request){
            $inputs = $request->all();
            vanphonghotro::where('maso', $inputs['maso'])->first()->delete();
            return redirect('/van_phong/danh_sach');
    }
}
