<?php

namespace App\Models\Danhmuc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dmhinhthuclamviec extends Model
{
    use HasFactory;
    protected $table='dmhinhthuclamviec';
    protected $fillable=['tendm','stt'];
}
