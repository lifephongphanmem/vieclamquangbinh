<?php

namespace App\Models\Danhmuc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Params extends Model
{
    use HasFactory;
    protected $table='param';
    protected $fillable=[
        'name','description','type'
    ];
    public $timestamps = false;
}
