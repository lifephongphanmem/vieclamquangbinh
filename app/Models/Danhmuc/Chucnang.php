<?php

namespace App\Models\Danhmuc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chucnang extends Model
{
    use HasFactory;
    protected $table = 'chucnangs';
    protected $fillable = [
        'maso','tencn','capdo','parent','trangthai','machucnang_goc'
    ];
}
