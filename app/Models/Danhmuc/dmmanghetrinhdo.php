<?php

namespace App\Models\Danhmuc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dmmanghetrinhdo extends Model
{
    use HasFactory;
    protected $table = 'dmmanghetrinhdo';
    protected $fillable=['madmmntd','tenmntd','trangthai','stt','manghe','mota'];
}
