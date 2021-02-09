<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ReportRapidExport implements FromView, ShouldAutoSize
{
    private $results;

    public function __construct($results)
    {
        $this->results = $results;
    }

    public function view(): View
    {
        return view('report.exports.rapidtest_xlsx', [
            'rapid' => $this->results,
            'dokter' => $this->results,
            'plebotomis' => $this->results,
            'nationality' => $this->results,
            'labstaff' => $this->results,
            'patient' => $this->results,
        ]);
    }
}
