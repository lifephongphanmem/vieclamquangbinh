<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\Models\Report;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

class Employer extends Model 

{


	protected $table = 'nguoilaodong';
	
	

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
  //  protected $fillable = ['*'];
		protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
       
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
	public $timestamps = true;
	
	public function getTypeCompanyInfo($ctypename){
		$ctype= DB::table('param')->where('name',$ctypename)->get()->first();
		
		$htxinfo= array();
		$htxinfo['tong']=0;
		$htxinfo['nu']=0;
		$htxinfo['age']=0;
		$htxinfo['bhxh']=0;
		$htxinfo['quanly']=0;
		$htxinfo['cmktcao']=0;
		$htxinfo['cmkttrung']=0;
		$htxinfo['hdkhongthoihan']=0;
		$htxinfo['hdcothoihan']=0;
		
		// $ctys=DB::table('company')
		// 		->where('loaihinh',$ctype->id)
		// 		->where('public',1)
		// 		->pluck('id')->toArray();
		$ctys=DB::table('company')
		->where('loaihinh',$ctype->id)
		->where('public',1)
		->get();
		$a_ctys=array_column($ctys->toarray(),'id');
		$user_id=DB::table('users')->wherein('id',$a_ctys)->pluck('id')->toArray();
		
		foreach($ctys as $cid){
			if(in_array($cid->id,$user_id)){
				$info=$this->getEmployerState($cid->id);
				$htxinfo['tong']+=$info['tong'];
				$htxinfo['nu']+=$info['nu'];
				$htxinfo['age']+=$info['age'];
				$htxinfo['bhxh']+=$info['bhxh'];
				$htxinfo['quanly']+=$info['quanly'];
				$htxinfo['cmktcao']+=$info['cmktcao'];
				$htxinfo['cmkttrung']+=$info['cmkttrung'];
				$htxinfo['hdkhongthoihan']+=$info['hdkhongthoihan'];
				$htxinfo['hdcothoihan']+=$info['hdcothoihan'];
			}else{
				$htxinfo['tong']+=$cid->sld;
				$htxinfo['bhxh']+=$cid->sld;
				$htxinfo['hdcothoihan']+=$cid->sld;
			}

		}
		
		$htxinfo['hdkhac']=	$htxinfo['tong']-$htxinfo['hdcothoihan']-$htxinfo['hdkhongthoihan'];
		$htxinfo['cmktkhac']=	$htxinfo['tong']-$htxinfo['cmkttrung']-$htxinfo['cmktcao']-$htxinfo['quanly'];
		
		
		return $htxinfo;
	}
	// L???y danh s??ch ng?????i lao ?????ng duoc su d???ng
	public function getEmployerState($cid=null)
	{ 
		$info= array();
	  	// T???ng s??? lao ?????ng ??ang ho???t ?????ng t???i DN
		$info['tong']= DB::table('nguoilaodong')
			->when($cid, function ($query, $cid) {
                    return $query->where('nguoilaodong.company', $cid);
					})
			->whereIn('nguoilaodong.state', [1,2])
			// ->whereRaw('id IN (SELECT MAX(id) AS id FROM nguoilaodong GROUP BY cmnd )')
			->count()	;	
		// T???ng n???	
		$info['nu'] =DB::table('nguoilaodong')
			->when($cid, function ($query, $cid) {
                    return $query->where('nguoilaodong.company', $cid);
					})
			->whereIn('nguoilaodong.state', [1,2])
			->where('nguoilaodong.gioitinh','like', '%N???%')
			// ->whereRaw('id IN (SELECT MAX(id) AS id FROM nguoilaodong GROUP BY cmnd )')
			->count()	;
		// Tu???i tr??n 35
		$info['age']= DB::table('nguoilaodong')
			->when($cid, function ($query, $cid) {
                    return $query->where('nguoilaodong.company', $cid);
					})
			->whereIn('nguoilaodong.state', [1,2])
			->whereRaw("YEAR(GETDATE())-YEAR(ngaysinh) > 35")
			// ->whereRaw('id IN (SELECT MAX(id) AS id FROM nguoilaodong GROUP BY cmnd )')
			->count()	;
		// s??? L?? tham gia BHXH
		$info['bhxh']=DB::table('nguoilaodong')
			->when($cid, function ($query, $cid) {
                    return $query->where('nguoilaodong.company', $cid);
					})
			->whereIn('nguoilaodong.state', [1,2])
			->whereNotNull('bdbhxh')
			// ->whereRaw('id IN (SELECT MAX(id) AS id FROM nguoilaodong GROUP BY cmnd )')
			->count()	;
		// s??? l?????ng Nh?? qu???n l??	
		
		$quanlys=DB::table('nguoilaodong')
			->when($cid, function ($query, $cid) {
                    return $query->where('nguoilaodong.company', $cid);
					})
			->whereIn('nguoilaodong.state', [1,2])
			->where(function ($query) {
					$query->whereIn('nguoilaodong.chucvu', ['Gi??m ?????c','Nh?? l??nh ?????o','Qu???n l??'])
							->orWhere('nguoilaodong.chucvu','like','%Tr?????ng%')
							->orWhere('nguoilaodong.chucvu','like','%Ph??%');
			})
			// ->whereRaw('id IN (SELECT MAX(id) AS id FROM nguoilaodong GROUP BY cmnd)')
			->pluck('id')->toArray()	;
			
			
			$info['quanly']= count($quanlys);
			
		// s??? L?? CMKT b???c cao
		$info['cmktcao']=DB::table('nguoilaodong')
			->when($cid, function ($query, $cid) {
                    return $query->where('nguoilaodong.company', $cid);
					})
			->whereIn('nguoilaodong.state', [1,2])
			->where('trinhdocmkt','?????i h???c tr??? l??n')
			->whereNotIn ('id',$quanlys)
			// ->whereRaw('id IN (SELECT MAX(id) AS id FROM nguoilaodong GROUP BY cmnd )')
			->count()	;	
		// s??? L?? CMKT b???c trung
		$info['cmkttrung']=DB::table('nguoilaodong')
			->when($cid, function ($query, $cid) {
                    return $query->where('nguoilaodong.company', $cid);
					})
			->whereIn('nguoilaodong.state', [1,2])
			->where(function ($query) {
					$query->Where('nguoilaodong.trinhdocmkt','like','%Cao ?????ng%')
							->orWhere('nguoilaodong.trinhdocmkt','like','%Trung c???p%');
			})
			->whereNotIn ('id',$quanlys)
			// ->whereRaw('id IN (SELECT MAX(id) AS id FROM nguoilaodong GROUP BY cmnd )')
			->count()	;	
		//		
		// s??? L?? c?? HDLD kh??ng th???i h???n
		
		$info['hdkhongthoihan']=DB::table('nguoilaodong')
			->when($cid, function ($query, $cid) {
                    return $query->where('nguoilaodong.company', $cid);
					})
			->whereIn('nguoilaodong.state', [1,2])
			->where('nguoilaodong.loaihdld','Kh??ng x??c ?????nh th???i h???n')
			// ->whereRaw('id IN (SELECT MAX(id) AS id FROM nguoilaodong GROUP BY cmnd )')
			->count()	;	
		
		// s??? L?? c?? HDLD c?? th???i h???n
		
		$info['hdcothoihan']=DB::table('nguoilaodong')
			->when($cid, function ($query, $cid) {
                    return $query->where('nguoilaodong.company', $cid);
					})
			->whereIn('nguoilaodong.state', [1,2])
			->whereIn('nguoilaodong.loaihdld',['????? 12 ?????n 36 th??ng','????? 3 ?????n 12 th??ng'])
			// ->whereRaw('id IN (SELECT MAX(id) AS id FROM nguoilaodong GROUP BY cmnd )')
			->count()	;		
			
		$info['hdkhac']=	$info['tong']-$info['hdcothoihan']-$info['hdkhongthoihan'];
		$info['cmktkhac']=	$info['tong']-$info['cmkttrung']-$info['cmktcao']-$info['quanly'];
			
		 return $info;
	}
	// L???y th??ng tin ng?????i lao ?????ng theo nh??m
	public function getEmployerStateById($ids = null)
	{ 
		$info= array();
	  	// T???ng s??? lao ?????ng ??ang ho???t ?????ng t???i DN
		$info['tong']= DB::table('nguoilaodong')

			->whereIn('nguoilaodong.id', $ids)

			->count()	;	
		// T???ng n???	
		$info['nu'] =DB::table('nguoilaodong')
				->whereIn('nguoilaodong.id', $ids)

			->where('nguoilaodong.gioitinh','like', '%N???%')
			->count()	;
		// Tu???i tr??n 35
		$info['age']= DB::table('nguoilaodong')
			->whereIn('nguoilaodong.id', $ids)

			->whereRaw("YEAR(GETDATE())-YEAR(ngaysinh) > 35")
			->count()	;
		// s??? L?? tham gia BHXH
		$info['bhxh']=DB::table('nguoilaodong')
			->whereIn('nguoilaodong.id', $ids)

			->whereNotNull('bdbhxh')
			->count()	;
		// s??? l?????ng Nh?? qu???n l??	
		
		$quanlys=DB::table('nguoilaodong')
			->whereIn('nguoilaodong.id', $ids)

			->where(function ($query) {
					$query->whereIn('nguoilaodong.chucvu', ['Gi??m ?????c','Nh?? l??nh ?????o','Qu???n l??'])
							->orWhere('nguoilaodong.chucvu','like','%Tr?????ng%')
							->orWhere('nguoilaodong.chucvu','like','%Ph??%');
			})
			->pluck('id')->toArray()	;
			
			
			$info['quanly']= count($quanlys);
			
		// s??? L?? CMKT b???c cao
		$info['cmktcao']=DB::table('nguoilaodong')
			->whereIn('nguoilaodong.id', $ids)

			->where('trinhdocmkt','?????i h???c tr??? l??n')
			->whereNotIn ('id',$quanlys)
			->count()	;	
		// s??? L?? CMKT b???c trung
		$info['cmkttrung']=DB::table('nguoilaodong')
			->whereIn('nguoilaodong.id', $ids)

			->where(function ($query) {
					$query->Where('nguoilaodong.trinhdocmkt','like','%Cao ?????ng%')
							->orWhere('nguoilaodong.trinhdocmkt','like','%Trung c???p%');
			})
			->whereNotIn ('id',$quanlys)
			->count()	;	
		//		
		// s??? L?? c?? HDLD kh??ng th???i h???n
		
		$info['hdkhongthoihan']=DB::table('nguoilaodong')
			->whereIn('nguoilaodong.id', $ids)

			->where('nguoilaodong.loaihdld','Kh??ng x??c ?????nh th???i h???n')
			->count()	;	
		
		// s??? L?? c?? HDLD c?? th???i h???n
		
		$info['hdcothoihan']=DB::table('nguoilaodong')
			->whereIn('nguoilaodong.id', $ids)

			->whereIn('nguoilaodong.loaihdld',['????? 12 ?????n 36 th??ng','????? 3 ?????n 12 th??ng'])
			->count()	;		
			
		$info['hdkhac']=	$info['tong']-$info['hdcothoihan']-$info['hdkhongthoihan'];
		$info['cmktkhac']=	$info['tong']-$info['cmkttrung']-$info['cmktcao']-$info['quanly'];
			
		 return $info;
	}
	
	
	// Xu???t th??ng tin ng?????i lao ?????ng ra Excel 
	public function getAdminEmployersExport(){
		
		$request = request();
		
		//filter
		$search = $request->search;
		$gioitinh_filter = $request->gioitinh_filter;
		$state_filter = $request->state_filter;
		$age_filter = $request->age_filter;
		$cid = $request->cid;
				
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
		->get()	;


		foreach($lds as $ld){
			
			$cty= DB::table('company')->where('id',$ld->company)->get()->first();
			$ld->ctyname=$cty->name;
		}
		
		return $lds;
		
	}
	
