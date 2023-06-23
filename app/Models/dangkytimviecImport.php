<?php

namespace App\Models;

use App\Imports\ColectionImport;
use Carbon\Carbon;
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
            'phiengd',
            'hoten',
            'cccd',
            'ngaysinh',
            'gioitinh',
            'phone',
            'dantoc',
            'thuongtru',
            'tamtru',

            'tentrinhdogiaoduc', 'trinhdogiaoduc',
            'tentrinhdocmkt',  'trinhdocmkt',
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

          
            'tenmanghe', 'manghe',
            'tenchucvu',  'chucvu',
            'tenloaihinhkt','loaihinhkt',
            'loaihdld',
            'khanangcongtac',
            'hinhthuclv',
            'mucdichlv',
            'luong',
            'hotroan',
            'phucloi',
            'linhvuc',

            'tencongviec',
            'tendn',
            'madkkd',
        );
        
        // check file excel

        $nfield = sizeof($arr_col);
        $maphien = date('YmdHis');
        for ($i = 1; $i < count($arr); $i++) {

            $data = array();

            for ($j = 0; $j < $nfield; $j++) {

                $data[$arr_col[$j]] = $arr[$i][$j + 1] ?? '';
            }
            // $data['ngaysinh'] = Carbon::parse($data['ngaysinh']);
            // $date = Carbon::parse($data['ngaysinh']);
            // $data['ngaysinh'] = Carbon::create($date->year , $date->month, $date->day,);

            //  dd($data['ngaysinh']);
            if ($data['hoten'] == '' && $data['cccd'] == '' &&$data['phiengd'] == '' ) {
               break;
            }else{
                $data['maphien'] = $maphien;
                dangkytimviec::create($data);
            }
           

        }
    }
  
}
