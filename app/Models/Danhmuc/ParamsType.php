<?php

namespace App\Models\Danhmuc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParamsType extends Model
{
    use HasFactory;
    protected $table='paramtype';
    protected $guarded = ['id'];
}