	// Xu???t th??ng tin ng?????i lao ?????ng ra Excel cho doanh nghiep
	public function getEmployersExport()
	{ 
	  $request= request();
	  
	  $uid = session('admin')->id;
	  $cid= DB::table('company')->select('id')->where('user',$uid)->first();

	  $lds= Employer::select("hoten","gioitinh","ngaysinh","cmnd","dantoc","nation","tinh","huyen","xa","address","sobaohiem","trinhdogiaoduc","trinhdocmkt","nghenghiep","linhvucdaotao","loaihdld","bdhopdong","kthopdong","luong","pcchucvu","pcthamnien","pcthamniennghe","pcluong","pcbosung","bddochai","ktdochai","vitri","chucvu","bdbhxh","ktbhxh","luongbhxh","ghichu","created_at","updated_at", "state","fromttdvvl")
						->where('state','<',3)
						->where('company', $cid->id)
						->get();
	 $parramfields= ["trinhdogiaoduc","trinhdocmkt","nghenghiep","linhvucdaotao","loaihdld"];	
	 
		foreach($lds as $ld){
			
			foreach ($parramfields as $key=>$field){
				
				$pid=$ld->$field;
				$pname= DB::table('param')->select('name')->where('name',$pid)->first();
				if($pname){$ld->$field = $pname->name;};

			}
			
		}
		;

// dd($lds);
		return $lds;
	}
	// C???p nh???t th??ng tin ng?????i lao ?????ng
	public function update_info( )
	{	
		$request=request();
		$eid= $request->id;
		$ld=Employer::find($eid);
		
		//$validate = $request->validate([			
		//		'dkkd' => 'required|max:255|unique:company',				
		//				]);
			
		$data = $request->all();
		
		$ld->fill($data);
		
		$dirty=$ld->getDirty();
		$sqty=count($dirty);
		
		$danhsach= array();
		
		foreach ($dirty as $field => $newdata)
        {
          $olddata = $ld->getOriginal($field);
          if ($olddata != $newdata)
          {
           $danhsach[]=$field. " thay ?????i t??? ".$olddata." sang ".$newdata;
          }
        }
		
		if($sqty>0) {
			$ld->save();
			$result= 1;
			// add to log system`
				$rm= new Report();
				
				$note= $request->note.' . '.$sqty." m???c thay ?????i  ." . implode( " . ",$danhsach);
				
				
				$rm->report('updateinfo', $result, 'nguoilaodong',$eid,1, $note);
				
			
			} else{ 
			$result = 0;
			};
		
		
		return redirect('report-fa')->with('message', $sqty.' th??ng tin l??u th??nh c??ng! ');
		
		
	}
	
