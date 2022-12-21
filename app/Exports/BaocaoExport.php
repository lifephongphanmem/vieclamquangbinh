<?php

namespace App\Exports;

use App\Models\Employer;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class BaocaoExport implements FromView, WithStyles
{
    public function view(): View
    {
		$emodel= new Employer;
		$htxinfo=$emodel->getTypeCompanyInfo('Hợp tác xã');
		$hkdinfo=$emodel->getTypeCompanyInfo('Hộ kinh doanh');
		$tcinfo=$emodel->getTypeCompanyInfo('Cơ quan tổ chức khác');
		$einfo=$emodel->getEmployerState();
	   return view('admin.report02PL1', [
            'einfo' => $einfo ,
            'htxinfo' => $htxinfo ,
            'hkdinfo' => $hkdinfo ,
            'tcinfo' => $tcinfo ,
        ]);
    }
	  public function styles(Worksheet $sheet)
    {	

        return [
            
            7    => ['alignment' => ['wrapText' => true]],
            8    => ['alignment' => ['wrapText' => true]],
			
        ];
    }
}
