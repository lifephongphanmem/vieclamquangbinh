<?php

namespace App\Models\DuBao;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dubaonhucaulaodong extends Model
{
    use HasFactory;
    protected $table = 'dubaonhucaulaodong';
    protected $fillable = [
        'id',
        'madubao',
        'thoigian',
        'nam',
        'noidung',
        'ghichu',
        'madv',
    ];
}
