<?php

namespace App\Models\Danhmuc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dmchuyenmondaotao extends Model
{
    use HasFactory;
    protected $table='dmchuyenmondaotao';
    protected $fillable=[
        'tendm'
    ];
}
