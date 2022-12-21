<?php

namespace App\Models\Danhmuc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dmtrinhdogdpt extends Model
{
    use HasFactory;
    protected $table = 'dmtrinhdogdpt';
    protected $fillable=['madmgdpt','tengdpt','trangthai','stt'];
}
