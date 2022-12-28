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
use App\Models\danhsach;
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
        // if (Auth::check()) {
        //   if(Auth::user()->level<3){
			  
			  
			 $dinfo=$this->getDashboard(); 
			 $emodel= new Employer;
			 $einfo=$emodel->getEmployerState();
			 $rmodel= new Report;
			 $thismonth= date('Y-m');
			 $lastmonth= date("Y-m", strtotime( date( "Y-m-d", strtotime( date("Y-m-d") ) ) . "-1 month" ) );
			 
			 $ebd=$rmodel->getBiendong($thismonth);

			 $rinfoup=$emodel->getEmployerStateById($ebd->tang['eid']);
			 $rinfodown=$emodel->getEmployerStateById($ebd->giam['eid']);
			 
			 $last_ebd=$rmodel->getBiendong($lastmonth);
			 $last_rinfoup=$emodel->getEmployerStateById($last_ebd->tang['eid']);
			 $last_rinfodown=$emodel->getEmployerStateById($last_ebd->giam['eid']);
			 
			$request = request();
			$m_filter_s = $request->m_filter_s;
			$m_filter_e = $request->m_filter_e;
	
			$export= $request->export;
		
			if($export){
				return Excel::download(new BaocaoExport, 'tinhhinhsudunglaodong'.date('m-d-Y-His A e').'.xlsx');
				
			} 
			if($m_filter_s&&$m_filter_e){
				$cus_ebd=$rmodel->getcusBiendong($m_filter_s,$m_filter_e);
			} else {
			 $cus_ebd=$rmodel->getBiendong($thismonth);
			}
			 
			 
			 $cus_rinfoup=$emodel->getEmployerStateById($cus_ebd->tang['eid']);
			 $cus_rinfodown=$emodel->getEmployerStateById($cus_ebd->giam['eid']);

			$tongsonhankhau=danhsach::where('kydieutra',date('Y'))->sum('soluong');
			$ldcovieclam=DB::table('nhankhau')->where('kydieutra',date('Y'))->where('tinhtranghdkt','1')->count('id');
			$ldthatnghiep=DB::table('nhankhau')->where('kydieutra',date('Y'))->where('tinhtranghdkt','2')->count('id');
			$ldkhongthamgia=DB::table('nhankhau')->where('kydieutra',date('Y'))->where('tinhtranghdkt','3')->count('id');
			// dd($ldcovieclam);

			 
			return view('admin.dashboard')
					->with('einfo',$einfo)
					->with('tongsonhankhau',$tongsonhankhau) 
					->with('ldcovieclam',$ldcovieclam) 
					->with('ldthatnghiep',$ldthatnghiep) 
					->with('ldkhongthamgia',$ldkhongthamgia) 
					->with('dinfo',$dinfo) 
					->with('last_rinfoup',$last_rinfoup)
					->with('last_rinfodown',$last_rinfodown)
					->with('cus_rinfoup',$cus_rinfoup)
					->with('cus_rinfodown',$cus_rinfodown)
					->with('rinfoup',$rinfoup)
					->with('rinfodown',$rinfodown) 
					->with('m_filter_s',$m_filter_s)
					->with('m_filter_e',$m_filter_e); 
		//   }
        // }
		
		// return redirect('admin');
    }
	 
	 public function getDashboard(){
		$info = array();
		$info['pcompany']= Db::table('company')->where('public',1)->count();
		$info['upcompany']= Db::table('company')->where('public',2)->count();
		// $a=DB::table('nguoilaodong')->select('MAX(id) AS maxid')->get();
		// dd($a);
		$info['laodong']= Db::table('nguoilaodong')
						->whereIn('nguoilaodong.state', [1,2,3])
						->whereRaw('id IN (SELECT MAX(id) AS id FROM nguoilaodong GROUP BY cmnd )')
						->count();
						// dd(1);
		$info['tuyendung']= Db::table('tuyendung')->where('state',1)->count();
		
		$thismonth= date('Y-m');
		$ym = explode('-',$thismonth,2);
		$timeS = Carbon::create($ym[0],$ym[1])->startOfMonth();
		$timeE =Carbon::create($ym[0],$ym[1])->endOfMonth(); 
		
		$info['report']= Db::table('report')
			->whereBetween("time",[$timeS,$timeE] )
			->whereIn('datatable',['nguoilaodong','company','notable'])
			->count();
		 
		 return $info;
	 }
	 public function auth(Request $request)
    {
        $data = [
					'email' => $request->email,
					'password' => $request->password,
					'public' => 1,
					'level' => [2,1], // level 1 2 for backen user
				];
		Auth::logout();
		// dd($data);
		$ret = Auth::attempt($data);
		// dd($ret);
		if($ret){
			$request->session()->regenerate();
			Session::put('message',"Đăng nhập thành công");
            return redirect('dashboard');
		}else{
			
		return redirect('admin')->withErrors([
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