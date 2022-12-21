<?php

namespace App\Models\Danhmuc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dsnhomtaikhoan_phanquyen extends Model
{
    use HasFactory;
    protected $table='dsnhomtaikhoan_phanquyen';
    protected $fillable=[
        'manhomchucnang',
        'machucnang',
        'phanquyen',
        'danhsach',
        'thaydoi',
        'hoanthanh',
        'ghichu'
    ];
}
