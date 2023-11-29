<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ungvien extends Model
{
    use HasFactory;
    protected $table = 'ungvien';
    protected $fillable = ['user','email','avatar','hoten','cccd','gioitinh','ngaysinh','phone','tinh','huyen','xa','address','chucdanh','honnhan','hinhthuclv','luong','trinhdocmkt',
        'word','excel','powerpoint','gioithieu','muctieu'];
}

