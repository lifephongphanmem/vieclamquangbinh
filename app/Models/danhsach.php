<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class danhsach extends Model
{
    use HasFactory;
    protected $table='danhsach';
    public $timestamps = false;
    protected $fillable=[
        'xa','huyen','tinh','soluong','soho','kydieutra','user_id','ghichu','donvinhap','loi_cccd','loi_hoten','loi_ngaysinh','loi_loai2','loi_loai3','loi_loai4'
    ];
}
