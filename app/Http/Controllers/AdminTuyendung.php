<?php

namespace App\Http\Controllers;

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
	// public function __construct() {
	// 	$this->middleware(function ($request, $next) {
    //         if(!Auth::check()){ 
	// 			return redirect('admin');
	// 			};
	// 		if(Auth::user()->level>=3){
	// 			return redirect('admin'); 
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
    public function show_all($cid = null)
	{
		$request= request();
		$dmhc_list= $this->getDmhc();
		//filter
		$search = $request->search;
		$public_filter = $request->public_filter;
		$dm_filter = $request->dm_filter;
		
		
		$tds= DB::table('tuyendung')->join('company', 'tuyendung.user', '=', 'company.user')
					->when($search, function ($query, $search) {
							return $query->where('tuyendung.noidung', 'like', '%'.$search.'%')
										 ->orwhere('company.name', 'like', '%'.$search.'%');
						})
					->when($public_filter, function ($query, $public_filter) {
                    return $query->where('tuyendung.state', $public_filter);
					})
					->when($dm_filter, function ($query, $dm_filter) {
                    return $query->where('company.huyen', $dm_filter);
					})
					->when($cid, function ($query, $cid) {
                    return $query->where('company.id', $cid);
					})
				 ->select('tuyendung.*', 'company.name')
				 ->orderBy('tuyendung.id','desc')
				->paginate(20);
	
		$vtmodel = new Vitrituyendung;
		foreach($tds as $td){
			$vitris= $vtmodel->getVitris($td->id);
			$td->desc="";
			$td->sltuyen=0;
			foreach ($vitris as $vt){
				$td->desc.= "  ".$vt->name." ";
				$td->sltuyen +=$vt->soluong;
			} 
			
		}
		return view ('admin.tuyendung.all')
					->with('tds', $tds)
					->with('dmhc_list', $dmhc_list)
					
					->with('search', $search)
					->with('dm_filter', $dm_filter)
					->with('public_filter', $public_filter);
		
	}
	
	
	public function edit($tdid)
	{
		
		// get params
		
		
		
		$td=Tuyendung::find($tdid);
		$vtmodel = new Vitrituyendung;
		$vitris= $vtmodel->getVitris($td->id);
		
		return view ('admin.tuyendung.edit')
			->with('td', $td)
			
			->with('vitris',$vitris)
		;
		
		
	}  	
	 
	public function getDmhc()
	{
		$cats=DB::table('danhmuchanhchinh')->where('level','huyện')->orwhere('level','thành phố')->get();
		return $cats;
	}
	
	 public function getParamsByNametype($paramtype)
	{
		$cats= array();
		$type= DB::table('paramtype')->where('name',$paramtype)->get()->first();
		if($type){
			$cats=DB::table('param')->where('type',$type->id)->get();
		}
		return $cats;
	} 
	public function duyet($tdid)
	{
		$td= Tuyendung::find($tdid);
		$td->state=1;
		$td->save();
		Session::put('message',"Cập nhật thành công");
		return redirect('tuyendung-ba');
	}
	
	 
	
	
}
