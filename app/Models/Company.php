<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employer;
class Company extends Model 
{


	protected $table = 'company';
	
	

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
	public $timestamps = false;
	
	public function employers()
	{
		return $this->hasMany(Employer::class,'company')
							->where('state', '<', 3);
		
	}
	public function getCompaniesExportQuery()
	{ 
	  $request= request();
	  $search = $request->search;
	$public_filter = $request->public_filter;
	$dm_filter = $request->dm_filter;
	
	$quymo_min_filter= $request->quymo_min_filter;
	$quymo_max_filter= $request->quymo_max_filter;
	 
	$ctys= Company::withCount(['employers'])
				
				->when($search, function ($query, $search) {
                    return $query->where('company.name', 'like', '%'.$search.'%');
					})
				->when($public_filter, function ($query, $public_filter) {
                    return $query->where('company.public', $public_filter);
					})
				->when($dm_filter, function ($query, $dm_filter) {
					return $query->where('company.huyen', $dm_filter);
					})
				->when($quymo_min_filter, function ($query, $quymo_min_filter) {
					return $query->having('employers_count', '>=', $quymo_min_filter);
					})
				 ->when($quymo_max_filter, function ($query, $quymo_max_filter) {
					return $query->having('employers_count', '<=', $quymo_max_filter);	
					})
				 ->when($quymo_max_filter==0&&!is_null($quymo_max_filter), function ($query, $quymo_max_filter) {
					return $query->having('employers_count', '=', 0)	;
					})		
				->orderBy('employers_count', 'desc')
				;
		return $ctys;
	}
}
