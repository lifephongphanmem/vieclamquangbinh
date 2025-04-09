<?php

namespace App\Http\Controllers\Danhmuc;

use App\Http\Controllers\Controller;
use App\Models\Danhmuc\Params;
use App\Models\Danhmuc\ParamsType;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class ParamsController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!Session::has('admin')) {
                return redirect('/');
            };
            return $next($request);
        });
    }
    public function ThongTin(Request $request)
    {
        $inputs=$request->all();
        $model=ParamsType::all();

        return view('danhmuc.param.ThongTin',compact('model','inputs'))
        ->with('baocao', getdulieubaocao());
    }

    public function Luu(Request $request)
    { 
        $inputs=$request->all();
        $model=ParamsType::findOrFail($inputs['id']);
        if(!$model){
            ParamsType::create($inputs);
        }else{
            $model->update($inputs);
        }
    }

    public function Xoa($id)
    {
        $model=ParamsType::findOrFail($id);
        if($model){
            Params::where('type',$model->id)->delete();
            $model->delete();
        }
        return redirect('/ParamType/ThongTin');
    }

    public function Params(Request $request)
    {
        $inputs=$request->all();
        $model=Params::where('type',$inputs['type'])->get();
        $paramtype=ParamsType::findOrFail($inputs['type']);

        return view('danhmuc.param.Params',compact('model','paramtype','inputs'))
        ->with('baocao', getdulieubaocao());
    }

    public function LuuParam(Request $request)
    {
        $inputs=$request->all();
        if($inputs['id'] == null){
            Params::create($inputs);
        }else{
            $model=Params::findOrFail($inputs['id']);
            $model->update($inputs);
        }

        return redirect('/ParamType/Params?type='.$inputs['type']);
    }
    public function XoaParam($id)
    {
        $model=Params::findOrFail($id);
        if($model)
        {
            $model->delete();
        }

        return redirect('/ParamType/Params?type='.$model->type);
    }
}
