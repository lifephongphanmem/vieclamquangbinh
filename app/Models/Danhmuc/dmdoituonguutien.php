<?php

namespace App\Models\Danhmuc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dmdoituonguutien extends Model
{
    use HasFactory;
    protected $table = 'dmdoituonguutiens';
    protected $fillable=['madmdt','tendoituong','trangthai','stt'];
}
