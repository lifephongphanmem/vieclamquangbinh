<?php

namespace App\Http\Controllers\EPS;

use App\Http\Controllers\Controller;
use App\Models\cauhinheps;
use App\Models\nguoilaodongEPS;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class epsController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!Session::has('admin')) {
                return redirect('/');
            };
            return $next($request);
        })->except([
                'index',
                'store'
            ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('EPS.index')
                    ->with('pageTitle','Đăng ký dự thì tiếng hàn (EPS)');
    }

    public function danhsach()
    {
        if (!chkPhanQuyen('danhsachdangkyeps', 'danhsach')) {
            return view('errors.noperm')->with('machucnang', 'danhsachdangkyeps');
        }
        $model=nguoilaodongEPS::all();

        return view('EPS.danhsach')
                    ->with('model',$model)
                    ->with('baocao', getdulieubaocao())
                    ->with('pageTitle','Người lao động EPS');
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
        $inputs=$request->all();
        $request->validate([
            'cccd' => 'unique:nguoilaodongEPS'
        ], [
            'cccd.unique' => 'Số CCCD hoặc hộ chiếu đã được sử dụng'
        ]);
        $time=Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString();
        $inputs['created_at']=$time;
        $inputs['updated_at']=$time;
        nguoilaodongEPS::create($inputs);
        
        return redirect('/EPS/ThongTin')->with('success','Đăng ký thành công');
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
        if (!chkPhanQuyen('danhsachdangkyeps', 'thaydoi')) {
            return view('errors.noperm')->with('machucnang', 'danhsachdangkyeps');
        }
        $model = nguoilaodongEPS::findOrFail($id);

        return view('EPS.edit')
                    ->with('model',$model)
                    ->with('baocao', getdulieubaocao())
                    ->with('pageTitle','Cập nhật phiếu đăng ký');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (!chkPhanQuyen('danhsachdangkyeps', 'thaydoi')) {
            return view('errors.noperm')->with('machucnang', 'danhsachdangkyeps');
        }
        $inputs=$request->all();
        $request->validate([
            'cccd' => 'unique:nguoilaodongEPS,cccd,'.$inputs['id']
        ], [
            'cccd.unique' => 'Số CCCD hoặc hộ chiếu đã được sử dụng'
        ]);
        $model=nguoilaodongEPS::findOrFail($inputs['id']);
       
        if(isset($model)){
            $time=Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString();
            $inputs['nguoicapnhat']= session('admin')->id;
            $inputs['updated_at']=$time;
            $model->update($inputs);
            return redirect('/EPS/DanhSach')
                            ->with('success','Cập nhật thông tin thành công');
        }else{
            return redirect('/EPS/DanhSach')
                        ->with('error','Cập nhật thất bại');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!chkPhanQuyen('danhsachdangkyeps', 'thaydoi')) {
            return view('errors.noperm')->with('machucnang', 'danhsachdangkyeps');
        }
        $model=nguoilaodongEPS::findOrFail($id);
        if(isset($model)){
            $model->delete();
            return redirect('/EPS/DanhSach')
                            ->with('success','Xóa thành công');
        }else{
            return redirect('/EPS/DanhSach')
            ->with('error','Lỗi!!! Xóa thất bại');
        }
    }

    public function getnghe(Request $request){
        
            $html='';
            if($request->manganh == 'KHAC'){
                $html .= '<input type="text" name="nghekhac" id="nghe" class="form-control"
                placeholder="Nghề đăng ký theo ngành khác" />';
            }else{
                $model= NgheDK()[$request->manganh];
                $html .= '<select class="form-control" name="nghe" id="nghe">';
                foreach($model as $k=>$ct){
                 $html .= '<option value="'.$k.'">'.$ct.'</option>';
                }   
             $html .= '</select>';
            }

        return response()->json($html);
    }

    public function tonghop(Request $request)
    {
        if (!chkPhanQuyen('danhsachdangkyeps', 'hoanthanh')) {
            return view('errors.noperm')->with('machucnang', 'danhsachdangkyeps');
        }
        $inputs=$request->all();

        if(!isset($inputs['ngayden']))
        {
            $inputs['ngayden']= Carbon::now('Asia/Ho_Chi_Minh')->addDay()->toDateString();
        }
        if(!isset($inputs['ngaytu']))
        {
            $model=nguoilaodongEPS::all();
        }else{
            $model=nguoilaodongEPS::whereBetween('created_at',[$inputs['ngaytu'],$inputs['ngayden']])->get();
        }

        return view('EPS.tonghop')
                    ->with('model',$model)
                    ->with('pageTitle','Tổng hợp');
    }

    public function phuluc4(Request $request){
        if (!chkPhanQuyen('danhsachdangkyeps', 'hoanthanh')) {
            return view('errors.noperm')->with('machucnang', 'danhsachdangkyeps');
        }
        $id=$request->id;
        $model=nguoilaodongEPS::findOrFail($id);
        // $model->hoten=strtoupper($model->hoten);
        $model->hoten=mb_convert_case($model->hoten, MB_CASE_UPPER ,'utf-8');
        return view('EPS.phieu04')
                    ->with('model',$model)
                    ->with('pageTitle','Bản kê khai thông tin');
    }

    public function phieuthu(Request $request)
    {
        if (!chkPhanQuyen('danhsachdangkyeps', 'hoanthanh')) {
            return view('errors.noperm')->with('machucnang', 'danhsachdangkyeps');
        }
        $id=$request->id;
        $model=nguoilaodongEPS::findOrFail($id);
        $cauhinh=cauhinheps::first();
        // $model->hoten=strtoupper($model->hoten);
        // $model->hoten=mb_convert_case($model->hoten, MB_CASE_UPPER ,'utf-8');
        $model->hoten=ucwords($model->hoten);
        return view('EPS.phieuthu')
                    ->with('model',$model)
                    ->with('cauhinh',$cauhinh)
                    ->with('pageTitle','Phiếu thu');
    }
}
