<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ungvienkinhnghiem extends Model
{
    use HasFactory;
    protected $table = 'ungvienkinhnghiem';
    protected $fillable = ['user','congty','quymo','linhvuc','chucdanh','ngayvao','ngaynghi','lydo','chitiet','mota'];
}
