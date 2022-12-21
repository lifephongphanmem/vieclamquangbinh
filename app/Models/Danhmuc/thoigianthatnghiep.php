<?php

namespace App\Models\Danhmuc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class thoigianthatnghiep extends Model
{
    use HasFactory;
    protected $table='thoigianthatnghiep';
    protected $fillable=['madm','tendm'];
}
