<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Employer;
use App\Models\nguoilaodong;
use Session;
use Illuminate\Http\RedirectResponse;
use App\Exports\AdminEmployersExport;
use App\Models\Danhmuc\danhmuchanhchinh;
use Maatwebsite\Excel\Facades\Excel;

class AdminEmployer extends Controller
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
		$request = request();
		
		//filter
		$search = $request->search;
		$gioitinh_filter = $request->gioitinh_filter;
		$state_filter = $request->state_filter;
		$age_filter = $request->age_filter;
		
		$export= $request->export;
		if($export){

			return Excel::download(new AdminEmployersExport, 'danhsachlaodong.xlsx');
		
			}
			
		$lds= DB::table('nguoilaodong')
				->when($search, function ($query, $search) {
                    return $query->whereRaw("(hoten like  '%".$search."%' OR cmnd like '%".$search."%')");
					})
				->when($cid, function ($query, $cid) {
                    return $query->where('nguoilaodong.company', $cid);
					})
				->when($state_filter, function ($query, $state_filter) {
                    return $query->where('nguoilaodong.state', $state_filter);
					})
				->when($gioitinh_filter, function ($query, $gioitinh_filter) {
                    return $query->where('nguoilaodong.gioitinh','like', '%'.$gioitinh_filter.'%');
					})
				->when($age_filter, function ($query, $age_filter) {
                    return $query->whereRaw("YEAR(GETDATE())-YEAR(ngaysinh) > ".$age_filter);
					})
				->whereRaw('id IN (SELECT MAX(id) AS id FROM nguoilaodong GROUP BY cmnd )')
							
				->get();
		// $lds=DB::table('nguoilaodong')->select('id','hoten','cmnd','ngaysinh','company','tinh')->get();
		
		$a_congty=array_column(DB::table('company')->get()->toarray(),'name','id');
		// foreach($lds as $ld){
			
		// 	$cty= DB::table('company')->where('id',$ld->company)->get()->first();
		// 	$ld->ctyname=$cty->name;
		// }		
		return view ('admin.employer.all')
					->with('lds', $lds)
					->with('baocao', getdulieubaocao())
					->with('search', $search)
					->with('a_congty', $a_congty)
					->with('gioitinh_filter', $gioitinh_filter)
					->with('state_filter', $state_filter)
					->with('age_filter', $age_filter)
					;
	}
	
	public function getDmhc()
	{
		$cats=DB::table('danhmuchanhchinh')->where('level','huyện')->orwhere('level','thành phố')->get();
		return $cats;
	}
	public function getParams($paramtype)
	{
		$type= DB::table('paramtype')->where('name',$paramtype)->get()->first();
		$cats=DB::table('param')->where('type',$type->id)->get();
		return $cats;
	}
	
	 
	public function getInfo28($cid){
		  
		$dn= DB::table('company')->where('id',$cid)->first();
		$em= new Employer;
		$other_info=$em->getTonghop($dn->id);
		$dn->tonghop =$other_info;
		$dn->pbcmkt=$em->getPhanbo($dn->id,3);
		$dn->pblvdt=$em->getPhanbo($dn->id,11);
		$dn->pbnghenghiep=$em->getPhanbo($dn->id,9);
		return $dn;
	  }
	public function getInfo45($cid){
		  
		$dn= DB::table('company')->where('id',$cid)->first();
		$em= new Employer;
		$other_info=$em->getTonghop($dn->id);
		$dn->tonghop =$other_info;
		$dn->pbcmkt=$em->getPhanbo($dn->id,3);
		$dn->pblvdt=$em->getPhanbo($dn->id,11);
		$dn->pbnghenghiep=$em->getPhanbo($dn->id,9);
		return $dn;
	  }
	 public function new()
	{
		
	}
	
	 public function save( Request $request)
	{
		
	}
	
	 
	public function edit($eid)
	{
		$countries_list=getCountries();
		// get params
		$dmhc =$this->getdanhmuc();
		$list_cmkt=$this->getParamsByNametype('Trình độ CMKT');
		$list_tdgd=$this->getParamsByNametype('Trình độ học vấn');
		$list_nghe=$this->getParamsByNametype('Nghề nghiệp người lao động');
		$list_vithe=$this->getParamsByNametype('Vị thế việc làm');
		$list_linhvuc=$this->getParamsByNametype('Lĩnh vực đào tạo');
		$list_hdld=$this->getParamsByNametype('Loại hợp đồng lao động');
		
		$model= new Employer();
		
		$ld=$model::find($eid);
		// Thông tin doanh nghiệp
		$cty= DB::table('company')->where('id',$ld->company)->get()->first();
		$ld->ctyname=$cty->name;
		//// Thông tin lịch sữ làm việc
		$hosos=$model->getHosos($ld->cmnd);
		// dd($ld);
		$dmhanhchinh = danhmuchanhchinh::all();
		// dd($hosos);
		return view ('admin.employer.chitiet')
			->with('ld', $ld)
			->with('baocao', getdulieubaocao())
			->with('countries_list', $countries_list)
			->with('dmhc',$dmhc)			
			->with('list_cmkt',$list_cmkt)
			->with('list_tdgd',$list_tdgd)
			->with('list_nghe',$list_nghe)
			->with('list_vithe',$list_vithe)
			->with('list_linhvuc',$list_linhvuc)
			->with('list_hdld',$list_hdld)
			->with('hosos',$hosos)
			->with('dmhanhchinh',$dmhanhchinh)
		;
		
	}  	
	
	public function update(Request $request)
	{
		$input = $request->all();
		unset($input['_token']);
		unset($input['id']);
		
		DB::table('nguoilaodong')->where('id',$request->id)->update($input);
		
		return redirect('/nguoilaodong/danhsach')->with('message'," thành công ");
		
	}
	
	public function delete($catid)
	{
		
		
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
	

    public function DanhSach_NN()
    {
        $model=DB::table('nguoilaodong')->wherenotin('nation',['VN','Viet Nam','vn','Việt Nam','không'])->get();
        foreach($model as $ld){
			
			$cty= DB::table('company')->where('id',$ld->company)->get()->first();
			$ld->ctyname=$cty->name;
		}
        return view('admin.employer.laodongnuocngoai.danhsach')
                    ->with('model',$model)
					->with('baocao', getdulieubaocao());	
    }

	public function ThemMoi_NN()
	{
		return view('admin.employer.laodongnuocngoai.create');
	}

	public function indanhsach()
	{
		$model=DB::table('nguoilaodong')->wherenotin('nation',['VN','Viet Nam','vn','Việt Nam','không'])->get();
        foreach($model as $ld){
			
			$cty= DB::table('company')->where('id',$ld->company)->get()->first();
			$ld->ctyname=$cty->name;
		}
	
		return view('admin.employer.laodongnuocngoai.indanhsach')
		->with('model',$model)
		->with('baocao', getdulieubaocao())
		->with('pageTitle','danh sách người lao động nước ngoài');
	}

}
