<?php

namespace App\Models\Danhmuc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dmloailaodong extends Model
{
    use HasFactory;
    protected $table = 'dmloailaodong';
    protected $fillable=['madmlld','tenlld','trangthai','stt'];
}
