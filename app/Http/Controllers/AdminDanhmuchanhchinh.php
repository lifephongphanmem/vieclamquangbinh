<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Session;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\RedirectResponse;

session_start();

class AdminDanhmuchanhchinh extends Controller
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
    public function show_all(Request $request)
	{	
		
	
		$cats= DB::table('danhmuchanhchinh')->where('level',"Tỉnh")->paginate(20);
		
		foreach ($cats as $cat){
			
			$p= DB::table('danhmuchanhchinh')->where('maquocgia',$cat->parent)->get()->first();
			if($p){
			$cat->parentname=$p->name;
			}else{
			$cat->parentname="";	
			}
			
			$childs=DB::table('danhmuchanhchinh')->where('parent',$cat->maquocgia)->where('public',1)->count();
			$cat->childs=$childs;
		}
		
		return view ('admin.danhmuchanhchinh.all')->with('cats', $cats);
	}
	public function show_allchild(Request $request)
	{	
		
		$pid=$request->catid;
		$cats= DB::table('danhmuchanhchinh')->where('parent',$pid)->paginate(20);
		
		$p= DB::table('danhmuchanhchinh')->where('maquocgia',$pid)->get()->first();
		foreach ($cats as $cat){
					
			$childs=DB::table('danhmuchanhchinh')->where('parent',$cat->maquocgia)->where('public',1)->count();
			$cat->childs=$childs;
		}
		
		return view ('admin.danhmuchanhchinh.allchild')->with('cats', $cats)->with('p', $p);
	}
	 
	
	public function newchild(Request $request)
	{	$pid=$request->catid;
		$p= DB::table('danhmuchanhchinh')->where('maquocgia',$pid)->get()->first();
			
		return view ('admin.danhmuchanhchinh.newchild')->with('p', $p);
	}
	
	 public function save( Request $request)
	{	
		$data = array();
		$data['name']= $request->name;
		$data['maquocgia']= $request->maquocgia;
		$data['public']= $request->public;
		$data['parent']= $request->parent;
		$data['level']= $request->level;
		$data['description']= $request->description;
		$data['created_at']=Carbon::now()->toDateTimeString();
		
		$result= DB::table('danhmuchanhchinh')->insert($data);
		// add to log system`
		
		$this->report('add', $result, 'danhmuchanhchinh',DB::getPdo()->lastInsertId(),1);
		
		// navigate
		if($result){
			
			Session::put('message',"Thêm mới thành công");			
			return redirect('dmhc-bac/'.$request->parent);
		}
		
        else{
			Session::put('message',"Có lỗi xảy ra");
			return redirect('dmhc-bn');
		}
		
	}
	
	  public function import( Request $request)
	{	
		// Get the csv rows as an array
		$file= $request->file('import_file');
		$dataObj = new \stdClass();
		$theArray = Excel::toArray($dataObj,$file );
		$arr=$theArray[0];
		// check file excel
		
		$dvs = array();
	
		for ($i = 1; $i < count($arr); $i++){
			
		$data = array();
		$data['name']= $arr[$i][2];
		$data['maquocgia']= $arr[$i][3];
		$data['public']= 1;
		$data['parent']= $arr[$i][1];
		$data['level']= $arr[$i][4];
		$data['created_at']=Carbon::now()->toDateTimeString();
		$dvs[]=	$data;
		}
		
		$result= DB::table('danhmuchanhchinh')->insert($dvs);
		// add to log system`
		
		$this->report('import', $result, 'danhmuchanhchinh',DB::getPdo()->lastInsertId(),count($dvs));
		
		// navigate
		if($result){
			
			Session::put('message',"Thêm mới thành công");			
			return redirect('dmhc-ba');
		}
		
        else{
			Session::put('message',"Có lỗi xảy ra");
			return redirect('dmhc-bn');
		}
	
	}
	
	 
	 public function edit($catid)
	{
		$cat= DB::table('danhmuchanhchinh')->where('id',$catid)->first();
		$cats= DB::table('danhmuchanhchinh')->where('public',1)->get();
		
		return view ('admin.danhmuchanhchinh.edit')->with('cat', $cat)->with('cats', $cats);
	}
	
	
	public function update( Request $request)
	{
		$data = array();
		$data['name']= $request->name;
		$data['maquocgia']= $request->maquocgia;
		$data['public']= $request->public;
		$data['parent']= $request->parent;
		$data['level']= $request->level;
		$data['description']= $request->description;
		$data['updated_at']=Carbon::now()->toDateTimeString();
		
		$dmid= $request->id;
		$catid= $request->catid;
		
		$result= DB::table('danhmuchanhchinh')->where('id',$dmid)->update($data);
		// add to log system`
		$this->report('update', $result, 'danhmuchanhchinh',$dmid,1);
		// navigate
		if($result){
			
			Session::put('message',"Cập nhật thành công");
			return redirect('dmhc-bac/'.$request->parent);
		}
		
        else{
			Session::put('message',"Có lỗi xảy ra");		
			return redirect('/dmhc-be/'.$dmid);
		}
		
	}
	public function delete($catid)
	{
		// Check param
		$param= DB::table('danhmuchanhchinh')->where('parent',$catid)->count();
			if ($param){
				Session::put('message'," Vẫn còn danh mục con, không thể xóa");
				return redirect('dmhc-ba');
			}
		
		
		
		// Delete
		$result= DB::table('danhmuchanhchinh')->where('id',$catid)->delete();
		// add to log system`
		$this->report('delete', $result, 'danhmuchanhchinh',$uid,1);		
		// navigate
		if($result){
			
			Session::put('message',"Xóa thành công");
			return redirect('dmhc-ba');
		}
		
        else{
			Session::put('message',"Có lỗi xảy ra");
			return redirect('dmhc-ba');
		}
		
	}
	public function report($type,$result,$tbl,$rowid,$num){
		// write report 
		$r = array();
		$r['type']= $type;
		$r['result']= $result;
		$r['tbl']= $tbl;	
		$r['tbl']= $rowid;	
		$r['user']= Session::get('userid');	
		$r['time']= Carbon::now()->toDateTimeString();	
	
	}
}
