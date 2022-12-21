<?php

namespace App\Models\Danhmuc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dmtrinhdokythuat extends Model
{
    use HasFactory;
    protected $table = 'dmtrinhdokythuat';
    protected $fillable=['madmtdkt','tentdkt','trangthai','mota','stt'];
}
