<?php

namespace App\Models\Danhmuc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vithevieclam extends Model
{
    use HasFactory;
    protected $table='vithevieclam';
    protected $fillable=['madm','tendm'];
}
