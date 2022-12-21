<?php

namespace App\Models\Hethong;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dstaikhoan_phanquyen extends Model
{
    use HasFactory;
    protected $table = 'dstaikhoan_phanquyen';
    protected $fillable = [
        'tendangnhap', 'machucnang', 'phanquyen', 'danhsach', 'thaydoi', 'hoanthanh', 'ghichu'
    ];
}
