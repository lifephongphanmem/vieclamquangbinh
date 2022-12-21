<?php

namespace App\Http\Controllers\Danhmuc;

use App\Models\Danhmuc\dmchucvu;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class dmchucvuController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(function ($request, $next) {
    //         if (!Session::has('admin')) {
    //             return redirect('/');
    //         };
    //         return $next($request);
    //     });
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if (!chkPhanQuyen('chucvu', 'danhsach')) {
        //     return view('errors.noperm')->with('machucnang', 'chucvu');
        // }
        $model=dmchucvu::all();
        return view('danhmuc.dmchucvu.index')
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
        if (!chkPhanQuyen('chucvu', 'thaydoi')) {
            return view('errors.noperm')->with('machucnang', 'chucvu');
        }
        $inputs=$request->all();
        dmchucvu::create($inputs);
        return redirect('/danh_muc/dm_chuc_vu')
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
        if (!chkPhanQuyen('chucvu', 'thaydoi')) {
            return view('errors.noperm')->with('machucnang', 'chucvu');
        }
        $inputs=$request->all();
        $model=dmchucvu::findOrFail($id);
        $model->update($inputs);
        return redirect('/danh_muc/dm_chuc_vu')
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
        if (!chkPhanQuyen('chucvu', 'thaydoi')) {
            return view('errors.noperm')->with('machucnang', 'chucvu');
        }
        $model=dmchucvu::findOrFail($id);
        $model->delete();
        return redirect('/danh_muc/dm_chuc_vu')
                ->with('success','Xóa thành công');
    }
}
