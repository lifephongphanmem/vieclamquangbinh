<?php

namespace App\Models\Danhmuc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dmthoigianthatnghiep extends Model
{
    use HasFactory;
    protected $table = 'dmthoigianthatnghiep';
    protected $fillable=['madmtgtn','tentgtn','trangthai','stt','mota'];
}
