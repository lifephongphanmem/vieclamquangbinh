<?php

namespace App\Http\Controllers\Danhmuc;

use App\Models\Danhmuc\danhmuchanhchinh;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class danhmuchanhchinhController extends Controller
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
        if (!chkPhanQuyen('diaban', 'danhsach')) {
            return view('errors.noperm')->with('machucnang', 'chucnang');
        }
        $model=danhmuchanhchinh::where('capdo','!=','Th')->get();
        // dd(getdate()[0]);
        return view('HeThong.manage.diaban.index')
                ->with('model',$model);
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
        if (!chkPhanQuyen('diaban', 'thaydoi')) {
            return view('errors.noperm')->with('machucnang', 'chucnang');
        }
        $inputs=$request->all();
        if(in_array($inputs['level'],['Huyện','Thành phố','Thị xã']))
        {
            $inputs['capdo']='H';
        }else if(in_array($inputs['level'],['Xã','Phường','Thị trấn'])){
            $inputs['capdo']='X';
        }else{
            $inputs['capdo']='T';
        }
        $inputs['madb']=getdate()[0];
            danhmuchanhchinh::create($inputs);
            return redirect('/dia_ban');
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
        if (!chkPhanQuyen('diaban', 'thaydoi')) {
            return view('errors.noperm')->with('machucnang', 'chucnang');
        }
        $inputs=$request->all();
        $id=$inputs['edit'];
        $model=danhmuchanhchinh::findOrFail($id);
        $model->update($inputs);
        return redirect('/dia_ban');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!chkPhanQuyen('diaban', 'thaydoi')) {
            return view('errors.noperm')->with('machucnang', 'chucnang');
        }
        $model=danhmuchanhchinh::findOrFail($id);
        $model->delete();
        return redirect('/dia_ban');
    }
}
