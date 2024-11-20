<?php

namespace App\Models\SuDungLD;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sudunglaodong extends Model
{
    use HasFactory;
    protected $table='sudunglaodong';
    protected $fillable=[
        'machucnang',
        'company',
        'tong',
        'thoigianbosung',
        'thoigianlamviec'
    ];

    public function insert($machucnang)
	{
		$request = request();
		$qty = $request->quantity;

		$td = new sudunglaodong;

		$data = $request->all();
        $data['machucnang']=$machucnang;
		$td->fill($data);
		$td->save();
		return $td;
	}
}
