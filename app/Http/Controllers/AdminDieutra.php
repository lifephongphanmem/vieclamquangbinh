<?php

namespace App\Http\Controllers;

use App\Models\Danhmuc\danhmuchanhchinh;
use App\Models\Danhmuc\dmdoituonguutien;
use App\Models\Danhmuc\dmdonvi;
use App\Models\Danhmuc\dmloaihieuluchdld;
use App\Models\Danhmuc\dmloaihinhhdkt;
use App\Models\Danhmuc\dmthoigianthatnghiep;
use App\Models\Danhmuc\dmtinhtrangthamgiahdkt;
use App\Models\Danhmuc\dmtinhtrangthamgiahdktct;
use App\Models\Danhmuc\dmtinhtrangthamgiahdktct2;
use App\Models\Danhmuc\dmtrinhdogdpt;
use App\Models\Danhmuc\dmtrinhdokythuat;
use Illuminate\Http\Request;
use DB;
use App\Models\danhsach;
use App\Models\danhsachloi;
use App\Models\Nhankhau;
use App\Models\nhankhauModel;
use App\Models\Report;
use App\Models\User;
use Session;
use Illuminate\Support\Collection;


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
        $kydieutra = danhsach::orderBy('id', 'desc')->first();
        $inputs['kydieutra'] = $inputs['kydieutra'] ?? (isset($kydieutra) ? $kydieutra->kydieutra : '');

        $inputs['url'] = '/dieutra/danhsach';
        $model_dv = dmdonvi::where('madv', $inputs['madv'])->first();
        $m_xa = danhmuchanhchinh::where('id', $model_dv->madiaban)->first();
        $m_huyen = danhmuchanhchinh::where('maquocgia', $m_xa->parent)->first();
        $inputs['mahuyen'] = $inputs['mahuyen'] ?? $m_huyen->maquocgia;
        $arr_xa = array_column(getMaXa($inputs['mahuyen'])->toarray(), 'madv');
        // dd($a_xa);
        $dss = DB::table('danhsach')->where('kydieutra', $inputs['kydieutra']);

        if (in_array(session('admin')->sadmin, ['SSA', 'ssa', 'ADMIN'])) {
            $a_huyen = array_column(danhmuchanhchinh::where('capdo', 'H')->get()->toarray(), 'name', 'maquocgia');
            $m_xa = danhmuchanhchinh::join('dmdonvi', 'dmdonvi.madiaban', 'danhmuchanhchinh.id')
                ->select('dmdonvi.madv', 'danhmuchanhchinh.name')
                ->where('parent', $inputs['mahuyen'])->get();
        } else {


            if (session('admin')->capdo == 'H') {
                $a_huyen = [session('admin')->maquocgia => session('admin')->tendiaban];
                $m_xa = danhmuchanhchinh::join('dmdonvi', 'dmdonvi.madiaban', 'danhmuchanhchinh.id')
                    ->select('dmdonvi.madv', 'danhmuchanhchinh.name', 'danhmuchanhchinh.parent')
                    ->where('danhmuchanhchinh.parent', session('admin')->maquocgia)->get();
            } else {
                $m_xa = danhmuchanhchinh::join('dmdonvi', 'dmdonvi.madiaban', 'danhmuchanhchinh.id')
                    ->select('dmdonvi.madv', 'danhmuchanhchinh.name', 'danhmuchanhchinh.parent')
                    ->where('madv', $inputs['madv'])->get();
                $a_huyen = array_column(danhmuchanhchinh::where('maquocgia', $m_xa->first()->parent)->get()->toarray(), 'name', 'maquocgia');
            }
        }
        // dd($a_huyen);
        // if(session('admin')->sadmin == 'ADMIN'){
        //     $dss=$dss->get();
        // }else{
        //     $dss=$dss->where('danhsach.user_id', $inputs['madv'])
        //     ->get();
        // }

        $donvi = User::where('madv', $inputs['madv'])->first();
        if (in_array($donvi->sadmin, ['SSA', 'ADMIN', 'ssa'])) {
            $dss = $dss->wherein('user_id', $arr_xa)->get();
        } elseif ($donvi->capdo == 'H') {
            $huyen = danhmuchanhchinh::join('dmdonvi', 'dmdonvi.madiaban', 'danhmuchanhchinh.id')
                ->select('dmdonvi.madv', 'dmdonvi.tendv', 'danhmuchanhchinh.*')
                // ->where('dmdonvi.madv', $inputs['madv'])
                ->where('dmdonvi.madv', session('admin')->madv)
                ->first();
            $m_xa = danhmuchanhchinh::join('dmdonvi', 'dmdonvi.madiaban', 'danhmuchanhchinh.id')
                ->select('dmdonvi.madv', 'dmdonvi.tendv', 'danhmuchanhchinh.name')
                ->where('danhmuchanhchinh.parent', $huyen->maquocgia)
                ->get();
            $a_xa = array_column($m_xa->toarray(), 'madv');
            $dss = $dss->wherein('danhsach.user_id', $a_xa)
                ->get();
        } else {
            $dss = $dss->where('danhsach.user_id', $inputs['madv'])
                ->get();
        }
        $data_loi = danhsachloi::where('kydieutra', $inputs['kydieutra'])->get();

        $a_donvi = array_column(dmdonvi::all()->toarray(), 'tendv', 'madv');
        // dd($a_kydieutra);
        // dd($inputs);
        // dd($m_xa);
        // dd($m_donvi);
        return view('admin.dieutra.all')
            ->with('dss', $dss)
            ->with('baocao', getdulieubaocao())
            ->with('data_loi', $data_loi)
            ->with('a_donvi', $a_donvi)
            ->with('a_huyen', $a_huyen)
            ->with('a_xa', $m_xa)
            ->with('a_dsdv', array_column($m_donvi->toarray(), 'tendv', 'madv'))
            ->with('inputs', $inputs)
            ->with('m_diaban', $m_diaban)
            ->with('m_donvi', $m_donvi)
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
            ->with('baocao', getdulieubaocao())
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
        $data['donvinhap'] = session('admin')->madv;
        $data['kydieutra'] = $request->kydieutra;
        $data['ghichu'] = $request->ghichu;

        $model = danhsach::where('user_id', $inputs['madv'])->where('kydieutra', $inputs['kydieutra'])->first();
        if (isset($model)) {
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

            $RetIm = $model->import($result, $inputs);

            $ld = $RetIm['valid'];
            $soho = $RetIm['soho'];
            $err = $RetIm['error'];
            $data_loi = $RetIm['data_loi'];
            $loi_cccd = $RetIm['loi_cccd'];
            $loi_hoten = $RetIm['loi_hoten'];
            $loi_ngaysinh = $RetIm['loi_ngaysinh'];
            $loi_loai2 = $RetIm['loi_loai2'];
            $loi_loai3 = $RetIm['loi_loai3'];
        } catch (Exception $e) {

            // return redirect('dieutra-bn')->withErrors(['message' => 'Dữ liệu nhập không hợp lệ. ' . $e->getMessage()]);
            return redirect('/dieutra/ThemMoi')->withErrors(['message' => 'Dữ liệu nhập không hợp lệ. ' . $e->getMessage()]);
        }

        if ($data_loi) {
            foreach ($data_loi as $item) {
                DB::table('danhsachloi')->insert(['nhankhau_id' => $item, 'madv' => $inputs['madv'], 'kydieutra' => $inputs['kydieutra']]);
            }
        }
        if ($ld) {
            DB::table('danhsach')
                ->where('id', $result)
                ->update(['soluong' => $ld, 'soho' => $soho, 'loi_cccd' => $loi_cccd, 'loi_hoten' => $loi_hoten, 'loi_ngaysinh' => $loi_ngaysinh, 'loi_loai2' => $loi_loai2, 'loi_loai3' => $loi_loai3]);

            // return redirect('dieutra-ba')->with('message', $ld . " nhân khẩu khai báo thành công");
            return redirect('/dieutra/danhsach?mahuyen=' . $inputs['huyen'])->with('message', $ld . " nhân khẩu khai báo thành công");
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
        if (!chkPhanQuyen('baocaoxa', 'hoanthanh')) {
            return view('errors.noperm')->with('machucnang', 'baocaoxa');
        }
        $inputs = $request->all();
        // dd($inputs);
        $model = nhankhauModel::where('kydieutra', $inputs['kydieutra'])
            ->where('loaibiendong', '!=', 2)
            ->when($inputs['madv'], function ($q, $inputs) {
                return $q->where('madv', $inputs);
            })
            ->where(function ($q) use ($inputs) {

                if (isset($inputs['gender'])) {
                    $q->where('gioitinh', 'like', '%' . $inputs['gioitinh'] . '%');
                }
                if (isset($inputs['tthdkt'])) {
                    $q->where('tinhtranghdkt', $inputs['tinhtranghdkt']);
                }
                if (isset($inputs['dtut'])) {
                    $q->where('uutien', $inputs['uutien']);
                }
                if (isset($inputs['trinhdogdpt'])) {
                    $q->where('trinhdogiaoduc', $inputs['trinhdogiaoduc']);
                }
                if (isset($inputs['trinhdocmkt'])) {
                    $q->where('chuyenmonkythuat', $inputs['chuyenmonkythuat']);
                }
            })
            ->get();

        // if (isset($inputs['madv'])) {
        //     $model = $model->where('madv', $inputs['madv']);
        // }
        // if (isset($inputs['kydieutra'])) {
        //     $model = $model->where('kydieutra', $inputs['kydieutra']);
        // }
        $m_danhmuc = danhmuchanhchinh::join('dmdonvi', 'dmdonvi.madiaban', 'danhmuchanhchinh.id')
            ->select('danhmuchanhchinh.*', 'dmdonvi.madv')
            ->get();
        //    dd($model); 
        $a_dm = array_column($m_danhmuc->toarray(), 'level', 'madv');
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

        $m_donvi = $m_danhmuc->where('madv', $inputs['madv'])->first();
        $m_donvi->huyen = $m_danhmuc->where('maquocgia', $m_donvi->parent)->first()->name;
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
        if (!chkPhanQuyen('baocaohuyen', 'hoanthanh')) {
            return view('errors.noperm')->with('machucnang', 'baocaohuyen');
        }
        $inputs = $request->all();
        // dd($inputs);
        $model = nhankhauModel::where('kydieutra', $inputs['kydieutra'])
            ->where('loaibiendong', '!=', 2)
            ->where(function ($q) use ($inputs) {

                if (isset($inputs['gender'])) {
                    $q->where('gioitinh', 'like', '%' . $inputs['gioitinh'] . '%');
                }
                if (isset($inputs['tthdkt'])) {
                    $q->where('tinhtranghdkt', $inputs['tinhtranghdkt']);
                }
                if (isset($inputs['dtut'])) {
                    $q->where('uutien', $inputs['uutien']);
                }
                if (isset($inputs['trinhdogdpt'])) {
                    $q->where('trinhdogiaoduc', $inputs['trinhdogiaoduc']);
                }
                if (isset($inputs['trinhdocmkt'])) {
                    $q->where('chuyenmonkythuat', $inputs['chuyenmonkythuat']);
                }
            })
            ->get();

        // dd($model);
        $m_danhmuc = danhmuchanhchinh::join('dmdonvi', 'dmdonvi.madiaban', 'danhmuchanhchinh.id')
            ->select('danhmuchanhchinh.*', 'dmdonvi.madv')
            ->get();
        $m_donvi = $m_danhmuc->where('madv', $inputs['madv'])->first();
        // $m_donvi->huyen=$m_danhmuc->where('maquocgia',$m_donvi->parent)->first()->name;

        if (isset($inputs['madv'])) {
            $a_donvi = array_column($m_danhmuc->where('parent', $m_donvi->maquocgia)->toarray(), 'madv');
            $model = $model->wherein('madv', $a_donvi);
        }

        //    dd($model);
        $a_dm = array_column($m_danhmuc->toarray(), 'level', 'madv');
        foreach ($model as $ct) {

            if ($a_dm[$ct->madv] == 'Xã') {
                $ct->khuvuc = 'nongthon';
            } else {
                $ct->khuvuc = 'thanhthi';
            }

            if ($ct->gioitinh == null) {
                $ct->gioitinh = 'Nam';
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
        if (!chkPhanQuyen('baocaotinh', 'hoanthanh')) {
            return view('errors.noperm')->with('machucnang', 'baocaotinh');
        }
        $inputs = $request->all();
        // dd($inputs);
        $a_chuyenmon = dmtrinhdokythuat::select('tentdkt', 'stt')->get()->toarray();
        // dd($a_chuyenmon);
        $model = nhankhauModel::where('kydieutra', $inputs['kydieutra'])
            ->where('loaibiendong', '!=', 2)
            ->where(function ($q) use ($inputs) {

                if (isset($inputs['gender'])) {
                    $q->where('gioitinh', $inputs['gioitinh']);
                }
                if (isset($inputs['tthdkt'])) {
                    $q->where('tinhtranghdkt', $inputs['tinhtranghdkt']);
                }
                if (isset($inputs['dtut'])) {
                    $q->where('uutien', $inputs['uutien']);
                }
                if (isset($inputs['trinhdogdpt'])) {
                    $q->where('trinhdogiaoduc', $inputs['trinhdogiaoduc']);
                }
                if (isset($inputs['trinhdocmkt'])) {
                    $q->where('chuyenmonkythuat', $inputs['chuyenmonkythuat']);
                }
            })
            ->get();


        $m_danhmuc = danhmuchanhchinh::join('dmdonvi', 'dmdonvi.madiaban', 'danhmuchanhchinh.id')
            ->select('danhmuchanhchinh.*', 'dmdonvi.madv')
            ->get();

        $a_dm = array_column($m_danhmuc->toarray(), 'level', 'madv');
        $m_donvi = $m_danhmuc->where('madv', session('admin')->madv)->first();
        $a_cmkt = array_column($a_chuyenmon, 'tentdkt', 'stt');
        $a_vithevl = array_column(dmtinhtrangthamgiahdktct2::where('manhom2', '20221220175800')->get()->toarray(), 'tentgktct2', 'stt');
        $a_khongthamgia = array_column(dmtinhtrangthamgiahdktct::where('manhom', '20221220175728')->get()->toarray(), 'tentgktct', 'stt');
        $a_thoigianthatnghiep = array_column(dmthoigianthatnghiep::all()->toarray(), 'tentgtn', 'stt');



        $a_ketqua = ['thanhthi' => 0, 'nongthon' => 0, 'nam' => 0, 'nu' => 0];
        $a_covl = ['thanhthi' => 0, 'nongthon' => 0];
        $a_thatnghiep = ['thanhthi' => 0, 'nongthon' => 0];
        foreach ($model as $ct) {
            if ($a_dm[$ct->madv] == 'Xã') {
                $ct->khuvuc = 'nongthon';
                $a_ketqua['nongthon']++;

                //có việc làm và thất nghiệp
                if ($ct->tinhtranghdkt == 1) {
                    $a_covl['nongthon']++;
                } elseif ($ct->tinhtranghdkt == 2) {
                    $a_thatnghiep['nongthon']++;
                }
            } else {
                $ct->khuvuc = 'thanhthi';
                $a_ketqua['thanhthi']++;

                //có việc làm và thất nghiệp
                if ($ct->tinhtranghdkt == 1) {
                    $a_covl['thanhthi']++;
                } elseif ($ct->tinhtranghdkt == 2) {
                    $a_thatnghiep['thanhthi']++;
                }
            }

            if (in_array($ct->gioitinh, ['nam', 'Nam'])) {
                $a_ketqua['nam']++;
            } else {
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

    public function XoaDanhSach(Request $request, $id)
    {
        if (!chkPhanQuyen('danhsachdieutra', 'thaydoi')) {
            return view('errors.noperm')->with('machucnang', 'danhsachdieutra');
        }
        $inputs = $request->all();
        // dd($inputs);
        $model = danhsach::findOrFail($id);
        if (isset($model)) {

            // $danhsach=danhsachnhankhau::where('danhsach_id',$model->id)->get();
            $danhsach = nhankhauModel::where('madv', $model->user_id)->where('kydieutra', $model->kydieutra)->get();
            // $maloi=array_column($danhsach->toarray(),'maloi');  
            foreach ($danhsach as $val) {
                $kydieutra = getKydieutra($val->kydieutra);

                if (in_array($inputs['kydieutra'], $kydieutra)) {
                    $index = array_search($inputs['kydieutra'], $kydieutra);
                    unset($kydieutra[$index]);

                    $kydieutra = implode(';', $kydieutra);
                    if ($kydieutra != '') {
                        $val->update(['kydieutra' => $kydieutra]);
                    } else {
                        $val->delete();
                    }
                }
            }
            $dsloi = DB::table('danhsachloi')->where('madv', $model->user_id)->where('kydieutra', $model->kydieutra)->delete();
        }
        $model->delete();

        return redirect('/dieutra/danhsach?mahuyen=' . $inputs['mahuyen'] . '&kydieutra=' . $inputs['kydieutra']);
    }

    public function danhsachloi(Request $request, $id)
    {
        $inputs = $request->all();
        // $m_donvi = getDonVi(session('admin')->sadmin);
        // $inputs['madv'] = $inputs['madv'] ?? $m_donvi->first()->madv;
        $model = danhsach::findOrFail($id);
        $a_loailoi = ['CCCD', 'Loại 1', 'Loại 2', 'Loại 3', 'Loại 4'];
        $a_model = array();
        foreach ($a_loailoi as $val) {

            switch ($val) {
                case 'CCCD':
                    $soluongloi = $model->loi_cccd;
                    $mota = 'Không có CCCD';
                    break;
                case 'Loại 1':
                    $soluongloi = $model->loi_hoten + $model->loi_ngaysinh;
                    $mota = 'Trống trường dữ liệu họ và tên hoặc ngày sinh';
                    break;
                case 'Loại 2':
                    $soluongloi = $model->loi_loai2;
                    $mota = 'Tình trạng tham gia HĐKT = 3 nhưng một trong số các trường sau có dữ liệu: người có việc làm, công việc cụ thể đang làm, tham gia BHXH, HĐLĐ, nơi làm việc, loại hình nơi làm việc, địa chỉ nơi làm việc, người thất nghiệp, thời gian thất nghiệp';
                    break;
                case 'Loại 3':
                    $soluongloi = $model->loi_loai3;
                    $mota = 'Tình trạng tham gia HĐKT = 2 nhưng một trong số các trường sau có dữ liệu: người có việc làm, công việc cụ thể đang làm, tham gia BHXH, HĐLĐ, nơi làm việc,loại hình nơi làm việc, địa chỉ nơi làm việc, không tham gia hđkt';
                    break;
                case 'Loại 4':
                    $soluongloi = $model->loi_loai4;
                    $mota = 'Tình trạng tham HĐKT trống';
                    break;
            }
            $array = [
                'loailoi' => $val,
                'soluong' => $soluongloi,
                'mota' => $mota,
                'madv' => $model->user_id,
                'kydieutra' => $model->kydieutra
            ];
            $a_model[] = $array;
        }

        return view('admin.dieutra.danhsachloi')
            ->with('a_model', $a_model)
            ->with('baocao', getdulieubaocao())
            ->with('inputs', $inputs)
            ->with('id', $id);
    }

    public function danhsachloi_chitiet(Request $request)
    {
        $inputs = $request->all();
        $loailoi = strtoupper(chuyenkhongdau(str_replace(' ', '', $inputs['loailoi'])));
        $model = DB::table('nhankhau')->where('madv', $inputs['madv'])->where('kydieutra', $inputs['kydieutra'])->get();
        $a_loi = array();
        foreach ($model as $val) {
            if ($val->maloailoi != null || $val->maloailoi != '') {
                $a_maloi = explode(';', $val->maloailoi);
                foreach ($a_maloi as $ct) {
                    if ($ct == $loailoi) {
                        $a_loi[] = $val;
                    }
                }
            }
        }
        // dd($inputs);
        return view('admin.dieutra.danhsachloi_chitiet')
            ->with('a_loi', $a_loi)
            ->with('baocao', getdulieubaocao())
            ->with('inputs', $inputs)
            ->with('danhsachtinhtrangvl', danhsachtinhtrangvl())
            ->with('loailoi', $loailoi);
    }

    public function create(Request $request)
    {
        $inputs = $request->all();
        // dd($inputs);
        $list_cmkt = dmtrinhdokythuat::all();
        $list_tdgd = dmtrinhdogdpt::all();
        $list_nghe = $this->getParamsByNametype('Nghề nghiệp người lao động');
        $list_hdld = $this->getParamsByNametype('Loại hợp đồng lao động');
        $m_uutien = dmdoituonguutien::all();
        $m_tinhtrangvl = dmtinhtrangthamgiahdkt::all();
        $m_vithevl = dmtinhtrangthamgiahdktct2::all();
        $a_thamgiabaohiem = array('1' => 'Bắt buộc', '2' => 'Tự nguyện', '3' => 'Không tham gia');
        $m_hopdongld = dmloaihieuluchdld::all();
        $m_loaihinhkt = dmloaihinhhdkt::all();
        $dm_tinhtrangct = dmtinhtrangthamgiahdktct::all();
        $m_nguoithatnghiep = $dm_tinhtrangct->where('manhom', 20221220175720);
        $lydo = $dm_tinhtrangct->where('manhom', 20221220175728);
        $m_thoigianthatnghiep = dmthoigianthatnghiep::all();
        $inputs['xa'] = danhmuchanhchinh::join('dmdonvi', 'dmdonvi.madiaban', 'danhmuchanhchinh.id')
            ->select('danhmuchanhchinh.maquocgia')
            ->where('dmdonvi.madv', $inputs['madv'])
            ->first()->maquocgia;
        return view('admin.dieutra.create')
            ->with('inputs', $inputs)
            ->with('baocao', getdulieubaocao())
            ->with('m_uutien', $m_uutien)
            ->with('m_tinhtrangvl', $m_tinhtrangvl)
            ->with('m_vithevl', $m_vithevl)
            ->with('lydo', $lydo)
            ->with('m_hopdongld', $m_hopdongld)
            ->with('m_thoigianthatnghiep', $m_thoigianthatnghiep)
            ->with('m_nguoithatnghiep', $m_nguoithatnghiep)
            ->with('m_loaihinhkt', $m_loaihinhkt)
            ->with('a_thamgiabaohiem', $a_thamgiabaohiem)
            ->with('list_cmkt', $list_cmkt)
            ->with('list_tdgd', $list_tdgd)
            ->with('list_nghe', $list_nghe)
            ->with('list_hdld', $list_hdld);
    }

    public function store(Request $request)
    {
        $inputs = $request->all();
        // dd($inputs);
        // nhankhauModel::create($inputs);
        $note = '';
        $check = $inputs['ho'] ?? '';
        if (!isset($inputs['ho'])) {
            $m_nhankhau = nhankhauModel::where('madv', $inputs['madv'])->where('kydieutra', $inputs['kydieutra'])->get();
            $soho = $m_nhankhau->max('ho');
            $inputs['ho'] = $soho + 1;
            $note .= "Thêm 1 hộ. ";
            // dd(1);
        }
        // dd($inputs);
        // dd(2);
        $note .= "Danh sách:";
        for ($i = 0; $i < $inputs['quantity']; $i++) {
            $tmp = array();
            foreach ($inputs as $key => $val) {
                if (isset($val[$i])) {
                    $tmp[$key] = $val[$i];
                };
            }
            $tmp['madv'] = $inputs['madv'];
            $tmp['kydieutra'] = $inputs['kydieutra'];
            $tmp['ho'] = $inputs['ho'];
            $cccd = nhankhauModel::where('cccd', $tmp['cccd'])->where('madv', $inputs['madv'])->where('kydieutra', $inputs['kydieutra'])->where('loaibiendong', '!=', 2)->first();
            if (isset($cccd)) {
                continue;
            }
            $note .= $tmp['hoten'] . ' ,';
            $tmp['loaibiendong'] = 1; //0: import, 1:báo tăng
            $maloi = array();
            //kiểm tra lỗi
            //check lỗi loại 2

            $a_loi2 = array(
                'nguoicovieclam', 'congvieccuthe', 'thamgiabhxh', 'hdld', 'noilamviec',
                'loaihinhnoilamviec', 'diachinoilamviec', 'thatnghiep', 'thoigianthatnghiep'
            );

            if ($tmp['tinhtranghdkt'] == 3) {

                foreach ($a_loi2 as $tentruong) {
                    if ($tmp[$tentruong] != '') {
                        array_push($maloi, 'LOAI2');
                        break;
                    }
                }
            }

            //check lỗi loại 3

            $a_loi3 = array(
                'nguoicovieclam', 'congvieccuthe', 'thamgiabhxh', 'hdld', 'noilamviec',
                'loaihinhnoilamviec', 'diachinoilamviec'
            );
            if ($tmp['tinhtranghdkt'] == 2) {
                foreach ($a_loi3 as $tentruong) {
                    if ($tmp[$tentruong] != '') {
                        array_push($maloi, 'LOAI3');
                    }
                }
            };

            if ($maloi != []) {
                $tmp['maloailoi'] = implode(';', $maloi);
            }
            // dd($tmp);
            nhankhauModel::create($tmp);


            // dd($tmp);
        }
        $model = danhsach::where('user_id', $inputs['madv'])->where('kydieutra', $inputs['kydieutra'])->first();
        // dd($model);
        if (isset($model)) {
            $soluong = $model->soluong + $inputs['quantity'];
            $soho = $check == '' ? $model->soho + 1 : $model->soho;
            $model->update(['soluong' => $soluong, 'soho' => $soho]);
        } else {
            $data = [
                'tinh' => $inputs['tinh'],
                'huyen' => $inputs['huyen'] ?? '',
                'xa' => $inputs['xa'] ?? '',
                'soluong' => $inputs['quantity'],
                'kydieutra' => $inputs['kydieutra'],
                'soho' => 1,
                'user_id' => $inputs['madv'],
                'donvinhap' => session('admin')->madv
            ];
            danhsach::create($data);
        }
        $user = User::where('madv', $inputs['madv'])->first()->id;
        // add to log system`
        $rm = new Report();
        $rm->report('thembangtay', "1", 'nhankhau', DB::getPdo()->lastInsertId(), $inputs['quantity'], $note, $user, $inputs['kydieutra']);
        return redirect('/biendong/danhsach_biendong?madv=' . $inputs['madv'] . '&kydieutra=' . $inputs['kydieutra'] . '&loaibiendong=1');
        // if ($check == '') {
        //     return redirect('/nhankhau/hogiadinh?madv=' . $inputs['madv'] . '&kydieutra=' . $inputs['kydieutra'] . '&mahuyen=' . $inputs['huyen']);
        // } else {
        //     return redirect('/nhankhau/ChiTietHoGiaDinh/' . $inputs['nkid'] . '?soho=' . $inputs['ho'] . '&madv=' . $inputs['madv'] . '&kydieutra=' . $inputs['kydieutra'] . '&mahuyen=' . $inputs['huyen']);
        // }
    }

    public function indanhsachloi(Request $request)
    {
        $inputs = $request->all();

        if (isset($inputs['mahuyen'])) {
            if (!isset($inputs['maxa'])) {
                $maxa = array_column(getMaXa($inputs['mahuyen'])->toarray(), 'madv');
            } else {
                // $inputs['madv']=$inputs['maxa'];
                $maxa = [$inputs['maxa']];
            }
        } else {
            $maxa = [];
        }
        // $model = DB::table('nhankhau')->where('madv', $inputs['madv'])->where('kydieutra', $inputs['kydieutra'])->where('maloailoi','!=','')->get();
        $model = DB::table('nhankhau')->where('kydieutra', $inputs['kydieutra'])->where('maloailoi', '!=', '')
            ->where(function ($q) use ($maxa, $inputs) {
                if (count($maxa) > 0) {
                    $q->wherein('madv', $maxa);
                } else {
                    $q->where('madv', $inputs['madv']);
                }
            })
            ->get();
        // dd($model);
        $a_loi = array(
            'LOAI1' => 'Trống trường dữ liệu họ và tên hoặc ngày sinh',
            'LOAI2' => 'Lỗi các cột dữ liệu liên quan đến nhân khẩu không tham gia HĐKT',
            'LOAI3' => 'Lỗi các cột dữ liệu liên quan đến nhân khẩu thất nghiệp',
            'LOAI4' => 'Tình trạng tham HĐKT trống'
        );
        foreach ($model as $key => $ct) {
            $a_maloi = explode(';', $ct->maloailoi);
            // dd($a_maloi);
            $ct->loailoi = '';
            foreach ($a_maloi as $val) {
                // dd($a_loi[$val]);
                if ($val != '') {
                    $ct->loailoi .= $a_loi[$val] . '; ';
                }
            }
            if ($ct->loailoi == '') {
                unset($model[$key]);
            }
        }
        // dd($model);
        return view('admin.dieutra.indanhsachloi')
            ->with('model', $model)
            ->with('pageTitle', 'Danh sách nhân khẩu lỗi');
    }

    public function biendong(Request $request)
    {
        if (!chkPhanQuyen('biendong', 'danhsach')) {
            return view('errors.noperm')->with('machucnang', 'biendong');
        }
        // dd(session('admin'));
        $inputs = $request->all();
        if (in_array(session('admin')->sadmin, ['SSA', 'ADMIN'])) {
            $inputs['mahuyen'] = 450;
        } elseif (session('admin')->capdo == 'H') {
            $inputs['mahuyen'] = session('admin')->maquocgia;
        } else {
            $inputs['mahuyen'] = session('admin')->huyen;
        }
        // $inputs['mahuyen']=$inputs['mahuyen']??session('admin')->huyen;
        $huyen_list = $this->getDmhc();
        $dmhc_list = $this->getdanhmuc();
        $check = $inputs['madv'];
        $m_donvi = getDonVi(session('admin')->sadmin);
        $inputs['madv'] = $inputs['madv'] ?? $m_donvi->first()->madv;
        $a_kydieutra = array_column(danhsach::all()->toarray(), 'kydieutra', 'kydieutra');
        $kydieutra = danhsach::orderBy('id', 'desc')->first();
        if (in_array(session('admin')->sadmin, ['SSA', 'ssa', 'ADMIN'])) {
            $a_huyen = array_column(danhmuchanhchinh::where('capdo', 'H')->get()->toarray(), 'name', 'maquocgia');
            $m_xa = danhmuchanhchinh::join('dmdonvi', 'dmdonvi.madiaban', 'danhmuchanhchinh.id')
                ->select('dmdonvi.madv', 'danhmuchanhchinh.name')
                ->where('parent', $inputs['mahuyen'])->get();
        } else {


            if (session('admin')->capdo == 'H') {
                $a_huyen = [session('admin')->maquocgia => session('admin')->tendiaban];
                $m_xa = danhmuchanhchinh::join('dmdonvi', 'dmdonvi.madiaban', 'danhmuchanhchinh.id')
                    ->select('dmdonvi.madv', 'danhmuchanhchinh.name', 'danhmuchanhchinh.parent')
                    ->where('danhmuchanhchinh.parent', session('admin')->maquocgia)->get();
            } else {
                $m_xa = danhmuchanhchinh::join('dmdonvi', 'dmdonvi.madiaban', 'danhmuchanhchinh.id')
                    ->select('dmdonvi.madv', 'danhmuchanhchinh.name', 'danhmuchanhchinh.parent')
                    ->where('madv', $inputs['madv'])->get();
                $a_huyen = array_column(danhmuchanhchinh::where('maquocgia', $m_xa->first()->parent)->get()->toarray(), 'name', 'maquocgia');
            }
        }
        if ($check != null) {
            $xa_biendong = $m_xa->where('madv', $inputs['madv']);
        } else {
            $xa_biendong = $m_xa;
        }
        foreach ($xa_biendong as $val) {
            $user_id = User::where('madv', $val->madv)->first()->id;
            $rp = DB::table('report')->where('user', $user_id)->where('kydieutra', $inputs['kydieutra'])->get();
            $val->soluong = count($rp);
            $val->kydieutra = $inputs['kydieutra'];
        }
        // $model=DB::table('report')->where('')
        $a_donvi = array_column(dmdonvi::all()->toarray(), 'tendv', 'madv');
        $inputs['url'] = '/biendong';
        // dd($inputs);
        return view('admin.dieutra.biendong.index')
            ->with('inputs', $inputs)
            ->with('baocao', getdulieubaocao())
            ->with('a_donvi', $a_donvi)
            ->with('a_huyen', $a_huyen)
            ->with('a_xa', $m_xa)
            ->with('xa_biendong', $xa_biendong)
            ->with('a_kydieutra', $a_kydieutra)
            ->with('a_dsdv', array_column($m_donvi->toarray(), 'tendv', 'madv'))
            ->with('dmhc_list', $dmhc_list)
            ->with('huyen_list', $huyen_list);
    }

    public function biendong_ct(Request $request)
    {
        if (!chkPhanQuyen('biendong', 'hoanthanh')) {
            return view('errors.noperm')->with('machucnang', 'biendong');
        }
        $inputs = $request->all();
        $donvi = User::where('madv', $inputs['madv'])->first();
        $model = DB::table('report')->where('user', $donvi->id)->where('kydieutra', $inputs['kydieutra'])->get();
        return view('admin.dieutra.biendong.chitiet')
            ->with('baocao', getdulieubaocao())
            ->with('model', $model);
    }

    public function inbiendong(Request $request)
    {
        $inputs = $request->all();
        $donvi = User::where('madv', $inputs['madv'])->first();
        $model = DB::table('report')->where('user', $donvi->id)->where('kydieutra', $inputs['kydieutra'])->get();


        // dd($model);
        return view('admin.dieutra.biendong.inbiendong')
            ->with('model', $model)
            ->with('pageTitle', 'Biến động nhân khẩu');
    }

    public function tonghopbiendong(Request $request)
    {
        if (!chkPhanQuyen('biendong', 'hoanthanh')) {
            return view('errors.noperm')->with('machucnang', 'biendong');
        }
        $inputs = $request->all();

        if (isset($inputs['mahuyen'])) {
            $m_huyen = danhmuchanhchinh::where('maquocgia', $inputs['mahuyen'])->get();
            $maxa = getMaXa($inputs['mahuyen']);
            $a_xa = array_column($maxa->toarray(), 'madv');
            $user_xa = array_column(User::wherein('madv', $a_xa)->get()->toarray(), 'id');
            $model = DB::table('report')->wherein('user', $user_xa)->where('kydieutra', $inputs['kydieutra'])->get();
        } else {
            $m_huyen = danhmuchanhchinh::where('capdo', 'H')->get();
            $model = DB::table('report')->where('kydieutra', $inputs['kydieutra'])->get();
        }
        $a_xa = danhmuchanhchinh::join('dmdonvi', 'dmdonvi.madiaban', 'danhmuchanhchinh.id')
            ->join('users', 'users.madv', 'dmdonvi.madv')
            ->select('users.id', 'danhmuchanhchinh.name', 'dmdonvi.madv', 'danhmuchanhchinh.parent')
            ->where('danhmuchanhchinh.capdo', 'X')
            ->get();
        // dd($model);                       
        $a_user = User::where('phanloaitk', 1)->where('capdo', 'X')->get();

        if (isset($inputs['mahuyen'])) {
            return view('admin.dieutra.biendong.tonghopbiendong')
                ->with('model', $model)
                ->with('baocao', getdulieubaocao())
                ->with('m_huyen', $m_huyen)
                ->with('a_xa', $a_xa)
                ->with('a_user', $a_user)
                ->with('pageTitle', 'Tổng hợp biến động');
        } else {
            return view('admin.dieutra.biendong.tonghopbiendong_tinh')
                ->with('model', $model)
                ->with('baocao', getdulieubaocao())
                ->with('m_huyen', $m_huyen)
                ->with('a_xa', $a_xa)
                ->with('a_user', $a_user)
                ->with('pageTitle', 'Tổng hợp biến động');
        }
    }

    public function baocaotuybien(Request $request)
    {
        $inputs = $request->all();
        if (session('admin')->capdo == 'T') {
            if (isset($inputs['madv'])) {
            }
        }
        $model = nhankhauModel::where('kydieutra', $inputs['kydieutra'])
            ->where(function ($query, $inputs) {
                if (isset($inputs['madv'])) {
                    if (session('admin')->capdo == 'H') {
                        $query->where('madv', $inputs['madv']);
                    } elseif (session('admin')->capdo == 'T') {
                    }
                }
            })
            ->when($inputs['gender'], function ($query, $inputs) {
                if (isset($inputs['gioitinh'])) {
                    $query->where('gioitinh', $inputs['gioitinh']);
                }
            })
            ->get();
        dd($model);
    }

    public function export_biendong(Request $request)
    {
        $inputs = $request->all();
        // dd($inputs);
        if (session('admin')->capdo == 'X') {
            $inputs['madv'] = session('admin')->madv;
        }
        $m_danhmuc = danhmuchanhchinh::join('dmdonvi', 'dmdonvi.madiaban', 'danhmuchanhchinh.id')
            ->select('danhmuchanhchinh.*', 'dmdonvi.madv')
            ->get();
        $m_donvi = $m_danhmuc->where('madv', session('admin')->madv)->first();
        $m_donvi->huyen = $m_danhmuc->where('maquocgia', $m_donvi->parent)->first()->name;
        $model = nhankhauModel::where('kydieutra', $inputs['kydieutra'])
            ->where(function ($query) use ($inputs) {
                if ($inputs['biendong'] != 'all') {
                    $query->where('loaibiendong', $inputs['biendong']);
                } else {
                    $query->where('loaibiendong', '!=', 0);
                }

                if ($inputs['madv'] != 'all') {
                    $query->where('madv', $inputs['madv']);
                } else {
                    $a_xa = array_column(getMaXa(session('admin')->maquocgia)->toarray(), 'madv');
                    $query->wherein('madv', $a_xa);
                }
            })
            ->get();
        // dd($model_biendong->take(10));
        //Báo giảm
        // if(in_array($inputs['biendong'],['all',4])){
        //     $a_cccd=array_column($model_biendong->toarray(),'cccd');
        //     $model_giam=nhankhauModel::where('kydieutra',($inputs['kydieutra']-1))
        //                             ->where(function($query) use ($inputs){
        //                                 if($inputs['madv'] != 'all'){
        //                                     $query->where('madv',$inputs['madv']);
        //                                 }else{
        //                                     $a_xa=array_column(getMaXa(session('admin')->maquocgia)->toarray(),'madv');

        //                                     $query->wherein('madv',$a_xa);
        //                                 }
        //                             })
        //                             ->get();
        //                             $model_giam=$a_cccd == []?$model_giam:$model_giam->wherenotin('cccd',$a_cccd);

        //                             foreach($model_giam as $ct){
        //                                 $ct->loaibiendong=4;
        //                             }

        //                             $collection=new Collection([$model_biendong,$model_giam]);
        //                             $model=$collection->collapse();
        // }else{
        //     $model=$model_biendong;
        // }

        // dd($model);

        switch ($inputs['biendong']) {
            case 'all':
                $a_loaibiendong = array(
                    // '0' => 'Nhận từ file excel',
                    '1' => 'Tăng',
                    '2' => 'Giảm',
                    '3' => 'Cập nhật thông tin',
                    // '4' => 'Báo giảm'
                );
                break;
                // case 0:
                //     $a_loaibiendong = array('0' => 'Nhận từ file excel');
                //     break;
            case 1:
                $a_loaibiendong = array('1' => 'Tăng');
                break;
            case 2:
                $a_loaibiendong = array('2' => 'Giảm');
                break;
            case 3:
                $a_loaibiendong = array('3' => 'Cập nhật thông tin');
                break;
                // case 4:
                //     $a_loaibiendong = array('4' => 'Báo giảm');
                //     break;
        }

        return view('admin.dieutra.biendong.danhsach')
            ->with('model', $model)
            ->with('a_loaibiendong', $a_loaibiendong)
            ->with('m_donvi', $m_donvi)
            ->with('pageTitle', 'Danh sách biến động');
    }

    public function TaoMoi()
    {
        $kydieutra_truoc = nhankhauModel::where('madv', session('admin')->madv)->max('kydieutra');
        $model = nhankhauModel::where('madv', session('admin')->madv)->where('kydieutra', $kydieutra_truoc)->where('loaibiendong', '!=', 2)->get();
        if ($model->max('kydieutra') == date('Y')) {
            return view('errors.tontai_dulieu')
                ->with('message', 'Đơn vị đã khai báo trong kỳ điều tra này')
                ->with('furl', '/dashboard');
        }

        if (count($model) <= 0) {
            return view('errors.tontai_dulieu')
                ->with('message', 'Chưa có dữ liệu nhân khẩu kỳ trước')
                ->with('furl', '/dashboard');
        }
        $danhsach_kytruoc = danhsach::where('user_id', session('admin')->madv)->where('kydieutra', $kydieutra_truoc)->first();
        $danhsach_kytruoc->soluong = 0;
        $danhsach_kytruoc->donvinhap = session('admin')->madv;
        $danhsach_kytruoc->soho = 0;
        $danhsach_kytruoc->kydieutra = date('Y');
        unset($danhsach_kytruoc->id, $danhsach_kytruoc->created_at);
        $danhsach = danhsach::create($danhsach_kytruoc->toarray());
        $count_nhankhau = 0;
        foreach ($model as $ct) {
            $ct->kydieutra = date('Y');
            $ct->danhsach_id = $danhsach->id;
            unset($ct->id);
            nhankhauModel::create($ct->toarray());
            $count_nhankhau++;
        }
        $danhsach->update(['soluong' => $count_nhankhau]);
        return redirect('/dashboard')->with('success', 'Tạo kỳ điều tra mới thành công');
    }
}
