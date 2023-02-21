<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Employer;
use App\Models\Company;
use Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Exports\CompaniesExport;
use App\Imports\ColectionImport;

use App\Models\Danhmuc\dmchucvu;
use App\Models\Danhmuc\dmloaihieuluchdld;
use App\Models\modelcompany;
use App\Models\nguoilaodong;
use App\Models\User;

use App\Models\Danhmuc\danhmuchanhchinh;
use App\Models\Danhmuc\dmloaihinhhdkt;
use App\Models\Report;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB as FacadesDB;
use Maatwebsite\Excel\Facades\Excel;

class AdminCompany extends Controller
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
		//makelist
		$dmhc_list = $this->getDmhc();
		//filter
		$search = $request->search;
		$public_filter = $request->public_filter;
		$dm_filter = $request->dm_filter;
		$khaibao = $request->khaibao;

		$quymo_min_filter = $request->quymo_min_filter;
		$quymo_max_filter = $request->quymo_max_filter;

		$export = $request->export;

		if ($export) {

			return Excel::download(new CompaniesExport, 'doanhnghiep.xlsx');
		}

		$ctys = Company::withCount(['employers'])
			->when($search, function ($query, $search) {
				return $query->where('company.name', 'like', '%' . $search . '%');
			})
			->when($public_filter, function ($query, $public_filter) {
				return $query->where('company.public', $public_filter);
			})
			->when($dm_filter, function ($query, $dm_filter) {
				return $query->where('company.huyen', $dm_filter);
			})
			->when($quymo_min_filter, function ($query, $quymo_min_filter) {
				return $query->having('employers_count', '>=', $quymo_min_filter);
			})
			->when($quymo_max_filter, function ($query, $quymo_max_filter) {
				return $query->having('employers_count', '<=', $quymo_max_filter);
			})
			->when($quymo_max_filter == 0 && !is_null($quymo_max_filter), function ($query, $quymo_max_filter) {
				return $query->having('employers_count', '=', 0);
			})
			->orderBy('employers_count', 'desc');
		//đã khai báo và chưa khai báo
		if ($khaibao == 'dkb' || $khaibao == 'ckb') {
			$cid = [];
			$report = Report::whereIn('datatable', ['nguoilaodong','notable'])->get();
			foreach ($report as $rp) {
				array_push($cid, $rp);
			}
			$cid = a_unique(array_column($cid, 'user'));

			if ($khaibao == 'dkb') {
				$ctys = $ctys->wherein('user', $cid)->get();
			}
			if ($khaibao == 'ckb') {
				$ctys = $ctys->whereNotIn('user', $cid)->get();
			}
		}
		//chưa khai trình
		elseif ($khaibao == 'ckt') {
			$cty = $ctys->where('user', '!=', null)->get();
			foreach ($cty as $ct) {
				if ($ct->xa == null) {
					$ct->chuakhaitrinh = 'yes';
					continue;
				}
				if ($ct->huyen == null) {
					$ct->chuakhaitrinh = 'yes';
					continue;
				}
				if ($ct->tinh == null) {
					$ct->chuakhaitrinh = 'yes';
					continue;
				}
				if ($ct->nganhnghe == null) {
					$ct->chuakhaitrinh = 'yes';
					continue;
				}
				if ($ct->loaihinh == null) {
					$ct->chuakhaitrinh = 'yes';
					continue;
				}
				if ($ct->email == null) {
					$ct->chuakhaitrinh = 'yes';
					continue;
				}
			}
			$ctys = [];
			foreach($cty as $item){
				if($item->chuakhaitrinh == 'yes' ){
					array_push($ctys,$item);
				}
			}
			
		}
		//đã đăng ký
		elseif ($khaibao == 'ddk') {
			$user = User::all();
			$user_id = array_column($user->toArray(),'id');
			$ctys = $ctys->wherein('user',$user_id)->get();
			
		}
		//khai báo lần đầu
		elseif($khaibao == 'kbld'){
			$r_user = [];
			 $user = [];
			$report = Report::whereIn('datatable', ['nguoilaodong','notable'])->get();
			foreach ($report as $rp) {
				array_push($r_user, $rp);
			}
			$r_user = a_unique(array_column($r_user, 'user'));

			foreach($r_user as $item){
				$a = $report->where('user',$item);
				
				if($report->where('user',$item)->count() == 1){
					array_push($user, $item);
				}
				if($report->where('user',$item)->count() > 1){
					$b = $a->first();
					$c = [];
					$time=Carbon::parse($b->time)->toDateString();
					foreach($a as $a1){
						$a2=Carbon::parse($a1->time)->toDateString();
						if ($a2 != $time) {
							array_push($c, $a1);
						}
					}
					if (count($c) == 0) {
						array_push($user, $item);
					}
				}
			}
			$ctys = $ctys->whereIn('user',$user)->get();
		}
		else {
			$ctys = $ctys->get();
		}

		$dmhanhchinh = danhmuchanhchinh::all();
		$a_dm = array_column($dmhanhchinh->toarray(), 'name', 'maquocgia');

		foreach ($ctys as $val) {

			$tenxa = isset($a_dm[$val->xa]) ? $a_dm[$val->xa] : $val->xa;
			$tenhuyen = isset($a_dm[$val->huyen]) ? $a_dm[$val->huyen] : $val->huyen;
			$tentinh = isset($a_dm[$val->tinh]) ? $a_dm[$val->tinh] : $val->tinh;
			$val->diachi = $tenxa . ' - ' . $tenhuyen . ' - ' . $tentinh;
			// try {
			// 	$tenxa = $a_dm[$val->xa];
			// 	$tenhuyen = $a_dm[$val->huyen];
			// 	$tentinh = $a_dm[$val->tinh];
			// 	$val->diachi = $tenxa . ' - ' . $tenhuyen . ' - ' . $tentinh;
			// } catch (Exception $e) {
			// 	$val->diachi = $val->xa . ' - ' . $val->huyen . ' - ' . $val->tinh;
			// }
		}

		// dd($ctys->take(10));
		// dd($ctys->first());
		return view('admin.company.all')->with('ctys', $ctys)
			->with('dmhc_list', $dmhc_list)
			->with('search', $search)
			->with('dm_filter', $dm_filter)
			->with('public_filter', $public_filter)
			->with('quymo_max_filter', $quymo_max_filter)
			->with('quymo_min_filter', $quymo_min_filter)
			->with('dmhanhchinh', $dmhanhchinh)
			->with('khaibao', $khaibao);
	}

	public function delete_company($id)
	{

		Company::find($id)->delete();
		Session::put('message', "Xóa thành công");
		return redirect('/doanhnghiep-ba');
	}

	public function up_company(Request $request)
	{
		$input = $request->all();
		unset($input['_token']);
		unset($input['id']);
		Company::find($request->id)->update($input);
		return redirect('/doanhnghiep-ba');
	}

	public function baocao145($cid)
	{
		$info = DB::table('company')->where('id', $cid)->first();
		$em = new Employer;
		$einfo = $em->getEmployerState($cid);
		return view('admin.company.sudunglaodong')
			->with('einfo', $einfo)
			->with('info', $info);
	}
	public function baocao145V1($cid)
	{

		$info = $this->getInfo45($cid);
		$dmhc = $this->getdanhmuc();

		$kcn = $this->getParamsByNametype("Khu công nghiệp"); // lấy danh mục khu công nghiệp
		$ctype = $this->getParamsByNametype("Loại hình doanh nghiệp"); // lấy loại hình doanh nghiệp
		$cfield = $this->getParamsByNametype("Ngành nghề doanh nghiệp"); // lấy ngành nghề doanh nghiệp

		return view('admin.company.145')->with('info', $info)->with('dmhc', $dmhc)->with('ctype', $ctype)->with('kcn', $kcn)->with('cfield', $cfield);
	}
	public function getDmhc()
	{
		$cats = DB::table('danhmuchanhchinh')->where('level', 'huyện')->orwhere('level', 'thành phố')->get();
		return $cats;
	}
	public function getParams($paramtype)
	{
		$type = DB::table('paramtype')->where('name', $paramtype)->get()->first();
		$cats = DB::table('param')->where('type', $type->id)->get();
		return $cats;
	}


	public function getInfo28($cid)
	{

		$dn = DB::table('company')->where('id', $cid)->first();
		$em = new Employer;
		$other_info = $em->getTonghop($dn->id);
		$dn->tonghop = $other_info;
		$dn->pbcmkt = $em->getPhanbo($dn->id, 3);
		$dn->pblvdt = $em->getPhanbo($dn->id, 11);
		$dn->pbnghenghiep = $em->getPhanbo($dn->id, 9);
		return $dn;
	}
	public function getInfo45($cid)
	{

		$dn = DB::table('company')->where('id', $cid)->first();
		$em = new Employer;
		$other_info = $em->getTonghop($cid);
		$dn->tonghop = $other_info;
		$dn->pbcmkt = $em->getPhanbo($dn->id, 3);
		$dn->pblvdt = $em->getPhanbo($dn->id, 11);
		$dn->pbnghenghiep = $em->getPhanbo($dn->id, 9);
		return $dn;
	}
	public function new()
	{
		return view('admin.company.new');
	}

	public function save(Request $request)
	{

		$data = array();
		$data['name'] = $request->name;
		$data['description'] = $request->description;
		$result = DB::table('paramtype')->insert($data);

		if ($result) {

			Session::put('message', "Thêm mới thành công");
			return redirect('ptype-ba');
		} else {
			Session::put('message', "Có lỗi xảy ra");
			return redirect('ptype-bn');
		}
	}


	public function edit(Request $request)
	{

		$dm_filter = $request->dm_filter;
		$public_filter = $request->public_filter;
		$khaibao = $request->khaibao;
		$quymo_min_filter = $request->quymo_min_filter;
		$quymo_max_filter = $request->quymo_max_filter;

		$dmhc = $this->getdanhmuc();
		$kcn = $this->getParamsByNametype("Khu công nghiệp"); // lấy danh mục khu công nghiệp
		$ctype = $this->getParamsByNametype("Loại hình doanh nghiệp"); // lấy loại hình doanh nghiệp
		$cfield = $this->getParamsByNametype("Ngành nghề doanh nghiệp"); // lấy ngành nghề doanh nghiệp
		$ctype2 = dmloaihinhhdkt::all();

		$company = DB::table('company')->where('id', $request->cid)->first();


		//print_r($cat);
		return view('admin.company.edit')
			->with('dmhc', $dmhc)
			->with('info', $company)
			->with('ctype', $ctype)
			->with('ctype2', $ctype2)
			->with('kcn', $kcn)
			->with('cfield', $cfield)
			->with('dm_filter', $dm_filter)
			->with('public_filter', $public_filter)
			->with('khaibao', $khaibao)
			->with('quymo_min_filter', $quymo_min_filter)
			->with('quymo_max_filter', $quymo_max_filter);
	}


	public function update(Request $request)
	{
		$data = array();
		$data['name'] = $request->name;
		$data['description'] = $request->desc;

		$catid = $request->catid;

		$result = DB::table('paramtype')->where('id', $catid)->update($data);

		if ($result) {

			Session::put('message', "Cập nhật thành công");
			return redirect('ptype-bs');
		} else {
			Session::put('message', "Có lỗi xảy ra");
			return redirect('/ptype-be/' . $catid);
		}
	}
	public function delete($catid)
	{
		// Check param
		$param = DB::table('param')->where('type', $catid)->count();
		if ($param) {
			Session::put('message', " Tham số còn có giá trị, không thể xóa");
			return redirect('ptype-bs');
		}



		// Delete
		$result = DB::table('paramtype')->where('id', $catid)->delete();

		if ($result) {

			Session::put('message', "Xóa thành công");
			return redirect('ptype-bs');
		} else {
			Session::put('message', "Có lỗi xảy ra");
			return redirect('ptype-bs');
		}
	}
	public function report($type, $result, $tbl, $rowid)
	{
		// write report 
		$r = array();
		$r['type'] = $type;
		$r['result'] = $result;
		$r['tbl'] = $tbl;
		$r['tbl'] = $rowid;
		$r['user'] = $rowid;
		$r['time'] = $rowid;
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

	public function import(Request $request)
	{
		$file = $request->file('import_file');

		$dataObj = new ColectionImport();
		$theArray = Excel::toArray($dataObj, $file);
		$arr = $theArray[0];
		// dd($arr);
		// $arr_col = array('name','masodn','dkkd','phone','email','tinh','huyen','xa','adress','khucn','loaihinh','nganhnghe','quymo');
		$arr_col = array('name', 'adress', 'phone', 'quymo');
		$nfield = sizeof($arr_col);
		$sldn = array();
		for ($i = 1; $i < count($arr); $i++) {
			$data = array();
			for ($j = 0; $j < $nfield; $j++) {

				// $data[$arr_col[$j]] = $arr[$i][$j] ?? '';
				$data[$arr_col[$j]] = $arr[$i][$j + 1] ?? '';
				// $data[$arr[4][$j]] = $arr[$i][$j]??'';
			}
			// $dkkd=DB::table('company')->where('dkkd',$data['dkkd'])->first();
			// if($data['dkkd'] != null){
			// 	$data['dkkd']=floatval($data['dkkd']);
			// }			
			// $dkkd=modelcompany::where('dkkd',$data['dkkd'])->first();
			// if(isset($dkkd)){
			// 	continue;
			// }
			if (is_numeric($data['quymo'])) {
				$data['sld'] = $data['quymo'];
			}
			$data['loaihinh'] = $data['loaihinh'] ?? 1;
			// dd($data);
			DB::table('company')->insert($data);
			// $sldn[]=$data;
		}
		// dd($sldn);
		return redirect('/doanhnghiep-ba')
			->with('success', 'Thêm thành công');

		// dd($sldn);
	}

	public function store(Request $request)
	{

		$inputs = $request->all();

		$inputs['madv'] = $inputs['dkkd'];
		$model = DB::table('company')->where('dkkd', $inputs['dkkd'])->first();
		if (isset($model) && $model->user != null) {
			return view('errors.tontai_dulieu')
				->with('message', 'Doanh nghiệp đăng ký')
				->with('furl', '/doanhnghiep-ba');
		}
		unset($inputs['_token']);
		// dd($inputs);
		DB::table('company')->insert($inputs);

		return redirect('/doanhnghiep-ba');
	}


	public function Mau01PLI(Request $request, $id)
	{
		$inputs = $request->all();
		$model = nguoilaodong::where('company', $id)->where('state', 1)->get();
		// dd($model->take(10));
		$m_dv = User::findOrFail($inputs['user']);
		$company = Company::findOrFail($id);
		$nganhnghe_dn = getParamsByNametype('Ngành nghề doanh nghiệp');
		$a_nganhnghe = array_column($nganhnghe_dn->toarray(), 'name', 'id');
		$m_dv->dkkd = $company->dkkd;
		$m_dv->tendn = $company->name;
		$m_dv->diachi = $company->adress;
		$m_dv->fax = $company->fax;
		$m_dv->email = $company->email;
		$m_dv->phone = $company->phone;
		$m_dv->loaihinh = $company->loaihinh;
		$m_dv->nganhnghe = $a_nganhnghe[$company->nganhnghe];
		// dd($m_dv);
		$list_nghe = getParamsByNametype('Nghề nghiệp người lao động');
		$a_vitri = array();
		$a_vitrikhac = array();
		foreach ($list_nghe as $key => $ct) {
			if (in_array($ct->id, [37, 38, 39])) {
				$a_vitri[$ct->id] = $ct->name;
			} else {
				$a_vitrikhac[$key] = $ct->id;
			}
		}

		// dd($a_vitrikhac);
		// $a_vitri=array_column($list_nghe->toarray(),'name','id');
		$a_chucvu = array_column(dmchucvu::all()->toarray(), 'tencv', 'id');
		$a_loaihdld = array_column(dmloaihieuluchdld::all()->toarray(), 'tenlhl', 'madmlhl');


		return view('admin.company.export.mau01PLI')
			->with('model', $model)
			->with('m_dv', $m_dv)
			->with('a_vitri', $a_vitri)
			->with('a_vitrikhac', $a_vitrikhac)
			->with('a_chucvu', $a_chucvu)
			->with('a_loaihdld', $a_loaihdld)
			->with('pageTitle', 'Tổng hợp dữ liệu');
	}

	public function Mau01TT01(Request $request, $id)
	{
		$inputs = $request->all();
		// $tuyendung=DB::table('tuyendung')->where('user',$id)->where('thoihan')
	}
}
