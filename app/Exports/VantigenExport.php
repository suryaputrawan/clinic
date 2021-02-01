<?php

namespace App\Exports;

use App\Vantigen;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class VantigenExport implements FromCollection, ShouldAutoSize, WithHeadings
{
  /**
   * @return \Illuminate\Support\Collection
   */
  public function collection()
  {
    return Vantigen::all();
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
