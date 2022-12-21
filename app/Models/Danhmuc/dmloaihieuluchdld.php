<?php

namespace App\Models\Danhmuc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dmloaihieuluchdld extends Model
{
    use HasFactory;
    protected $table = 'dmloaihieuluchdld';
    protected $fillable=['madmlhl','tenlhl','trangthai','mota','stt'];
}
