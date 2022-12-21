<?php

namespace App\Models\DuBao;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dubaonhucaulaodong_chitiet extends Model
{
    use HasFactory;
    protected $table = 'dubaonhucaulaodong_chitiet';
    protected $fillable = [
        'id',
        'madubao',
        'phanloai', //Cung; Cầu; Khác
        //Thông tin cung
        'madonvi', 50,
        'tendonvi', 100,
        //Thông tin cầu
        'masodn', 50,
        'tendv',
        //Thông tin nguồn điều tra khác
        'tennguon',
        //Vị trí việc làm
        'madmtgktct2',
        'tentgktct2',
        'soluong',
        'ghichu',
    ];
}
