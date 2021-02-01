<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ReportSerologyExport implements FromView, ShouldAutoSize
{
  private $results;

  public function __construct($results)
  {
    $this->results = $results;
  }

  public function view(): View
  {
    return view('report.exports.serology_xlsx', [
      'serology' => $this->results,
    ]);
  }
}
