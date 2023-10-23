<?php

namespace App\Models;

use App\Imports\ColectionImport;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Facades\Excel;

class nguoilaodong extends Model
{
    use HasFactory;
    protected $table='nguoilaodong';
    protected $fillable=[
        'hoten'
      ,'gioitinh'
      ,'ngaysinh'
      ,'cmnd'
      ,'dantoc'
      ,'nation'
      ,'tinh'
      ,'huyen'
      ,'xa'
      ,'address'
      ,'sobaohiem'
      ,'trinhdogiaoduc'
      ,'trinhdocmkt'
      ,'nghenghiep'
      ,'linhvucdaotao'
      ,'loaihdld'
      ,'bdhopdong'
      ,'kthopdong'
      ,'luong'
      ,'pcchucvu'
      ,'pcthamnien'
      ,'pcthamniennghe'
      ,'pcluong'
      ,'pcbosung'
      ,'bddochai'
      ,'ktdochai'
      ,'vitri'
      ,'chucvu'
      ,'bdbhxh'
      ,'ktbhxh'
      ,'luongbhxh'
      ,'ghichu'
      ,'company'
      ,'state'
      ,'fromttdvvl'
    ];

 
}
