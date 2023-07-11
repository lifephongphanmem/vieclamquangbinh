<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Employer;
use App\Models\Report;
use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Exports\BaocaoExport;
use App\Models\Danhmuc\dmdonvi;
use App\Models\danhsach;
use App\Models\Nhankhau;
use App\Models\nhankhauModel;
use App\Models\tonghopcunglaodong;
use Maatwebsite\Excel\Facades\Excel;


class AdminController extends Controller
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
	public function login()
	{

		return view('admin.login');
	}
	public function dashboard()
	{

		//chạy đơn vị huyện
		// foreach ($dmdonvi as $item) {
		// 	if ($item->capdo == 'H') {
		// 		$data = array();
		// 		$data['kydieutra'] = $nam;
		// 		$data['madv'] = $item->madv;
		// 		$data['capdo'] = $item->capdo;
		// 		$data['tendv'] = $item->tendv;
		// 		$data['nam'] = 0;
		// 		$data['nu'] = 0;
		// 		$data['ldtren15'] = 0;
		// 		$data['ldcovieclam'] = 0;
		// 		$data['ldthatnghiep'] = 0;
		// 		$data['ldkhongthamgia'] = 0;
		// 		$data['thanhthi'] = 0;
		// 		$data['nongthon'] = 0;
		// 		foreach($dmdonvi as $item2){
		// 			if ($item->maquocgia == $item2->parent) {
		// 				$cungld = $tonghopcunglaodong->where('madv',$item2->madv)->first();
		// 				// dd($item2->madv);
		// 				$data['nam'] += $cungld->nam; 
		// 				$data['nu'] += $cungld->nu;
		// 				$data['ldtren15'] += $cungld->ldtren15;
		// 				$data['ldcovieclam'] += $cungld->ldcovieclam;
		// 				$data['ldthatnghiep'] += $cungld->ldthatnghiep;
		// 				$data['ldkhongthamgia'] += $cungld->ldkhongthamgia;
		// 				$data['thanhthi'] += $cungld->thanhthi;
		// 				$data['nongthon'] += $cungld->nongthon;
		// 			}
		// 		}
		// 		tonghopcunglaodong::create($data);
		// 	}
		// }
		//chạy đơn vị tỉnh
		// foreach ($dmdonvi as $item) {
		// 	if ($item->capdo == 'T') {
		// 		$data = array();
		// 		$data['kydieutra'] = $nam;
		// 		$data['madv'] = $item->madv;
		// 		$data['capdo'] = $item->capdo;
		// 		$data['tendv'] = $item->tendv;
		// 		$data['nam'] = 0;
		// 		$data['nu'] = 0;
		// 		$data['ldtren15'] = 0;
		// 		$data['ldcovieclam'] = 0;
		// 		$data['ldthatnghiep'] = 0;
		// 		$data['ldkhongthamgia'] = 0;
		// 		$data['thanhthi'] = 0;
		// 		$data['nongthon'] = 0;
		// 		foreach($dmdonvi as $item2){
		// 			if ($item->maquocgia == $item2->parent) {
		// 				$cungld = $tonghopcunglaodong->where('madv',$item2->madv)->first();
		// 				// dd($item2->madv);
		// 				$data['nam'] += $cungld->nam; 
		// 				$data['nu'] += $cungld->nu;
		// 				$data['ldtren15'] += $cungld->ldtren15;
		// 				$data['ldcovieclam'] += $cungld->ldcovieclam;
		// 				$data['ldthatnghiep'] += $cungld->ldthatnghiep;
		// 				$data['ldkhongthamgia'] += $cungld->ldkhongthamgia;
		// 				$data['thanhthi'] += $cungld->thanhthi;
		// 				$data['nongthon'] += $cungld->nongthon;
		// 			}
		// 		}
		// 		 tonghopcunglaodong::create($data);
		// 	}
		// }
		//  dd(tonghopcunglaodong::all());

		$ctys = DB::table('company')->where('user', null)->get();
		$dinfo = $this->getDashboard();
		$dinfo['laodong'] += $ctys->sum('sld');
		$emodel = new Employer;
		$einfo = $emodel->getEmployerState();
		$einfo['tong'] += $ctys->sum('sld');
		$rmodel = new Report;
		$thismonth = date('Y-m');
		$lastmonth = date("Y-m", strtotime(date("Y-m-d", strtotime(date("Y-m-d"))) . "-1 month"));
		$ebd = $rmodel->getBiendong($thismonth);
		$rinfoup = $emodel->getEmployerStateById($ebd->tang['eid']);
		$rinfodown = $emodel->getEmployerStateById($ebd->giam['eid']);
		$last_ebd = $rmodel->getBiendong($lastmonth);
		$last_rinfoup = $emodel->getEmployerStateById($last_ebd->tang['eid']);
		$last_rinfodown = $emodel->getEmployerStateById($last_ebd->giam['eid']);
		$request = request();
		$m_filter_s = $request->m_filter_s;
		$m_filter_e = $request->m_filter_e;
		$export = $request->export;
		if ($export) {
			return Excel::download(new BaocaoExport, 'tinhhinhsudunglaodong' . date('m-d-Y-His A e') . '.xlsx');
		}
		if ($m_filter_s && $m_filter_e) {
			$cus_ebd = $rmodel->getcusBiendong($m_filter_s, $m_filter_e);
		} else {
			$cus_ebd = $rmodel->getBiendong($thismonth);
		}

		$cus_rinfoup = $emodel->getEmployerStateById($cus_ebd->tang['eid']);
		$cus_rinfodown = $emodel->getEmployerStateById($cus_ebd->giam['eid']);
		if (in_array(session('admin')->sadmin, ['ADMIN', 'SSA'])) {
			$kydieutra = danhsach::max('kydieutra');
		} elseif (session('admin')->capdo == 'H') {
			$madv = array_column(getMaXa(session('admin')->maquocgia)->toarray(), 'madv');
			$kydieutra = danhsach::wherein('user_id', $madv)->max('kydieutra');
		} elseif (session('admin')->capdo == 'X') {
			$kydieutra = danhsach::where('user_id', session('admin')->madv)->max('kydieutra');
		}
		// $kydieutra = danhsach::max('kydieutra');
		//  dd($kydieutra);
		if ($kydieutra == date(('Y'))) {
			$kydieutra_truoc = $kydieutra - 1;
			$kydieutra_hientai = date('Y');
		} else {
			$kydieutra_truoc = '';
			$kydieutra_hientai = $kydieutra;
		}

		$tongsonhankhau = array('kytruoc' => 0, 'kyhientai' => 0);
		$ldcovieclam = array('kytruoc' => 0, 'kyhientai' => 0);
		$ldthatnghiep = array('kytruoc' => 0, 'kyhientai' => 0);
		$ldkhongthamgia = array('kytruoc' => 0, 'kyhientai' => 0);

		if (in_array(session('admin')->sadmin, ['ADMIN', 'SSA'])) {
			$model= tonghopcunglaodong::wherein('kydieutra', [$kydieutra_truoc,$kydieutra_hientai])->get();
			$model_truoc = $model->where('kydieutra', $kydieutra_truoc)->get();
			if (count($model_truoc) > 0) {
				foreach ($model_truoc as $m_truoc) {
					$tongsonhankhau['kytruoc'] += $m_truoc['ldtren15'];
					$ldcovieclam['kytruoc'] += $m_truoc['ldcovieclam'];
					$ldthatnghiep['kytruoc'] += $m_truoc['ldthatnghiep'];
					$ldkhongthamgia['kytruoc'] += $m_truoc['ldkhongthamgia'];
				}
			}
			$model_hientai = $model->where('kydieutra', $kydieutra_hientai)->get();
			if (count($model_hientai) > 0) {
				foreach ($model_hientai as $m_hientai) {
					$tongsonhankhau['kyhientai'] += $m_hientai['ldtren15'];
					$ldcovieclam['kyhientai'] += $m_hientai['ldcovieclam'];
					$ldthatnghiep['kyhientai'] += $m_hientai['ldthatnghiep'];
					$ldkhongthamgia['kyhientai'] += $m_hientai['ldkhongthamgia'];
				}
			}
		} else if (session('admin')->capdo == 'H') {
			$model= tonghopcunglaodong::wherein('kydieutra', [$kydieutra_truoc,$kydieutra_hientai])->get();
			// $madv_huyen = array_column(getMaXa(session('admin')->maquocgia)->toarray(), 'madv');
			$dmdonvi = dmdonvi::join('danhmuchanhchinh', 'danhmuchanhchinh.id', 'dmdonvi.madiaban')
				->select('dmdonvi.madv', 'dmdonvi.tendv', 'danhmuchanhchinh.capdo', 'danhmuchanhchinh.level', 'danhmuchanhchinh.parent', 'danhmuchanhchinh.maquocgia')
				->get();
			$maquocgia = $dmdonvi->where('madv', session('admin')->madv)->first()->maquocgia;
			$ds_madv_xa = array_column($dmdonvi->where('parent', $maquocgia)->toarray(), 'madv');
			$model_truoc = $model->where('kydieutra', $kydieutra_truoc)->whereIn('madv', $ds_madv_xa)->get();
			if (count($model_truoc) > 0) {
				foreach ($model_truoc as $m_truoc) {
					$tongsonhankhau['kytruoc'] += $m_truoc['ldtren15'];
					$ldcovieclam['kytruoc'] += $m_truoc['ldcovieclam'];
					$ldthatnghiep['kytruoc'] += $m_truoc['ldthatnghiep'];
					$ldkhongthamgia['kytruoc'] += $m_truoc['ldkhongthamgia'];
				}
			}
			$model_hientai = $model->where('kydieutra', $kydieutra_hientai)->whereIn('madv', $ds_madv_xa)->get();
			if (count($model_hientai) > 0) {
				foreach ($model_hientai as $m_hientai) {
					$tongsonhankhau['kyhientai'] += $m_hientai['ldtren15'];
					$ldcovieclam['kyhientai'] += $m_hientai['ldcovieclam'];
					$ldthatnghiep['kyhientai'] += $m_hientai['ldthatnghiep'];
					$ldkhongthamgia['kyhientai'] += $m_hientai['ldkhongthamgia'];
				}
			}
		} else {
			$madv = session('admin')->madv;
			$model = tonghopcunglaodong::where('madv', $madv)->get();

			$model_truoc = $model->where('kydieutra', $kydieutra_truoc)->first();
			$model_hientai = $model->where('kydieutra', $kydieutra_hientai)->first();
			if (isset($model_truoc)) {
				$tongsonhankhau['kytruoc'] = $model_truoc->ldtren15;
				$ldcovieclam['kytruoc'] = $model_truoc->ldcovieclam;
				$ldthatnghiep['kytruoc'] = $model_truoc->ldthatnghiep;
				$ldkhongthamgia['kytruoc'] = $model_truoc->ldkhongthamgia;
			}
			if (isset($model_hientai)) {
				$tongsonhankhau['kyhientai'] =  $model_hientai->ldtren15;
				$ldcovieclam['kyhientai'] = $model_hientai->ldcovieclam;
				$ldthatnghiep['kyhientai'] = $model_hientai->ldthatnghiep;
				$ldkhongthamgia['kyhientai'] = $model_hientai->ldkhongthamgia;
			}
		}


		//Tính biến động
		$tongso_biendong = $tongsonhankhau['kyhientai'] - $tongsonhankhau['kytruoc'];
		$ldcovieclam_biendong = $ldcovieclam['kyhientai'] - $ldcovieclam['kytruoc'];
		$ldthatnghiep_biendong = $ldthatnghiep['kyhientai'] - $ldthatnghiep['kytruoc'];
		$ldkhongthamgia_biendong = $ldkhongthamgia['kyhientai'] - $ldkhongthamgia['kytruoc'];
		// dd($ldcovieclam);


		return view('admin.dashboard')
			->with('einfo', $einfo)
			->with('baocao', getdulieubaocao())
			->with('tongso_biendong', $tongso_biendong)
			->with('ldcovieclam_biendong', $ldcovieclam_biendong)
			->with('ldthatnghiep_biendong', $ldthatnghiep_biendong)
			->with('ldkhongthamgia_biendong', $ldkhongthamgia_biendong)
			->with('kydieutra_truoc', $kydieutra_truoc)
			->with('kydieutra_hientai', $kydieutra_hientai)
			->with('tongsonhankhau', $tongsonhankhau)
			->with('ldcovieclam', $ldcovieclam)
			->with('ldthatnghiep', $ldthatnghiep)
			->with('ldkhongthamgia', $ldkhongthamgia)
			->with('dinfo', $dinfo)
			->with('last_rinfoup', $last_rinfoup)
			->with('last_rinfodown', $last_rinfodown)
			->with('cus_rinfoup', $cus_rinfoup)
			->with('cus_rinfodown', $cus_rinfodown)
			->with('rinfoup', $rinfoup)
			->with('rinfodown', $rinfodown)
			->with('m_filter_s', $m_filter_s)
			->with('m_filter_e', $m_filter_e);
	}

	public function dashboard_cu()
	{
		// if (Auth::check()) {
		//   if(Auth::user()->level<3){
		$ctys = DB::table('company')->where('user', null)->get();
		$dinfo = $this->getDashboard();
		$dinfo['laodong'] += $ctys->sum('sld');
		$emodel = new Employer;
		$einfo = $emodel->getEmployerState();
		$einfo['tong'] += $ctys->sum('sld');
		$rmodel = new Report;
		$thismonth = date('Y-m');
		$lastmonth = date("Y-m", strtotime(date("Y-m-d", strtotime(date("Y-m-d"))) . "-1 month"));

		$ebd = $rmodel->getBiendong($thismonth);

		$rinfoup = $emodel->getEmployerStateById($ebd->tang['eid']);
		$rinfodown = $emodel->getEmployerStateById($ebd->giam['eid']);

		$last_ebd = $rmodel->getBiendong($lastmonth);
		$last_rinfoup = $emodel->getEmployerStateById($last_ebd->tang['eid']);
		$last_rinfodown = $emodel->getEmployerStateById($last_ebd->giam['eid']);

		$request = request();
		$m_filter_s = $request->m_filter_s;
		$m_filter_e = $request->m_filter_e;

		$export = $request->export;
		if ($export) {
			return Excel::download(new BaocaoExport, 'tinhhinhsudunglaodong' . date('m-d-Y-His A e') . '.xlsx');
		}
		if ($m_filter_s && $m_filter_e) {
			$cus_ebd = $rmodel->getcusBiendong($m_filter_s, $m_filter_e);
		} else {
			$cus_ebd = $rmodel->getBiendong($thismonth);
		}


		$cus_rinfoup = $emodel->getEmployerStateById($cus_ebd->tang['eid']);
		$cus_rinfodown = $emodel->getEmployerStateById($cus_ebd->giam['eid']);
		if (in_array(session('admin')->sadmin, ['ADMIN', 'SSA'])) {
			$kydieutra = danhsach::max('kydieutra');
		} elseif (session('admin')->capdo == 'H') {
			$madv = array_column(getMaXa(session('admin')->maquocgia)->toarray(), 'madv');
			$kydieutra = danhsach::wherein('user_id', $madv)->max('kydieutra');
		} else {
			$kydieutra = danhsach::where('user_id', session('admin')->madv)->max('kydieutra');
		}

		//  dd($kydieutra);
		if ($kydieutra == date(('Y'))) {
			$kydieutra_truoc = $kydieutra - 1;
			$kydieutra_hientai = date('Y');
		} else {
			$kydieutra_truoc = '';
			$kydieutra_hientai = $kydieutra;
		}
		$tongsonhankhau = array('kytruoc' => 0, 'kyhientai' => 0);
		$ldcovieclam = array('kytruoc' => 0, 'kyhientai' => 0);
		$ldthatnghiep = array('kytruoc' => 0, 'kyhientai' => 0);
		$ldkhongthamgia = array('kytruoc' => 0, 'kyhientai' => 0);

		if (in_array(session('admin')->sadmin, ['ADMIN', 'SSA'])) {
			// $tongsonhankhau=danhsach::where('kydieutra',$kydieutra_truoc)->sum('soluong');
			// $tongsonhankhau['kytruoc']=danhsach::wherein('kydieutra',$kydieutra_truoc)->sum('soluong');
			// $model_tinh=nhankhauModel::wherein('kydieutra',[$kydieutra_truoc,$kydieutra_hientai])->get();
			// $ldcovieclam=DB::table('nhankhau')->where('kydieutra',$kydieutra_truoc)->where('tinhtranghdkt','1')->count('id');
			// $ldthatnghiep=DB::table('nhankhau')->where('kydieutra',$kydieutra_truoc)->where('tinhtranghdkt','2')->count('id');
			// $ldkhongthamgia=DB::table('nhankhau')->where('kydieutra',$kydieutra_truoc)->where('tinhtranghdkt','3')->count('id');
			// $tongso = danhsach::wherein('kydieutra', [$kydieutra_truoc, $kydieutra_hientai])->get();
			// $tongsonhankhau['kytruoc'] = $tongso->where('kydieutra', $kydieutra_truoc)->sum('soluong');
			// $tongsonhankhau['kyhientai'] = $tongso->where('kydieutra', $kydieutra_hientai)->sum('soluong');


			$model = nhankhauModel::select('tinhtranghdkt', 'kydieutra')->wherein('kydieutra', [$kydieutra_truoc, $kydieutra_hientai])->where('loaibiendong', '!=', 2)->get();
			$tongsonhankhau['kytruoc'] = count($model->where('kydieutra', $kydieutra_truoc));
			$tongsonhankhau['kyhientai'] = count($model->where('kydieutra', $kydieutra_hientai));
			$ldcovieclam['kytruoc'] = $model->where('kydieutra', $kydieutra_truoc)->where('tinhtranghdkt', '1')->count();
			$ldcovieclam['kyhientai'] = $model->where('kydieutra', $kydieutra_hientai)->where('tinhtranghdkt', '1')->count();

			$ldthatnghiep['kytruoc'] = $model->where('kydieutra', $kydieutra_truoc)->where('tinhtranghdkt', '2')->count();
			$ldthatnghiep['kyhientai'] = $model->where('kydieutra', $kydieutra_hientai)->where('tinhtranghdkt', '2')->count();

			$ldkhongthamgia['kytruoc'] = $model->where('kydieutra', $kydieutra_truoc)->where('tinhtranghdkt', '3')->count();
			$ldkhongthamgia['kyhientai'] = $model->where('kydieutra', $kydieutra_hientai)->where('tinhtranghdkt', '3')->count();
		} else if (session('admin')->capdo == 'H') {
			$madv = array_column(getMaXa(session('admin')->maquocgia)->toarray(), 'madv');
			// $tongsonhankhau['kytruoc']=danhsach::where('kydieutra',$kydieutra_truoc)->wherein('user_id',$madv)->sum('soluong');
			// $ldcovieclam=DB::table('nhankhau')->where('kydieutra',$kydieutra_truoc)->wherein('madv',$madv)->where('tinhtranghdkt','1')->count('id');
			// $ldthatnghiep=DB::table('nhankhau')->where('kydieutra',$kydieutra_truoc)->wherein('madv',$madv)->where('tinhtranghdkt','2')->count('id');
			// $ldkhongthamgia=DB::table('nhankhau')->where('kydieutra',$kydieutra_truoc)->wherein('madv',$madv)->where('tinhtranghdkt','3')->count('id');

			// $tongso = danhsach::wherein('kydieutra', [$kydieutra_truoc, $kydieutra_hientai])->wherein('user_id', $madv)->get();
			// // dd($tongso);
			// $tongsonhankhau['kytruoc'] = $tongso->where('kydieutra', $kydieutra_truoc)->sum('soluong');
			// $tongsonhankhau['kyhientai'] = $tongso->where('kydieutra', $kydieutra_hientai)->sum('soluong');

			$model = nhankhauModel::select('tinhtranghdkt', 'kydieutra')->wherein('kydieutra', [$kydieutra_truoc, $kydieutra_hientai])->wherein('madv', $madv)->where('loaibiendong', '!=', 2)->get();

			$tongsonhankhau['kytruoc'] = count($model->where('kydieutra', $kydieutra_truoc));
			$tongsonhankhau['kyhientai'] = count($model->where('kydieutra', $kydieutra_hientai));

			$ldcovieclam['kytruoc'] = $model->where('kydieutra', $kydieutra_truoc)->where('tinhtranghdkt', '1')->count();
			$ldcovieclam['kyhientai'] = $model->where('kydieutra', $kydieutra_hientai)->where('tinhtranghdkt', '1')->count();

			$ldthatnghiep['kytruoc'] = $model->where('kydieutra', $kydieutra_truoc)->where('tinhtranghdkt', '2')->count();
			$ldthatnghiep['kyhientai'] = $model->where('kydieutra', $kydieutra_hientai)->where('tinhtranghdkt', '2')->count();

			$ldkhongthamgia['kytruoc'] = $model->where('kydieutra', $kydieutra_truoc)->where('tinhtranghdkt', '3')->count();
			$ldkhongthamgia['kyhientai'] = $model->where('kydieutra', $kydieutra_hientai)->where('tinhtranghdkt', '3')->count();
		} else {
			// $tongsonhankhau=danhsach::where('kydieutra',$kydieutra_truoc)->where('user_id',session('admin')->madv)->sum('soluong');
			// $tongso = danhsach::wherein('kydieutra', [$kydieutra_truoc, $kydieutra_hientai])->where('user_id', session('admin')->madv)->get();
			// $tongsonhankhau['kytruoc'] = $tongso->where('kydieutra', $kydieutra_truoc)->sum('soluong');
			// $tongsonhankhau['kyhientai'] = $tongso->where('kydieutra', $kydieutra_hientai)->sum('soluong');

			$model = nhankhauModel::select('tinhtranghdkt', 'kydieutra')->wherein('kydieutra', [$kydieutra_truoc, $kydieutra_hientai])->where('madv', session('admin')->madv)->where('loaibiendong', '!=', 2)->get();
			$tongsonhankhau['kytruoc'] = count($model->where('kydieutra', $kydieutra_truoc));
			$tongsonhankhau['kyhientai'] = count($model->where('kydieutra', $kydieutra_hientai));

			$ldcovieclam['kytruoc'] = $model->where('kydieutra', $kydieutra_truoc)->where('tinhtranghdkt', '1')->count();
			$ldcovieclam['kyhientai'] = $model->where('kydieutra', $kydieutra_hientai)->where('tinhtranghdkt', '1')->count();

			$ldthatnghiep['kytruoc'] = $model->where('kydieutra', $kydieutra_truoc)->where('tinhtranghdkt', '2')->count();
			$ldthatnghiep['kyhientai'] = $model->where('kydieutra', $kydieutra_hientai)->where('tinhtranghdkt', '2')->count();

			$ldkhongthamgia['kytruoc'] = $model->where('kydieutra', $kydieutra_truoc)->where('tinhtranghdkt', '3')->count();
			$ldkhongthamgia['kyhientai'] = $model->where('kydieutra', $kydieutra_hientai)->where('tinhtranghdkt', '3')->count();
		}

		//Tính biến động
		$tongso_biendong = $tongsonhankhau['kyhientai'] - $tongsonhankhau['kytruoc'];
		$ldcovieclam_biendong = $ldcovieclam['kyhientai'] - $ldcovieclam['kytruoc'];
		$ldthatnghiep_biendong = $ldthatnghiep['kyhientai'] - $ldthatnghiep['kytruoc'];
		$ldkhongthamgia_biendong = $ldkhongthamgia['kyhientai'] - $ldkhongthamgia['kytruoc'];
		// dd($ldcovieclam);


		return view('admin.dashboard')
			->with('einfo', $einfo)
			->with('baocao', getdulieubaocao())
			->with('tongso_biendong', $tongso_biendong)
			->with('ldcovieclam_biendong', $ldcovieclam_biendong)
			->with('ldthatnghiep_biendong', $ldthatnghiep_biendong)
			->with('ldkhongthamgia_biendong', $ldkhongthamgia_biendong)
			->with('kydieutra_truoc', $kydieutra_truoc)
			->with('kydieutra_hientai', $kydieutra_hientai)
			->with('tongsonhankhau', $tongsonhankhau)
			->with('ldcovieclam', $ldcovieclam)
			->with('ldthatnghiep', $ldthatnghiep)
			->with('ldkhongthamgia', $ldkhongthamgia)
			->with('dinfo', $dinfo)
			->with('last_rinfoup', $last_rinfoup)
			->with('last_rinfodown', $last_rinfodown)
			->with('cus_rinfoup', $cus_rinfoup)
			->with('cus_rinfodown', $cus_rinfodown)
			->with('rinfoup', $rinfoup)
			->with('rinfodown', $rinfodown)
			->with('m_filter_s', $m_filter_s)
			->with('m_filter_e', $m_filter_e);
	}

	public function getDashboard()
	{
		$info = array();
		$info['pcompany'] = Db::table('company')->where('public', 1)->count();
		$info['upcompany'] = Db::table('company')->where('public', 2)->count();
		// $a=DB::table('nguoilaodong')->select('MAX(id) AS maxid')->get();
		// dd($a);
		$info['laodong'] = Db::table('nguoilaodong')
			->whereIn('nguoilaodong.state', [1, 2, 3])
			// ->whereRaw('id IN (SELECT MAX(id) AS id FROM nguoilaodong GROUP BY cmnd )')
			->count();
		// dd(1);
		// dd($info['laodong']);
		$info['tuyendung'] = Db::table('tuyendung')->where('state', 1)->count();

		$thismonth = date('Y-m');
		$ym = explode('-', $thismonth, 2);
		$timeS = Carbon::create($ym[0], $ym[1])->startOfMonth();
		$timeE = Carbon::create($ym[0], $ym[1])->endOfMonth();

		$info['report'] = Db::table('report')
			->whereBetween("time", [$timeS, $timeE])
			->whereIn('datatable', ['nguoilaodong', 'company', 'notable'])
			->count();
		$info['dnkhaibao'] = DB::table('report')->whereBetween("time", [$timeS, $timeE])->where('datatable', '!=', 'nhankhau')->get();
		$info['dnkhaibao'] = $info['dnkhaibao']->unique('user')->count();
		return $info;
	}
	public function auth(Request $request)
	{
		$data = [
			'email' => $request->email,
			'password' => $request->password,
			'public' => 1,
			'level' => [2, 1], // level 1 2 for backen user
		];
		Auth::logout();
		// dd($data);
		$ret = Auth::attempt($data);
		// dd($ret);
		if ($ret) {
			$request->session()->regenerate();
			Session::put('message', "Đăng nhập thành công");
			return redirect('dashboard');
		} else {

			return redirect('admin')->withErrors(
				[
					'email' => 'Đăng nhập không thành công'
				]
			);
		}
	}

	public function logout()
	{
		Auth::logout();
		return redirect('admin');
	}
}
