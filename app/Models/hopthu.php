<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hopthu extends Model
{
    use HasFactory;
    protected $table='hopthu';
    protected $fillable=[
        'tieude',
        'noidung',
        'file',
        'madv',
        'thoigiangui',
        'mahuyen',
        'trangthai',
        'ttdvvl',
        'dvnhan',
        'loaithu',
        'matinh',
        'lydo',
        'status'
    ];
}
