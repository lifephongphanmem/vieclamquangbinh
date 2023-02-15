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

	public function show_all($uid = null)
	{
		$request = request();
		$search = $request->search;
		$time_filter = $request->time_filter;
		if ($request->tungay == null && $request->denngay == null) {
			$nam = date('Y');
			$thang = date('m');
			$tungay = Carbon::create($nam, $thang, 5)->toDateString();
			$denngay = date('Y-m-d');
		} else {
			$tungay = $request->tungay;
			$denngay = $request->denngay;
		}
		if ($request->type_filter == 'chuakhaibao') {
			$type_filter = null;
		} else {
			$type_filter = $request->type_filter;
		}
		$reports = DB::table('report')
			->when($type_filter, function ($query, $type_filter) {

				return $query->where('type', $type_filter);
			})
			// ->when($tungay, function ($query, $tungay) {
			// 	return $query->where('type', '>=', $tungay);
			// })
			// ->when($denngay, function ($query, $denngay) {
			// 	return $query->where('type', '<=', $denngay);
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
			->where('datatable', '!=', 'nhankhau')
			->orderBy('id', 'desc')
			->get();
		$a = [];
		if ($tungay != null && $denngay != null) {
			foreach ($reports as $item) {
				$dt = Carbon::parse($item->time);
				if ($dt->toDateString() <= $denngay && $tungay <= $dt->toDateString()) {
					array_push($a, $item);
				}
			}
		} else {
			if ($tungay != null) {

				foreach ($reports as $item) {
					$dt = Carbon::parse($item->time);
					// dd($dt->toDateString() >= $tungay);
					if ($dt->toDateString() >= $tungay) {
						array_push($a, $item);
					}
				}
			}

			if ($denngay != null) {

				foreach ($reports as $item) {
					$dt = Carbon::parse($item->time);
					if ($dt->toDateString() <= $denngay) {
						array_push($a, $item);
					}
				}
			}
		}
		// foreach ($reports as $report) {
		// 	$ct = DB::table('company')->where('user', $report->user)->get()->first();
		// 	if ($ct) {
		// 		$report->ctyname = $ct->name;
		// 	} else {
		// 		$report->ctyname = "";
		// 	}
		// }
		$b = [];
		if ($tungay == null && $denngay == null) {
			if ($request->type_filter == 'chuakhaibao') {
				foreach ($reports as $item) {
					if ($item->datatable == 'nguoilaodong' || $item->datatable == 'notable') {
						array_push($b, $item);
					}
				}
				$a = a_unique(array_column($b, 'user'));
			} else {
				$a = a_unique(array_column($reports->toarray(), 'user'));
			}
		} else {
			if ($request->type_filter == 'chuakhaibao') {
				foreach ($a as $item) {
					if ($item->datatable == 'nguoilaodong' || $item->datatable == 'notable') {
						array_push($b, $item);
					}
				}
				$a = a_unique(array_column($b, 'user'));
			} else {
				$a = a_unique(array_column($a, 'user'));
			}
		}
		
		// $a = a_unique(array_column($a->toarray(), 'user'));
		if ($request->type_filter == 'chuakhaibao') {
			$model_congty = Company::join('users', 'users.id', 'company.user')
				->select('company.name', 'users.id')
				->whereNotIn('users.id', $a)
				->get();
		} else {
			$model_congty = Company::join('users', 'users.id', 'company.user')
				->select('company.name', 'users.id')
				->wherein('users.id', $a)
				->get();
		}
		$inputs['url'] = '/report-ba';
		$type_filter = $request->type_filter;

		return view('admin.report.all')->with('model_congty', $model_congty)
			->with('search', $search)
			->with('time_filter', $time_filter)
			->with('type_filter', $type_filter)
			->with('inputs', $inputs)
			->with('tungay', $tungay)
			->with('denngay', $denngay);
	}


	public function detail(Request $request)
	{

		$reports = Report::where('user', $request->user)->where('time', '>=', $request->tungay)->where('time', '<=', $request->denngay)->get();

		foreach ($reports as $report) {
			$ct = DB::table('company')->where('user', $report->user)->get()->first();
			if ($ct) {
				$report->ctyname = $ct->name;
			} else {
				$report->ctyname = "";
			}
		}
		$url = '/report-ba?type_filter=' . $request->type_filter . '&tungay=' . $request->tungay . '&denngay=' . $request->denngay;
		return view('admin.report.detail')->with('reports', $reports)->with('url', $url)->with('user_id', $request->user)->with('tungay', $request->tungay)->with('denngay', $request->denngay);
	}


	public function detail_in(Request $request)
	{
		$model = Report::where('user', $request->user)->where('time', '>=', $request->tungay)
		->where('time', '<=', $request->denngay)->where('type',$request->loaikhaibao)->get();
		$cty = $model->first();
		if ($cty == null) {
			$tencty = '';
		}
		else{
			$tencty = Company::select('name')->where('user',$cty->user)->first();
		}

		return view('admin.report.indetail')->with('model', $model)->with('loaikhaibao', $request->loaikhaibao)->with('tencty',$tencty)->with('pageTitle','Danh sách khai báo');
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
}
