<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dsthatnghiep extends Model
{
    use HasFactory;
    protected $table = 'dsthatnghiep';
    protected $fillable = [
        'kydieutra',
        'hoten',
        'ngaysinh',
        'gioitinh',
        'cccd',
        'bhxh',
        'diachi',
        'xa',
        'huyen',
        'nguyennhan',
        'trinhdocmkt',
        'nghenghiep',
        'nghecongviec',

    ];
}
