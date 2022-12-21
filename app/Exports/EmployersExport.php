<?php

namespace App\Exports;

use App\Models\Employer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EmployersExport implements FromCollection, WithHeadings
{
    public function collection()
    { 
	    $emodel= new Employer;
		$lds= $emodel->getEmployersExport();
		Return $lds;
    }
	 public function headings(): array
    {
        if($this->collection()->first()){
			
			return array_keys($this->collection()->first()->toArray());
		} else {
			
			return array();
		}
    }
}
