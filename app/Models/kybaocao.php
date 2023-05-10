<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kybaocao extends Model
{
    use HasFactory;
    protected $table = 'kybaocao';
    protected $fillable = [
        'kydieutra',
        'noidung',

        'madv_x',
        'cqtiepnhan_x',
        'trangthai_x',
        'thoidiem_x',
        'lydo_x',

        'madv_h',
        'cqtiepnhan_h',
        'trangthai_h',
        'thoidiem_h',
        'lydo_h',

        'madv_t',
        'trangthai_t',
        'thoidiem_t',

    ];
}
