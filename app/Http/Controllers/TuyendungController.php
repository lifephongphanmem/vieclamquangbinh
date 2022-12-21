<?php 
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\Tuyendung;
use App\Models\Vitrituyendung;
use App\Models\Report;


class TuyendungController extends Controller
{
	
	// public function __construct() {
	// 	$this->middleware(function ($request, $next) {
    //         if(!Auth::check()){ 
	// 		return redirect('home');
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
		$state_filter = $request->input('state_filter',0);
		
		$uid= Auth::user()->id;
		// get params
		$dmhc =$this->getdanhmuc();
		$list_cmkt=$this->getParamsByNametype('Trình độ CMKT');
		$list_tdgd=$this->getParamsByNametype('Trình độ học vấn');
		$list_nghe=$this->getParamsByNametype('Nghề nghiệp người lao động');
		$list_vithe=$this->getParamsByNametype('Vị thế việc làm');
		$list_linhvuc=$this->getParamsByNametype('Lĩnh vực đào tạo');
		$list_hdld=$this->getParamsByNametype('Loại hợp đồng lao động');
		
		// get Employers
		$tds= DB::table('tuyendung')->where('user',$uid)

					->when($state_filter, function ($query, $state_filter) {
                    return $query->where('tuyendung.state', $state_filter);
					})
					->orderBy('id','DESC')
					->paginate(20);
		$vtmodel = new Vitrituyendung;
		foreach($tds as $td){
			$vitris= $vtmodel->getVitris($td->id);
			$td->desc="";
			foreach ($vitris as $vt){
				$td->desc.= "<div>  ".$vt->name." : ".$vt->soluong. "</div>";
			} 
			
		}
		return view('pages.tuyendung.all')
				->with('tds',$tds)
				->with('dmhc',$dmhc)
				->with('list_cmkt',$list_cmkt)
				->with('list_tdgd',$list_tdgd)
				->with('list_nghe',$list_nghe)
				->with('list_vithe',$list_vithe)
				->with('list_linhvuc',$list_linhvuc)
				->with('list_hdld',$list_hdld)
				->with('state_filter',$state_filter)
				
				;
		
    }
	
	
	  public function new()
	{
		// get params
		$dmhc =$this->getdanhmuc();
		$list_cmkt=$this->getParamsByNametype('Trình độ CMKT');
		$list_tdgd=$this->getParamsByNametype('Trình độ học vấn');
		$list_nghe=$this->getParamsByNametype('Nghề nghiệp người lao động');
		$list_vithe=$this->getParamsByNametype('Vị thế việc làm');
		$list_linhvuc=$this->getParamsByNametype('Lĩnh vực đào tạo');
		$list_hdld=$this->getParamsByNametype('Loại hợp đồng lao động');
		
		return view ('pages.tuyendung.new')
			->with('dmhc',$dmhc)			
			->with('list_cmkt',$list_cmkt)
			->with('list_tdgd',$list_tdgd)
			->with('list_nghe',$list_nghe)
			->with('list_vithe',$list_vithe)
			->with('list_linhvuc',$list_linhvuc)
			->with('list_hdld',$list_hdld)
		;
		
	} 
  
	public function edit($tdid)
	{
		
		// get params
		$dmhc =$this->getdanhmuc();
		$list_cmkt=$this->getParamsByNametype('Trình độ CMKT');
		$list_tdgd=$this->getParamsByNametype('Trình độ học vấn');
		$list_nghe=$this->getParamsByNametype('Nghề nghiệp người lao động');
		$list_vithe=$this->getParamsByNametype('Vị thế việc làm');
		$list_linhvuc=$this->getParamsByNametype('Lĩnh vực đào tạo');
		$list_hdld=$this->getParamsByNametype('Loại hợp đồng lao động');
		
		
		
		$td=Tuyendung::find($tdid);
		$vtmodel = new Vitrituyendung;
		$vitris= $vtmodel->getVitris($td->id);
		
		return view ('pages.tuyendung.edit')
			->with('td', $td)
			
			->with('dmhc',$dmhc)			
			->with('list_cmkt',$list_cmkt)
			->with('list_tdgd',$list_tdgd)
			->with('list_nghe',$list_nghe)
			->with('list_vithe',$list_vithe)
			->with('list_linhvuc',$list_linhvuc)
			->with('list_hdld',$list_hdld)
			->with('vitris',$vitris)
		;
		
		
	}  	
	
	public function baocao($tdid)
	{
		
		// get params
		
		
		$td=Tuyendung::find($tdid);
		$vtmodel = new Vitrituyendung;
		$vitris= $vtmodel->getVitris($td->id);
		
		return view ('pages.tuyendung.baocao')
			->with('td', $td)
			->with('vitris',$vitris)	;
		
		
	}
	
	public function save( Request $request)
	{
		$uid= Auth::user()->id;
		
		$qty=$request->quantity;
		if(!$qty){
			
			return redirect('tuyendung-fn')->withErrors('message', 'Đăng tin không thành công! ');
		
		};
		
		
		// save tuyen dung
		$tmodel = new Tuyendung;
		 $td=$tmodel->insert($uid);
		 // save vitri

		if($td->id){
		$vtmodel = new Vitrituyendung;
		$vts=$vtmodel->inserts($td->id);
		}
		return redirect('tuyendung-fa')->with('message', ' Đăng tuyển dụng thành công! ');
		
			
	}
	
	public function updatebaocao( Request $request)
	{
		// save tuyen dung
		
		$td = Tuyendung::find($request->id);
		$td->state=2;
		$td->datuyen= $request->datuyen;
		$td->datuyentutt= $request->datuyentutt;
		$td->save();
		return redirect('tuyendung-fa');
	}
	
	 public function getCompany($uid){
		  
		 $dn= DB::table('company')->where('user',$uid)->first();
		 return $dn;
	  }
	  public function getdanhmuc(){
		  
		 $dm= DB::table('danhmuchanhchinh')->where('public','1')->get();
		 return $dm;
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

	
}

?>