	// Update t??nh tr???ng ng?????i lao ?????ng
	 public function update_state( $eid, $state,$note)
	{
		$ld=Employer::find($eid);
		$olddata=$ld->state;
		
		if($olddata==$state){			
			return redirect('report-fa')->withErrors(['message'=>"C???p nh???t ko th??nh c??ng"]);
		};
		$ld->state= $state;
		
		$result=$ld->save();
		// add to log system`
	
		switch ($state){
			case 2 : 
				$updateinfo = "tamdung" ;					
				break;
			case 1 : 
				$updateinfo = "kethuctamdung";					
				break;
			case 3 : 
				$updateinfo = "baogiam";				
				break;
			
		};
		 
		
		$rm= new Report();
		$rm->report( $updateinfo , $result, 'nguoilaodong',$eid,1,$note);
		if($result){
			return redirect('report-fa')->with('message',"C???p nh???t th??nh c??ng");
		}else{
			return redirect('report-fa')->withErrors(['message'=>"C???p nh???t ko th??nh c??ng"]);
		}
		
	}
	
	// quy m?? 1 c??ng ty
	public function getQuymo($cid){
	
		$q = Employer::where('company', $cid)
							->where('state', '<', 3)
							->count();
		 return $q;
		
	}
	// th??ng tin t???ng h???p 1 c??ng ty
	public function getTonghop($cid){
		$info= array();
		// dd($cid);
		$info['slld']= Employer::where('company', $cid)
							->where('state', '<', 3)
							->count();
		$info['trongtinh']=  Employer::where('company', $cid)
							->where('state', '<', 3)
							->where('tinh', 'Qu???ng B??nh')
							->count();				
		$info['tructiep']= $info['slld'];//// chua ro khai niem
		
		$info['nu']=  Employer::where('company', $cid)
							->where('state', '<', 3)
							->where(function($q){
								$q->where('gioitinh','like','%nu%')
								->orwhere('gioitinh','like','%n???%');
							})
							->count();	
		$info['nudakyhd']=  Employer::where('company', $cid)
							->where('state', '<', 3)
							->where(function($q){
								$q->where('gioitinh','like','%nu%')
								->orwhere('gioitinh','like','%n???%');
							})
							// ->whereNotIn('bdhopdong', [null])
							->where('bdhopdong','!=',null)
							->count();	
		$info['dakyhd']=  Employer::where('company', $cid)
							->where('state', '<', 3)
							->where('bdhopdong','!=',null)
							->count();	
		$info['nuocngoai']=  Employer::where('company', $cid)
							->where('state', '<', 3)
							->whereNotIn('nation', ['VN','vn','Vi???t Nam'])
							->count();	
		$info['nunuocngoai']=  Employer::where('company', $cid)
							->where('state', '<', 3)
							->where(function($q){
								$q->where('gioitinh','like','%nu%')
								->orwhere('gioitinh','like','%n???%');
							})
							->whereNotIn('nation', ['VN','vn','Vi???t Nam'])
							->count();	
		$info['tnpt']=  Employer::where('company', $cid)
							->where('state', '<', 3)
							->wherein('trinhdogiaoduc', ['T???t nghi???p PTTH tr??? l??n','T???t nghi???p THPT tr??? l??n','T???t nghi???p trung h???c ph??? th??ng','T???t nghi???p PTTD tr??? l??n']) // 65 Tot nghiep THPT
							->count();	
		
		$info['maxluong']=	Employer::where('company', $cid)
							->where('state', '<', 3)
							->max('luong');		
		$info['minluong']=	Employer::where('company', $cid)
							->where('state', '<', 3)
							->min('luong');	
		// $info['avgluong']=	Employer::where('company', $cid)
		// 					->where('state', '<', 3)
		// 					->avg('luong');	
		$info['avgluong']=	0;
		$info['quanly']=Employer::where('company', $cid)
						->whereIn('nguoilaodong.state', [1,2])
						->where(function ($query) {
								$query->whereIn('nguoilaodong.chucvu', ['Gi??m ?????c','Nh?? l??nh ?????o','Qu???n l??'])
										->orWhere('nguoilaodong.chucvu','like','%Tr?????ng%')
										->orWhere('nguoilaodong.chucvu','like','%Ph??%');
						})
						->count()	;				
		return $info;
		
	}
	
