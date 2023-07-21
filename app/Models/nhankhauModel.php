<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nhankhauModel extends Model
{
    use HasFactory;

    protected $table='nhankhau';
    protected $fillable=[
        'danhsach_id',
        'hoten','gioitinh','ngaysinh','cccd','bhxh','thuongtru','diachi','uutien','dantoc','trinhdogiaoduc','chuyenmonkythuat','chuyennganh','tinhtranghdkt',
        'nguoicovieclam','congvieccuthe','thamgiabhxh','hdld','noilamviec','loaihinhnoilamviec','diachinoilamviec','thatnghiep','thoigianthatnghiep',
        'khongthamgiahdkt','ho','mqh','maloi','maloailoi','madv','kydieutra','soluongtrung','loaibiendong','truongbiendong','doituongtimvieclam','vieclammongmuon','nganhnghemongmuon',
        'nganhnghemuonhoc','trinhdochuyenmonmuonhoc','sdt','khuvuc'

        //Loại biến động: 1:báo tăng, 2:báo giảm,3:cập nhật
        //Khu vực: 1:thành thị, 2:nông thôn
        //doituongtimvieclam: 1:Chưa từng làm việc, 2:đã từng làm việc
        //vieclammongmuon: 1:trong tỉnh, trong nước, 2:đi làm việc nước ngoài
        //tringdochuyenmonmuonhoc: 1:sơ cấp, 2:trung cấp, 3:Cao đẳng
    ];
}
