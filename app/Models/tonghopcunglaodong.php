<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tonghopcunglaodong extends Model
{
    use HasFactory;
    protected $table = 'tonghopcunglaodong';
    protected $fillable = [
        'kydieutra',
        'madv',
        'tendv',
        'ldtren15',
        'ldcovieclam',
        'ldthatnghiep',
        'ldkhongthamgia',
        'thanhthi',
        'nongthon',
        'nam',
        'nu',
        'capdo',
        'trongnuoc',
        'nuocngoai',
        'hocnghe',
    ];
}
