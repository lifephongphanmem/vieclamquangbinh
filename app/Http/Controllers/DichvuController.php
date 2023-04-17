<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

use App\Models\Report;
use App\Models\Dichvu;
use App\Models\Dangky;


class  DichvuController extends Controller
{

	// public function __construct() {
	// 	$this->middleware(function ($request, $next) {
	//         if(!Auth::check()){ 
	// 		return redirect('admin');
	// 		};
	// 		if(Auth::user()->level!=3){
	// 			return redirect('home'); 
	// 			}
	// 		return $next($request);
	//     });
	// }   

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
		$state_filter = $request->input('state_filter', 0);
		$search = $request->search;

		$uid = Auth::user()->id;

		// get Employers
		$dvs = DB::table('dichvu')
			->when($search, function ($query, $search) {
				return $query->where('users.name', 'like', '%' . $search . '%');
			})
			->when($state_filter, function ($query, $state_filter) {
				return $query->where('dichvu.state', $state_filter);
			})
			->orderBy('id', 'DESC')
			->paginate(20);

		foreach ($dvs as $dv) {
			$company = DB::table('dangkydv')
				->where('user', $uid)
				->where('dichvu', $dv->id)->count();

			$dv->checkdk = $company;
		}
		return view('pages.dichvu.all')
			->with('dvs', $dvs)
			->with('state_filter', $state_filter)
			->with('search', $search);
	}
	public function show_dk($dvid)
	{
		$uid = Auth::user()->id;

		// get dang ky
		$dks = DB::table('dangkydv')
			->where('dichvu', $dvid)
			->orderBy('id', 'DESC')
			->paginate(20);

		foreach ($dks as $dk) {
			$company = DB::table('company')->where('user', $dk->user)->get()->first();
			$dk->company = $company;
		}
		return view('admin.dichvu.dangky')
			->with('dks', $dks);
	}





	public function dangky($dvid)
	{
		$uid = Auth::user()->id;


		// save tuyen dung
		$dkm = new Dangky;
		$dk = $dkm->insert($uid, $dvid);
		return redirect('dichvu-fa')->with('message', ' Đăng ký dịch vụ thành công! ');
	}

	public function getCompany($uid)
	{

		$dn = DB::table('company')->where('user', $uid)->first();
		return $dn;
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
