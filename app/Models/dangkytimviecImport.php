<?php

namespace App\Models;

use App\Imports\ColectionImport;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class dangkytimviecImport extends Model
{

    protected $table = 'dangkytimviec';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = ['*'];
    // protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    public $timestamps = false;


    public function dktvimport($input)
    {
       
        $request = request();
        
        // Get the csv rows as an array

        $file = $input['import_file'];
        $dataObj = new ColectionImport();
        $theArray = Excel::toArray($dataObj, $file);
        $arr = $theArray[0];
        // dd($arr);
        $arr_col = array(
            'hoten',
            'cccd',
            'ngaysinh',
            'gioitinh',
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
            'kynangmem',
            'kinhnghiem',
            
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
        );
        
        // check file excel

        $nfield = sizeof($arr_col);

        for ($i = 1; $i < count($arr); $i++) {

            $data = array();

            for ($j = 0; $j < $nfield; $j++) {

                $data[$arr_col[$j]] = $arr[$i][$j + 0] ?? '';
            }

            dangkytimviec::create($data);

        }
    }
  
}
