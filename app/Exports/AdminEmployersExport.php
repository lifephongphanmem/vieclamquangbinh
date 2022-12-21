<?php

namespace App\Exports;

use App\Models\Employer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AdminEmployersExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    { 
	    $model= new Employer;
		$q= $model->getAdminEmployersExport();
		Return $q;
    }
	 public function headings(): array
    {
        
        return [
            'Họ Tên',
            'Ngày sinh',
            'CMND/CCCD',
            'Tỉnh',
            'Huyện',
            'Xã',
            'Địa chỉ',
			'Công ty',
          
        ];
		
    }
	 public function map($ld): array
    {
        return [
            $ld->hoten,
            $ld->ngaysinh,
            $ld->cmnd,
            $ld->tinh,
            $ld->huyen,
            $ld->xa,
            $ld->address,
            $ld->ctyname,
          
        ];
    }
}
