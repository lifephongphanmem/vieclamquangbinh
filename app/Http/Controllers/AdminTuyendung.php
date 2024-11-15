<?php

namespace App\Http\Controllers;

use App\Models\Danhmuc\danhmuchanhchinh;
use App\Models\Danhmuc\dmdonvi;
use Illuminate\Http\Request;
use DB;

use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Http\RedirectResponse;
use App\Models\Tuyendung;
use App\Models\Vitrituyendung;

session_start();

class AdminTuyendung extends Controller
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
	public function show_all($cid = null)
	{
		$request = request();
		// $dmhc_list = $this->getDmhc();
		$m_danhmuc = danhmuchanhchinh::join('dmdonvi', 'dmdonvi.madiaban', 'danhmuchanhchinh.id')
		->select('danhmuchanhchinh.*', 'dmdonvi.madv')
	   ->get();
	   $dmhc_list =$m_danhmuc->where('capdo','H');
		//filter
		$search = $request->search;
		$public_filter = $request->public_filter;
		$dm_filter = $request->dm_filter;
		$ds_ma_xa = array_column($m_danhmuc->where('parent', $dm_filter)->toarray(),'madv');
		// dd($dm_filter);
		$tds = DB::table('tuyendung')->join('company', 'tuyendung.user', '=', 'company.user')
			->when($search, function ($query, $search) {
				return $query->where('tuyendung.noidung', 'like', '%' . $search . '%')
					->orwhere('company.name', 'like', '%' . $search . '%');
			})
			->when($public_filter, function ($query, $public_filter) {
				return $query->where('tuyendung.state', $public_filter);
			})
			->when($dm_filter, function ($query, $ds_ma_xa) {
				return $query->where('company.huyen', $ds_ma_xa);
			})
			->when($cid, function ($query, $cid) {
				return $query->where('company.id', $cid);
			})
			->select('tuyendung.*', 'company.name')
			->orderBy('tuyendung.id', 'desc')
			->get();

		$vtmodel = new Vitrituyendung;
		foreach ($tds as $td) {
			$vitris = $vtmodel->getVitris($td->id);
			$td->desc = "";
			$td->sltuyen = 0;
			foreach ($vitris as $vt) {
				$td->desc .= $vt->name . ". ";
				$td->sltuyen += $vt->soluong;
			}
		}
		$vitri = Vitrituyendung::select('id', 'idtuyendung', 'name')->get();

		return view('admin.tuyendung.all')
			->with('tds', $tds)
			->with('baocao', getdulieubaocao())
			->with('dmhc_list', $dmhc_list)
			->with('search', $search)
			->with('dm_filter', $dm_filter)
			->with('public_filter', $public_filter)
			->with('vitri', $vitri);
	}

	public function viectimnguoi($cid = null)
	{
		$request = request();
		// $dmhc_list = $this->getDmhc();
		
		$m_danhmuc = danhmuchanhchinh::join('dmdonvi', 'dmdonvi.madiaban', 'danhmuchanhchinh.id')
		->select('danhmuchanhchinh.*', 'dmdonvi.madv')
	   ->get();
	   	$dmhc_list =$m_danhmuc->where('capdo','H');
		//filter
		$search = $request->search;
		$public_filter = $request->public_filter;
		$dm_filter = $request->dm_filter;
	
		$ds_ma_xa = array_column($m_danhmuc->where('parent', $dm_filter)->toarray(),'madv');
		// dd($ds_ma_xa);
		$tds = DB::table('tuyendung')->join('company', 'tuyendung.user', '=', 'company.user')
			->when($search, function ($query, $search) {
				return $query->where('tuyendung.noidung', 'like', '%' . $search . '%')
					->orwhere('company.name', 'like', '%' . $search . '%');
			})
			// ->when($public_filter, function ($query, $public_filter) {
			// 	return $query->where('tuyendung.state', $public_filter);
			// })
			->when($dm_filter, function ($query, $ds_ma_xa) {
				return $query->where('company.huyen', $ds_ma_xa);
			})
			->when($cid, function ($query, $cid) {
				return $query->where('company.id', $cid);
			})

			// ->where('state','1')
			->select('tuyendung.*', 'company.name','company.madv')
			->orderBy('tuyendung.id', 'desc')
			->get();
		// dd($tds);
		$vtmodel = new Vitrituyendung;
		foreach ($tds as $td) {
			$vitris = $vtmodel->getVitris($td->id);
			$td->desc = "";
			$td->sltuyen = 0;
			foreach ($vitris as $vt) {
				$td->desc .= $vt->name . ". ";
				$td->sltuyen += $vt->soluong;
			}
		}
		$vitri = Vitrituyendung::select('id', 'idtuyendung', 'name')->get();

		return view('admin.tuyendung.viectimnguoi')
			->with('tds', $tds)
			->with('baocao', getdulieubaocao())
			->with('dmhc_list', $dmhc_list)
			->with('search', $search)
			->with('dm_filter', $dm_filter)
			->with('public_filter', $public_filter)
			->with('vitri', $vitri);
	}


	public function edit($tdid)
	{
		// get params
		$td = Tuyendung::find($tdid);
		$vtmodel = new Vitrituyendung;
		$vitris = $vtmodel->getVitris($td->id);

		return view('admin.tuyendung.edit')
			->with('td', $td)
			->with('baocao', getdulieubaocao())
			->with('vitris', $vitris);
	}

	public function getDmhc()
	{
		$cats = DB::table('danhmuchanhchinh')->where('level', 'huyện')->orwhere('level', 'thành phố')->get();
		return $cats;
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
	public function duyet($tdid)
	{
		$td = Tuyendung::find($tdid);
		$td->state = 1;
		$td->save();
		Session::put('message', "Cập nhật thành công");
		return redirect('tuyendung-ba');
	}

	public function get_vitri(Request $request)
	{
		$model = Vitrituyendung::where('idtuyendung', $request->id)->get();

		$html = ' <ol id = "vt">';
		foreach ($model as $ct) {

			$html .= '<li> <a href="/vanban/mauso_03a_pl1?id=' . $ct->id . '&idtuyendung=' . $ct->idtuyendung . '" target="_blank" >' . $ct->name . '</a> </li>';
		};
		$html .= '</ol>';
		return response()->json($html);
	}
}
