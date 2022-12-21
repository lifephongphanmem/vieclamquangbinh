<?php

namespace App\Models\Danhmuc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dmtinhtrangthamgiahdktct extends Model
{
    use HasFactory;
    protected $table = 'dmtinhtrangthamgiahdktct';
    protected $fillable=['manhom','madmtgktct','tentgktct','trangthai','mota','stt'];
}
