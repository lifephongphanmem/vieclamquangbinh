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
use App\Models\Danhmuc\dmthoigianthatnghiep;
use App\Models\Danhmuc\dmtinhtrangthamgiahdkt;
use App\Models\Danhmuc\dmtinhtrangthamgiahdktct;
use App\Models\Danhmuc\dmtinhtrangthamgiahdktct2;
use App\Models\Danhmuc\dmtrinhdogdpt;
use App\Models\Danhmuc\dmtrinhdokythuat;
use App\Models\danhsach;
use App\Models\User;
use App\Models\view\view_nhankhau_danhsach;
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
        $request = request();
        $inputs=$request->all();
        //filter
        $search = $request->search;
        $gioitinh_filter = $request->gioitinh_filter;
        $age_filter = $request->age_filter;

        $dmhc_list = $this->getdanhmuc();

        $dm_filter = $request->dm_filter;

        $export = $request->export;
        if ($export) {

            return Excel::download(new AdminNhankhausExport, 'danhsachnhankhau.xlsx');
        }


        $m_donvi = getDonVi(session('admin')->sadmin);
        $inputs['madv'] = $inputs['madv'] ?? $m_donvi->first()->madv;
        $a_kydieutra=array_column(danhsach::all()->toarray(),'kydieutra','kydieutra');
        $kydieutra=danhsach::orderBy('id', 'desc')->first();
        $inputs['kydieutra'] = $inputs['kydieutra'] ?? (isset($kydieutra)?$kydieutra->kydieutra:'');
        $lds = view_nhankhau_danhsach::where('kydieutra',$inputs['kydieutra'])
        ->where('user_id',$inputs['madv'])->get();
        $model_dv=dmdonvi::where('madv',$inputs['madv'])->first();

        $m_xa=danhmuchanhchinh::where('id',$model_dv->madiaban)->first();
        $m_huyen=danhmuchanhchinh::where('maquocgia',$m_xa->parent)->first();

        $a_huyen=array_column(danhmuchanhchinh::where('capdo','H')->get()->toarray(),'name','maquocgia');
        $inputs['mahuyen']=isset($inputs['mahuyen'])??$inputs['mahuyen']=$m_huyen->maquocgia;

        $a_xa=danhmuchanhchinh::join('dmdonvi','dmdonvi.madiaban','danhmuchanhchinh.id')
                ->select('dmdonvi.madv','danhmuchanhchinh.name')
                ->where('parent',$inputs['mahuyen'])->get();

        foreach($lds as $ct){
            $ct->tenxa=ucwords($m_xa->name);
            $ct->tenhuyen=ucwords($m_huyen->name);

            if($ct->tinhtranghdkt == 1){
                $ct->noilamviec=$ct->tenxa .', '.$ct->tenhuyen;
            }
        }

        // $donvi=User::where('madv',$inputs['madv'])->first();
        // if (in_array($donvi->sadmin, ['SSA', 'ADMIN', 'ssa'])) {
        //     $lds = $lds;
        // } elseif ($donvi->capdo == 'H') {
        //     $huyen = danhmuchanhchinh::join('dmdonvi', 'dmdonvi.madiaban', 'danhmuchanhchinh.id')
        //         ->select('dmdonvi.madv', 'dmdonvi.tendv', 'danhmuchanhchinh.*')
        //         ->where('dmdonvi.madv', $inputs['madv'])
        //         ->first();
        //     $xa = danhmuchanhchinh::join('dmdonvi', 'dmdonvi.madiaban', 'danhmuchanhchinh.id')
        //         ->select('dmdonvi.madv', 'dmdonvi.tendv')
        //         ->where('danhmuchanhchinh.parent', $huyen->maquocgia)
        //         ->get();
        //      $a_xa=array_column($xa->toarray(),'madv');
        //     $lds = $lds->wherein('user_id', $a_xa)
        //         ;
        // }else{
        //     $lds = $lds->where('user_id', $inputs['madv'])
        //    ;
        // }
            // dd($lds);
        // $lds= DB::table('nhankhau')
        // 		->when($search, function ($query, $search) {
        //             return $query->whereRaw("(hoten like  '%".$search."%' OR cccd like '%".$search."%')");
        // 			})


        // 		->when($gioitinh_filter, function ($query, $gioitinh_filter) {
        //             return $query->where('nhankhau.gioitinh','like', '%'.$gioitinh_filter.'%');
        // 			})
        // 		->when($age_filter, function ($query, $age_filter) {
        //             return $query->whereRaw("YEAR(GETDATE())-YEAR(ngaysinh) > ".$age_filter);
        // 			})

        // 		->get();

        $inputs['url'] = '/nhankhau/danhsach';
        // dd($inputs['madv']);
        $dmdonvi = dmdonvi::all();
        $danhsach = danhsach::all();
        return view('admin.nhankhau.all', compact('danhsach','dmdonvi'))
            ->with('lds', $lds)
            ->with('a_huyen', $a_huyen)
            ->with('a_xa', $a_xa)
            ->with('a_dsdv', array_column($m_donvi->toarray(), 'tendv', 'madv'))
            ->with('inputs', $inputs)
            ->with('danhsachtinhtrangvl', danhsachtinhtrangvl())
            ->with('a_kydieutra', $a_kydieutra)
            ->with('dmhc', $dmhc_list)
            ->with('search', $search)
            ->with('gioitinh_filter', $gioitinh_filter)
            ->with('age_filter', $age_filter);
    }
    public function show_ho(Request $request)
    {
        $request = request();
        $inputs=$request->all();
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
        $a_kydieutra=array_column(danhsach::all()->toarray(),'kydieutra','kydieutra');
        $kydieutra=danhsach::orderBy('id', 'desc')->first();
        $inputs['kydieutra'] = $inputs['kydieutra'] ?? (isset($kydieutra)?$kydieutra->kydieutra:'');

        $lds = Nhankhau::join('danhsach', 'danhsach.id', 'nhankhau.danhsach_id')
        ->select('nhankhau.id', 'nhankhau.danhsach_id', 'nhankhau.hoten', 'nhankhau.cccd', 'nhankhau.ngaysinh', 'nhankhau.mqh', 'nhankhau.diachi', 'nhankhau.noilamviec')
        ->where('danhsach.kydieutra',$inputs['kydieutra'])
        ->where('mqh', "CH");
        
        $donvi=User::where('madv',$inputs['madv'])->first();
            if (in_array($donvi->sadmin, ['SSA', 'ADMIN', 'ssa'])) {
                $lds = $lds->get();
            } elseif ($donvi->capdo == 'H') {
                $huyen = danhmuchanhchinh::join('dmdonvi', 'dmdonvi.madiaban', 'danhmuchanhchinh.id')
                    ->select('dmdonvi.madv', 'dmdonvi.tendv', 'danhmuchanhchinh.*')
                    ->where('dmdonvi.madv', $inputs['madv'])
                    ->first();
                $xa = danhmuchanhchinh::join('dmdonvi', 'dmdonvi.madiaban', 'danhmuchanhchinh.id')
                    ->select('dmdonvi.madv', 'dmdonvi.tendv')
                    ->where('danhmuchanhchinh.parent', $huyen->maquocgia)
                    ->get();
                 $a_xa=array_column($xa->toarray(),'madv');
                $lds = $lds->wherein('danhsach.user_id', $a_xa)
                    ->get();
            }else{
                $lds = $lds->where('danhsach.user_id', $inputs['madv'])
                ->get();
            }

        // $lds = DB::table('nhankhau')
        //     ->join('danhsach', 'nhankhau.danhsach_id', '=', 'danhsach.id')
        //     ->when($search, function ($query, $search) {
        //         return $query->whereRaw("(nhankhau.hoten like  '%" . $search . "%' OR nhankhau.cccd like '%" . $search . "%')");
        //     })

        //     ->when($huyen_filter, function ($query, $huyen_filter) {
        //         return $query->whereRaw("(danhsach.huyen like  '%" . $huyen_filter . "%')");
        //     })
        //     ->when($xa_filter, function ($query, $xa_filter) {
        //         return $query->whereRaw("(danhsach.xa like  '%" . $xa_filter . "%')");
        //     })

        //     ->where('mqh', "CH")
        //     ->select('nhankhau.id', 'nhankhau.danhsach_id', 'nhankhau.hoten', 'nhankhau.cccd', 'nhankhau.ngaysinh', 'nhankhau.mqh', 'nhankhau.diachi', 'nhankhau.noilamviec')
        //     ->get();

            $inputs['url']='/nhankhau/hogiadinh';

        return view('admin.nhankhau.hogd')
            ->with('lds', $lds)
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

    public function editho($nkid)
    {
        $request = request();
        $model = new Nhankhau();

        $ld = $model::find($nkid);

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

            ->get();



        return view('admin.nhankhau.editho')
            ->with('lds', $lds)
            ->with('dmhc', $dmhc_list)
            ->with('search', $search)
            ->with('gioitinh_filter', $gioitinh_filter)
            ->with('age_filter', $age_filter);
    }


    public function edit($nkid)
    {

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
        $m_uutien=dmdoituonguutien::all();
        $m_tinhtrangvl=dmtinhtrangthamgiahdkt::all();
        $m_vithevl=dmtinhtrangthamgiahdktct2::all();
        $a_thamgiabaohiem=array('1'=>'Bắt buộc','2'=>'Tự nguyện','3'=>'Không tham gia');
        $m_hopdongld=dmloaihieuluchdld::all();
        $m_loaihinhkt=dmloaihinhhdkt::all();
        $dm_tinhtrangct=dmtinhtrangthamgiahdktct::all();
        $m_nguoithatnghiep=$dm_tinhtrangct->where('manhom',20221220175720);
        $lydo=$dm_tinhtrangct->where('manhom',20221220175728);
        $m_thoigianthatnghiep=dmthoigianthatnghiep::all();

        $model = new Nhankhau();

        $ld = $model::find($nkid);

        return view('admin.nhankhau.edit')
            ->with('ld', $ld)
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

    
    public function inchitiet(Request $request)
    {

        $model = Nhankhau::join('danhsach','danhsach.id' ,'Nhankhau.danhsach_id')->select('Nhankhau.*','danhsach.user_id');
       //kỳ điều tra
        if ($request->danhsach_id) {
            $model = $model->where('danhsach_id',$request->danhsach_id);
        }
     //đơn vị
        if ($request->user_id) {
          
            $model = $model->where('user_id',$request->user_id);
        }
        $model = $model->get();
   
        return view('admin.nhankhau.inchitiet',compact('model'))
        ->with('pageTitle', 'Danh sách thông tin chi tiết cung dụng lao động');
    }


public function ajax_getxa(Request $request)
{
    $inputs=$request->all();
    $m_xa=danhmuchanhchinh::join('dmdonvi','dmdonvi.madiaban','danhmuchanhchinh.id')
    ->select('dmdonvi.madv','danhmuchanhchinh.name')
    ->where('parent',$inputs['mahuyen'])->get();

    $html = ' <option class="xa" value="">--- Chọn xã --</option>';
    foreach($m_xa as $ct){
        
        $html .= ' <option class="xa" value="'.$ct->madv.'">'.$ct->name.'</option>';
    }

    return response()->json($html);
}
    
}
