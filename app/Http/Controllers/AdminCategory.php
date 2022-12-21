<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use Session;
use Illuminate\Http\RedirectResponse;

session_start();

class AdminCategory extends Controller
{
    public function show_all()
	{
		$cats= DB::table('category_product')->get()->keyBy('id');
		
		return view ('admin.productcategory.all')->with('cats', $cats);
	}
	
	 public function view()
	{
		$cats= DB::table('category_product')->get();
		return view ('admin.productcategory.new')->with('cats', $cats);
	}
	
	 public function save( Request $request)
	{
		$data = array();
		$data['name']= $request->name;
		$data['public']= $request->public;
		$data['description']= $request->description;
		$image =$request->File('image');
		if($image){
			$data['image']= $image->store('Category');
		}else{
		$data['image']= "defaultcat.jpg";
		}
		
		$data['parent']= $request->parent;
		
		$result= DB::table('category_product')->insert($data);
		
		if($result){
			
			Session::put('message',"Thêm mới thành công");
			return redirect('pcats');
		}
		
        else{
			Session::put('message',"Có lỗi xảy ra");
			return redirect('addpcat');
		}
		
	}
	
	 public function public( $catid )
	{
		DB::table('category_product')->where('id',$catid)->update(['public'=>1]);
		Session::put('message',"Cập nhật thành công");
		return redirect('pcats');
	}
	 public function unpublic( $catid )
	{	
		DB::table('category_product')->where('id',$catid)->update(['public'=>0]);
		Session::put('message',"Cập nhật thành công");
		return redirect('pcats');
	}
	
	
	 public function edit($catid)
	{
		$cats= DB::table('category_product')->get();
		$cat= DB::table('category_product')->where('id',$catid)->first();
		//print_r($cat);
		return view ('admin.productcategory.edit')->with('cats', $cats)->with('cat', $cat);
	}
	
	
	public function update( Request $request)
	{
		$data = array();
		$data['name']= $request->name;
		$data['public']= $request->public;
		$data['description']= $request->desc;
		$image =$request->File('image');
		if($image){
			$data['image']= $image->store('Category');
		}
		
		$data['parent']= $request->parent;
		$catid= $request->catid;
		
		$result= DB::table('category_product')->where('id',$catid)->update($data);
		
		if($result){
			
			Session::put('message',"Cập nhật thành công");
			return redirect('pcats');
		}
		
        else{
			Session::put('message',"Có lỗi xảy ra");
			return redirect('/edit-procat/'.$catid);
		}
		
	}
	public function delete($catid)
	{
		// Check child category
		$cats= DB::table('category_product')->get();
		foreach ($cats as $child){
			if ($child->parent==$catid){
				Session::put('message',"Có danh mục con, không thể xóa");
				return redirect('pcats');
			}
			
		}
		
		// Check Product
		// Delete
		$result= DB::table('category_product')->where('id',$catid)->delete();
		
		if($result){
			
			Session::put('message',"Xóa thành công");
			return redirect('pcats');
		}
		
        else{
			Session::put('message',"Có lỗi xảy ra");
			return redirect('pcats');
		}
		
	}
}
