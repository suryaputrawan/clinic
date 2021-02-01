<?php

namespace App\Exports;

use App\Vserology;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class VserologyExport implements FromCollection, ShouldAutoSize, WithHeadings
{
  /**
   * @return \Illuminate\Support\Collection
   */
  public function collection()
  {
    return Vserology::all();
  }

  public function headings(): array
  {
    return [
      'No', 'Tanggal Sampling', 'Tanggal Validasi', 'Tanggal Surat',
      'No Surat', 'Id Card No', 'Surename', 'Givenname', 'Sex', 'Address', 'Phone',
      'Place Of Birth', 'Nationality', 'Dokter', 'Plebotomis', 'Laboratorium', 'Result', 'Remarks',
      'Username', 'Created', 'Updated',
    ];
  }
}
