<?php

namespace App\Models\Danhmuc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class capbac extends Model
{
    use HasFactory;
    protected $table='capbac';
    protected $fillable=['madm','tendm','trangthai'];
}
