<?php

namespace App\Http\Controllers\Danhmuc;

use App\Http\Controllers\Controller;
use App\Models\Danhmuc\nguyennhanthatnghiep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class nguyennhanthatnghiepController extends Controller
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
     
        // if (!chkPhanQuyen('nguyennhanthatnghiep', 'danhsach')) {
        //     return view('errors.noperm')->with('machucnang', 'nguyennhanthatnghiep');
        // }
        $model = nguyennhanthatnghiep::all();
        return view('danhmuc.nguyennhanthatnghiep.index')
        ->with('model', $model)
            ->with('baocao', getdulieubaocao());
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // if (!chkPhanQuyen('nguyennhanthatnghiep', 'thaydoi')) {
        //     return view('errors.noperm')->with('machucnang', 'nguyennhanthatnghiep');
        // }
        $inputs = $request->all();
        nguyennhanthatnghiep::create($inputs);
        return redirect('danh_muc/nguyen_nhan_that_nghiep')
        ->with('success', 'Thêm mới thành công');
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
        // if (!chkPhanQuyen('nguyennhanthatnghiep', 'thaydoi')) {
        //     return view('errors.noperm')->with('machucnang', 'nguyennhanthatnghiep');
        // }
        $inputs = $request->all();
        $model = nguyennhanthatnghiep::findOrFail($id);
        $model->update($inputs);
        return redirect('danh_muc/nguyen_nhan_that_nghiep')
        ->with('success', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // if (!chkPhanQuyen('nguyennhanthatnghiep', 'thaydoi')) {
        //     return view('errors.noperm')->with('machucnang', 'nguyennhanthatnghiep');
        // }
        $model = nguyennhanthatnghiep::findOrFail($id);
        $model->delete();
        return redirect('danh_muc/nguyen_nhan_that_nghiep')
        ->with('success', 'Xóa thành công');
    }
}
