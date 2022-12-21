<?php

namespace App\Models\Danhmuc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dmchucvu extends Model
{
    use HasFactory;
    protected $table='dmchucvu';
    protected $fillable=['tencv','mota','stt'];
}
