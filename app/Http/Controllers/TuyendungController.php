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
use App\Models\tuyendungModel;
use App\Models\vitrituyendungModel;
use Illuminate\Support\Facades\File;

class TuyendungController extends Controller
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
		$state_filter = $request->input('state_filter',0);
		
		// $uid= Auth::user()->id;
		$uid= session('admin')->id;
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
					->get();
		$vtmodel = new Vitrituyendung;
		foreach($tds as $td){
			$vitris= $vtmodel->getVitris($td->id);
			$td->desc="";
			foreach ($vitris as $vt){
				$td->desc.= "<div>  ".$vt->name." : ".$vt->soluong. "</div>";
			} 
			
		}
		$vitri = Vitrituyendung::select('id','idtuyendung','name')->get();
		return view('pages.tuyendung.all')
				->with('tds',$tds)
				->with('vitri',$vitri)
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
		// dd($td);
		$vtmodel = new Vitrituyendung;
		$vitris= $vtmodel->getVitris($td->id);
		// dd($vitris);
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

		// $uid= Auth::user()->id;
		$uid= session('admin')->id;
		
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

	public function get_vitri(Request $request)
	{		
        $model = Vitrituyendung::where('idtuyendung',$request->id)->get();
		
		$html=' <ol id = "vt">';
		foreach($model as $ct){

			$html.='<li> <a href="/vanban/mauso_03a_pl1?id='.$ct->id.'&idtuyendung='.$ct->idtuyendung.'" target="_blank" >'.$ct->name.'</a> </li>';
		};
		$html .= '</ol>';
		return response()->json($html);
	}

	public function get_vitri1(Request $request)
	{		
        $model = Vitrituyendung::where('idtuyendung',$request->id)->get();
		
		$html=' <ol id = "vt1">';
		foreach($model as $ct){

			$html.='<li> <a href="/mau01?id='.$request->id.'" target="_blank" >'.$ct->name.'</a> </li>';
		};
		$html .= '</ol>';
		return response()->json($html);
	}
	public function get_vitri_upanh(Request $request)
	{		
        $model = Vitrituyendung::where('idtuyendung',$request->id)->get();
		
		$html=' <div id = "vt2">';
		$html .='<label class="control-label">Vị trí</label>';
		$html .='<select name="vitri" id="" class="form-control select2basic"
			style="width:100%">';
		
		foreach($model as $ct){
			$html.='<option value="'.$ct->id.'">'.$ct->name.'</option>';
		};
		$html .= '</select>';
		$html .= '</div>';
		return response()->json($html);
	}

	public function hosodanop(Request $request){
		$inputs = $request->all();
	
		$user = session('admin')->id;
		$model = Tuyendung::join('Vitrituyendung','Vitrituyendung.idtuyendung' , 'Tuyendung.id')
			->join('apply' , 'apply.vitri','Vitrituyendung.id')
			->join('ungvien' , 'ungvien.user','apply.ungvien')
			->select('apply.*', 'Tuyendung.user','Vitrituyendung.name','ungvien.hoten')
			->orderBy('id', 'DESC')->get();
			
		$model = $model->where('user', $user);
		if (isset($inputs['trangthai'])) {
			$model = $model->where('trangthai',$inputs['trangthai']);
		}else{
			$inputs['trangthai'] = null;
		}
		// dd($inputs);
		return view('pages.tuyendung.hosodanop')
		->with('model',$model)
		->with('inputs',$inputs);
	}

	public function uploadanh(Request $request){
		$inputs=$request->all();
		// dd($inputs);
		$model=vitrituyendungModel::findOrFail($inputs['vitri']);
		// dd($model);
				//file hình ảnh
				if ($inputs['loaianh'] == 'anhtuyendung') {
					if(isset($model->anhtuyendung)){
						$anh=explode(';',$model->anhtuyendung);
						foreach($anh as $val){
							if(File::exists($val)){
								File::Delete($val);
							}
						}
					}
					// dd(2);
					$file = $inputs['fileanh'];
					$fileanh=[];
					foreach($file as $ct){
						$name = time() . $ct->getClientOriginalName();
						$ct->move('uploads/anhtuyendung/', $name);
						$anhtuyendung = 'uploads/anhtuyendung/' . $name;
						array_push($fileanh,$anhtuyendung);
					}
					$inputs['anhtuyendung']=implode(';',$fileanh);
					$model->update(['anhtuyendung'=>$inputs['anhtuyendung']]);
				}else{
					if(isset($model->anhdontuyendung)){
						$anh=explode(';',$model->anhdontuyendung);
						foreach($anh as $val){
							if(File::exists($val)){
								File::Delete($val);
							}
						}
					}
					$file = $inputs['fileanh'];
					$fileanh=[];
					foreach($file as $ct){
						$name = time() . $ct->getClientOriginalName();
						$ct->move('uploads/anhdontuyendung/', $name);
						$anhdontuyendung = 'uploads/anhdontuyendung/' . $name;
						array_push($fileanh,$anhdontuyendung);
					}
					$inputs['anhdontuyendung']=implode(';',$fileanh);
					$model->update(['anhdontuyendung'=>$inputs['anhdontuyendung']]);
				}

		return redirect('/tuyendung-fa')
				->with('success','Tải ảnh thành công');

	}

	public function destroy($id){
		$model = tuyendungModel::findOrFail($id);

		if(isset($model)){
			$vitri=vitrituyendungModel::where('idtuyendung',$id)->first();
			if(isset($vitri)){
				$vitri->delete();
			}
			$model->delete();
		}

		return redirect('/tuyendung-fa')
				->with('success','Xóa thành công');
	}
}

?>