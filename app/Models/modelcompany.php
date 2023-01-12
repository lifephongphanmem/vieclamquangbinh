<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modelcompany extends Model
{
    use HasFactory;
    protected $table='company';
    protected $fillable=[
        'name',
        'masodn',
        'dkkd',
        'phone',
        'fax',
        'website',
        'email',
        'adress',
        'tinh',
        'huyen',
        'xa',
        'khuvuc',
        'khucn',
        'loaihinh',
        'public',
        'image',
        'user',
        'nganhnghe',
        'madv',
        'quymo'
    ];
}
