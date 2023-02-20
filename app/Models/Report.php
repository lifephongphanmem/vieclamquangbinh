<?php

namespace App\Models;
use Carbon\Carbon;
use Session;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class Report extends Model 
{


	protected $table = 'report';
	
	

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'result', 'datatable','lastid','numrow','user','note','iprequest'
    ];

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
	public $timestamps = false;
	// back end
	public function getBiendong($month){
		
		$ym = explode('-',$month,2);
		$timeS = Carbon::create($ym[0],$ym[1])->startOfMonth();
		$timeE =Carbon::create($ym[0],$ym[1])->endOfMonth(); 
		
		$info=new \stdClass;
		$info->tang= $this->getEmployersTang($timeS,$timeE);
		$info->giam= $this->getEmployersGiam($timeS,$timeE);
		
		return $info;
	}
	public function getCusBiendong($smonth,$emonth){
		$info=new \stdClass;

		$sym = explode('-',$smonth,2);
		$eym = explode('-',$emonth,2);
		$timeS = Carbon::create($sym[0],$sym[1])->startOfMonth();
		$timeE =Carbon::create($eym[0],$eym[1])->endOfMonth(); 
		
		
		$info->tang= $this->getEmployersTang($timeS,$timeE);
		$info->giam= $this->getEmployersGiam($timeS,$timeE);
		
		return $info;
	}
	public function getEmployersTang($timeS,$timeE){
		
		$biendong= array();
		$eid= array();
		$biendong['tong']=0;
		
		
		// get reports
		$reports = Report::whereBetween("time",[$timeS,$timeE] )
			->where('type', 'baotang')
			->where('datatable', 'nguoilaodong')
			->where('result', 1)
			->orderBy('time','desc')
			->get();
			
		foreach ($reports as $rp){
			
			$biendong['tong']+= $rp->numrow;
			$ids= explode(',',$rp->lastid);
			foreach($ids as $id){
				$eid[]=$id;
			};
		}

		$biendong['eid']=$eid;
		return $biendong;
	}
	
	public function getEmployersGiam($timeS,$timeE){
		
		$biendong= array();
		$eid= array();
		$biendong['tong']=0;
		
		// get reports
		$reports = Report::whereBetween("time",[$timeS,$timeE] )
			->where('type', 'baogiam')
			->where('datatable', 'nguoilaodong')
			->where('result', 1)
			->orderBy('time','desc')
			->get();
			
		foreach ($reports as $rp){
			
			$biendong['tong']+= $rp->numrow;
			$eid[]= $rp->lastid;
			
		}
		
		$biendong['eid']=$eid;
		return $biendong;
	}
	
	
	
	// Front End function
	public function getReports($uid,$time_filter){
		
		switch ($time_filter){
			
			case '1': 
				$dateS = Carbon::now()->startOfMonth();
				$dateE = Carbon::now()->addHour(8); 
				break;
			// case '2': 
			// 	$dateS = Carbon::now()->startOfMonth()->subMonth(1);
			// 	$dateE = Carbon::now()->startOfMonth(); 
			// 	break;
			// default:  
			// 	$dateS = Carbon::now()->startOfYear();
			// 	$dateE = Carbon::now() ->addHour(7); 
			// 	break;
			
		}
		$request = request();
// dd($dateE);
		$reports = Report::whereBetween("time",[$dateS,$dateE] )
			->where('user',$uid)
			->whereNotIn('type', ['tuyendung','dangkydichvu','login'])
			->orderBy('time','desc')
			->get();
// dd($reports);
		return $reports;
	}
	
	public function getReportBetweenTime($uid,$dateS,$dateE,$type)
	{
		$request = request();
		
		$reports = Report::whereBetween("time",[$dateS,$dateE] )
			->where('user',$uid)
			->where('type', $type)
			->orderBy('time','desc');
			
		return $reports;
	}
	
	public function getEmployersAtBegin($uid)
	{
		$dateS = Carbon::now()->startOfMonth();
		$dateE = Carbon::now()->addHour(7); 
		
		$request = request();
		
		$sltang = Report::whereBetween("time",[$dateS,$dateE] )
			->where('user',$uid)
			->where('type', 'baotang')
			->total('soluong')
			;
		$slgiam = Report::whereBetween("time",[$dateS,$dateE] )
			->where('user',$uid)
			->where('type', 'baogiam')
			->total('soluong')
			;
			
		return $reports;
	}
	
	
	public function report($type,$result,$tbl,$rowid,$num,$note=null ){
		// write report 
		$r = array();
		$r['type']= $type;
		$r['result']= $result;
		$r['datatable']= $tbl;	
		$r['lastid']= $rowid;	
		$r['numrow']= $num;	
		$r['note']= $note;	
		$request = request();
		$r['iprequest']= $request->ip(); 
		
		if ( Session::has('admin')) {
			$r['user']= session('admin')->id;	
		}else{
		
			$r['user']= 0;	
		}
		$report= $this->create($r);
	}
}
