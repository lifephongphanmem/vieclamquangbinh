<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use DB;
use App\Models\Employer;
use Session;
use Illuminate\Http\RedirectResponse;
use App\Models\Report;
use App\Models\User;
use App\Models\Vitrituyendung;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToArray;

class AdminReport extends Controller
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
		
		$search = $request->search;
		$time_filter = $request->time_filter;
		$type_filter = $request->type_filter;
		if ($request->tungay == null && $request->denngay == null) {
			$nam = date('Y');
			$thang = date('m');
			$ngay = date('d');
			if ($ngay < 5) {
				$tungay = Carbon::create($nam, $thang - 1, 5)->toDateString();
			}
			else{
				$tungay = Carbon::create($nam, $thang , 5)->toDateString();
			}
			$denngay = date('Y-m-d');
			$denngay2 = Carbon::tomorrow();

		} else {
			$tungay = $request->tungay;
			$denngay = $request->denngay;
			$denngay2 = Carbon::parse($denngay)->addDays();
		}


		$reports = DB::table('report');
		if ($type_filter == 'baotang' ) {
			$reports = $reports->where('type', 'baotang' );
		}
		if ($type_filter == 'baogiam') {
			$reports = $reports->where('type', 'baogiam');
		}
		if ($type_filter == 'tamdung') {
			$reports = $reports->where('type', 'tamdung');
		}
		if ($type_filter == 'kethuctamdung') {
			$reports = $reports->where('type', 'kethuctamdung');
		}
		if ($type_filter == 'updateinfo') {
			$reports = $reports->where('type', 'updateinfo');
		}
		if($type_filter == null){
			$reports = $reports;
		}

			$reports = $reports->where('time', '>=', $tungay)->where('time', '<=', $denngay2)->whereNotin('datatable', ['nhankhau', 'users'])->get();
		
			// $reports = DB::table('report')
			// ->when($type_filter, function ($query, $type_filter) {

			// 	return $query->where('type', $type_filter);
			// })
			// ->when($tungay, function ($query, $tungay) {
			// 	return $query->where('time', '>=', $tungay);
			// })
			// ->when($denngay, function ($query, $denngay) {
			// 	return $query->where('time', '<=', $denngay);
			// })

			// ->when($time_filter, function ($query, $time_filter) {
			// 	$ym = explode('-', $time_filter, 2);
			// 	$timeS = Carbon::create($ym[0], $ym[1])->startOfMonth();
			// 	$timeE = Carbon::create($ym[0], $ym[1])->endOfMonth();
			// 	return $query->whereBetween("time", [$timeS, $timeE]);
			// })
			// ->when($uid, function ($query, $uid) {
			// 	return $query->where('user', $uid);
			// })
			// ->whereNotin('datatable',['nhankhau','users'])
			// ->orderBy('id', 'desc')->get();
		
		$a = [];
		foreach($reports as $item){
			$item2 = Carbon::parse($item->time)->toDateString();
			if ($item2 == $tungay) {
				array_push($a, $item);
			}
			// if ( $item2 == $denngay ) {
			// 	array_push($a,$item);
			// }
			if ( $item2 >= $tungay && $item2 <= $denngay2 ) {
				array_push($a,$item);
			}
		}
	
		$b = a_unique(array_column( $a , 'user'));
	
		// $reports = $reports->whereBetween('time',[$tungay,$denngay])->get();
		// // dd($reports);
		// $a = a_unique(array_column($reports->toarray(), 'user'));
	
		if ($request->type_filter == 'chuakhaibao') {
			$model_congty = Company::join('users', 'users.id', 'company.user')
				->select('company.name', 'company.user', 'company.id')
				->whereNotin('company.user', $b)
				->get();
				
		} else {
			$model_congty = Company::join('users', 'users.id', 'company.user')
				->select('company.name','company.user', 'company.id')
				->wherein('company.user', $b)
				->get();
		}
		// dd($model_congty);
		$inputs['url'] = '/report-ba';
		// dd($reports);
		return view('admin.report.all')->with('model_congty', $model_congty)
			->with('reports', $reports)
			->with('baocao', getdulieubaocao())
			->with('search', $search)
			->with('time_filter', $time_filter)
			->with('type_filter', $type_filter)
			->with('inputs', $inputs)
			->with('tungay', $tungay)
			->with('denngay', $denngay);
	}


	public function detail(Request $request)
	{
		$inputs = $request->all();
		// $reports = Report::where('user', $request->user)->where(function ($q) use ($inputs) {
		// 	if (isset($inputs['tungay'])) {
		// 		$q->where('time', '>=', $inputs['tungay'])->where('time', '<=', $inputs['denngay']);
		// 	}
		// })->get();
		$reports = Report::where('user', $inputs['user'])->get();

		if (!isset($inputs['tungay'])) {
			$inputs['tungay'] = null;
			$inputs['denngay'] = null;
		}else{
			$a = [];
			foreach ($reports as $rp) {
				$rp2 = Carbon::parse($rp->time)->toDateString();

				if ($rp2 >= $inputs['tungay'] && $rp2 <= $inputs['denngay']) {
					array_push($a, $rp);
				}
				if ($rp2 == $inputs['denngay']) {
					array_push($a, $rp);
				}
			}
			$reports = $a;
		}

		foreach ($reports as $report) {
			$ct = DB::table('company')->where('user', $report->user)->first();
			if ($ct) {
				$report->ctyname = $ct->name;
			} else {
				$report->ctyname = "";
			}
		}

		$url = '/report-ba?type_filter=' . $request->type_filter . '&tungay=' . $inputs['tungay'] . '&denngay=' . $inputs['denngay'];
		return view('admin.report.detail')->with('reports', $reports)->with('url', $url)->with('user_id', $inputs['user'])
		->with('tungay', $inputs['tungay'])->with('denngay', $inputs['denngay'])
		->with('baocao', getdulieubaocao());
	}


	public function detail_in(Request $request)
	{
		$inputs = $request->all();
		$model = Report::where('user', $inputs['user'])->where('type', $inputs['loaikhaibao'])->get();
		$a = [];
		foreach($model as $rp){
			$rp2 = Carbon::parse($rp->time)->toDateString();
			if ($rp->time >= $inputs['tungay'] && $rp->time <= $inputs['denngay']) {
				array_push($a,$rp);
			}
			if ($rp2 == $inputs['denngay']) {
				array_push($a,$rp);
			}
		}
		$model = $a;
		$tencty = Company::select('name')->where('user', $inputs['user'])->first();
		return view('admin.report.indetail')->with('model', $model)->with('loaikhaibao', $inputs['loaikhaibao'])
		->with('tencty', $tencty)->with('pageTitle', 'Danh sách khai báo');
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
		$other_info = $em->getTonghop($dn->id);
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


	public function edit($cid)
	{
		$dmhc = $this->getdanhmuc();
		$kcn = $this->getParamsByNametype("Khu công nghiệp"); // lấy danh mục khu công nghiệp
		$ctype = $this->getParamsByNametype("Loại hình doanh nghiệp"); // lấy loại hình doanh nghiệp
		$cfield = $this->getParamsByNametype("Ngành nghề doanh nghiệp"); // lấy ngành nghề doanh nghiệp

		$company = DB::table('company')->where('id', $cid)->first();
		//print_r($cat);
		return view('admin.company.edit')
			->with('dmhc', $dmhc)
			->with('baocao', getdulieubaocao())
			->with('info', $company)
			->with('ctype', $ctype)
			->with('kcn', $kcn)
			->with('cfield', $cfield);
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


	public function tonghop_in(Request $request)
	{
		$model = Report::where('user', $request->id);
		if ($request->time == 'thang') {
			$tungay = Carbon::create($request->nam, $request->thang, 5)->toDateString();
			$denngay = Carbon::create($request->nam, $request->thang + 1, 4)->toDateString();
		} elseif ($request->time == 'quy') {
			if ($request->quy == '1') {
				$tungay = Carbon::create($request->nam, 1, 1)->toDateString();
				$denngay = Carbon::create($request->nam, 3, 31)->toDateString();
			}
			if ($request->quy == '2') {
				$tungay = Carbon::create($request->nam, 4, 1)->toDateString();
				$denngay = Carbon::create($request->nam, 6, 30)->toDateString();
			}
			if ($request->quy == '3') {
				$tungay = Carbon::create($request->nam, 7, 1)->toDateString();
				$denngay = Carbon::create($request->nam, 9, 30)->toDateString();
			}
			if ($request->quy == '4') {
				$tungay = Carbon::create($request->nam, 10, 1)->toDateString();
				$denngay = Carbon::create($request->nam, 12, 31)->toDateString();
			}
		} else {
			$tungay = Carbon::create($request->nam, 1, 1)->toDateString();
			$denngay = Carbon::create($request->nam, 12, 31)->toDateString();
		}

		$model = $model->where('time', '>=', $tungay)->where('time', '<=', $denngay)->get();

		$tencty = Company::select('name')->where('user', $request->id)->first();


		return view('admin.report.indetail')->with('model', $model)->with('tencty', $tencty)->with('pageTitle', 'Danh sách khai báo')
			->with('loaikhaibao', 'khaibao');
	}


	public function doanhnghiep_in(Request $request)
	{

		// $reports = DB::table('report')->where('time', '>=', $request->tungay_dn)->where('time', '<=', $request->denngay_dn)->get();
		$inputs = $request->all();
		$reports = Report::all();
		$a = [];
		foreach($reports as $rp){
			$rp2 = Carbon::parse($rp->time)->toDateString();
			if ($rp->time >= $inputs['tungay_dn'] && $rp->time <= $inputs['denngay_dn']) {
				array_push($a,$rp);
			}
			if ($rp2 == $inputs['denngay_dn']) {
				array_push($a,$rp);
			}
		}
		$reports = $a;
		$b = [];
		foreach ($reports as $rp) {
			array_push($b, $rp->user);
		}
		$b = a_unique($b);
		if ($request->loai == 'kkb') {
			$model = Company::join('users', 'users.id', 'company.user')
				->select('company.*', 'users.id')
				->whereNotIn('users.id', $b)
				->get();
		} else {
			$model = Company::join('users', 'users.id', 'company.user')
				->select('company.*', 'users.id')
				->wherein('users.id', $b)
				->get();
		}
		$ctype = $this->getParamsByNametype("Loại hình doanh nghiệp"); // lấy loại hình doanh nghiệp
		$cfield = $this->getParamsByNametype("Ngành nghề doanh nghiệp"); // lấy ngành nghề doanh nghiệp

		return view('/admin.report.indoanhnghiep')->with('model', $model)->with('ctype', $ctype)->with('cfield', $cfield)
			->with('loai', $request->loai)->with('pageTitle', 'Danh sách phân loại doanh nghiệp');
	}

}
