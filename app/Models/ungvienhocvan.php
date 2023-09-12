<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ungvienhocvan extends Model
{
    use HasFactory;
    protected $table = 'ungvienhocvan';
    protected $fillable = ['user','chuyennganh','truong','bangcap','tungay','denngay','thanhtuu'];
}
