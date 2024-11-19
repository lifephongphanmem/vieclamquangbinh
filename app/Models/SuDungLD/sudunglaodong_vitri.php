<?php

namespace App\Models\SuDungLD;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sudunglaodong_vitri extends Model
{
    use HasFactory;
    protected $table='sudunglaodong_vitri';
    protected $fillable=[
        'machucnang',
        'vitri',
        'soluong',
        'trinhdo',
        'chuyennganh',
        'kinhnghiem'
    ];

    public function inserts($tdid )
	{	
		$request=request();
		$data=$request->all();
		$qty=$request->quantity;
		
		
		for($i=0;$i<$qty;$i++){
			
			
			$tmp= array();
			
			foreach ($data as $key => $value) {
				if(isset($value[$i])){
					$tmp[$key]=$value[$i];
					};
				
			}
			
			
			$tmp['machucnang']= $tdid;
			
			$td = new sudunglaodong_vitri;
			$td->fill($tmp);
			$td->save();
			
		}
			
	}
}
