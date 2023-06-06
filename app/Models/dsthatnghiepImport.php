<?php

namespace App\Models;

use App\Imports\ColectionImport;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Facades\Excel;

class dsthatnghiepImport extends Model
{
    protected $table = 'dsthatnghiep';

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


    public function thatnghiepimport($input)
    {

        $request = request();

        // Get the csv rows as an array

        $file = $input['import_file'];
        $dataObj = new ColectionImport();
        $theArray = Excel::toArray($dataObj, $file);
        $arr = $theArray[0];
        // dd($arr);
        $arr_col = array(
            'kydieutra',
            'hoten',
            'ngaysinh',
            'gioitinh',
            'cccd',
            'bhxh',
            'diachi',
            'xa',
            'huyen',
            'nguyennhan',
            'trinhdocmkt',
            'nghenghiep',
            'nghecongviec',
        );

        // check file excel

        $nfield = sizeof($arr_col);

        for ($i = 1; $i < count($arr); $i++) {

            $data = array();

            for ($j = 0; $j < $nfield; $j++) {

                $data[$arr_col[$j]] = $arr[$i][$j + 0] ?? '';
            }

            dsthatnghiep::create($data);
        }
    }
}
