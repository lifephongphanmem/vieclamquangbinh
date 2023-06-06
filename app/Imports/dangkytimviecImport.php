<?php

namespace App\Imports;

use App\Models\dangkytimviec;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class dangkytimviecImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {

        foreach($rows as $col)
        {
            $data=[
                'hoten' =>$col['hoten'],
                'ngaysinh' => $col['ngaysinh'],
                'gioitinh' => $col['gioitinh'],
                // 'cccd' => $col['cccd'],
                // 'phone' => $col['phone'],
                // 'dantoc' => $col['dantoc'],
                // 'thuongtru' => $col['thuongtru'],
                // 'tamtru' => $col['tamtru'],
            ];
        
            dangkytimviec::create($data);
        }
    }
}
