<?php

namespace App\Http\Controllers\Danhmuc;

use App\Http\Controllers\Controller;
use App\Models\Danhmuc\danhmuchanhchinh;
use App\Models\Danhmuc\dmdonvi;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DmdonviController extends Controller
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
        if (!chkPhanQuyen('donvi', 'danhsach')) {
            return view('errors.noperm')->with('machucnang', 'donvi');
        }
        $model_diaban=danhmuchanhchinh::where('capdo','!=','Th')->get();
        // dd($model_diaban);
        return view('HeThong.manage.dmdonvi.index')
                ->with('model_diaban',$model_diaban);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   
        if (!chkPhanQuyen('donvi', 'thaydoi')) {
            return view('errors.noperm')->with('machucnang', 'donvi');
        }
        $inputs['madonvi']= $request->madonvi;
        $inputs['maquocgia']=$request->maquocgia;
        $inputs['parent']=$request->parent;
        // dd($inputs);
        if($inputs['parent'] == 0){
            $model_donvi= null;
            $model_diaban=danhmuchanhchinh::where('parent',$inputs['parent'])->first();
        }else{
            $model_diaban=danhmuchanhchinh::where('maquocgia',$inputs['parent'])->orwhere('parent',$inputs['parent'])->get();
            $a_diaban=array_column($model_diaban->toarray(),'id');
            $model_donvi= dmdonvi::wherein('madiaban',$a_diaban)->get();
        }
        // dd($model_diaban);
        // dd($model_donvi);
       $m_diaban=danhmuchanhchinh::where('maquocgia',$inputs['maquocgia'])->first();
        return view('HeThong.manage.dmdonvi.create')
                    ->with('model_diaban',$m_diaban)
                    ->with('furl','/dmdonvi/')
                    ->with('inputs',$inputs['madonvi'])
                    ->with('model_donvi',$model_donvi);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!chkPhanQuyen('donvi', 'thaydoi')) {
            return view('errors.noperm')->with('machucnang', 'donvi');
        }
        $inputs=$request->all();
        $inputs['madv']=getdate()[0];
        // dd($inputs);
        dmdonvi::create($inputs);
        return redirect('/dmdonvi/danh_sach_don_vi/'.$inputs['madonvi']);
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
        if (!chkPhanQuyen('donvi', 'thaydoi')) {
            return view('errors.noperm')->with('machucnang', 'donvi');
        }
        $model=dmdonvi::findOrFail($id);
        $model_diaban=danhmuchanhchinh::where('id',$model->madiaban)->first();
        $m_diaban=danhmuchanhchinh::where('maquocgia',$model_diaban->parent)->orwhere('parent',$model_diaban->parent)->get();
        $a_diaban=array_column($m_diaban->toarray(),'id');
        $model_donvi= dmdonvi::wherein('madiaban',$a_diaban)->get();
        return view('HeThong.manage.dmdonvi.edit')
        ->with('model',$model)
        ->with('furl','/dmdonvi/')
        // ->with('inputs',$inputs['madonvi'])
        ->with('model_donvi',$model_donvi);
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
        if (!chkPhanQuyen('donvi', 'thaydoi')) {
            return view('errors.noperm')->with('machucnang', 'donvi');
        }
        $inputs=$request->all();
        $model=dmdonvi::findOrFail($id);
        $model->update($inputs);
        return redirect('/dmdonvi/danh_sach_don_vi/'.$inputs['madiaban']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!chkPhanQuyen('donvi', 'thaydoi')) {
            return view('errors.noperm')->with('machucnang', 'donvi');
        }
        $model=dmdonvi::findOrFail($id);
        $model->delete();
        return redirect('/dmdonvi/danh_sach_don_vi/'.$model->madiaban);
    }

    public function detail(Request $request){
        if (!chkPhanQuyen('donvi', 'danhsach')) {
            return view('errors.noperm')->with('machucnang', 'donvi');
        }
        $inputs=$request->all();
        $id=$request->id;
        $donvi=danhmuchanhchinh::findOrFail($id);
        $model=dmdonvi::where('madiaban',$id)->get();
        return view('HeThong.manage.dmdonvi.chitietdonvi')
                ->with('model',$model)
                ->with('donvi',$donvi);
    }

    public function dvql($id)
    {
        if (!chkPhanQuyen('donvi', 'danhsach')) {
            return view('errors.noperm')->with('machucnang', 'donvi');
        }
        $model_donvi=dmdonvi::where('madiaban',$id)->get();
        $model_hc=danhmuchanhchinh::findOrFail($id);
        return view('HeThong.manage.dmdonvi.dvql')
                ->with('model_donvi',$model_donvi)
                ->with('model_hc',$model_hc);
    }

    public function update_dvql(Request $request,$id)
    {

        if (!chkPhanQuyen('donvi', 'thaydoi')) {
            return view('errors.noperm')->with('machucnang', 'donvi');
        }
        $model=danhmuchanhchinh::findOrFail($id);
        $inputs=$model->toarray();
        $inputs['madvql']=$request->madvql;
        $model->update($inputs);
        return redirect('/dmdonvi/danh_sach');
    }
}
