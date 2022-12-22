<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class danhsachloi extends Model
{
    use HasFactory;
    protected $table='danhsachloi';
    protected $fillable=['nhankhau_id','madv','kydieutra'];
}
