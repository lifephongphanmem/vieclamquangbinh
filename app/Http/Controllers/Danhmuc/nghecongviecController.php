<?php

namespace App\Http\Controllers\Danhmuc;

use App\Models\Danhmuc\nghecongviec;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class nghecongviecController extends Controller
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
        if (!chkPhanQuyen('nghecongviec', 'danhsach')) {
            return view('errors.noperm')->with('machucnang', 'nghecongviec');
        }
        $model=nghecongviec::all();
        return view('danhmuc.nghecongviec.index')
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
        if (!chkPhanQuyen('nghecongviec', 'thaydoi')) {
            return view('errors.noperm')->with('machucnang', 'nghecongviec');
        }
        $inputs=$request->all();
        nghecongviec::create($inputs);
        return redirect('/nghe_cong_viec')
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
        if (!chkPhanQuyen('nghecongviec', 'thaydoi')) {
            return view('errors.noperm')->with('machucnang', 'nghecongviec');
        }
        $inputs=$request->all();
        $model=nghecongviec::findOrFail($id);
        $model->update($inputs);
        return redirect('/nghe_cong_viec')
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
        if (!chkPhanQuyen('nghecongviec', 'thaydoi')) {
            return view('errors.noperm')->with('machucnang', 'nghecongviec');
        }
        $model=nghecongviec::findOrFail($id);
        $model->delete();
        return redirect('/nghe_cong_viec')
                ->with('success','Xóa thành công');
    }
}
