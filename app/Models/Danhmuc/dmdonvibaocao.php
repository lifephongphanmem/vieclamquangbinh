<?php

namespace App\Models\Danhmuc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dmdonvibaocao extends Model
{
    use HasFactory;
    protected $table='dmdonvibaocao';
    protected $fillable=[
        'madvbc',
        'tendvbc',
        'level',
        'madvcq',
    ];
}