	// th??ng tin ph??n b??? 1 c??ng ty theo t???ng ph??n lo???i
	public function getPhanbo($cid,$ptype){
		
		$params= DB::table('param')->where('type',$ptype)->get();
		$pb= array();
		$colname="hoten";
		switch ($ptype) {
			case 3 : $colname="trinhdocmkt"; break;
			case 4 : $colname="trinhdogiaoduc"; break;
			case 9 : $colname="nghenghiep"; break;
			case 11 : $colname="linhvucdaotao"; break;
			
		}
		
		foreach( $params as $p) {
			$pb[$p->name]= Employer::where('company', $cid)
							->where('state', '<', 3)
							->where($colname, $p->name) // 65 Tot nghiep THPT
							->count();	
		};
		
		return $pb;
		
	}
	// Import ng?????i lao ?????ng t??? file excel
	public function import($cid )
	{	
		
		$request= request();
		// Get the csv rows as an array
		$file= $request->file('import_file');
		$dataObj = new \stdClass();
		$theArray = Excel::toArray($dataObj,$file );
		$arr=$theArray[0];
		// check file excel
		$lds = array();
		$nfield= 34;
		for ($i = 1; $i < count($arr); $i++){
			
		$data = array();
			for ($j = 0; $j < $nfield; $j++){
				
				$data[$arr[0][$j]]= $arr[$i][$j];
				
			}
			// check data
		if(!$data['hoten']){ break;};
		$data['cmnd']=str_replace('\'','',$data['cmnd']);	
		
		if(!$this->checkCmndExits($data['cmnd']))
		{	
			$data['company']= $cid;
			
			$unix_date = ($data['ngaysinh'] - 25569) * 86400;
			
			$data['ngaysinh']= date('Y-m-d',$unix_date);
			
			if(!$data['state']){$data['state']=1;}
			
			if ($data['bdbhxh']){
			
			$unix_date = ($data['bdbhxh'] - 25569) * 86400;
			
			$data['bdbhxh']= date('Y-m-d',$unix_date);
				
			}
			if ($data['bdhopdong']){
			
			$unix_date = ($data['bdhopdong'] - 25569) * 86400;
			
			$data['bdhopdong']= date('Y-m-d',$unix_date);
				
			}
			
			if ($data['bddochai']){
			
			$unix_date = ($data['bddochai'] - 25569) * 86400;
			
			$data['bddochai']= date('Y-m-d',$unix_date);
				
			}
			if ($data['ktdochai']){
			
			$unix_date = ($data['ktdochai'] - 25569) * 86400;
			
			$data['ktdochai']= date('Y-m-d',$unix_date);
				
			}
			if ($data['kthopdong']){
			
			$unix_date = ($data['kthopdong'] - 25569) * 86400;
			
			$data['kthopdong']= date('Y-m-d',$unix_date);
				
			}
			if ($data['ktbhxh']){
			
			$unix_date = ($data['ktbhxh'] - 25569) * 86400;
			
			$data['ktbhxh']= date('Y-m-d',$unix_date);
				
			}
			$lds[]=	$data;
		}
		
		}
	$num_valid_ld= count($lds);
	if($num_valid_ld){
		$result= DB::table('nguoilaodong')->insert($lds);
		$note="???? l??u th??nh c??ng ".$num_valid_ld ." lao ?????ng.";
		// add to log system`
		$rm= new Report();
		$rm->report('import', $result, 'nguoilaodong',DB::getPdo()->lastInsertId(),$num_valid_ld, $note);
		return $result;
	 }
		// navigate
	return $num_valid_ld;
	}
	
	// L???y lich su lam vi???c c???a ng?????i lao ?????ng
	public function getHosos($cmnd){
		
		$hosos= DB::table('nguoilaodong')
				->where('cmnd',$cmnd)
				->where('state', 3)
				->orderBy('id', 'DESC')
				->get();
		if($hosos){
		foreach ($hosos as $hoso){	
			$cty = DB::table('company')->where('id',$hoso->company)->get()->first();
			$hoso->ctyname =$cty->name;	
		}
		}
		return $hosos;		
	}
	
	// Ki???m tra CMND c???a ng?????i lao ?????ng, ?????m b???o t??nh duy nh???t
	public function checkCmndExits($cmnd){
		
		$result= DB::table('nguoilaodong')->select('id')->where('cmnd',$cmnd)->whereNotIn('state',[3])->get()->first();
		if($result)
		{return $result->id ;}else{
			
			return 0 ;
		}
	}
	
	
}
