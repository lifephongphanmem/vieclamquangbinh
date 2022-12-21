<?php

namespace App\Exports;

use App\Models\Nhankhau;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AdminNhankhausExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    { 
	    $model= new Nhankhau;
		$q= $model->getAdminNhankhausExport();
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
            $ld->cccd,
            $ld->tinh,
            $ld->huyen,
            $ld->xa,
            $ld->diachi,
            $ld->noilamviec,
          
        ];
    }
}
