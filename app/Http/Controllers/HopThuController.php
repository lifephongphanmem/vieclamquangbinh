<?php

namespace App\Http\Controllers;

use App\Models\Danhmuc\danhmuchanhchinh;
use App\Models\Danhmuc\dmdonvi;
use App\Models\donvinhanthongbao;
use App\Models\hopthu;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Session;

class HopThuController extends Controller
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
        if (!chkPhanQuyen('hopthuttdvvl', 'danhsach')) {
            return view('errors.noperm')->with('machucnang', 'hopthuttdvvl');
        }
        $model_nhan = hopthu::where('matinh','ttdvvl')->where('trangthai','DAGUI')->get();
        $model_gui= hopthu::where('madv',session('admin')->madv)->get();
        $collection=new Collection([$model_nhan,$model_gui]);
        $model=$collection->collapse();
        foreach($model as $val){
            if($val->dvnhan != null){
                $val->loaithu= 'Thư gửi đi';
            }else{
                $val->loaithu= 'Thư đến';
            }
        }

        $chuadoc=hopthu::where('matinh','ttdvvl')->where('trangthai','DAGUI')->where('status',0)->count();
        // dd($chuadoc);
        $a_madv=array_column(dmdonvi::all()->toarray(),'tendv','madv');
        return view('admin.hopthu.index')
                ->with('model', $model)
                ->with('baocao', getdulieubaocao())
                // ->with('chuadoc', $chuadoc)
                ->with('a_madv', $a_madv);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.hopthu.create');
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
        $m_danhmuchanhchinh = danhmuchanhchinh::join('dmdonvi', 'dmdonvi.madiaban', 'danhmuchanhchinh.id')
            ->select('dmdonvi.madv', 'dmdonvi.tendv', 'danhmuchanhchinh.capdo')
            ->get();
        

        //đính kèm file
        if (isset($inputs['file'])) {
            $file = $inputs['file'];
            $name = time() . $file->getClientOriginalName();
            $file->move('uploads/cunglaodong/', $name);
            $inputs['file'] = 'uploads/cunglaodong/' . $name;
        }
        $time = Carbon::now();
        $inputs['madv']=session('admin')->madv;
        $inputs['thoigiangui'] = $time->toDateString();
        $inputs['loaithu']=1;//1: Thư đi,2:thư đến
        // dd($inputs);
