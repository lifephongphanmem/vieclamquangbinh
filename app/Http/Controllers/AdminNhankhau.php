<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Nhankhau;
use Session;
use Illuminate\Http\RedirectResponse;
use App\Exports\AdminNhankhausExport;
use App\Models\Danhmuc\danhmuchanhchinh;
use App\Models\Danhmuc\dmdonvi;
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
        return view('admin.nhankhau.all')
            ->with('lds', $lds)
            ->with('a_dsdv', array_column($m_donvi->toarray(), 'tendv', 'madv'))
            ->with('inputs', $inputs)
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
        $list_cmkt = $this->getParamsByNametype('Trình độ CMKT');
        $list_tdgd = $this->getParamsByNametype('Trình độ học vấn');
        $list_nghe = $this->getParamsByNametype('Nghề nghiệp người lao động');
        $list_vithe = $this->getParamsByNametype('Vị thế việc làm');
        $list_linhvuc = $this->getParamsByNametype('Lĩnh vực đào tạo');
        $list_hdld = $this->getParamsByNametype('Loại hợp đồng lao động');

        $model = new Nhankhau();

        $ld = $model::find($nkid);

        return view('admin.nhankhau.edit')
            ->with('ld', $ld)
            ->with('countries_list', $countries_list)
            ->with('dmhc', $dmhc)
            ->with('list_cmkt', $list_cmkt)
            ->with('list_tdgd', $list_tdgd)
            ->with('list_nghe', $list_nghe)
            ->with('list_vithe', $list_vithe)
            ->with('list_linhvuc', $list_linhvuc)
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
}
