<?php

namespace App\Models\Danhmuc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dmtinhtrangthamgiahdktct2 extends Model
{
    use HasFactory;
    protected $table = 'dmtinhtrangthamgiahdktct2';
    protected $fillable=['manhom2','madmtgktct2','tentgktct2','trangthai','mota','stt'];
}
