<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cauhinheps extends Model
{
    use HasFactory;
    protected $table='cauhinheps';
    protected $fillable=[
        'sotien','st_vietchu','noidung'
    ];
}
