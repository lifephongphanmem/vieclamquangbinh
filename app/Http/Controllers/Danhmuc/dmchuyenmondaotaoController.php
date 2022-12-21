<?php

namespace App\Http\Controllers\Danhmuc;

use App\Models\Danhmuc\dmchuyenmondaotao;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class dmchuyenmondaotaoController extends Controller
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!chkPhanQuyen('chuyenmondaotao', 'danhsach')) {
            return view('errors.noperm')->with('machucnang', 'chuyenmondaotao');
        }
        $model=dmchuyenmondaotao::all();
        return view('danhmuc.dmchuyenmondaotao.index')
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
        if (!chkPhanQuyen('chuyenmondaotao', 'thaydoi')) {
            return view('errors.noperm')->with('machucnang', 'chuyenmondaotao');
        }
        $inputs=$request->all();
        dmchuyenmondaotao::create($inputs);
        return redirect('/dm_chuyen_mon_dao_tao')
                ->with('success','Thêm mới thành công');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!chkPhanQuyen('chuyenmondaotao', 'thaydoi')) {
            return view('errors.noperm')->with('machucnang', 'chuyenmondaotao');
        }
        $inputs=$request->all();
        $model=dmchuyenmondaotao::findOrFail($id);
        $model->update($inputs);
        return redirect('/dm_chuyen_mon_dao_tao')
                ->with('success','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!chkPhanQuyen('chuyenmondaotao', 'thaydoi')) {
            return view('errors.noperm')->with('machucnang', 'chuyenmondaotao');
        }
        $model=dmchuyenmondaotao::findOrFail($id);
        $model->delete();
        return redirect('/dm_chuyen_mon_dao_tao')
                ->with('success','Xóa thành công');
    }
}
