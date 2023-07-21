<?php

namespace App\Models\Danhmuc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dmnganhnghe extends Model
{
    use HasFactory;
    protected $table='dmnganhnghe';
    protected $fillable=['madm','tendm','stt'];
}
