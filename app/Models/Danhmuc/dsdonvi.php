<?php

namespace App\Models\Danhmuc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dsdonvi extends Model
{
    use HasFactory;
    protected $table='dsdonvi';
    protected $fillable=[
        'madiaban',
        'madonvi',
        'maqhns',
        'tendonvi',
        'diachi',
        'sodt',
        'cdlanhdao',
        'lanhdao',
        'cdketoan',
        'ketoan',
        'songuoi',
        'diadanh',
        'nguoilapbieu',
        'madonviQL',
        'caphanhchinh',
        'maphanloai',
        'linhvuchoatdong', //lĩnh vực hoạt động
        'ngaydung',
        'chuyendoi',
        'trangthai',
        'sotk',
        'tennganhang',
        'madinhdanh',
        'tendvhienthi',
        'tendvcqhienthi',
    ];
}
