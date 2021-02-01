<?php

namespace App\Exports;

use App\Vswabtest;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class VswabtestExport implements FromCollection, ShouldAutoSize, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Vswabtest::all();
    }

    public function headings(): array
    {
        return [
            'No', 'Tanggal Sampling', 'Tanggal Validasi', 'Waktu Validasi', 'Tanggal Surat',
            'No Surat', 'Id Card No', 'Surename', 'Givenname', 'Sex', 'Address', 'Phone',
            'Place Of Birth', 'Nationality', 'Dokter', 'Laboratorium', 'Result', 'Remarks',
            'Username', 'Created', 'Updated',
        ];
    }
}