//   dd(session('admin'));
        // dd($inputs);
        $m_huyen = $m_danhmuchanhchinh->where('capdo', 'H');
        $m_xa = $m_danhmuchanhchinh->where('capdo', 'X');
        switch ($inputs['doituong']) {
            case 'all':
                $inputs['dvnhan'] = getdate()[0];
                foreach ($m_danhmuchanhchinh as $ct) {
                    $data = [
                        'mahopthu' => $inputs['dvnhan'],
                        'madv' => $ct->madv
                    ];
                    donvinhanthongbao::create($data);
                }
               
                break;
            case 'xa':
                $inputs['dvnhan'] = getdate()[0];
                foreach ($m_xa as $ct) {
                    $data = [
                        'mahopthu' => $inputs['dvnhan'],
                        'madv' => $ct->madv
                    ];
                    donvinhanthongbao::create($data);
                }
               
                break;
            case 'huyen':
                $inputs['dvnhan'] = getdate()[0];
                foreach ($m_huyen as $ct) {
                    $data = [
                        'mahopthu' => $inputs['dvnhan'],
                        'madv' => $ct->madv
                    ];
                    donvinhanthongbao::create($data);
                }
               
                break;
            case 'ttdvvl':
                $inputs['loaithu']=2;
                $inputs['matinh']='ttdvvl';
                break;
            case 'bchuyen':
                $inputs['loaithu']=2;
                $inputs['mahuyen']=session('admin')->huyen;
                break;
        }
  
        if(session('admin')->capdo == 'T'){
            $inputs['matinh']='ttdvvl';
        }

        hopthu::create($inputs);
        if(in_array($inputs['doituong'],['all','huyen','xa'])){
            return redirect('/hopthu');
        }elseif($inputs['doituong']=='ttdvvl'){
            return redirect('/hopthu/huyen');
        }else{
            return redirect('/hopthu/xa');
        }
        
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!chkPhanQuyen('hopthuttdvvl', 'thaydoi')) {
            return view('errors.noperm')->with('machucnang', 'hopthuttdvvl');
        }
        $model=hopthu::findOrFail($id);
        if ($model->file != null) {
            if (File::exists($model->file)) {
                File::Delete($model->file);
            }
        }
        $m_dvnhan=donvinhanthongbao::where('mahopthu',$model->dvnhan)->delete();
        $model->delete();

        return redirect('/hopthu')
                ->with('success','Xóa thành công');
    }

    public function hopthu_huyen(){
        if (!chkPhanQuyen('hopthuhuyen', 'danhsach')) {
            return view('errors.noperm')->with('machucnang', 'hopthuhuyen');
        }
        $model_ttdvvl=hopthu::join('donvinhanthongbao','donvinhanthongbao.mahopthu','hopthu.dvnhan')
                    ->select('hopthu.*','donvinhanthongbao.isRead')
                    ->where('donvinhanthongbao.madv',session('admin')->madv)
                    ->get();
        $model_xa=hopthu::where('mahuyen',session('admin')->maquocgia)->where('trangthai','DAGUI')->get();
        $model_gui=hopthu::where('madv',session('admin')->madv)->get();
        $collection=new Collection([$model_ttdvvl,$model_xa,$model_gui]);
        $model=$collection->collapse();
        $a_madv=array_column(dmdonvi::all()->toarray(),'tendv','madv');
        foreach($model as $val){
            if($val->dvnhan != null ){
                $val->loaithu= 'Thư đến';
            }elseif($val->mahuyen != null){
                $val->loaithu= 'Thư đến';
            }else{
                $val->loaithu='Thư gửi đi';
            }
        }
        // dd($model);
                    return view('admin.hopthu.huyen.index')
                    ->with('model',$model)
                    ->with('baocao', getdulieubaocao())
                    ->with('a_madv',$a_madv);
    }

    public function hopthu_xa(){
        // if (!chkPhanQuyen('hopthuxa', 'danhsach')) {
        //     return view('errors.noperm')->with('machucnang', 'hopthuxa');
        // }
        $model_nhan=hopthu::join('donvinhanthongbao','donvinhanthongbao.mahopthu','hopthu.dvnhan')
        ->select('hopthu.*','donvinhanthongbao.isRead')
        ->where('donvinhanthongbao.madv',session('admin')->madv)
        ->get();

            $model_gui=hopthu::where('madv',session('admin')->madv)->get();

            $model=new Collection([$model_nhan,$model_gui]);
            $model=$model->collapse();
            foreach($model as $val){
                if($val->dvnhan != null ){
                    $val->loaithu= 'Thư đến';
                }else{
                    $val->loaithu='Thư gửi đi';
                }
            }
            // dd($model);
            $a_madv=array_column(dmdonvi::all()->toarray(),'tendv','madv');
        return view('admin.hopthu.xa.index')
        ->with('model',$model)
        ->with('baocao', getdulieubaocao())
        ->with('a_madv',$a_madv);
    }

    public function send(Request $request,$id){
        $model=hopthu::findOrFail($id);
        if(isset($model)){
            $model->update(['trangthai'=>'DAGUI','status'=>0]);
        }
        return redirect('/hopthu/xa')
                ->with('success','Gửi thành công');
    }
    public function huyen_send($id){
        $model=hopthu::findOrFail($id);
        if(isset($model)){
            $model->update(['trangthai'=>'DAGUI','status'=>0]);
        }
        return redirect('/hopthu/huyen')
                ->with('success','Gửi thành công');
    }

    public function huyen_tralai(Request $request,$id){
        $inputs=$request->all();
        // dd($inputs);
        $model=hopthu::findOrFail($id);
        // dd($model);
        if(isset($model)){
            $model->update(['trangthai'=>'TRALAI','lydo'=>$inputs['tralai'],'status'=>0]);
        }

        return redirect('/hopthu/huyen')
                    ->with('success','Trả lại thành công');
    }

    public function tinh_tralai(Request $request,$id){
        $inputs=$request->all();
        // dd($inputs);
        $model=hopthu::findOrFail($id);
        // dd($model);
        if(isset($model)){
            $model->update(['trangthai'=>'TRALAI','lydo'=>$inputs['tralai'],'status'=>0]);
        }

        return redirect('/hopthu')
                    ->with('success','Trả lại thành công');
    }

    public function huyen_lydo(Request $request,$id){
        $model=hopthu::findOrFail($id);
        return response()->json($model);
    }

    public function xa_lydo(Request $request,$id){
        $model=hopthu::findOrFail($id);
        return response()->json($model);
    }

    public function checktn(Request $request,$id){
        $inputs=$request->all();
        $model=hopthu::findOrFail($id);
        if($inputs['isRead'] == null){
           
            if(isset($model)){
                $model->update(['status'=>1]);
    
            }
        }else{
            $model_dvnhan=donvinhanthongbao::where('mahopthu',$model->dvnhan)->where('madv',session('admin')->madv)->first();
            $model_dvnhan->update(['isRead'=>1]);
        }
        return response()->json($inputs);
    }


}
