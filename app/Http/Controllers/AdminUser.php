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

class AdminUser extends Controller
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
   public function show_all(Request $request)
	{
		
		
		//get list type
	
		$cats= $this->getParams("Danh mục người dùng");
		
		// filter
		$cat_filter = $request->cat_filter;
		$search = $request->search;
		$public_filter = $request->public_filter;
		
		$users= DB::table('users')
			->when($search, function ($query, $search) {
                    return $query->where('users.name', 'like', '%'.$search.'%')
								->orWhere('users.email', 'like', '%'.$search.'%');
					})
				->when($public_filter, function ($query, $public_filter) {
                    return $query->where('users.public', $public_filter);
					})
				->when($cat_filter, function ($query, $cat_filter) {
				return $query->where('users.category', $cat_filter);
				})
			->paginate(20);
		
		foreach ($users as $user){
			$company= DB::table('company')->where('user',$user->id)->get()->first();
			if($company){
				$user->company = $company->name;
			}else {
				$user->company = "";	
			};
		}
		
		return view ('admin.user.all')->with('users', $users)->with('cats', $cats)
						->with('search', $search)
					->with('cat_filter', $cat_filter)
					->with('public_filter', $public_filter);
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
			return redirect('user-ba');
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
			return redirect('user-ba');
		}
		
        else{
			Session::put('message',"Có lỗi xảy ra");
			return redirect('/user-be/'.$uid);
		}
		
	}
	public function delete($uid)
	{
		
		
		$user= User::find($uid);
		
		// Check 
		if ($user->level==1){
			Session::put('message',"Không thể xóa quản trị cấp cao");
			return redirect('user-ba');
		}
		$company= DB::table('company')->where('user',$user->id)->count();
		if($company){
			Session::put('message',"Không thể xóa user liên kết với doanh nghiệp");
			return redirect('user-ba');
		}
		
		// Delete
		$result= $user->delete();
		
		// add to log system`
		$rm= new Report();
		$rm->report('delete', $result, 'users',$uid,1);	
		
		// navigate
		if(!$result){
			Session::put('message',"Có lỗi xảy ra");
			return redirect('user-ba');
			
		}

		Session::put('message',"Xóa thành công");
		return redirect('user-ba');
		
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
