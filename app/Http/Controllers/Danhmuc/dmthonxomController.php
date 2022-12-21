<?php

namespace App\Http\Controllers\Danhmuc;

use App\Http\Controllers\Controller;
use App\Models\Danhmuc\danhmuchanhchinh;
use Illuminate\Http\Request;

class dmthonxomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model=danhmuchanhchinh::where('capdo','Th')->get();
        $a_xa=array_column(danhmuchanhchinh::where('capdo','X')->get()->toarray(),'name','maquocgia');
        // $a_xa=array_column(danhmuchanhchinh::where('capdo','X')->get()->toarray(),'name','maquocgia');
// dd($a_xa);
        return view('danhmuc.dmthonxom.index')
                ->with('model',$model)
                ->with('a_xa',$a_xa);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs=$request->all();
        if(!isset($inputs['madv'])){
            $inputs['maquocgia']=getdate()[0];
            $inputs['parent']=$inputs['xa'];
            $inputs['capdo']='Th';
    
            danhmuchanhchinh::create($inputs);
        }else{
            $model=danhmuchanhchinh::where('maquocgia',$inputs['madv'])->first();
            $model->update($inputs);
        }


        return redirect('/dmthonxom/danhsach')
                ->with('success','Thêm thành công');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model=danhmuchanhchinh::findOrFail($id);
        $model->delete();

        return redirect('/dmthonxom/danhsach')
                    ->with('success','Xóa thành công');
    }
}
