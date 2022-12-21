<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Http\RedirectResponse;

session_start();

class AdminParam extends Controller
{
	
	
	public function __construct() {
		$this->middleware('auth');
	}
    public function show_all($catid)
	{
		
		$params= DB::table('param')->where('type',$catid)->get()->keyBy('id');
		$cat=DB::table('paramtype')->where('id',$catid)->get()->first();
		$catname=$cat->name;
		return view ('admin.param.all')->with('catname', $catname)->with('catid', $catid)->with('params', $params);
	}
	
	 public function new($catid)
	{
		
		
		$cat=DB::table('paramtype')->where('id',$catid)->get()->first();
		$catname=$cat->name;
		return view ('admin.param.new')->with('catname', $catname)->with('catid', $catid);
	}
	
	 public function save( Request $request)
	{
		$data = array();
		$data['name']= $request->name;
		$data['description']= $request->description;	
		$data['type']= $request->type;	
		$result= DB::table('param')->insert($data);
		
		if($result){
			
			Session::put('message',"Thêm mới thành công");
			return redirect('param-ba/'.$data['type']);
		}
		
        else{
			Session::put('message',"Có lỗi xảy ra");
			return redirect('param-bn/'.$data['type']);
		}
		
	}
	
	 
	 public function edit($pid)
	{
		
		$param= DB::table('param')->where('id',$pid)->first();
		$cat=DB::table('paramtype')->where('id',$param->type)->get()->first();
		//$catname=$cat->name;
		//print_r($cat);
		return view ('admin.param.edit')->with('param', $param)->with('cat', $cat);
	}
	
	
	public function update( Request $request)
	{
		$data = array();
		$data['name']= $request->name;
		$data['description']= $request->desc;
		$data['type']= $request->type;
		
		$catid= $request->catid;
		$pid= $request->id;
		
		$result= DB::table('param')->where('id',$pid)->update($data);
		
		if($result){
			
			Session::put('message',"Cập nhật thành công");
			return redirect('param-ba/'.$data['type']);
		}
		
        else{
			Session::put('message',"Có lỗi xảy ra");
			return redirect('/param-be/'.$catid);
		}
		
	}
	public function delete($pid)
	{
		// Check param
		$param= DB::table('param')->where('id',$pid)->get()->first();
			
		
		
		// Delete
		$result= DB::table('param')->where('id',$pid)->delete();
		
		if($result){
			
			Session::put('message',"Xóa thành công");
			return redirect('param-ba/'.$param->type);
		}
		
        else{
			Session::put('message',"Có lỗi xảy ra");
			return redirect('param-ba/'.$param->type);
		}
		
	}
}
