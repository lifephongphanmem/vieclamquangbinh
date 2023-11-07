<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class apply extends Model
{
    use HasFactory;
    protected $table='apply';
    protected $fillable=[
        'ungvien',
        'vitri',
        'noidung',
        'trangthai',
    ];
}
