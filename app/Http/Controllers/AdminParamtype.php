<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use Session;
use Illuminate\Http\RedirectResponse;

session_start();

class AdminParamtype extends Controller
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
    public function show_all()
	{
		$cats= DB::table('paramtype')->get()->keyBy('id');
		foreach ($cats as $cat){
			
			$nump= DB::table('param')->where('type',$cat->id)->count();
			$cat->param=$nump;
		}
		
		return view ('admin.paramtype.all')->with('cats', $cats);
	}
	
	 public function new()
	{
		return view ('admin.paramtype.new');
	}
	
	 public function save( Request $request)
	{
		$data = array();
		$data['name']= $request->name;
		$data['description']= $request->description;	
		$result= DB::table('paramtype')->insert($data);
		
		if($result){
			
			Session::put('message',"Thêm mới thành công");
			return redirect('ptype-ba');
		}
		
        else{
			Session::put('message',"Có lỗi xảy ra");
			return redirect('ptype-bn');
		}
		
	}
	
	 
	 public function edit($catid)
	{
		$cat= DB::table('paramtype')->where('id',$catid)->first();
		//print_r($cat);
		return view ('admin.paramtype.edit')->with('cat', $cat);
	}
	
	
	public function update( Request $request)
	{
		$data = array();
		$data['name']= $request->name;
		$data['description']= $request->desc;
		
		$catid= $request->catid;
		
		$result= DB::table('paramtype')->where('id',$catid)->update($data);
		
		if($result){
			
			Session::put('message',"Cập nhật thành công");
			return redirect('ptype-ba');
		}
		
        else{
			Session::put('message',"Có lỗi xảy ra");
			return redirect('/ptype-be/'.$catid);
		}
		
	}
	public function delete($catid)
	{
		// Check param
		$param= DB::table('param')->where('type',$catid)->count();
			if ($param){
				Session::put('message'," Tham số còn có giá trị, không thể xóa");
				return redirect('ptype-ba');
			}
		
		
		
		// Delete
		$result= DB::table('paramtype')->where('id',$catid)->delete();
		
		if($result){
			
			Session::put('message',"Xóa thành công");
			return redirect('ptype-ba');
		}
		
        else{
			Session::put('message',"Có lỗi xảy ra");
			return redirect('ptype-ba');
		}
		
	}
}
