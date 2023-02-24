<?php

namespace App\Http\Controllers\Baocao;

use App\Models\Company;
use App\Models\Danhmuc\dmloaihinhhdkt;
use App\Models\Nguoilaodong\nguoilaodong;
use App\Models\Caulaodong\nhucautuyendung;
use App\Models\Caulaodong\nhucautuyendungct;
use App\Models\Thongbao\Thongbao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Cunglaodong\tonghopdanhsachcungld_ct;
use App\Models\Danhmuc\danhmuchanhchinh;
use App\Models\Danhmuc\dmdonvi;
use App\Models\Danhmuc\dmmanghetrinhdo;
use App\Models\Danhmuc\dmtinhtrangthamgiahdktct;
use App\Models\Danhmuc\dmtinhtrangthamgiahdktct2;
use App\Models\Danhmuc\dmtrinhdokythuat;
use App\Models\danhsach;
use Illuminate\Support\Facades\Session;
use App\Exports\BaocaoExport;
use App\Models\Danhmuc\dmthoigianthatnghiep;
use App\Models\nguoilaodong as ModelsNguoilaodong;
use App\Models\nhankhauModel;
use App\Models\tuyendungModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class baocaotonghopController extends Controller
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

    // người sử dụng lao động
    public function index()
    {
        $madv = session('admin')['madv'];
        $nguoidung = Company::where('madv', $madv)->first();

        $company = Company::all();
        $danhmuchanhchinh = danhmuchanhchinh::where('capdo', 'T')->first();
        $dmdonvi = dmdonvi::where('madiaban', '!=', $danhmuchanhchinh->id)->get();
        if (session('admin')->capdo == 'T') {
            $m_huyen = dmdonvi::join('danhmuchanhchinh', 'danhmuchanhchinh.id', 'dmdonvi.madiaban')
                ->select('danhmuchanhchinh.name', 'dmdonvi.madv')
                ->where('danhmuchanhchinh.capdo', 'H')
                ->get();
        } else {
            $m_huyen = dmdonvi::join('danhmuchanhchinh', 'danhmuchanhchinh.id', 'dmdonvi.madiaban')
                ->select('danhmuchanhchinh.name', 'dmdonvi.madv')
                ->where('danhmuchanhchinh.maquocgia', session('admin')->maquocgia)
                ->get();
        }
        if (in_array(session('admin')->capdo, ['T', 'H'])) {
            $m_xa = dmdonvi::join('danhmuchanhchinh', 'danhmuchanhchinh.id', 'dmdonvi.madiaban')
                ->select('danhmuchanhchinh.name', 'dmdonvi.madv')
                ->where('danhmuchanhchinh.capdo', 'X')
                ->get();
        } else {
            $m_xa = dmdonvi::join('danhmuchanhchinh', 'danhmuchanhchinh.id', 'dmdonvi.madiaban')
                ->select('danhmuchanhchinh.name', 'dmdonvi.madv')
                ->where('danhmuchanhchinh.maquocgia', session('admin')->maquocgia)
                ->get();
        }

        $a_kydieutra = array_column(danhsach::all()->toarray(), 'kydieutra', 'kydieutra');
        return view('reports.baocaotonghop.index', compact('nguoidung', 'company', 'dmdonvi'))
            ->with('m_huyen', $m_huyen)
            ->with('a_kydieutra', $a_kydieutra)
            ->with('m_xa', $m_xa);
    }
    public function vanban()
    {
        return view('reports.baocaotonghop.vanban');
    }


    public function doanhnghiep(Request $request)
    {
        $madv = session('admin')['madv'];
        $nguoidung = Company::where('madv', $madv)->first();
        $model = nguoilaodong::where('company', $request->id)->where('madb', $request->madb)->get();
        return view('reports.baocaotonghop.cungld.doanhnghiep', compact('model', 'nguoidung'))
            ->with('pageTitle', 'Báo thông tin người lao động');
    }

    // sở lao động thương binh và xã hội
    public function soldtbxh(Request $request)
    {
        $dotthongbao = nguoilaodong::where('madb', $request->madb)->get();
        $doanhnghiep = $dotthongbao->where('loaihinh', '!=', ['81', '51']);
        $hoptacxa = $dotthongbao->where('loaihinh', ['81', '51']);

        //doanh nghiệp
        $tong_dn = count($doanhnghiep);
        $ldnu_dn  = count($doanhnghiep->where('gioitinh', 'nu'));
        $ldtren35_dn  = 0;
        $bhxh_dn  = count($doanhnghiep->where('bdbhxh', '!=', null));
        $cmktquanly_dn  = count($doanhnghiep->where('nghenghiep', ['Nhà lãnh đạo', 'Giám đốc']));
        $cmktcao_dn  = count($doanhnghiep->where('trinhdocmkt', 'Đại học trở lên'));
        $cmkttrung_dn  = count($doanhnghiep->where('trinhdocmkt', '!=', 'Đại học trở lên'));
        $cmktkhac_dn  = 0;
        $lhldco_dn  = count($doanhnghiep->where('loaihdld', '!=', 'Không xác định thời hạn')->where('loaihdld', '!=', 'Dưới 3 tháng'));
        $lhldkhong_dn  = count($doanhnghiep->where('loaihdld', 'Không xác định thời hạn'));
        $lhldkhac_dn  = count($doanhnghiep->where('loaihdld', 'Dưới 3 tháng'));

        //hợp tác xã
        $tong_htx = count($hoptacxa);
        $ldnu_htx = count($hoptacxa->where('gioitinh', 'nu'));
        $ldtren35_htx = 0;
        $bhxh_htx = count($hoptacxa->where('bdbhxh', '!=', null));
        $cmktquanly_htx = count($hoptacxa->where('nghenghiep', ['Nhà lãnh đạo', 'Giám đốc']));
        $cmktcao_htx = count($hoptacxa->where('trinhdocmkt', 'Đại học trở lên'));
        $cmkttrung_htx = count($hoptacxa->where('trinhdocmkt', '!=', 'Đại học trở lên'));
        $cmktkhac_htx = 0;
        $lhldco_htx = count($hoptacxa->where('loaihdld', '!=', 'Không xác định thời hạn')->where('loaihdld', '!=', 'Dưới 3 tháng'));
        $lhldkhong_htx = count($hoptacxa->where('loaihdld', 'Không xác định thời hạn'));
        $lhldkhac_htx = count($hoptacxa->where('loaihdld', 'Dưới 3 tháng'));

        $model_doanhnghiep = [$tong_dn, $ldnu_dn, $ldtren35_dn, $bhxh_dn,  $cmktquanly_dn, $cmktcao_dn, $cmkttrung_dn, $cmktkhac_dn, $lhldco_dn, $lhldkhong_dn, $lhldkhac_dn];
        $model_hoptacxa = [$tong_htx, $ldnu_htx, $ldtren35_htx, $bhxh_htx,  $cmktquanly_htx, $cmktcao_htx, $cmkttrung_htx, $cmktkhac_htx, $lhldco_htx, $lhldkhong_htx, $lhldkhac_htx];
        return view('reports.baocaotonghop.cungld.solaodongtbxh', compact('model_doanhnghiep', 'model_hoptacxa'))
            ->with('pageTitle', 'Báo thông tin người lao động');
    }

    public function thongtincungld()
    {
        return view('reports.baocaotonghop.cungld.thongtincungld')
            ->with('pageTitle', 'Thông tin cung lao động lao động');
    }
    public function laodongnuocngoai()
    {
        return view('reports.baocaotonghop.cungld.laodongnuocngoai')
            ->with('pageTitle', 'Thông tin người lao động nước ngoài');
    }

    public function tinhhinhsudungld()
    {
        return view('reports.baocaotonghop.cauld.tinhhinhsudungld')
            ->with('pageTitle', 'Tình hình sử dụng lao động');
    }

    public function dsttcungld()
    {
        return view('reports.baocaotonghop.cungld.dsttcungld')
            ->with('pageTitle', 'Danh sách thông tin cung dụng lao động');
    }
    public function nhucautuyendungld()
    {
        return view('reports.baocaotonghop.cauld.nhucautuyendungld')
            ->with('pageTitle', 'Thông tin nhu cầu tuyển dụng lao động');
    }
    public function cungldcapxahuyen(Request $request)
    {
        $nam = $request->nam;
        $thanhthi = [];
        $nongthon = [];

        $mathanhthi = [];
        $manongthon = [];

        $danhmuchanhchinh = danhmuchanhchinh::where('capdo', 'X')->get();
        foreach ($danhmuchanhchinh as $item) {
            if ($item->level == 'Xã') {
                array_push($nongthon, $item->id);
            }
            if ($item->level == 'Phường' || $item->level == 'Thị trấn') {
                array_push($thanhthi, $item->id);
            }
        }

        $dmdonvi_tt = dmdonvi::where('madiaban', $thanhthi)->get();
        $dmdonvi_nt = dmdonvi::where('madiaban', $nongthon)->get();
        $dmtrinhdokythuat = dmtrinhdokythuat::all();
        $dmvithevieclam = dmtinhtrangthamgiahdktct2::where('manhom2', '20221108050528')->get();
        $tgthatnghiep = dmtinhtrangthamgiahdktct2::where('manhom2', '20221123034628')->get();
        $lydoktg = dmtinhtrangthamgiahdktct::where('manhom', '20221108050508')->get();
        foreach ($dmdonvi_tt as $item) {
            array_push($mathanhthi, $item->madv);
        }
        foreach ($dmdonvi_nt as $item) {
            array_push($manongthon, $item->madv);
        }
        $cungld = tonghopdanhsachcungld_ct::where('madb', $request->madv)->get();
        $cung_tt = tonghopdanhsachcungld_ct::where('madb', $request->madv)->where('madb', $mathanhthi)->get();
        $cung_nt = tonghopdanhsachcungld_ct::where('madb', $request->madv)->where('madb', $mathanhthi)->get();

        return view('reports.baocaotonghop.cungld.cungldcapxahuyen', compact('nam', 'cungld', 'cung_tt', 'cung_nt', 'dmtrinhdokythuat', 'dmvithevieclam', 'tgthatnghiep', 'lydoktg'))
            ->with('pageTitle', 'Báo cáo tổng hợp về thông tin về cung lao động dành cho cấp xã và cấp huyện');
    }
    public function thongtinthitruongld(Request $request)
    {
        $nam = $request->nam;
        $m_danhmuc = danhmuchanhchinh::join('dmdonvi', 'dmdonvi.madiaban', 'danhmuchanhchinh.id')
            ->select('danhmuchanhchinh.*', 'dmdonvi.madv')
            ->get();

        $a_dm = array_column($m_danhmuc->toarray(), 'level', 'madv');
        $cunglaodong = nhankhauModel::wherein('kydieutra',[$nam,$nam-1])->get();

        $a_ketqua = ['thanhthi' => 0, 'nongthon' => 0, 'nam' => 0, 'nu' => 0];
        $a_covl = ['thanhthi' => 0, 'nongthon' => 0];
        $a_thatnghiep = ['thanhthi' => 0, 'nongthon' => 0];


        $a_ketqua_hientai = ['thanhthi' => 0, 'nongthon' => 0, 'nam' => 0, 'nu' => 0];
        $a_covl_hientai = ['thanhthi' => 0, 'nongthon' => 0];
        $a_thatnghiep_hientai = ['thanhthi' => 0, 'nongthon' => 0];
        foreach($cunglaodong as $key=>$ct){
            if ($a_dm[$ct->madv] == 'Xã') {
                $ct->khuvuc = 'nongthon';
                if($ct->kydieutra == $nam){
                    $a_ketqua_hientai['nongthon']++;

                    //có việc làm và thất nghiệp
                    if ($ct->tinhtranghdkt == 1) {
                        $a_covl_hientai['nongthon']++;
                    } elseif ($ct->tinhtranghdkt == 2) {
                        $a_thatnghiep_hientai['nongthon']++;
                    }
                }else{
                    $a_ketqua['nongthon']++;

                    //có việc làm và thất nghiệp
                    if ($ct->tinhtranghdkt == 1) {
                        $a_covl['nongthon']++;
                    } elseif ($ct->tinhtranghdkt == 2) {
                        $a_thatnghiep['nongthon']++;
                    }
                }

            } else {
                $ct->khuvuc = 'thanhthi';
                if($ct->kydieutra == $nam){                   
                    $a_ketqua_hientai['thanhthi']++;

                    //có việc làm và thất nghiệp
                    if ($ct->tinhtranghdkt == 1) {
                        $a_covl_hientai['thanhthi']++;
                    } elseif ($ct->tinhtranghdkt == 2) {
                        $a_thatnghiep_hientai['thanhthi']++;
                    }
                }
                else{
                    $a_ketqua['thanhthi']++;

                    //có việc làm và thất nghiệp
                    if ($ct->tinhtranghdkt == 1) {
                        $a_covl['thanhthi']++;
                    } elseif ($ct->tinhtranghdkt == 2) {
                        $a_thatnghiep['thanhthi']++;
                    }
                }

            }
            if($ct->kydieutra == $nam){     
            if (in_array($ct->gioitinh, ['nam', 'Nam'])) {
                $a_ketqua_hientai['nam']++;
            } else {
                $a_ketqua_hientai['nu']++;
            }
        }else{
            if (in_array($ct->gioitinh, ['nam', 'Nam'])) {
                $a_ketqua['nam']++;
            } else {
                $a_ketqua['nu']++;
            }
        }
        }
        $loaihinhkt = dmloaihinhhdkt::all();
        $company = Company::all();
        // $nhucautuyendungct = nhucautuyendungct::all();
        $dmmanghetrinhdo = dmmanghetrinhdo::all();
        $a_vithevl = array_column(dmtinhtrangthamgiahdktct2::where('manhom2', '20221220175800')->get()->toarray(), 'tentgktct2', 'stt');
        $a_chuyenmon = dmtrinhdokythuat::select('tentdkt', 'stt')->get()->toarray();
        $a_cmkt = array_column($a_chuyenmon, 'tentdkt', 'stt');
        $a_thoigianthatnghiep = array_column(dmthoigianthatnghiep::all()->toarray(), 'tentgtn', 'stt');
        $a_khongthamgia = array_column(dmtinhtrangthamgiahdktct::where('manhom', '20221220175728')->get()->toarray(), 'tentgktct', 'stt');
        // $nhucautuyendung = nhucautuyendung::join('nhucautuyendungct', 'nhucautuyendung.mahs' ,'=','nhucautuyendungct.mahs')
        // ->select('nhucautuyendungct.*', 'nhucautuyendung.*')->get();
        // dd($nhucautuyendung);

        //Cầu lao động
        $doanhnghiep = Company::where('dkkd', '!=', null)->get();

        $a_doanhnghiep = ['namtruoc' => 0, 'namhientai' => 0];
        foreach ($doanhnghiep as $ct) {
            $namtao = Carbon::parse($ct->created_at)->year;
            if ($namtao == $nam) {
                $a_doanhnghiep['namhientai']++;
            } else {
                $a_doanhnghiep['namtruoc']++;
            }
        }

        //Số lao động
        $laodong = DB::table('nguoilaodong')->where('state', '!=', 3)->get();

        $a_loailaodong = ['nu' => 0, 'tren35t' => 0, 'bhbatbuoc' => 0];
        $a_loailaodong_hientai = ['nu' => 0, 'tren35t' => 0, 'bhbatbuoc' => 0];
        $a_vitri = ['nhaquanly' => 0, 'chuyenmonbaccao' => 0, 'chuyenmonbactrung' => 0, 'khac' => 0];
        $a_vitri_hientai = ['nhaquanly' => 0, 'chuyenmonbaccao' => 0, 'chuyenmonbactrung' => 0, 'khac' => 0];
        $a_tong = ['namtruoc' => 0, 'namhientai' => 0];
        $a_tongld_nuocngoai=['namtruoc'=>0,'hientai'=>0];
        $a_vitri_nuocngoai=['nhaquanly'=>0,'giamdoc'=>0,'chuyengia'=>0,'kythuat'=>0];
        $a_vitri_nuocngoai_hientai=['nhaquanly'=>0,'giamdoc'=>0,'chuyengia'=>0,'kythuat'=>0];
        $a_vitri_cv=['quanly'=>0,'giamdoc'=>0,'chuyengia'=>0,'kythuat'=>0];
        $a_vitri_cv_hientai=['quanly'=>0,'giamdoc'=>0,'chuyengia'=>0,'kythuat'=>0];

        foreach($laodong as $ct){
            $namtaold=Carbon::parse($ct->created_at)->year;
            if($namtaold == $nam){

                $a_tong['namhientai']++;
                if(in_array($ct->gioitinh,['nu','Nữ'])){
                    $a_loailaodong_hientai['nu']++;
                }
                if(getAge($ct->ngaysinh) > 35){
                    $a_loailaodong_hientai['tren35t']++;
                }
                if($ct->sobaohiem != null || $ct->sobaohiem != 0){
                    $a_loailaodong_hientai['bhbatbuoc']++;
                }

                if(in_array($ct->trinhdocmkt,['Đại học trở lên','Đại học']) ){
                    $a_vitri_hientai['chuyenmonbaccao']++;
                }elseif(in_array($ct->trinhdocmkt,['Trung cấp chuyên nghiệp','Cao đẳng'])){
                    $a_vitri_hientai['chuyenmonbactrung']++;
                }else{
                    $a_vitri_hientai['khac']++;
                }

                if(in_array($ct->chucvu,['Nhà lãnh đạo','Giám đốc','Phó Giám đốc','giám đốc','Phó Tổng Giám đốc','GIÁM ĐỐC','PHÓ GIÁM ĐỐC'])){
                    $a_vitri['nhaquanly']++;
                }

                if(!in_array($ct->nation,['Việt Nam','VN','vn','Viet Nam','Vn'])){
                    $a_tongld_nuocngoai['hientai']++;
                    if(in_array($ct->chucvu,['Nhà lãnh đạo'])){
                        $a_vitri_cv_hientai['quanly']++;
                    }elseif(in_array($ct->chucvu,['Giám đốc','giám đốc','GIÁM ĐỐC'])){
                        $a_vitri_cv_hientai['giamdoc']++;
                    }elseif(in_array($ct->chucvu,['Chuyên gia an toàn'])){
                        $a_vitri_cv_hientai['chuyengia']++;
                    }else{
                        $a_vitri_cv_hientai['kythuat']++; 
                    };
                }
            }else{
                if(!in_array($ct->nation,['Việt Nam','VN','vn','Viet Nam','Vn'])){
                    $a_tongld_nuocngoai['namtruoc']++;
                    if(in_array($ct->chucvu,['Nhà lãnh đạo'])){
                        $a_vitri_cv['quanly']++;
                    }elseif(in_array($ct->chucvu,['Giám đốc','giám đốc','GIÁM ĐỐC'])){
                        $a_vitri_cv['giamdoc']++;
                    }elseif(in_array($ct->chucvu,['Chuyên gia an toàn'])){
                        $a_vitri_cv['chuyengia']++;
                    }else{
                        $a_vitri_cv['kythuat']++; 
                    };
                }
                $a_tong['namtruoc']++;
                if(in_array($ct->gioitinh,['nu','Nữ'])){
                    $a_loailaodong['nu']++;
                }
                if(getAge($ct->ngaysinh) > 35){
                    $a_loailaodong['tren35t']++;
                }
                if($ct->sobaohiem != null || $ct->sobaohiem != 0){
                    $a_loailaodong['bhbatbuoc']++;
                }

                if(in_array($ct->trinhdocmkt,['Đại học trở lên','Đại học']) ){
                    $a_vitri['chuyenmonbaccao']++;
                }elseif(in_array($ct->trinhdocmkt,['Trung cấp chuyên nghiệp','Cao đẳng'])){
                    $a_vitri['chuyenmonbactrung']++;
                }else{
                    $a_vitri['khac']++;
                }

                if(in_array($ct->chucvu,['Nhà lãnh đạo','Giám đốc','Phó Giám đốc','giám đốc','Phó Tổng Giám đốc','GIÁM ĐỐC','PHÓ GIÁM ĐỐC'])){
                    $a_vitri['nhaquanly']++;
                }
            }

        }
        // dd($caulaodong);
        //Tuyển dụng
        $tuyendung = tuyendungModel::join('vitrituyendung', 'vitrituyendung.idtuyendung', 'tuyendung.id')
            ->whereRaw("YEAR(thoihan) IN ($nam,$nam-1)")
            ->get();
        $loaihinhdn = array_column(getParamsByNametype('Loại hình doanh nghiệp')->toarray(), 'name', 'id');
        foreach ($tuyendung as $ct) {
            $ct->nam = Carbon::parse($ct->thoihan)->year;
            $dn=$doanhnghiep->where('user',$ct->user)->first();
            $ct->loaihinh=$dn->loaihinh;
        }
        
        // foreach($loaihinhdn as $k=>$val){
        //     dd($tuyendung->where('nam',$nam)->where('loaihinh',$k)->sum('soluong'));
        // }
        
        return view('reports.baocaotonghop.cauld.thongtinthitruongld', compact(
            'loaihinhkt',
            'company',
            'dmmanghetrinhdo',
            'nam'
        ))
            ->with('cunglaodong',$cunglaodong)
            // ->with('inputs', $inputs)
            ->with('a_ketqua', $a_ketqua)
            ->with('a_covl', $a_covl)
            ->with('a_thatnghiep', $a_thatnghiep)
            ->with('a_ketqua_hientai', $a_ketqua_hientai)
            ->with('a_covl_hientai', $a_covl_hientai)
            ->with('a_thatnghiep_hientai', $a_thatnghiep_hientai)
            ->with('a_vithevl', $a_vithevl)
            ->with('a_cmkt', $a_cmkt)
            ->with('a_thoigianthatnghiep', $a_thoigianthatnghiep)
            ->with('a_khongthamgia', $a_khongthamgia)
            ->with('tuyendung', $tuyendung)
            ->with('doanhnghiep', $doanhnghiep)
            ->with('a_doanhnghiep', $a_doanhnghiep)
            ->with('a_vitri', $a_vitri)
            ->with('a_vitri_hientai', $a_vitri_hientai)
            ->with('a_loailaodong', $a_loailaodong)
            ->with('a_loailaodong_hientai', $a_loailaodong_hientai)
            ->with('a_tong', $a_tong)
            ->with('loaihinhdn', $loaihinhdn)
            ->with('dmmanghetrinhdo', $dmmanghetrinhdo)
            ->with('a_tongld_nuocngoai', $a_tongld_nuocngoai)
            ->with('a_vitri_nuocngoai', $a_vitri_nuocngoai)
            ->with('a_vitri_nuocngoai_hientai', $a_vitri_nuocngoai_hientai)
            ->with('a_vitri_cv', $a_vitri_cv)
            ->with('a_vitri_cv_hientai', $a_vitri_cv_hientai)
            ->with('pageTitle', 'Báo cáo về thông tin thị trường lao động');
    }

    public function BC_doanhnghiep()
    {
        $request = request();

        $export = $request->export;
        if ($export) {
            return Excel::download(new BaocaoExport, 'tinhhinhsudunglaodong' . date('m-d-Y-His A e') . '.xlsx');
        }
        return view('reports.baocaotonghop.doanhnghiep')
            ->with('pageTitle', 'Báo cáo tình hình sử dụng lao động');
    }

    public function BaoCaoDN(){
        // dd(session('admin'));
        return view('pages.baocao.index');
    }
}
