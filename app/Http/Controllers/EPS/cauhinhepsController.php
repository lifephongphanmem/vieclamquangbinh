<?php

namespace App\Http\Controllers\EPS;

use App\Http\Controllers\Controller;
use App\Models\cauhinheps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class cauhinhepsController extends Controller
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
        if (!chkPhanQuyen('cauhinheps', 'danhsach')) {
            return view('errors.noperm')->with('machucnang', 'cauhinheps');
        }
        $model=cauhinheps::all();

        return view('EPS.cauhinh.index')
                    ->with('model',$model)
                    ->with('baocao', getdulieubaocao())
                    ->with('pageTitle','Cấu hình');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!chkPhanQuyen('cauhinheps', 'thaydoi')) {
            return view('errors.noperm')->with('machucnang', 'cauhinheps');
        }
        $inputs=$request->all();
        cauhinheps::create($inputs);
        return redirect('/EPS/CauHinh/ThongTin')->with('success','Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        if (!chkPhanQuyen('cauhinheps', 'thaydoi')) {
            return view('errors.noperm')->with('machucnang', 'cauhinheps');
        }
        $inputs=$request->all();
        $model=cauhinheps::findOrFail($id);
        if(isset($model)){
            $model->update($inputs);
        }

        return redirect('/EPS/CauHinh/ThongTin')->with('success','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
