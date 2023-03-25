<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vanbantailieu extends Model
{
    use HasFactory;
    protected $table='vanbantailieu';
    protected $fillable=[
        'tenvb',
        'file'
    ];
}
