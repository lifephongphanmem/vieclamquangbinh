<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Nhankhau;
use Session;
use Illuminate\Http\RedirectResponse;
use App\Exports\AdminNhankhausExport;
use App\Models\Danhmuc\danhmuchanhchinh;
use App\Models\Danhmuc\dmdoituonguutien;
use App\Models\Danhmuc\dmdonvi;
use App\Models\Danhmuc\dmloaihieuluchdld;
use App\Models\Danhmuc\dmloaihinhhdkt;
use App\Models\Danhmuc\dmnganhnghe;
use App\Models\Danhmuc\dmthoigianthatnghiep;
use App\Models\Danhmuc\dmtinhtrangthamgiahdkt;
use App\Models\Danhmuc\dmtinhtrangthamgiahdktct;
use App\Models\Danhmuc\dmtinhtrangthamgiahdktct2;
use App\Models\Danhmuc\dmtrinhdogdpt;
use App\Models\Danhmuc\dmtrinhdokythuat;
use App\Models\danhsach;
use App\Models\nhankhauModel;
use App\Models\Report;
use App\Models\tonghopcunglaodong;
use App\Models\User;
use App\Models\view\view_nhankhau_danhsach;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class AdminNhankhau extends Controller
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

    public function show_all(Request $request)
    {

        if (!chkPhanQuyen('danhsachnhankhau', 'danhsach')) {
            return view('errors.noperm')->with('machucnang', 'nhankhau');
        }
        $request = request();
        $inputs = $request->all();
        //filter
        $search = $request->search;
        $gioitinh_filter = $request->gioitinh_filter;
        $age_filter = $request->age_filter;

        $dmhc_list
            = $this->getdanhmuc();

        $dm_filter = $request->dm_filter;

        $export = $request->export;
        if ($export) {

            return Excel::download(new AdminNhankhausExport, 'danhsachnhankhau.xlsx');
        }
        $m_donvi = getDonVi(session('admin')->sadmin);
        $inputs['madv'] = $inputs['madv'] ?? $m_donvi->first()->madv;
        $a_kydieutra = array_column(danhsach::where('kydieutra', 2022)->get()->toarray(), 'kydieutra', 'kydieutra');
        // $a_kydieutra = array_column(danhsach::all()->toarray(), 'kydieutra', 'kydieutra');
        $kydieutra = danhsach::orderBy('id', 'desc')->first();
        $inputs['kydieutra'] = $inputs['kydieutra'] ?? (isset($kydieutra) ? $kydieutra->kydieutra : '');
        $lds = nhankhauModel::where('kydieutra', $inputs['kydieutra'])
            ->where('madv', $inputs['madv'])->where('loaibiendong', '!=', 2)->get();
        $model_dv = dmdonvi::where('madv', $inputs['madv'])->first();
        $m_xa = danhmuchanhchinh::where('id', $model_dv->madiaban)->first();
        $m_huyen = danhmuchanhchinh::where('maquocgia', $m_xa->parent)->first();
        if (in_array(session('admin')->sadmin, ['SSA', 'ssa', 'ADMIN'])) {


            // $m_xa=danhmuchanhchinh::where('id',$model_dv->madiaban)->first();
            $model_huyen = danhmuchanhchinh::where('capdo', 'H')->get();
            $inputs['mahuyen'] = $inputs['mahuyen'] ?? $model_huyen->first()->maquocgia;
            $a_huyen = array_column($model_huyen->toarray(), 'name', 'maquocgia');
            $a_xa = danhmuchanhchinh::join('dmdonvi', 'dmdonvi.madiaban', 'danhmuchanhchinh.id')
                ->select('dmdonvi.madv', 'danhmuchanhchinh.name')
                ->where('parent', $inputs['mahuyen'])->get();
        } elseif (session('admin')->capdo == 'X') {
            // $m_xa=danhmuchanhchinh::where('id',$model_dv->madiaban)->first();
            // $m_huyen=danhmuchanhchinh::where('maquocgia',$m_xa->parent)->first();       
            $inputs['mahuyen'] = $inputs['mahuyen'] ?? $m_huyen->maquocgia;
            $a_xa = danhmuchanhchinh::join('dmdonvi', 'dmdonvi.madiaban', 'danhmuchanhchinh.id')
                ->select('dmdonvi.madv', 'danhmuchanhchinh.name', 'danhmuchanhchinh.parent')
                ->where('madv', $inputs['madv'])->get();
            $a_huyen = array_column(danhmuchanhchinh::where('maquocgia', $a_xa->first()->parent)->get()->toarray(), 'name', 'maquocgia');
        } elseif (session('admin')->capdo == 'H') {
            $model_huyen = danhmuchanhchinh::where('maquocgia', session('admin')->maquocgia)->get();
            $a_huyen = array_column($model_huyen->toarray(), 'name', 'maquocgia');
            $inputs['mahuyen'] = $inputs['mahuyen'] ?? $model_huyen->first()->maquocgia;
            $a_xa = danhmuchanhchinh::join('dmdonvi', 'dmdonvi.madiaban', 'danhmuchanhchinh.id')
                ->select('dmdonvi.madv', 'danhmuchanhchinh.name')
                ->where('parent', $inputs['mahuyen'])->get();
        }
        // dd($inputs);
        foreach ($lds as $ct) {
            $ct->tenxa = ucwords($m_xa->name);
            $ct->tenhuyen = ucwords($m_huyen->name);

            if ($ct->tinhtranghdkt == 1) {
                $ct->noilamviec = $ct->tenxa . ', ' . $ct->tenhuyen;
            }
        }

        $m_diaban = danhmuchanhchinh::all();
        $inputs['url'] = '/nhankhau/danhsach';
        // dd($inputs['madv']);
        $dmdonvi = dmdonvi::all();
        $danhsach = danhsach::all();
        return view('admin.nhankhau.all', compact('danhsach', 'dmdonvi'))
            ->with('lds', $lds)
            ->with('baocao', getdulieubaocao())
            ->with('a_huyen', $a_huyen)
            ->with('a_xa', $a_xa)
            ->with('a_dsdv', array_column($m_donvi->toarray(), 'tendv', 'madv'))
            ->with('inputs', $inputs)
            ->with('danhsachtinhtrangvl', danhsachtinhtrangvl())
            ->with('a_kydieutra', $a_kydieutra)
            ->with('m_diaban', $m_diaban)
            ->with('m_donvi', $m_donvi)
            ->with('dmhc', $dmhc_list)
            ->with('search', $search)
            ->with('gioitinh_filter', $gioitinh_filter)
            ->with('age_filter', $age_filter);
    }
    public function nguoitimviec(Request $request)
    {

        if (!chkPhanQuyen('danhsachnhankhau', 'danhsach')) {
            return view('errors.noperm')->with('machucnang', 'nhankhau');
        }
        $request = request();
        $inputs = $request->all();
        //filter
        $search = $request->search;
        $gioitinh_filter = $request->gioitinh_filter;
        $age_filter = $request->age_filter;

        $dmhc_list
            = $this->getdanhmuc();

        $dm_filter = $request->dm_filter;

        $export = $request->export;
        if ($export) {

            return Excel::download(new AdminNhankhausExport, 'danhsachnhankhau.xlsx');
        }
        $m_donvi = getDonVi(session('admin')->sadmin);
        $inputs['madv'] = $inputs['madv'] ?? $m_donvi->first()->madv;
        // $a_kydieutra = array_column(danhsach::where('kydieutra', '!=', 2022)->get()->toarray(), 'kydieutra', 'kydieutra');
        $a_kydieutra = array_column(danhsach::all()->toarray(), 'kydieutra', 'kydieutra');
        $kydieutra = danhsach::where('kydieutra', '!=', 2022)->orderBy('id', 'desc')->first();
        $inputs['kydieutra'] = $inputs['kydieutra'] ?? (isset($kydieutra) ? $kydieutra->kydieutra : '');
        $lds = nhankhauModel::where('kydieutra', $inputs['kydieutra'])
            ->where('madv', $inputs['madv'])->where('loaibiendong', '!=', 2)->get();
        $model_dv = dmdonvi::where('madv', $inputs['madv'])->first();
        $m_xa = danhmuchanhchinh::where('id', $model_dv->madiaban)->first();
        $m_huyen = danhmuchanhchinh::where('maquocgia', $m_xa->parent)->first();
        if (in_array(session('admin')->sadmin, ['SSA', 'ssa', 'ADMIN'])) {


            // $m_xa=danhmuchanhchinh::where('id',$model_dv->madiaban)->first();
            $model_huyen = danhmuchanhchinh::where('capdo', 'H')->get();
            $inputs['mahuyen'] = $inputs['mahuyen'] ?? $model_huyen->first()->maquocgia;
            $a_huyen = array_column($model_huyen->toarray(), 'name', 'maquocgia');
            $a_xa = danhmuchanhchinh::join('dmdonvi', 'dmdonvi.madiaban', 'danhmuchanhchinh.id')
                ->select('dmdonvi.madv', 'danhmuchanhchinh.name')
                ->where('parent', $inputs['mahuyen'])->get();
        } elseif (session('admin')->capdo == 'X') {
            // $m_xa=danhmuchanhchinh::where('id',$model_dv->madiaban)->first();
            // $m_huyen=danhmuchanhchinh::where('maquocgia',$m_xa->parent)->first();       
            $inputs['mahuyen'] = $inputs['mahuyen'] ?? $m_huyen->maquocgia;
            $a_xa = danhmuchanhchinh::join('dmdonvi', 'dmdonvi.madiaban', 'danhmuchanhchinh.id')
                ->select('dmdonvi.madv', 'danhmuchanhchinh.name', 'danhmuchanhchinh.parent')
                ->where('madv', $inputs['madv'])->get();
            $a_huyen = array_column(danhmuchanhchinh::where('maquocgia', $a_xa->first()->parent)->get()->toarray(), 'name', 'maquocgia');
        } elseif (session('admin')->capdo == 'H') {
            $model_huyen = danhmuchanhchinh::where('maquocgia', session('admin')->maquocgia)->get();
            $a_huyen = array_column($model_huyen->toarray(), 'name', 'maquocgia');
            $inputs['mahuyen'] = $inputs['mahuyen'] ?? $model_huyen->first()->maquocgia;
            $a_xa = danhmuchanhchinh::join('dmdonvi', 'dmdonvi.madiaban', 'danhmuchanhchinh.id')
                ->select('dmdonvi.madv', 'danhmuchanhchinh.name')
                ->where('parent', $inputs['mahuyen'])->get();
        }
        // dd($inputs);
        foreach ($lds as $ct) {
            $ct->tenxa = ucwords($m_xa->name);
            $ct->tenhuyen = ucwords($m_huyen->name);

            if ($ct->tinhtranghdkt == 1) {
                $ct->noilamviec = $ct->tenxa . ', ' . $ct->tenhuyen;
            }
        }
        $m_diaban = danhmuchanhchinh::all();
        $inputs['url'] = '/nguoitimviec/danhsach';
        // dd($inputs['madv']);
        $dmdonvi = dmdonvi::all();
        $danhsach = danhsach::all();
        return view('admin.nguoitimviec.index', compact('danhsach', 'dmdonvi'))
            ->with('lds', $lds)
            ->with('baocao', getdulieubaocao())
            ->with('a_huyen', $a_huyen)
            ->with('a_xa', $a_xa)
            ->with('a_dsdv', array_column($m_donvi->toarray(), 'tendv', 'madv'))
            ->with('inputs', $inputs)
            ->with('danhsachtinhtrangvl', danhsachtinhtrangvl())
            ->with('a_kydieutra', $a_kydieutra)
            ->with('m_diaban', $m_diaban)
            ->with('m_donvi', $m_donvi)
            ->with('dmhc', $dmhc_list)
            ->with('search', $search)
            ->with('gioitinh_filter', $gioitinh_filter)
            ->with('age_filter', $age_filter);
    }
    public function show_ho(Request $request)
    {
        if (!chkPhanQuyen('danhsachhogiadinh', 'danhsach')) {
            return view('errors.noperm')->with('machucnang', 'hogiadinh');
        }
        $request = request();
        $inputs = $request->all();
        //filter
        $search = $request->search;


        $huyen_list = $this->getDmhc();
        $dmhc_list = $this->getdanhmuc();
        $huyen_filter = $request->huyen;
        $xa_filter = $request->xa;

        $export = $request->export;
        if ($export) {

            return Excel::download(new AdminNhankhausExport, 'danhsachnhankhau.xlsx');
        }

        $m_donvi = getDonVi(session('admin')->sadmin);
        $inputs['madv'] = $inputs['madv'] ?? $m_donvi->first()->madv;
        $a_kydieutra = array_column(danhsach::all()->toarray(), 'kydieutra', 'kydieutra');
        $kydieutra = danhsach::orderBy('id', 'desc')->first();
        $inputs['kydieutra'] = $inputs['kydieutra'] ?? (isset($kydieutra) ? $kydieutra->kydieutra : '');

        // $lds = Nhankhau::join('danhsach', 'danhsach.id', 'nhankhau.danhsach_id')
        //     ->select('nhankhau.id', 'nhankhau.danhsach_id', 'nhankhau.hoten', 'nhankhau.cccd', 'nhankhau.ngaysinh', 'nhankhau.mqh', 'nhankhau.diachi', 'nhankhau.noilamviec')
        //     ->where('danhsach.kydieutra', $inputs['kydieutra'])
        //     ->where('mqh', "CH");
        $lds = nhankhauModel::where('madv', $inputs['madv'])->where('kydieutra', 'like', '%' . $inputs['kydieutra'] . '%')->where('mqh', 'CH')->get();
        // $donvi = User::where('madv', $inputs['madv'])->first();

        $model_dv = dmdonvi::where('madv', $inputs['madv'])->first();
        $m_xa = danhmuchanhchinh::where('id', $model_dv->madiaban)->first();
        $m_huyen = danhmuchanhchinh::where('maquocgia', $m_xa->parent)->first();
        if (in_array(session('admin')->sadmin, ['SSA', 'ssa', 'ADMIN'])) {


            // $m_xa=danhmuchanhchinh::where('id',$model_dv->madiaban)->first();
            $model_huyen = danhmuchanhchinh::where('capdo', 'H')->get();
            $inputs['mahuyen'] = $inputs['mahuyen'] ?? $model_huyen->first()->maquocgia;
            $a_huyen = array_column($model_huyen->toarray(), 'name', 'maquocgia');
            $a_xa = danhmuchanhchinh::join('dmdonvi', 'dmdonvi.madiaban', 'danhmuchanhchinh.id')
                ->select('dmdonvi.madv', 'danhmuchanhchinh.name')
                ->where('parent', $inputs['mahuyen'])->get();
        } elseif (session('admin')->capdo == 'X') {
            // $m_xa=danhmuchanhchinh::where('id',$model_dv->madiaban)->first();
            // $m_huyen=danhmuchanhchinh::where('maquocgia',$m_xa->parent)->first();       
            $inputs['mahuyen'] = $inputs['mahuyen'] ?? $m_huyen->maquocgia;
            $a_xa = danhmuchanhchinh::join('dmdonvi', 'dmdonvi.madiaban', 'danhmuchanhchinh.id')
                ->select('dmdonvi.madv', 'danhmuchanhchinh.name', 'danhmuchanhchinh.parent')
                ->where('madv', $inputs['madv'])->get();
            $a_huyen = array_column(danhmuchanhchinh::where('maquocgia', $a_xa->first()->parent)->get()->toarray(), 'name', 'maquocgia');
        } elseif (session('admin')->capdo == 'H') {
            $model_huyen = danhmuchanhchinh::where('maquocgia', session('admin')->maquocgia)->get();
            $a_huyen = array_column($model_huyen->toarray(), 'name', 'maquocgia');
            $inputs['mahuyen'] = $inputs['mahuyen'] ?? $model_huyen->first()->maquocgia;
            $a_xa = danhmuchanhchinh::join('dmdonvi', 'dmdonvi.madiaban', 'danhmuchanhchinh.id')
                ->select('dmdonvi.madv', 'danhmuchanhchinh.name')
                ->where('parent', $inputs['mahuyen'])->get();
        }

        $inputs['url'] = '/nhankhau/hogiadinh';
        return view('admin.nhankhau.hogd')
            ->with('lds', $lds)
            ->with('baocao', getdulieubaocao())
            ->with('danhsachtinhtrangvl', danhsachtinhtrangvl())
            ->with('a_huyen', $a_huyen)
            ->with('a_xa', $a_xa)
            ->with('a_dsdv', array_column($m_donvi->toarray(), 'tendv', 'madv'))
            ->with('inputs', $inputs)
            ->with('a_kydieutra', $a_kydieutra)
            ->with('huyen_list', $huyen_list)
            ->with('dmhc_list', $dmhc_list)
            ->with('search', $search)
            ->with('xa_filter', $xa_filter)
            ->with('huyen_filter', $huyen_filter);
    }
    public function getHoInfo($dsid)
    {

        $danhsach = DB::table('danhsach')
            ->where('id', $dsid)
            ->get();
        return $danhsach;
    }
    public function getDmhc()
    {
        $cats = DB::table('danhmuchanhchinh')
            ->where('level', 'huyện')
            ->orwhere('level', 'Thị xã')
            ->orwhere('level', 'thành phố')->get();
        return $cats;
    }
    public function getParams($paramtype)
    {
        $type = DB::table('paramtype')->where('name', $paramtype)->get()->first();
        $cats = DB::table('param')->where('type', $type->id)->get();
        return $cats;
    }

    public function new()
    {
    }

    public function save(Request $request)
    {
    }

    public function editho(Request $request, $nkid)
    {
        $request = request();
        $model = new Nhankhau();

        $ld = $model::find($nkid);
        $inputs = $request->all();
        //filter
        $search = $request->search;
        $gioitinh_filter = $request->gioitinh_filter;
        $age_filter = $request->age_filter;

        $dmhc_list = $this->getdanhmuc();

        $dm_filter = $request->dm_filter;

        $lds = DB::table('nhankhau')
            ->when($search, function ($query, $search) {
                return $query->whereRaw("(hoten like  '%" . $search . "%' OR cmnd like '%" . $search . "%')");
            })


            ->when($gioitinh_filter, function ($query, $gioitinh_filter) {
                return $query->where('nhankhau.gioitinh', 'like', '%' . $gioitinh_filter . '%');
            })

            ->when($ld, function ($query, $ld) {
                return $query->where('nhankhau.ho', '=', $ld->ho);
            })
            ->when($ld, function ($query, $ld) {
                return $query->where('nhankhau.danhsach_id', '=', $ld->danhsach_id);
            })
            ->when($age_filter, function ($query, $age_filter) {
                return $query->whereRaw("YEAR(GETDATE())-YEAR(ngaysinh) > " . $age_filter);
            })
            ->where('kydieutra', 'like', '%' . $inputs['kydieutra'] . '%')
            ->get();
        $inputs['nkid'] = $nkid;
        return view('admin.nhankhau.editho')
            ->with('lds', $lds)
            ->with('baocao', getdulieubaocao())
            ->with('danhsachtinhtrangvl', danhsachtinhtrangvl())
            ->with('inputs', $inputs)
            ->with('dmhc', $dmhc_list)
            ->with('search', $search)
            ->with('gioitinh_filter', $gioitinh_filter)
            ->with('age_filter', $age_filter);
    }


    public function edit(Request $request, $nkid)
    {
        if (!chkPhanQuyen('danhsachnhankhau', 'thaydoi')) {
            return view('errors.noperm')->with('machucnang', 'nhankhau');
        }
        $inputs = $request->all();
        $countries_list = getCountries();
        // get params
        $dmhc = $this->getdanhmuc();
        // $list_cmkt = $this->getParamsByNametype('Trình độ CMKT');
        // $list_tdgd = $this->getParamsByNametype('Trình độ học vấn');
        $list_cmkt = dmtrinhdokythuat::all();
        $list_tdgd = dmtrinhdogdpt::all();
        $list_nghe = $this->getParamsByNametype('Nghề nghiệp người lao động');
        // $list_vithe = $this->getParamsByNametype('Vị thế việc làm');
        // $list_linhvuc = $this->getParamsByNametype('Lĩnh vực đào tạo');
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
        $model = new Nhankhau();
        $ld = $model::find($nkid);
        $m_nganhnghe = dmnganhnghe::all();
        // dd($inputs);
        $inputs['kydieutra'] = $ld->kydieutra;
        if (isset($inputs['loailoi'])) {
            return view('admin.nhankhau.edit_loi')
                ->with('ld', $ld)
                ->with('baocao', getdulieubaocao())
                ->with('inputs', $inputs)
                ->with('loailoi', $inputs['loailoi'])
                ->with('m_uutien', $m_uutien)
                ->with('m_tinhtrangvl', $m_tinhtrangvl)
                ->with('m_vithevl', $m_vithevl)
                ->with('lydo', $lydo)
                ->with('m_hopdongld', $m_hopdongld)
                ->with('m_thoigianthatnghiep', $m_thoigianthatnghiep)
                ->with('m_nguoithatnghiep', $m_nguoithatnghiep)
                ->with('m_loaihinhkt', $m_loaihinhkt)
                ->with('a_thamgiabaohiem', $a_thamgiabaohiem)
                ->with('countries_list', $countries_list)
                ->with('dmhc', $dmhc)
                ->with('list_cmkt', $list_cmkt)
                ->with('list_tdgd', $list_tdgd)
                ->with('list_nghe', $list_nghe)
                // ->with('list_vithe', $list_vithe)
                // ->with('list_linhvuc', $list_linhvuc)
                ->with('list_hdld', $list_hdld);
        } else {
            return view('admin.nhankhau.edit')
                ->with('ld', $ld)
                ->with('baocao', getdulieubaocao())
                ->with('inputs', $inputs)
                ->with('m_uutien', $m_uutien)
                // ->with('m_tinhtrangvl', $m_tinhtrangvl)
                // ->with('m_vithevl', $m_vithevl)
                // ->with('lydo', $lydo)
                // ->with('m_hopdongld', $m_hopdongld)
                // ->with('m_thoigianthatnghiep', $m_thoigianthatnghiep)
                // ->with('m_nguoithatnghiep', $m_nguoithatnghiep)
                // ->with('m_loaihinhkt', $m_loaihinhkt)
                // ->with('a_thamgiabaohiem', $a_thamgiabaohiem)
                ->with('countries_list', $countries_list)
                ->with('dmhc', $dmhc)
                ->with('list_cmkt', $list_cmkt)
                ->with('list_tdgd', $list_tdgd)
                ->with('list_nghe', $list_nghe)
                ->with('m_nganhnghe', $m_nganhnghe)
                // ->with('list_vithe', $list_vithe)
                // ->with('list_linhvuc', $list_linhvuc)
                ->with('list_hdld', $list_hdld);
        }
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


    public function inchitiet(Request $request)
    {
        $inputs = $request->all();
        $model = Nhankhau::where('madv', $request->madv)->where('kydieutra', $inputs['kydieutra'])->get();
        $m_danhmuc = danhmuchanhchinh::join('dmdonvi', 'dmdonvi.madiaban', 'danhmuchanhchinh.id')
            ->select('danhmuchanhchinh.*', 'dmdonvi.madv')
            ->get();
        $m_donvi = $m_danhmuc->where('madv', $inputs['madv'])->first();
        $m_donvi->huyen = $m_danhmuc->where('maquocgia', $m_donvi->parent)->first()->name;
        return view('admin.nhankhau.inchitiet', compact('model'))
            ->with('m_donvi', $m_donvi)
            ->with('inputs', $inputs)
            ->with('pageTitle', 'Danh sách thông tin chi tiết cung lao động');
    }

    public function inchitiethgd(Request $request)
    {

        $hgd = Nhankhau::where('id', $request->id)->first();
        $model = Nhankhau::where('ho', $hgd->ho)->where('madv', $hgd->madv)->join('danhsach', 'danhsach.id', 'Nhankhau.danhsach_id')
            ->select('Nhankhau.*', 'danhsach.user_id')->get();
        return view('admin.nhankhau.inchitiet', compact('model'))
            ->with('pageTitle', 'Danh sách thông tin chi tiết hộ gia đình');
    }

    public function ajax_getxa(Request $request)
    {
        $inputs = $request->all();
        $m_xa = danhmuchanhchinh::join('dmdonvi', 'dmdonvi.madiaban', 'danhmuchanhchinh.id')
            ->select('dmdonvi.madv', 'danhmuchanhchinh.name')
            ->where('parent', $inputs['mahuyen'])->get();

        $html = ' <option class="xa" value="">--- Chọn xã --</option>';
        foreach ($m_xa as $ct) {

            $html .= ' <option class="xa" value="' . $ct->madv . '">' . $ct->name . '</option>';
        }

        return response()->json($html);
    }


    public function innguoilaodong(Request $request)
    {

        $model = Nhankhau::find($request->id);
        $uutien = dmdoituonguutien::all();
        $trinhdogdpt = dmtrinhdogdpt::all();
        $trinhdocmkt = dmtrinhdokythuat::all();
        $dmtinhtrangthamgiahdkt = dmtinhtrangthamgiahdkt::all();
        $dmvithevieclam = dmtinhtrangthamgiahdktct2::where('manhom2', '20221220175800')->get();
        $dmthatnggiep = dmtinhtrangthamgiahdktct::where('manhom', '20221220175720')->get();
        $tgthatnghiep = dmthoigianthatnghiep::all();
        $khongthamgiahdkt = dmtinhtrangthamgiahdktct::where('manhom', '20221220175728')->get();
        $hdld = dmloaihieuluchdld::all();
        $bhxh = [1 => 'Bắt buộc', 2 => 'Tự nguyện', 3 => 'Không tham gia'];

        $m_danhmuc = danhmuchanhchinh::join('dmdonvi', 'dmdonvi.madiaban', 'danhmuchanhchinh.id')
            ->select('danhmuchanhchinh.*', 'dmdonvi.madv')
            ->where('capdo', 'X')
            ->where('level', 'Xã')
            ->get();
        if (count($m_danhmuc) > 0) {
            $khuvuc = 'nongthon';
        } else {
            $khuvuc = 'thanhthi';
        }
        $m_nganhnghe = dmnganhnghe::all();
        $loaihinhkt=dmloaihinhhdkt::all();
        $a_nganhnghe = array_column($m_nganhnghe->toarray(), 'tendm', 'madm');
        return view('admin.nhankhau.innguoilaodong', compact(
            'model',
            'uutien',
            'trinhdogdpt',
            'trinhdocmkt',
            'dmtinhtrangthamgiahdkt',
            'dmvithevieclam',
            'dmthatnggiep',
            'tgthatnghiep',
            'khongthamgiahdkt',
            'hdld',
            'bhxh',
            'khuvuc',
            'a_nganhnghe',
            'loaihinhkt'
        ))
            ->with('pageTitle', 'Thông tin chi tiết người lao động');
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $inputs = $request->all();
        $loailoi = $inputs['loailoi'] ?? '';
        $kydieutra = $inputs['kydieutra'];
        // $model=DB::table('nhankhau')->where('id',$id)->first();
        $model = nhankhauModel::findOrFail($id);
        unset($inputs['_token'], $inputs['kydieutra']);
        if (isset($inputs['loailoi'])) {
            $sualoi = strtoupper(chuyenkhongdau(str_replace(' ', '', $inputs['loailoi'])));
            unset($inputs['loailoi']);
            $a_maloi = explode(';', $model->maloailoi);
            $maloi = '';
            foreach ($a_maloi as $val) {
                if ($val != $sualoi) {
                    $maloi .= $val . ';';
                }
            }
            $inputs['maloailoi'] = $maloi;

            $m_danhsach = danhsach::where('user_id', $model->madv)->where('kydieutra', $kydieutra)->first();
            switch ($sualoi) {
                case 'LOAI1':
                    $loi_ngaysinh = $m_danhsach->loi_ngaysinh - 1;
                    $m_danhsach->update(['loi_ngaysinh' => $loi_ngaysinh]);
                    break;
                case 'LOAI2':
                    $loi_loai2 = $m_danhsach->loi_loai2 - 1;
                    $m_danhsach->update(['loi_loai2' => $loi_loai2]);
                    break;
                case 'LOAI3':
                    $loi_loai3 = $m_danhsach->loi_loai3 - 1;
                    $m_danhsach->update(['loi_loai3' => $loi_loai3]);
                    break;
                case 'LOAI4':
                    $loi_loai4 = $m_danhsach->loi_loai4 - 1;
                    $m_danhsach->update(['loi_loai4' => $loi_loai4]);
                    break;
            }
        }
        $note = '';
        $model->fill($inputs);
        $dirty = $model->getDirty();
        // dd($dirty);
        $sqty = count($dirty);

        $danhsach = array();
        $biendong = false;
        // $danhsach[]=$model->cccd;
        $arr_biendong = array('trinhdogiaoduc', 'chuyenmonkythuat', 'chuyennganh', 'tinhtranghdkt', 'nguoicovieclam', 'congvieccuthe', 'loaihinhnoilamviec', 'thatnghiep', 'thoigianthatnghiep', 'khongthamgiahdkt');
        foreach ($dirty as $field => $newdata) {
            $olddata = $model->getOriginal($field);
            if ($olddata != $newdata && in_array($field, $arr_biendong)) {
                //    $danhsach[]=$field. " thay đổi từ ".$olddata." sang ".$newdata;
                $danhsach[] = $field;
                $biendong = true;
            }
        }
        // dd($danhsach);
        $user = User::where('madv', $model->madv)->first()->id;
        $model_check = nhankhauModel::findOrFail($id);
        $tonghopcld = tonghopcunglaodong::where('madv', $model->madv)->where('kydieutra', $model->kydieutra)->first();

        if ($model_check->vieclammongmuon == '1') {
            if ($inputs['vieclammongmuon'] == '2') {
                $xa['trongnuoc'] = $tonghopcld->trongnuoc - 1;
                $xa['nuocngoai'] = $tonghopcld->nuocngoai + 1;
            }
            if ($inputs['vieclammongmuon'] == '3') {
                $xa['nuocngoai'] = $tonghopcld->nuocngoai + 1;
            }
        }
        if ($model_check->vieclammongmuon == '2') {
            if ($inputs['vieclammongmuon'] == '1') {
                $xa['trongnuoc'] = $tonghopcld->trongnuoc + 1;
                $xa['nuocngoai'] = $tonghopcld->nuocngoai - 1;
            }
            if ($inputs['vieclammongmuon'] == '3') {
                $xa['trongnuoc'] = $tonghopcld->trongnuoc + 1;
            }
        }
        if ($model_check->vieclammongmuon == '3') {
            if ($inputs['vieclammongmuon'] == '1') {
                $xa['nuocngoai'] = $tonghopcld->nuocngoai - 1;
            }
            if ($inputs['vieclammongmuon'] == '2') {
                $xa['trongnuoc'] = $tonghopcld->trongnuoc - 1;
            }
        }
        if ($model_check->nganhnghemuonhoc != null) {
            if ($inputs['nganhnghemuonhoc'] == null) {
                $xa['hocnghe'] = $tonghopcld->hocnghe - 1;
            }
        } else {
            if ($inputs['nganhnghemuonhoc'] != null) {
                $xa['hocnghe'] = $tonghopcld->hocnghe + 1;
            }
        }
        if (isset($xa)) {
            $tonghopcld->update($xa);
        }



        if ($sqty > 0) {
            if ($biendong) {
                $inputs['loaibiendong'] = 3;
                $note = implode(";", $danhsach);
                $inputs['truongbiendong'] = $note;
                // dd($note);
                //Tính xem nhân khẩu đã có cập nhật chưa
                $nhankhau_capnhat = DB::table('report')->where('user', $user)->where('kydieutra', $model->kydieutra)->where('lastid', $model->id)->first();

                if (isset($nhankhau_capnhat)) {
                    DB::table('report')->where('user', $user)->where('kydieutra', $model->kydieutra)->where('lastid', $model->id)->update(['note' => $note]);
                } else {
                    $rm = new Report();
                    // $note= $request->note.' . '.$sqty." mục thay đổi  ." . implode( " . ",$danhsach);

                    $rm->report('updateinfo', "1", 'nhankhau', $model->id, 1, $note, $user, $model->kydieutra);
                }
            }
            // $inputs['loaibiendong']=3;//cập nhật thông tin
            // $tonghopcld = tonghopcunglaodong::where('madv',$model->madv)->where('kydieutra',$model->kydieutra)->first();

            // if ($model->tinhtranghdkt == '1' ) {
            //     if ($inputs['tinhtranghdkt'] == '2') {
            //         $xa['ldthatnghiep'] = $tonghopcld->ldthatnghiep + 1;
            //     }
            //     if ($inputs['tinhtranghdkt'] =='3') {
            //         $xa['ldkhongthamgia'] = $tonghopcld->ldkhongthamgia + 1;
            //     }
            //     $xa['ldcovieclam'] = $tonghopcld->ldcovieclam - 1;
            // }
            // if ($model->tinhtranghdkt == '2') {
            //     if ($inputs['tinhtranghdkt'] == '1') {
            //         $xa['ldcovieclam'] = $tonghopcld->ldcovieclam + 1;
            //     }
            //     if ($inputs['tinhtranghdkt'] == '3') {
            //         $xa['ldkhongthamgia'] = $tonghopcld->ldkhongthamgia + 1;
            //     }
            //     $xa['ldthatnghiep'] = $tonghopcld->ldthatnghiep - 1;
            // } 
            // if ($model->tinhtranghdkt == '3') {
            //     if ($inputs['tinhtranghdkt'] == '1') {
            //         $xa['ldcovieclam'] = $tonghopcld->ldcovieclam + 1;
            //     }
            //     if ($inputs['tinhtranghdkt'] == '2') {
            //         $xa['ldthatnghiep'] = $tonghopcld->ldthatnghiep + 1;
            //     }
            //     $xa['ldkhongthamgia'] = $tonghopcld->ldkhongthamgia - 1;
            // } 
            // if ($model->tinhtranghdkt == null) {
            //     if ($inputs['tinhtranghdkt'] == '1') {
            //         $xa['ldcovieclam'] = $tonghopcld->ldcovieclam + 1;
            //     }
            //     if ($inputs['tinhtranghdkt'] == '2') {
            //         $xa['ldthatnghiep'] = $tonghopcld->ldthatnghiep + 1;
            //     }
            //     if ($inputs['tinhtranghdkt'] == '3') {
            //         $xa['ldkhongthamgia'] = $tonghopcld->ldkhongthamgia + 1;
            //     }
            // } 
            // if ($inputs['tinhtranghdkt'] != null) {
            //     $tonghopcld->update($xa);
            // }

            // $ch = nhankhauModel::where('madv', $model->madv)->where('kydieutra', $kydieutra)->where('ho', $model->ho)->where('mqh', 'CH')->first();
            // if(ckdulieuloi($id) != []){
            $maloi = implode(';', ckdulieuloi($id));
            $model->update(['maloailoi' => $maloi]);
            // }

        }
        // dd($inputs);
        $model->update($inputs);
        if (isset($sualoi)) {
            return redirect('/dieutra/danhsachloi_chitiet?loailoi=' . $sualoi . '&madv=' . $model->madv . '&kydieutra=' . $model->kydieutra);
        } else if ($inputs['view'] == 'nhankhau') {
            return redirect('/nhankhau/danhsach?madv=' . $model->madv . '&kydieutra=' . $model->kydieutra . '&mahuyen=' . $inputs['mahuyen']);
        }
        // else if ($inputs['view'] == 'ho') {
        //     return redirect('/nhankhau/ChiTietHoGiaDinh/' . $ch->id . '?soho=' . $ch->ho . '&madv=' . $model->madv . '&kydieutra=' . $model->kydieutra . '&mahuyen=' . $inputs['mahuyen']);
        // }
    }

    public function danhsach(Request $request)
    {
        $inputs = $request->all();

        if ($inputs['tinhtrang'] != 4) {
            $model = nhankhauModel::where('madv', $inputs['madv'])->where('kydieutra', $inputs['kydieutra'])->where('tinhtranghdkt', $inputs['tinhtrang'])->where('loaibiendong', '!=', 2)->get();
        } else {
            $model = nhankhauModel::where('madv', $inputs['madv'])->where('kydieutra', $inputs['kydieutra'])->where('tinhtranghdkt', 3)->where('khongthamgiahdkt', 1)->where('loaibiendong', '!=', 2)->get();
            foreach ($model as $val) {
                $ns = str_replace('/', '-', $val->ngaysinh);
                $ns1 = str_replace('--', '-', $ns);

                try {
                    $ngaysinh = Carbon::parse($ns1)->format('Y-m-d');
                } catch (Exception $e) {
                    echo 'Message: ' . $e->getMessage();
                }
                $val->tuoi = getAge($ngaysinh);
            }
            $model = $model->where('tuoi', 17);
        }
        $m_danhmuc = danhmuchanhchinh::join('dmdonvi', 'dmdonvi.madiaban', 'danhmuchanhchinh.id')
            ->select('danhmuchanhchinh.*', 'dmdonvi.madv')
            ->get();

        $m_donvi = $m_danhmuc->where('madv', $inputs['madv'])->first();
        $m_donvi->huyen = $m_danhmuc->where('maquocgia', $m_donvi->parent)->first()->name;

        return view('admin.nhankhau.danhsach_tinhtrangvieclam')
            ->with('model', $model)
            ->with('inputs', $inputs)
            ->with('m_donvi', $m_donvi)
            ->with('danhsachtinhtrangvl', danhsachtinhtrangvl())
            ->with('pageTitle', 'Danh sách tình trạng hoạt động');
    }

    public function XoaHoGD(Request $request)
    {
        $inputs = $request->all();
        $model = nhankhauModel::where('madv', $inputs['madv'])->where('kydieutra', 'like', '%' . $inputs['kydieutra'] . '%')->where('ho', $inputs['ho'])->get();
        if (count($model) > 0) {
            foreach ($model as $val) {
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
                // $val->delete();
            }
            $danhsach = danhsach::where('user_id', $inputs['madv'])->where('kydieutra', $inputs['kydieutra'])->first();
            $soluong = $danhsach->soluong - count($model);
            $soho = $danhsach->soho - 1;
            if ($soluong > 0) {
                $danhsach->update(['soluong' => $soluong, 'soho' => $soho]);
            } else {
                $danhsach->delete();
            }
        }
        if (in_array(session('admin')->capdo, ['H', 'T'])) {
            $danhsach_conlai = danhsach::where('kydieutra', $inputs['kydieutra'])->get();
            $inputs['kydieutra'] = count($danhsach_conlai) > 0 ? $inputs['kydieutra'] : $inputs['kydieutra'] - 1;
        } else {
            $inputs['kydieutra'] = $inputs['kydieutra'] - 1;
        }

        return redirect('/nhankhau/hogiadinh?madv=' . $inputs['madv'] . '&kydieutra=' . $inputs['kydieutra'] . '&mahuyen=' . $inputs['mahuyen']);
    }

    public function XoaNhanKhau(Request $request, $id)
    {
        if (!chkPhanQuyen('danhsachnhankhau', 'thaydoi')) {
            return view('errors.noperm')->with('machucnang', 'nhankhau');
        }
        $inputs = $request->all();
        $model = nhankhauModel::findOrFail($id);

        $madv = $model->madv;
        // $kydieutra = $model->kydieutra;
        $danhsach = danhsach::where('user_id', $model->madv)->where('kydieutra', $inputs['kydieutra'])->first();
        $soho = $model->mqh == 'CH' ? $danhsach->soho - 1 : $danhsach->soho;
        $soluong = $danhsach->soluong - 1;
        $kydieutra = getKydieutra($model->kydieutra);

        if (in_array($inputs['kydieutra'], $kydieutra)) {
            $index = array_search($inputs['kydieutra'], $kydieutra);
            unset($kydieutra[$index]);

            $kydieutra = implode(';', $kydieutra);
            if ($kydieutra != '') {
                $model->update(['kydieutra' => $kydieutra]);
            } else {
                $model->delete();
            }
        }
        // dd($kydieutra);
        // $model->delete();
        $danhsach->update(['soluong' => $soluong, 'soho' => $soho]);
        $ho = nhankhauModel::where('ho', $model->ho)->where('madv', $model->madv)->where('kydieutra', 'like', '%' . $inputs['kydieutra'] . '%')->get();
        if (count($ho) > 0) {
            $ch = $ho->where('mqh', 'CH')->first();
            return redirect('/nhankhau/ChiTietHoGiaDinh/' . $ch->id . '?soho=' . $ch->ho . '&madv=' . $ch->madv . '&kydieutra=' . $inputs['kydieutra'] . '&mahuyen=' . $inputs['mahuyen']);
        } else {
            return redirect('/nhankhau/hogiadinh?madv=' . $madv . '&kydieutra=' . $inputs['kydieutra'] . '&mahuyen=' . $inputs['mahuyen']);
        }
    }

    public function baogiam($id, Request $request)
    {

        if (!chkPhanQuyen('danhsachnhankhau', 'thaydoi')) {
            return view('errors.noperm')->with('machucnang', 'nhankhau');
        }
        $model = nhankhauModel::findOrFail($id);
        $danhsach = danhsach::where('user_id', $model->madv)->where('kydieutra', $model->kydieutra)->first();
        $soluong = $danhsach->soluong - 1;
        $tonghopcld = tonghopcunglaodong::where('madv', $model->madv)->where('kydieutra', $model->kydieutra)->first();

        $ldtren15 = $tonghopcld->ldtren15 - 1;

        if ($model->vieclammongmuon == '1') {
            $xa['trongnuoc'] = $tonghopcld->trongnuoc - 1;
            $tonghopcld->update(['ldtren15' => $ldtren15, 'trongnuoc' => $xa['trongnuoc']]);
        }
        if ($model->vieclammongmuon == '2') {
            $xa['nuocngoai'] = $tonghopcld->nuocngoai - 1;
            $tonghopcld->update(['ldtren15' => $ldtren15, 'nuocngoai' => $xa['nuocngoai']]);
        }
        if ($model->vieclammongmuon == '3') {
            $xa['trongnuoc'] = $tonghopcld->trongnuoc - 1;
            $xa['nuocngoai'] = $tonghopcld->nuocngoai - 1;
            $tonghopcld->update(['ldtren15' => $ldtren15, 'trongnuoc' => $xa['trongnuoc'], 'nuocngoai' => $xa['nuocngoai']]);
        }
        if (isset($model->nganhnghemuonhoc)) {
            $xa['hocnghe'] = $tonghopcld->hocnghe - 1;
            $tonghopcld->update(['ldtren15' => $ldtren15, 'hocnghe' => $xa['hocnghe']]);
        }

        // if ($model->tinhtranghdkt == '1') {
        //     $xa['ldcovieclam'] = $tonghopcld->ldcovieclam - 1;
        //     $tonghopcld->update(['ldtren15' => $ldtren15, 'ldcovieclam' => $xa['ldcovieclam']]);
        // }
        // if ($model->tinhtranghdkt == '2') {
        //     $xa['ldthatnghiep'] = $tonghopcld->ldthatnghiep - 1;
        //     $tonghopcld->update(['ldtren15' => $ldtren15, 'ldthatnghiep' => $xa['ldcovieclam']]);
        // }
        // if ($model->tinhtranghdkt == '3') {
        //     $xa['ldkhongthamgia'] = $tonghopcld->ldkhongthamgia - 1;
        //     $tonghopcld->update(['ldtren15' => $ldtren15, 'ldkhongthamgia' => $xa['ldcovieclam']]);
        // }
        // if ($model->tinhtranghdkt == null) {

        //     $tonghopcld->update(['ldtren15' => $ldtren15]);
        // }

        $model->update(['loaibiendong' => 2, 'lydo' => $request->lydo]);
        $danhsach->update(['soluong' => $soluong]);

        return redirect('/biendong/danhsach_biendong?madv=' . $model->madv . '&kydieutra=' . $model->kydieutra . '&loaibiendong=2')
            ->with('success', 'Báo giảm thành công');
    }
}
