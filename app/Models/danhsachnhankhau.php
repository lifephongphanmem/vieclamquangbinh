<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class danhsachnhankhau extends Model
{
    use HasFactory;
    protected $table='nhankhau';
    protected $fillable=[
        'danhsach_id',
        'hoten','gioitinh','ngaysinh','cccd','bhxh','thuongtru','diachi','uutien','dantoc','chuyenmonkythuat','chuyennganh','tinhtranghdkt',
        'nguoicovieclam','congvieccuthe','thamgiabhxh','hdld','noilamviec','loaihinhnoilamviec','diachinoilamviec','thatnghiep','thoigianthatnghiep',
        'khongthamgiahdkt','ho','mqh','maloi','maloailoi','madv','kydieutra','soluongtrung'

    ];
}
