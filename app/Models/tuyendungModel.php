<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tuyendungModel extends Model
{
    use HasFactory;
    protected $table='tuyendung';
    protected $fillable=[
        'noidung',
        'thoihan',
        'type',
        'contact',
        'phonetd',
        'emailtd',
        'chucvutd',
        'contacttype',
        'yeucau',
        'state',
        'user',
        'datuyen',
        'datuyenttut'
    ];
}
