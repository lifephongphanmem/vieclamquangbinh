<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class danhsach extends Model
{
    use HasFactory;
    protected $table='danhsach';
    protected $fillable=[
        'xa','huyen','tinh','soluong','soho','kydieutra','user_id','ghichu'
    ];
}
