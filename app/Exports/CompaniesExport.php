<?php

namespace App\Exports;

use App\Models\Company;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CompaniesExport implements FromQuery, WithHeadings, WithMapping
{
    public function query()
    { 
	    $model= new Company;
		$q= $model->getCompaniesExportQuery();
		Return $q;
    }
	 public function headings(): array
    {
        
        return [
            'Tên',
            'Mã số ĐKKD',
            'Điện thoại',
            'Email',
            'Tỉnh',
            'Huyện',
            'Xã',
            'Địa chỉ',
			'Quy mô',
          
        ];
		
    }
	 public function map($cty): array
    {
        return [
            $cty->name,
            $cty->dkkd,
            $cty->phone,
            $cty->email,
            $cty->tinh,
            $cty->huyen,
            $cty->xa,
            $cty->adress,
            $cty->employers_count,
          
        ];
    }
}
