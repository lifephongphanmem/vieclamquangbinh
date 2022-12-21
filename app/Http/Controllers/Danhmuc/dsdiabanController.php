<?php

namespace App\Http\Controllers\Danhmuc;

use App\Http\Controllers\Controller;
use App\Models\Danhmuc\dsdiaban;
use Illuminate\Http\Request;

class dsdiabanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model=dsdiaban::all();

        return view('danhmuc.dsdiaban.index')
                ->with('model',$model);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->all();
        $model = dsdiaban::where('madiaban', $inputs['madiaban'])->first();
        if(!isset($model)){
            $inputs['madiaban']=getdate()[0];
            dsdiaban::create($inputs);
        }else {
            $model->tendiaban = $inputs['tendiaban'];
            $model->capdo = $inputs['capdo'];
            $model->madonviQL = $inputs['madonviQL'];
            $model->madiabanQL = $inputs['madiabanQL'] ?? null;
            $model->save();
        }


        return redirect('/danh_muc/dsdiaban/danhsach')
                ->with('success','Thêm mới thành công');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model=dsdiaban::findOrFail($id);
        $model->delete();

        return redirect('/danh_muc/dsdiaban/danhsach')
                    ->with('success','Xóa thành công');
    }
}
