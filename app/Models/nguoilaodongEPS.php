<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nguoilaodongEPS extends Model
{
    use HasFactory;
    protected $table='nguoilaodongEPS';
    protected $fillable=[
        'sobaodanh',
        'hoten',
        'ngaysinh',
        'gioitinh',//1:nam, 0: Nữ
        'cccd',
        'phanloai',//Phân loại lao động đi làm việc ở Hàn Quốc VD: đã đi về,chưa đi....
        'doituong',
        'nganhdkthi',//Ngành đăng ký thi
        'nghe',
        'sdt',
        'thonxom',
        'huyen',
        'xa',
        'tinh',
        'dkhoc',
        'nguoicapnhat',
        'nghekhac',
        'create_at',
        'updated_at'
    ];

}
