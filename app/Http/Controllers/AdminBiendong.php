<?php

namespace App\Http\Controllers;

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
use App\Models\Nhankhau;
use App\Models\nhankhauModel;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Session;

class AdminBiendong extends Controller
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
    public function show_all()
	{
		
		return view ('admin.biendong.all');
	}
	
	 
	
	 
	 
	
	 public function edit($catid)
	{
		$cats= DB::table('category_product')->get();
		$cat= DB::table('category_product')->where('id',$catid)->first();
		//print_r($cat);
		return view ('admin.tuyendung.edit')->with('cats', $cats)->with('cat', $cat);
	}

	public function index_cung(Request $request){
		$inputs=$request->all();
		$dmhc_list= getdanhmuc();
		$m_donvi = getDonVi(session('admin')->sadmin);
        $inputs['madv'] = $inputs['madv'] ?? $m_donvi->first()->madv;
        $a_kydieutra = array_column(danhsach::all()->toarray(), 'kydieutra', 'kydieutra');
        $kydieutra = danhsach::orderBy('id', 'desc')->first();
        $inputs['kydieutra'] = $inputs['kydieutra'] ?? (isset($kydieutra) ? $kydieutra->kydieutra : '');

		$model=nhankhauModel::where('madv',$inputs['madv'])->where('kydieutra',$inputs['kydieutra'])
		->where(function($query) use($inputs){
			if(isset($inputs['loaibiendong'])){
				$query->where('loaibiendong',$inputs['loaibiendong']);
			}else{
				$query->where('loaibiendong','!=',0);
			}
		})
		->get();

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
        } elseif(session('admin')->capdo == 'X') {
            // $m_xa=danhmuchanhchinh::where('id',$model_dv->madiaban)->first();
            // $m_huyen=danhmuchanhchinh::where('maquocgia',$m_xa->parent)->first();       
            $inputs['mahuyen'] = $inputs['mahuyen'] ?? $m_huyen->maquocgia;
            $a_xa = danhmuchanhchinh::join('dmdonvi', 'dmdonvi.madiaban', 'danhmuchanhchinh.id')
                ->select('dmdonvi.madv', 'danhmuchanhchinh.name', 'danhmuchanhchinh.parent')
                ->where('madv', $inputs['madv'])->get();
            $a_huyen = array_column(danhmuchanhchinh::where('maquocgia', $a_xa->first()->parent)->get()->toarray(), 'name', 'maquocgia');
        }elseif(session('admin')->capdo=='H'){
            $model_huyen = danhmuchanhchinh::where('maquocgia', session('admin')->maquocgia)->get();
            $a_huyen = array_column($model_huyen->toarray(), 'name', 'maquocgia');
            $inputs['mahuyen'] = $inputs['mahuyen'] ?? $model_huyen->first()->maquocgia;
            $a_xa = danhmuchanhchinh::join('dmdonvi', 'dmdonvi.madiaban', 'danhmuchanhchinh.id')
                ->select('dmdonvi.madv', 'danhmuchanhchinh.name')
                ->where('parent', $inputs['mahuyen'])->get();
        }

		$m_diaban = danhmuchanhchinh::all();
		$a_loaibiendong=array('1'=>'Tăng','2'=>'Giảm','3'=>'Cập nhật thông tin');
		$inputs['url'] = '/biendong/danhsach_biendong';
        // dd($model);
		return view('admin.biendong.cung.index')
		->with('model',$model)
		->with('a_huyen', $a_huyen)
            ->with('a_xa', $a_xa)
            ->with('baocao', getdulieubaocao())
            ->with('a_dsdv', array_column($m_donvi->toarray(), 'tendv', 'madv'))
            ->with('inputs', $inputs)
            ->with('danhsachtinhtrangvl', danhsachtinhtrangvl())
            ->with('a_kydieutra', $a_kydieutra)
            ->with('m_diaban', $m_diaban)
            ->with('m_donvi', $m_donvi)
            ->with('a_loaibiendong', $a_loaibiendong)
            ->with('dmhc', $dmhc_list);
	}

	public function thongtinthaydoi(Request $request,$nkid){
		$inputs=$request->all();
		$countries_list = getCountries();
        // get params
        $dmhc = getdanhmuc();
        // $list_cmkt = $this->getParamsByNametype('Trình độ CMKT');
        // $list_tdgd = $this->getParamsByNametype('Trình độ học vấn');
        $list_cmkt = dmtrinhdokythuat::all();
        $list_tdgd = dmtrinhdogdpt::all();
        $list_nghe = getParamsByNametype('Nghề nghiệp người lao động');
        // $list_vithe = $this->getParamsByNametype('Vị thế việc làm');
        // $list_linhvuc = $this->getParamsByNametype('Lĩnh vực đào tạo');
        $list_hdld = getParamsByNametype('Loại hợp đồng lao động');
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
        $m_nganhnghe=dmnganhnghe::all();
		$a_thaydoi=explode(';',$ld->truongbiendong);
        // dd($inputs);
        $inputs['kydieutra']=$ld->kydieutra;
		return view('admin.biendong.cung.chitiet')
                ->with('ld', $ld)
                ->with('inputs', $inputs)
                ->with('baocao', getdulieubaocao())
                ->with('a_thaydoi', $a_thaydoi)
                ->with('m_uutien', $m_uutien)
                ->with('m_nganhnghe', $m_nganhnghe)
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
	
	
	
}
