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
use App\Models\Nhankhau;
use App\Models\User;
use Carbon\Carbon;
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
        $request = request();

        //filter
        $search = $request->search;

        $huyen_list = $this->getDmhc();
        $dmhc_list = $this->getdanhmuc();
        $dm_filter = $request->dm_filter;
        $inputs = $request->all();
        $m_donvi = getDonVi(session('admin')->sadmin);
        $inputs['madv'] = $inputs['madv'] ?? $m_donvi->first()->madv;
        $a_kydieutra = array_column(danhsach::all()->toarray(), 'kydieutra', 'kydieutra');
        $kydieutra=danhsach::orderBy('id', 'desc')->first();
        $inputs['kydieutra'] = $inputs['kydieutra'] ?? (isset($kydieutra)?$kydieutra->kydieutra:'');
        // dd($inputs['madv']);
        $inputs['url'] = '/dieutra/danhsach';
        $dss = DB::table('danhsach')
            ->when($search, function ($query, $search) {
                return $query->whereRaw("(xa like  '%" . $search . "%' OR huyen like '%" . $search . "%')");
            })
            ->when($dm_filter, function ($query, $dm_filter) {
                return $query->where('huyen', $dm_filter);
            })
            ->where('kydieutra', $inputs['kydieutra']);

        // if(session('admin')->sadmin == 'ADMIN'){
        //     $dss=$dss->get();
        // }else{
        //     $dss=$dss->where('danhsach.user_id', $inputs['madv'])
        //     ->get();
        // }

        $donvi = User::where('madv', $inputs['madv'])->first();
        if (in_array($donvi->sadmin, ['SSA', 'ADMIN', 'ssa'])) {
            $dss = $dss->get();
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

        return view('admin.dieutra.all')
            ->with('dss', $dss)
            ->with('data_loi', $data_loi)
            ->with('a_donvi', $a_donvi)
            ->with('a_dsdv', array_column($m_donvi->toarray(), 'tendv', 'madv'))
            ->with('inputs', $inputs)
            ->with('a_kydieutra', $a_kydieutra)
            ->with('search', $search)
            ->with('dmhc_list', $dmhc_list)
            ->with('huyen_list', $huyen_list)
            ->with('dm_filter', $dm_filter);
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

        $request = request();
        $inputs = $request->all();
        $uid = $inputs['madv'];
        $data = array();
        $data['xa'] = $request->xa;
        $data['huyen'] = $request->huyen;
        $data['tinh'] = $request->tinh;
        $data['user_id'] = $uid;
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
        
            $RetIm = $model->import($result);

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
            return redirect('/dieutra/danhsach')->with('message', $ld . " nhân khẩu khai báo thành công");
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
        $inputs = $request->all();
        // dd($inputs);
        $model = danhsach::join('nhankhau', 'nhankhau.danhsach_id', 'danhsach.id')
            ->select('nhankhau.*', 'danhsach.user_id', 'danhsach.soluong', 'danhsach.kydieutra', 'danhsach.soho')
            ->get();
        // dd($model);
        if (isset($inputs['madv'])) {
            $model = $model->where('user_id', $inputs['madv']);
        }

        if (isset($inputs['kydieutra'])) {
            $model = $model->where('kydieutra', $inputs['kydieutra']);
        }
        $m_danhmuc = danhmuchanhchinh::join('dmdonvi', 'dmdonvi.madiaban', 'danhmuchanhchinh.id')
        ->select('danhmuchanhchinh.*','dmdonvi.madv')
        ->get();
        //    dd($model); 
        foreach ($model as $ct) {
            // $danhmuc = danhmuchanhchinh::join('dmdonvi', 'dmdonvi.madiaban', 'danhmuchanhchinh.id')
            //     ->select('danhmuchanhchinh.level', 'danhmuchanhchinh.name', 'danhmuchanhchinh.capdo')
            //     ->where('dmdonvi.madv', $ct->user_id)
            //     ->first();
            $danhmuc = $m_danhmuc
            ->where('madv', $ct->user_id)
            ->first();
            if ($danhmuc->level == 'Xã') {
                $ct->khuvuc = 'nongthon';
            } else {
                $ct->khuvuc = 'thanhthi';
            }
            $ngaysinh=str_replace('-','',$ct->ngaysinh);
            if(strlen($ngaysinh)< 9){
                $tuoi = getAge(Carbon::parse($ct->ngaysinh)->format('Y-m-d'));
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
        $inputs = $request->all();
        // dd($inputs);
        $model = danhsach::join('nhankhau', 'nhankhau.danhsach_id', 'danhsach.id')
            ->select('nhankhau.*', 'danhsach.user_id', 'danhsach.soluong', 'danhsach.kydieutra', 'danhsach.soho')
            ->get();
        // dd($model);
        $m_danhmuc = danhmuchanhchinh::join('dmdonvi', 'dmdonvi.madiaban', 'danhmuchanhchinh.id')
        ->select('danhmuchanhchinh.*','dmdonvi.madv')
        ->get();
        $m_donvi=$m_danhmuc->where('madv',$inputs['madv'])->first();
        $m_donvi->huyen=$m_danhmuc->where('maquocgia',$m_donvi->parent)->first()->name;

        if (isset($inputs['madv'])) {
            $a_donvi=array_column($m_danhmuc->where('parent',$m_donvi->maquocgia)->toarray(),'madv');
            $model = $model->wherein('user_id', $a_donvi);
        }

        if (isset($inputs['kydieutra'])) {
            $model = $model->where('kydieutra', $inputs['kydieutra']);
        }

        //    dd($model); 
        foreach ($model as $ct) {
            // $danhmuc = danhmuchanhchinh::join('dmdonvi', 'dmdonvi.madiaban', 'danhmuchanhchinh.id')
            //     ->select('danhmuchanhchinh.level', 'danhmuchanhchinh.name', 'danhmuchanhchinh.capdo')
            //     ->where('dmdonvi.madv', $ct->user_id)
            //     ->first();
            $danhmuc = $m_danhmuc
            ->where('madv', $ct->user_id)
            ->first();
            if ($danhmuc->level == 'Xã') {
                $ct->khuvuc = 'nongthon';
            } else {
                $ct->khuvuc = 'thanhthi';
            }
            $ngaysinh=str_replace('-','',$ct->ngaysinh);
            if(strlen($ngaysinh)< 9){
                $tuoi = getAge(Carbon::parse($ct->ngaysinh)->format('Y-m-d'));
            }

            $ct->tuoi = isset($tuoi)??0;
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
}
