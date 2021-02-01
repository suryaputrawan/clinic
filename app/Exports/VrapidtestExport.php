<?php

namespace App\Exports;

use App\Vrapid;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class VrapidtestExport implements FromCollection, ShouldAutoSize, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Vrapid::all();
    }

    public function headings(): array
    {
        return [
            'No', 'Tanggal', 'No Surat', 'NRM', 'Identification', 'Surename', 'Givenname',
            'Sex', 'Address', 'Phone', 'Place Of Birth', 'Nationality', 'Dokter',
            'Plebotomis', 'labstaff', 'Result', 'Remarks', 'Username', 'Created', 'Updated',
        ];
    }
}
