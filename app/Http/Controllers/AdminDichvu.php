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


class AdminDichvu extends Controller
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
		//makelist
		$request = request();
		$state_filter = $request->input('state_filter',0);
		$search = $request->search;
		
		// $uid= Auth::user()->id;
		
		// get Employers
		$dvs= DB::table('dichvu')
					->when($search, function ($query, $search) {
                    return $query->where('users.name', 'like', '%'.$search.'%');
					})
					->when($state_filter, function ($query, $state_filter) {
                    return $query->where('dichvu.state', $state_filter);
					})
					
					->orderBy('id','DESC')
					->paginate(20);
		
		foreach ($dvs as $dv){
				
				$company= DB::table('dangkydv')->where('dichvu',$dv->id)->count();
			
				$dv->company = $company;
			
		}
		return view('admin.dichvu.all')
				->with('dvs',$dvs)
				->with('state_filter',$state_filter)
					->with('search', $search)
				;
		
    }
	public function show_dk($dvid)
    {
		$uid= Auth::user()->id;
		
		// get dang ky
		$dks= DB::table('dangkydv')
					->where('dichvu',$dvid)
					->orderBy('id','DESC')
					->paginate(20);
		
		foreach ($dks as $dk){
			$company= DB::table('company')->where('user',$dk->user)->get()->first();
			$dk->company = $company;
			
		}
		return view('admin.dichvu.dangky')
				->with('dks',$dks)
				
				;
		
    }
	
	
	  public function new()
	{
		
		return view ('admin.dichvu.new')
			
		;
		
	} 
  
	 public function edit($dvid)
	{
		
		
		$dv= Dichvu::find($dvid);

		return view ('admin.dichvu.edit')
					->with('dv', $dv);
	}
	
	
	
	public function save( Request $request)
	{
		$uid= Auth::user()->id;
		
		
		// save tuyen dung
		$dvm = new Dichvu;
		 $dv=$dvm->insert($uid);
		return redirect('dichvu-ba')->with('message', ' Tạo dịch vụ thành công! ');
		
			
	}
	
	public function update( Request $request)
	{
		$dvid= $request->id;
		$data=$request->all();
		
		$dv= Dichvu::find($dvid);
		
		
		
		$dv->fill($data);
			
		$result= $dv->save();
		// add to log system`
		$rm= new Report();
		$rm->report('update', $result, 'dichvu',$dvid,1);
		// navigate
		if($result){
			
			Session::put('message',"Cập nhật thành công");
			return redirect('dichvu-ba');
		}
		
        else{
			Session::put('message',"Có lỗi xảy ra");
			return redirect('/dichvu-be/'.$dvid);
		}
		
	}
	
	
	public function delete($dvid)
	{
		
		
		$dv= Dichvu::find($dvid);
		
		// Check 
		
		
		// Delete
		$result= $dv->delete();
		
		// add to log system`
		$rm= new Report();
		$rm->report('delete', $result, 'dichvu',$dvid,1);	
		
		// navigate
		if(!$result){
			Session::put('message',"Có lỗi xảy ra");
			return redirect('dichvu-ba');
			
		}

		Session::put('message',"Xóa thành công");
		return redirect('dichvu-ba');
		
	}
	public function noreport(){
		// add to log system`
		$rm= new Report();
		$note=" Kỳ trước Doanh nghiệp không có biến động";
		$rm->report('nothing',1, 'notable',0,0,$note);
		
		
		return redirect('report-fa')->with('message', 'Báo cáo thành công! ');
		
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