<?php

namespace App\Models\Danhmuc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dsdiaban extends Model
{
    use HasFactory;
    protected $table='dsdiaban';
    protected $fillable=[
        'madiaban',
        'tendiaban',
        'capdo',
        'madonviQL',
        'madiabanQL',
        'ghichu',
    ];

}
