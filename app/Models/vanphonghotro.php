<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vanphonghotro extends Model
{
    use HasFactory;
    protected $table = 'vanphonghotro';
    protected $fillable = [
        'id',
        'maso',
        'vanphong',
        'hoten',
        'chucvu',
        'sdt',
        'skype',
        'facebook',
        'sapxep',
    ];
}
