<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donvinhanthongbao extends Model
{
    use HasFactory;
    protected $table='donvinhanthongbao';
    protected $fillable=[
        'madv','mahopthu'
    ];
}
