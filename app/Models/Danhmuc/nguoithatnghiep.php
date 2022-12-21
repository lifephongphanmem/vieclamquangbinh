<?php

namespace App\Models\Danhmuc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nguoithatnghiep extends Model
{
    use HasFactory;
    protected $table='nguoithatnghiep';
    protected $fillable=['madm','tendm'];
}
