<?php

namespace App\Models\Danhmuc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dmdonvi extends Model
{
    use HasFactory;

    protected $table = 'dmdonvi';
    protected $fillable = [
        'madv', 'maxa', 'mahuyen','matinh','tendv','diachi','phanloaitaikhoan','caphanhchinh','tendvhienthi','madvcq','diadanh','chucvuky','nguoiky','ttlienhe','madiaban','email'
    ];
}
