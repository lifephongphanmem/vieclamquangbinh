<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dangkytimviec extends Model
{
    use HasFactory;
    protected $table = 'dangkytimviec';
    protected $fillable = [
        'kydieutra',
        'hoten',
        'ngaysinh',
        'gioitinh',
        'cccd',
        'phone',
        'dantoc',
        'thuongtru',
        'tamtru',

        'trinhdogiaoduc',
        'trinhdocmkt',
        'loaithvp',
        'tinhockhac',
        'loaithk',
        'ngoaingu1',
        'chungchinn1',
        'xeploainn1',
        'ngoaingu2',
        'chungchinn2',
        'xeploainn2',
        'kinhnghiem',
        'kynangmem',
        'nguoikhuyettat',

        'tencongviec',
        'manghe',
        'chucvu',
        'loaihinhkt',
        'loaihdld',
        'khanangcongtac',
        'hinhthuclv',
        'mucdichlv',
        'luong',
        'hotroan',
        'phucloi',
        'maphien',
        'phiengd',
        'linhvuc',
        'datsotuyen',
        'nhanduocviec',

        'tendn',
        'madkkd',
        'thoidiem',
    ];
}
