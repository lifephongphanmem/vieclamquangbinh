<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Session;
use App\Models\User;
use App\Models\Report;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
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
		
		$time_filter = $request->input('time_filter',1);
		$uid= session('admin')->id;
		$rmodel= new Report;
		$reports= $rmodel->getReports($uid,$time_filter);
		
		return view ('pages.report.all')
					->with('reports', $reports)
					->with('time_filter',$time_filter)
					;
	}
	
	 public function new()
	{
		
		$cats= $this->getParams("Danh mục người dùng");
		return view ('admin.user.new')->with('cats', $cats);
	}
	
	 public function save( Request $request)
	{
		
		$data = array();
		$data['name']= $request->name;
		$data['public']= $request->public;
		$data['email']= $request->email;
		$data['category']= $request->category;;
		$data['level']= 2;
		$data['password']= Hash::make($request->password);
		
		$user= User::create($data);
		
		$rm= new Report();
		
		// navigate
		if($user){
				// add to log system`
			$rm->report('add', true , 'users',$user->id,1);		
			Session::put('message',"Thêm mới thành công");
			return redirect('user-bs');
		}
		
    	// add to log system`
			$rm->report('add', false , 'users',$user->id,1);		
			Session::put('message',"Có lỗi xảy ra");
			return redirect('user-bn');
		
		
	}
	


	 public function edit($uid)
	{
		
		$cats= $this->getParams("Danh mục người dùng");
		
		$user= User::find($uid);

		return view ('admin.user.edit')
					->with('user', $user)
					->with('cats', $cats);
	}
	
	
	public function update( Request $request)
	{
		$uid= $request->id;
		$user= User::find($uid);
		
		$data['name']= $request->name;
		$data['public']= $request->public;
		$data['email']= $request->email;
		$data['category']= $request->category;
		$data['level']= $request->level;
		
		$user->fill($data);
			if($request->password){
			$user->password= Hash::make($request->password);
			}
		
		$result= $user->save();
		// add to log system`
		$rm= new Report();
		$rm->report('update', $result, 'users',$uid,1);
		// navigate
		if($result){
			
			Session::put('message',"Cập nhật thành công");
			return redirect('user-bs');
		}
		
        else{
			Session::put('message',"Có lỗi xảy ra");
			return redirect('/user-bu/'.$uid);
		}
		
	}
	public function delete($uid)
	{
		
		
		$user= User::find($uid);
		
		// Check 
		if ($user->level==1){
			Session::put('message',"Không thể xóa quản trị cấp cao");
			return redirect('user-bs');
		}
		$company= DB::table('company')->where('user',$user->id)->count();
		if($company){
			Session::put('message',"Không thể xóa user liên kết với doanh nghiệp");
			return redirect('user-bs');
		}
		
		// Delete
		$result= $user->delete();
		
		// add to log system`
		$rm= new Report();
		$rm->report('delete', $result, 'users',$uid,1);	
		
		// navigate
		if(!$result){
			Session::put('message',"Có lỗi xảy ra");
			return redirect('user-bs');
			
		}

		Session::put('message',"Xóa thành công");
		return redirect('user-bs');
		
	}
	public function getParams($paramtype)
	{
		$cats= array();
		$type= DB::table('paramtype')->where('name',$paramtype)->get()->first();
		if($type){
			$cats=DB::table('param')->where('type',$type->id)->get();
		}
		return $cats;
	}

	
}
