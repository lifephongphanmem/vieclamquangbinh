<?php

namespace App\Models\Danhmuc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nguyennhanthatnghiep extends Model
{
    use HasFactory;
    protected $table = 'nguyennhanthatnghiep';
    protected $fillable = ['tennn', 'stt'];
}
