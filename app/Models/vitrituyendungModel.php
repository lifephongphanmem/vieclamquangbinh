<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vitrituyendungModel extends Model
{
    use HasFactory;
    protected $table='vitrituyendung';
    // protected $fillable=['*'];
    protected $fillable=[
        'idtuyendung','name'
      ,'description'
      ,'soluong',
      'manghe'
      ,'capbac'
      ,'chucvu'
      ,'tdgd'
      ,'tdcmkt'
      ,'chuyennganh'
      ,'trinhdonghe'
      ,'bacnge',
      'ngoaingu1'
      ,'chungchinn1'
      ,'xeploainn1'
      ,'ngoaingu2'
      ,'chungchinn2'
      ,'xeploainn2'
      ,'loaithvp'
      ,'tinhockhac'
      ,'loaithk'
      ,'kynangmem'
      ,'yeucaukn'
      ,'diadiem'
      ,'loaihopdong'
      ,'yeucauthem'
      ,'hinhthuclv'
      ,'mucdichlv'
      ,'mucluong'
      ,'hotroan'
      ,'phucloi'
      ,'noilamviec'
      ,'trongluongnang'
      ,'dungvadilai'
      ,'nghenoi'
      ,'thiluc'
      ,'thaotactay'
      ,'dungta'
      ,'uutien'
      ,'anhtuyendung'
      ,'anhdontuyendung'
    ];
}
