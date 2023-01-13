<?php

namespace App\Http\Controllers;

use App\Models\Danhmuc\danhmuchanhchinh;
use App\Models\Danhmuc\dmdonvi;
use App\Models\Danhmuc\dmthoigianthatnghiep;
use App\Models\Danhmuc\dmtinhtrangthamgiahdktct;
use App\Models\Danhmuc\dmtinhtrangthamgiahdktct2;
use App\Models\Danhmuc\dmtrinhdokythuat;
use Illuminate\Http\Request;
use DB;
use App\Models\danhsach;
use App\Models\danhsachloi;
use App\Models\danhsachnhankhau;
use App\Models\m_nhankhau;
use App\Models\Nhankhau;
use App\Models\User;
use App\Models\view\view_bao_cao_tonghop;
use Carbon\Carbon;
use Hamcrest\Type\IsNumeric;
use Session;
use Illuminate\Http\RedirectResponse;

use Maatwebsite\Excel\Facades\Excel;

class AdminDieutra extends Controller
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

    public function show_all(Request $request, $cid = null)
    {
        if (!chkPhanQuyen('danhsachdieutra', 'danhsach')) {
            return view('errors.noperm')->with('machucnang', 'danhsachdieutra');
        }
        $request = request();

        //filter
        $search = $request->search;

        $huyen_list = $this->getDmhc();
        $dmhc_list = $this->getdanhmuc();
        $dm_filter = $request->dm_filter;
        $inputs = $request->all();
        $m_donvi = getDonVi(session('admin')->sadmin);
        $m_diaban = danhmuchanhchinh::all();
        // dd($m_diaban);
        $inputs['madv'] = $inputs['madv'] ?? $m_donvi->first()->madv;
        $a_kydieutra = array_column(danhsach::all()->toarray(), 'kydieutra', 'kydieutra');
        $kydieutra=danhsach::orderBy('id', 'desc')->first();
        $inputs['kydieutra'] = $inputs['kydieutra'] ?? (isset($kydieutra)?$kydieutra->kydieutra:'');
        $danhsach_id = danhsach::select('id')->where('kydieutra',$inputs['kydieutra'])->first();
        // dd($inputs['madv']);
        $inputs['url'] = '/dieutra/danhsach';
        $model_dv=dmdonvi::where('madv',$inputs['madv'])->first();
        $m_xa=danhmuchanhchinh::where('id',$model_dv->madiaban)->first();
        $m_huyen=danhmuchanhchinh::where('maquocgia',$m_xa->parent)->first();   
        $inputs['mahuyen']=$inputs['mahuyen']??$m_huyen->maquocgia;
        $arr_xa=array_column(getMaXa($inputs['mahuyen'])->toarray(),'madv');
// dd($a_xa);
        $dss = DB::table('danhsach')->where('kydieutra', $inputs['kydieutra']);

        if (in_array(session('admin')->sadmin, ['SSA', 'ssa','ADMIN'])){
            $a_huyen=array_column(danhmuchanhchinh::where('capdo','H')->get()->toarray(),'name','maquocgia');
            $a_xa=danhmuchanhchinh::join('dmdonvi','dmdonvi.madiaban','danhmuchanhchinh.id')
            ->select('dmdonvi.madv','danhmuchanhchinh.name')
            ->where('parent',$inputs['mahuyen'])->get();
        }else{
           
            $a_xa=danhmuchanhchinh::join('dmdonvi','dmdonvi.madiaban','danhmuchanhchinh.id')
            ->select('dmdonvi.madv','danhmuchanhchinh.name','danhmuchanhchinh.parent')
            ->where('madv',$inputs['madv'])->get();
            $a_huyen=array_column(danhmuchanhchinh::where('maquocgia',$a_xa->first()->parent)->get()->toarray(),'name','maquocgia');
        }

        // if(session('admin')->sadmin == 'ADMIN'){
        //     $dss=$dss->get();
        // }else{
        //     $dss=$dss->where('danhsach.user_id', $inputs['madv'])
        //     ->get();
        // }

        $donvi = User::where('madv', $inputs['madv'])->first();
        if (in_array($donvi->sadmin, ['SSA', 'ADMIN', 'ssa'])) {
            $dss = $dss->wherein('user_id',$arr_xa)->get();
        } elseif ($donvi->capdo == 'H') {
            $huyen = danhmuchanhchinh::join('dmdonvi', 'dmdonvi.madiaban', 'danhmuchanhchinh.id')
                ->select('dmdonvi.madv', 'dmdonvi.tendv', 'danhmuchanhchinh.*')
                ->where('dmdonvi.madv', $inputs['madv'])
                ->first();
            $xa = danhmuchanhchinh::join('dmdonvi', 'dmdonvi.madiaban', 'danhmuchanhchinh.id')
                ->select('dmdonvi.madv', 'dmdonvi.tendv')
                ->where('danhmuchanhchinh.parent', $huyen->maquocgia)
                ->get();
            $a_xa = array_column($xa->toarray(), 'madv');
            $dss = $dss->wherein('danhsach.user_id', $a_xa)
                ->get();
        } else {
            $dss = $dss->where('danhsach.user_id', $inputs['madv'])
                ->get();
        }
       
        $data_loi=danhsachloi::where('kydieutra',$inputs['kydieutra'])->get();

        $a_donvi=array_column(dmdonvi::all()->toarray(),'tendv','madv');
        // dd($m_donvi);
        return view('admin.dieutra.all')
            ->with('dss', $dss)
            ->with('data_loi', $data_loi)
            ->with('a_donvi', $a_donvi)
            ->with('a_huyen', $a_huyen)
            ->with('a_xa', $a_xa)
            ->with('a_dsdv', array_column($m_donvi->toarray(), 'tendv', 'madv'))
            ->with('inputs', $inputs)
            ->with('m_diaban', $m_diaban)
            ->with('m_donvi', $m_donvi)
            ->with('a_kydieutra', $a_kydieutra)
            ->with('search', $search)
            ->with('dmhc_list', $dmhc_list)
            ->with('huyen_list', $huyen_list)
            ->with('dm_filter', $dm_filter)
            ->with('danhsach_id', $danhsach_id);
    }

    public function getDmhc()
    {
        $cats = DB::table('danhmuchanhchinh')
            ->where('level', 'huyện')
            ->orwhere('level', 'thành phố')
            ->orwhere('level', 'Thị xã')
            ->get();
        return $cats;
    }
    public function getParams($paramtype)
    {
        $type = DB::table('paramtype')->where('name', $paramtype)->get()->first();
        $cats = DB::table('param')->where('type', $type->id)->get();
        return $cats;
    }



    public function new(Request $request)
    {
        if (!chkPhanQuyen('danhsachdieutra', 'thaydoi')) {
            return view('errors.noperm')->with('machucnang', 'danhsachdieutra');
        }
        $inputs = $request->all();
        $m_donvi = getDonVi(session('admin')->sadmin);
        $inputs['madv'] = $inputs['madv'] ?? $m_donvi->first()->madv;
        // dd($inputs['madv']);
        $dmhc = $this->getdanhmuc();
        $inputs['url'] = '/dieutra/ThemMoi';
        //Lấy huyện dựa trên madv
        $m_xa = danhmuchanhchinh::join('dmdonvi', 'dmdonvi.madiaban', 'danhmuchanhchinh.id')
            ->select('danhmuchanhchinh.*')
            ->where('dmdonvi.madv', $inputs['madv'])
            ->first();
        // dd($m_xa);
        $m_huyen = danhmuchanhchinh::where('maquocgia', $m_xa->parent)->first();

        // $a_xa=isset($m_xa)?array_column($m_xa->toarray(), 'name', 'maquocgia'):[];
        // $a_huyen=isset($m_huyen)?array_column($m_huyen->toarray(), 'name', 'maquocgia'):[];
        // dd($a_xa);
        // dd($dmhc);
        return view('admin.dieutra.new')
            ->with('a_dsdv', array_column($m_donvi->toarray(), 'tendv', 'madv'))
            ->with('m_xa', $m_xa)
            ->with('m_huyen', $m_huyen)
            ->with('inputs', $inputs)
            ->with('dmhc', $dmhc);
    }

    public function save(Request $request)
    {
        if (!chkPhanQuyen('danhsachdieutra', 'thaydoi')) {
            return view('errors.noperm')->with('machucnang', 'danhsachdieutra');
        }
        $request = request();
        $inputs = $request->all();
        $uid = $inputs['madv'];
        $data = array();
        $data['xa'] = $request->xa;
        $data['huyen'] = $request->huyen;
        $data['tinh'] = $request->tinh;
        $data['user_id'] = $uid;
        $data['donvinhap']=session('admin')->madv;
        $data['kydieutra'] = $request->kydieutra;
        $data['ghichu'] = $request->ghichu;

        $model=danhsach::where('user_id',$inputs['madv'])->where('kydieutra',$inputs['kydieutra'])->first();
        if(isset($model))
        {
            return view('errors.tontai_dulieu')
            ->with('message', 'Đơn vị đã khai báo trong kỳ điều tra này')
            ->with('furl', '/dieutra/ThemMoi');
        }

        $result = DB::table('danhsach')->insertGetId($data);

        if ($result) {

            Session::put('message', "Thêm mới thành công");
        } else {
            Session::put('message', "Có lỗi xảy ra");
        }


        $model = new Nhankhau();

        $request->validate([
            'import_file' => 'required|mimes:xlsx, csv, xls'
        ]);

        try {
        
            $RetIm = $model->import($result,$inputs);

            $ld = $RetIm['valid'];
            $soho = $RetIm['soho'];
            $err = $RetIm['error'];
            $data_loi=$RetIm['data_loi'];
        } catch (Exception $e) {

            // return redirect('dieutra-bn')->withErrors(['message' => 'Dữ liệu nhập không hợp lệ. ' . $e->getMessage()]);
            return redirect('/dieutra/ThemMoi')->withErrors(['message' => 'Dữ liệu nhập không hợp lệ. ' . $e->getMessage()]);
        }

        if($data_loi){
            foreach($data_loi as $item)
            {
                DB::table('danhsachloi')->insert(['nhankhau_id'=>$item,'madv'=>$inputs['madv'],'kydieutra'=>$inputs['kydieutra']]);
            }
        }
        if ($ld) {
            DB::table('danhsach')
                ->where('id', $result)
                ->update(['soluong' => $ld, 'soho' => $soho]);

            // return redirect('dieutra-ba')->with('message', $ld . " nhân khẩu khai báo thành công");
            return redirect('/dieutra/danhsach?mahuyen='.$inputs['huyen'])->with('message', $ld . " nhân khẩu khai báo thành công");
        } else {
            // redirect('dieutra-ba')->withErrors(['message' => 'Dữ liệu nhập không hợp lệ']);
            redirect('/dieutra/danhsach')->withErrors(['message' => 'Dữ liệu nhập không hợp lệ']);
        }
    }

    public function edit($eid)
    {
    }

    public function update(Request $request)
    {
    }
    public function delete($catid)
    {
    }

    public function getdanhmuc()
    {

        $dm = DB::table('danhmuchanhchinh')->where('public', '1')->get();
        return $dm;
    }
    public function getParamsByNametype($paramtype)
    {
        $cats = array();
        $type = DB::table('paramtype')->where('name', $paramtype)->get()->first();
        if ($type) {
            $cats = DB::table('param')->where('type', $type->id)->get();
        }
        return $cats;
    }

    public function intonghop(Request $request)
    {
        if (!chkPhanQuyen('danhsachdieutra', 'hoanthanh')) {
            return view('errors.noperm')->with('machucnang', 'danhsachdieutra');
        }
        $inputs = $request->all();
        // dd($inputs);
        // $model = danhsach::join('nhankhau', 'nhankhau.danhsach_id', 'danhsach.id')
        //     ->select('nhankhau.*', 'danhsach.user_id', 'danhsach.soluong', 'danhsach.kydieutra', 'danhsach.soho')
        //     ->get();
        // $model =view_bao_cao_tonghop::where('kydieutra', $inputs['kydieutra'])->get();
        // $model=DB::table('nhankhau')->where('kydieutra',$inputs['kydieutra'])->get();
        $model=m_nhankhau::where('kydieutra',$inputs['kydieutra'])->get();
// dd($model);
        if (isset($inputs['madv'])) {
            $model = $model->where('madv', $inputs['madv']);
        }
        // if (isset($inputs['kydieutra'])) {
        //     $model = $model->where('kydieutra', $inputs['kydieutra']);
        // }
        $m_danhmuc = danhmuchanhchinh::join('dmdonvi', 'dmdonvi.madiaban', 'danhmuchanhchinh.id')
        ->select('danhmuchanhchinh.*','dmdonvi.madv')
        ->get();
        //    dd($model); 
        $a_dm=array_column($m_danhmuc->toarray(),'level','madv'); 
        foreach ($model as $ct) {
            // $danhmuc = danhmuchanhchinh::join('dmdonvi', 'dmdonvi.madiaban', 'danhmuchanhchinh.id')
            //     ->select('danhmuchanhchinh.level', 'danhmuchanhchinh.name', 'danhmuchanhchinh.capdo')
            //     ->where('dmdonvi.madv', $ct->user_id)
            //     ->first();
            if ($a_dm[$ct->madv] == 'Xã') {
                $ct->khuvuc = 'nongthon';
            } else {
                $ct->khuvuc = 'thanhthi';
            }
        }

        $m_donvi=$m_danhmuc->where('madv',$inputs['madv'])->first();
        $m_donvi->huyen=$m_danhmuc->where('maquocgia',$m_donvi->parent)->first()->name;
        $a_cmkt = array_column(dmtrinhdokythuat::all()->toarray(), 'tentdkt', 'stt');
        $a_vithevl = array_column(dmtinhtrangthamgiahdktct2::where('manhom2', '20221220175800')->get()->toarray(), 'tentgktct2', 'stt');
        $a_khongthamgia = array_column(dmtinhtrangthamgiahdktct::where('manhom', '20221220175728')->get()->toarray(), 'tentgktct', 'stt');
        $a_thoigianthatnghiep = array_column(dmthoigianthatnghiep::all()->toarray(), 'tentgtn', 'stt');
        return view('admin.dieutra.tonghop')
            ->with('model', $model)
            ->with('inputs', $inputs)
            ->with('m_donvi', $m_donvi)
            ->with('a_cmkt', $a_cmkt)
            ->with('a_khongthamgia', $a_khongthamgia)
            ->with('a_vithevl', $a_vithevl)
            ->with('a_thoigianthatnghiep', $a_thoigianthatnghiep)
            ->with('pageTitle', 'Tổng hợp cung lao động');
    }
    public function inbaocaohuyen(Request $request)
    {
        if (!chkPhanQuyen('danhsachdieutra', 'hoanthanh')) {
            return view('errors.noperm')->with('machucnang', 'danhsachdieutra');
        }
        $inputs = $request->all();
        // dd($inputs);
        $model=m_nhankhau::where('kydieutra',$inputs['kydieutra'])->get();

        // dd($model);
        $m_danhmuc = danhmuchanhchinh::join('dmdonvi', 'dmdonvi.madiaban', 'danhmuchanhchinh.id')
        ->select('danhmuchanhchinh.*','dmdonvi.madv')
        ->get();
        $m_donvi=$m_danhmuc->where('madv',$inputs['madv'])->first();
        // $m_donvi->huyen=$m_danhmuc->where('maquocgia',$m_donvi->parent)->first()->name;

        if (isset($inputs['madv'])) {
            $a_donvi=array_column($m_danhmuc->where('parent',$m_donvi->maquocgia)->toarray(),'madv');
            $model = $model->wherein('madv', $a_donvi);
        }

        //    dd($model);
        $a_dm=array_column($m_danhmuc->toarray(),'level','madv'); 
        foreach ($model as $ct) {

            if ($a_dm[$ct->madv] == 'Xã') {
                $ct->khuvuc = 'nongthon';
            } else {
                $ct->khuvuc = 'thanhthi';
            }

            if($ct->gioitinh == null){
                $ct->gioitinh='Nam';
            }

        }


        $a_cmkt = array_column(dmtrinhdokythuat::all()->toarray(), 'tentdkt', 'stt');
        $a_vithevl = array_column(dmtinhtrangthamgiahdktct2::where('manhom2', '20221220175800')->get()->toarray(), 'tentgktct2', 'stt');
        $a_khongthamgia = array_column(dmtinhtrangthamgiahdktct::where('manhom', '20221220175728')->get()->toarray(), 'tentgktct', 'stt');
        $a_thoigianthatnghiep = array_column(dmthoigianthatnghiep::all()->toarray(), 'tentgtn', 'stt');
        return view('admin.dieutra.baocaohuyen')
            ->with('model', $model)
            ->with('inputs', $inputs)
            ->with('m_donvi', $m_donvi)
            ->with('a_cmkt', $a_cmkt)
            ->with('a_khongthamgia', $a_khongthamgia)
            ->with('a_vithevl', $a_vithevl)
            ->with('a_thoigianthatnghiep', $a_thoigianthatnghiep)
            ->with('pageTitle', 'Tổng hợp cung lao động');
    }

    public function inbaocaotinh(Request $request)
    {
        if (!chkPhanQuyen('danhsachdieutra', 'hoanthanh')) {
            return view('errors.noperm')->with('machucnang', 'danhsachdieutra');
        }
        $inputs = $request->all();
        // dd($inputs);
        $a_chuyenmon=dmtrinhdokythuat::select('tentdkt','stt')->get()->toarray();
        // dd($a_chuyenmon);
        $model=m_nhankhau::where('kydieutra',$inputs['kydieutra'])->get();

                // dd($model);
        $m_danhmuc = danhmuchanhchinh::join('dmdonvi', 'dmdonvi.madiaban', 'danhmuchanhchinh.id')
        ->select('danhmuchanhchinh.*','dmdonvi.madv')
        ->get();

        $a_dm=array_column($m_danhmuc->toarray(),'level','madv');
        $m_donvi=$m_danhmuc->where('madv',session('admin')->madv)->first();    
        $a_cmkt = array_column($a_chuyenmon, 'tentdkt', 'stt');        
        $a_vithevl = array_column(dmtinhtrangthamgiahdktct2::where('manhom2', '20221220175800')->get()->toarray(), 'tentgktct2', 'stt');
        $a_khongthamgia = array_column(dmtinhtrangthamgiahdktct::where('manhom', '20221220175728')->get()->toarray(), 'tentgktct', 'stt');
        $a_thoigianthatnghiep = array_column(dmthoigianthatnghiep::all()->toarray(), 'tentgtn', 'stt');
        


        $a_ketqua=['thanhthi'=>0,'nongthon'=>0,'nam'=>0,'nu'=>0];
        $a_covl=['thanhthi'=>0,'nongthon'=>0];
        $a_thatnghiep=['thanhthi'=>0,'nongthon'=>0];
        foreach ($model as $ct) {
            if ($a_dm[$ct->madv] == 'Xã') {
                $ct->khuvuc = 'nongthon';
                $a_ketqua['nongthon']++;

                //có việc làm và thất nghiệp
                if($ct->tinhtranghdkt == 1){
                    $a_covl['nongthon']++;
                }elseif($ct->tinhtranghdkt == 2){
                    $a_thatnghiep['nongthon']++;
                }
            } else {
                $ct->khuvuc = 'thanhthi';
                $a_ketqua['thanhthi']++;

                //có việc làm và thất nghiệp
                if($ct->tinhtranghdkt == 1){
                    $a_covl['thanhthi']++;
                }elseif($ct->tinhtranghdkt == 2){
                    $a_thatnghiep['thanhthi']++;
                }
            }

            if(in_array($ct->gioitinh,['nam','Nam']) ){
                $a_ketqua['nam']++;
            }else{
                $a_ketqua['nu']++;
            } 

            // if($ct->tinhtranghdkt ==1){
            //    is_numeric($ct->chuyenmonkythuat)?($cmkt_covl[$ct->chuyenmonkythuat]?$cmkt_covl[$ct->chuyenmonkythuat]++:'' ): '';
            //    is_numeric($ct->nguoicovieclam) ? ($_vithevl[$ct->nguoicovieclam]?$_vithevl[$ct->nguoicovieclam]++:'' ): '';
            // }elseif($ct->tinhtranghdkt == 2){
            //    is_numeric($ct->chuyenmonkythuat)? ($cmkt_thatnghiep[$ct->chuyenmonkythuat]?$cmkt_thatnghiep[$ct->chuyenmonkythuat]++:'' ): '';
            //    is_numeric($ct->thoigianthatnghiep)? ($_thoigianthatnghiep[$ct->thoigianthatnghiep]? $_thoigianthatnghiep[$ct->thoigianthatnghiep]++:'' ): '';
            // }else{
            //     if( is_numeric($ct->khongthamgiahdkt)){
            //         $khongthamgia=str_replace('0','',$ct->khongthamgiahdkt);
            //         $_khongthamgia[$khongthamgia]++;
            //     }
            // }
            
        }


        // dd($model);
        return view('admin.dieutra.baocaotinh')
            ->with('model', $model)
            ->with('inputs', $inputs)
            ->with('a_ketqua', $a_ketqua)
            ->with('a_covl', $a_covl)
            ->with('a_thatnghiep', $a_thatnghiep)
            ->with('m_donvi', $m_donvi)
            ->with('a_cmkt', $a_cmkt)
            ->with('a_khongthamgia', $a_khongthamgia)
            ->with('a_vithevl', $a_vithevl)
            ->with('a_thoigianthatnghiep', $a_thoigianthatnghiep)
            ->with('pageTitle', 'Tổng hợp cung lao động');
    }

    public function XoaDanhSach(Request $request,$id)
    {
        if (!chkPhanQuyen('danhsachdieutra', 'thaydoi')) {
            return view('errors.noperm')->with('machucnang', 'danhsachdieutra');
        }
        $inputs=$request->all();
        $model=danhsach::findOrFail($id);
        if(isset($model)){
            
            // $danhsach=danhsachnhankhau::where('danhsach_id',$model->id)->get();
            $danhsach=DB::table('nhankhau')->where('danhsach_id',$model->id)->delete();
            // $maloi=array_column($danhsach->toarray(),'maloi');  
            // foreach($danhsach as $val){
            //         $val->delete();
            //     }
            $dsloi=DB::table('danhsachloi')->where('madv',$model->user_id)->where('kydieutra',$model->kydieutra)->delete();
  
            // foreach(array_chunk($maloi,1000) as $loi){
            //     $dsloi=danhsachloi::wherein('nhankhau_id',$loi)->get();
            //     dd($dsloi);
               
            // }

          
            // foreach($dsloi as $ct)
            // {
            //     $ct->delete();
            // }
        }
        $model->delete();

        return redirect('/dieutra/danhsach?mahuyen='.$inputs['mahuyen'] .'&kydieutra='.$inputs['kydieutra']);
    }
}
