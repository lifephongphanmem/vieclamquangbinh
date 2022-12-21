<?php

namespace App\Models\Danhmuc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dmtinhtrangthamgiahdkt extends Model
{
    use HasFactory;
    protected $table = 'dmtinhtrangthamgiahdkt';
    protected $fillable=['madmtgkt','tentgkt','trangthai','mota','stt'];
}
