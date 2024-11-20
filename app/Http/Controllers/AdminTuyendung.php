<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Danhmuc\danhmuchanhchinh;
use App\Models\Danhmuc\dmdonvi;
use Illuminate\Http\Request;
use DB;

use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Http\RedirectResponse;
use App\Models\Tuyendung;
use App\Models\Vitrituyendung;
use App\Models\vitrituyendungModel;

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
		$dmhc_list = $m_danhmuc->where('capdo', 'H');
		//filter
		$search = $request->search;
		$public_filter = $request->public_filter;
		$dm_filter = $request->dm_filter;
		$ds_ma_xa = array_column($m_danhmuc->where('parent', $dm_filter)->toarray(), 'madv');
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
		$dmhc_list = $m_danhmuc->where('capdo', 'H');
		//filter
		$search = $request->search;
		$public_filter = $request->public_filter;
		$dm_filter = $request->dm_filter;

		$ds_ma_xa = array_column($m_danhmuc->where('parent', $dm_filter)->toarray(), 'madv');
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
			->select('tuyendung.*', 'company.name', 'company.madv')
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

	public function TraCuu(Request $request)
	{
		$inputs = $request->all();
		$company = array_column(Company::all()->toarray(), 'name', 'id');
		return view('admin.tuyendung.tracuu.index', compact('company'))
			->with('baocao', getdulieubaocao())
			->with('inputs', $inputs)
			->with('pageTitle', 'Tra cứu thông tin việc cần tìm');
	}

	public function KetQuaTraCuu(Request $request)
	{
		$inputs = $request->all();
		// $company = array_column(Company::all()->toarray(), 'name', 'id');
		$model = Tuyendung::join('company', 'tuyendung.user', '=', 'company.user')
							->select('tuyendung.*','company.name AS congty');
		if (isset($inputs['company'])) {
			$model = $model->where('company.name', 'like', '%' . $inputs['company'] . '%');
		}
		if (isset($inputs['noidung'])) {
			$model = $model->where('tuyendung.noidung', 'like', '%' . $inputs['noidung'] . '%');
		}
		if (isset($inputs['hannop'])) {
			$model = $model->where('tuyendung.thoihan', '<', $inputs['hannop']);
		}

		$model = $model->get();
		$a_model = array_column($model->toarray(), 'id');
		$vitri = vitrituyendungModel::wherein('idtuyendung', $a_model);
		if ($inputs['vitri']) {
			$vitri = $vitri->where('name', 'like', '%' . $inputs['vitri'] . '%');
		}
		$vitri = $vitri->get();
		foreach ($model as $k=>$td) {
			$vitris = $vitri->where('idtuyendung', $td->id);
			if ($vitris->isEmpty()) {
				$model->forget($k);
				continue;
			}
			$td->desc = "";
			$td->sltuyen = 0;
			foreach ($vitris as $vt) {
				$td->desc .= $vt->name . ". ";
				$td->sltuyen += $vt->soluong;
			}
		}

		$result = '<div class="row" id="ketqua">';
		$result .= '<div class="col-md-12">';
		$result .= '<table id="sample_3" class="table table-striped table-bordered table-hover dataTable no-footer">';
		$result .= '<thead>';
		$result .= '<tr class="text-center">';
		$result .= '<th width="5%"> STT </th>';
		$result .= ' <th>Doanh nghiệp</th>';
		$result .= ' <th>Tên công việc</th>';
		$result .= ' <th>Vị trí</th>';
		$result .= ' <th>Số lượng</th>';
		$result .= ' <th width="8%">Ngày đăng</th>';
		$result .= ' <th width="8%">Hạn cuối</th>';
		$result .= ' </tr>';
		$result .= '</thead>';
		$result .= ' <tbody>';
		foreach ($model as $key => $ct) {

			$result .= '<tr>';
			$result .= '<td>' . (++$key) . ' </td>';
			$result .= '<td><a href="">' . $ct->congty . '</a></td>';
			$result .= '<td><span class="text-center"> </span>' . $ct->noidung . '</td>';
			$result .= '<td><span class="text-center"> </span>' . $ct->desc  . '</td>';
			$result .= '<td><span class="text-center"> </span>' . $ct->sltuyen . '</td>';
			$result .= '<td><span class="text-center"> </span>' . (date('d-m-Y', strtotime($td->created_at))) . '</td>';
			$result .= '<td><span class="text-center"> </span>' . (date('d-m-Y', strtotime($td->thoihan))) . '</td>';
			$result .= '</tr>';
		}
		$result .= ' </tbody>';
		$result .= '</table>';
		$result .= '</div>';
		$result .= '</div>';

		return response()->json($result);
	}
}
