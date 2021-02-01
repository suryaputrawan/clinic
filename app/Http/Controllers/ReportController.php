<?php

namespace App\Http\Controllers;

use App\Exports\ArrivalIcdExport;
use App\Exports\ReportAntigenExport;
use App\Exports\ReportRapidExport;
use App\Exports\ReportSerologyExport;
use App\Exports\ReportSwabExport;
use App\Exports\VantigenExport;
use App\Exports\VrapidtestExport;
use App\Exports\VserologyExport;
use App\Exports\VswabtestExport;
use App\Patient;
use App\Vantigen;
use App\VarrivalICD;
use App\Vrapid;
use App\Vserology;
use App\Vswabtest;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function index()
    {
        return view('report.reportForm');
    }

    public function rapidtest()
    {
        $tglawal = request('tglawal');
        $tglakhir = request('tglakhir');


        if ($tglawal && $tglakhir != NULL) {
            $rapid = Vrapid::whereBetween('tanggal', [$tglawal, $tglakhir])
                ->orderBy('nosurat', 'DESC')->get();

            $fileName = 'Report-Rapidtest-' . $tglawal . '-' . $tglakhir . '.xlsx';
            return Excel::download(new ReportRapidExport($rapid), $fileName);
        }

        return Excel::download(new VrapidtestExport, 'Report-Rapidtest-ALL.xlsx');
    }

    public function swabtest()
    {
        $tglawal = request('tglawal');
        $tglakhir = request('tglakhir');

        if ($tglawal && $tglakhir != NULL) {
            $swabtest = Vswabtest::whereBetween('tanggal_sampling', [$tglawal, $tglakhir])
                ->orderBy('nosurat', 'DESC')->get();

            $fileName = 'Report-Swabtest-' . $tglawal . '-' . $tglakhir . '.xlsx';
            return Excel::download(new ReportSwabExport($swabtest), $fileName);
        }

        return Excel::download(new VswabtestExport, 'Report-Swabtest-ALL.xlsx');
    }

    public function arrivalicd()
    {
        $tglawal = request('tglawal');
        $tglakhir = request('tglakhir');

        $arrivalicd = VarrivalICD::whereBetween('arvDate', [$tglawal, $tglakhir])
            ->orderBy('arvDate', 'ASC')->get();

        $filename = 'Report-Arrival_with_ICD-' . $tglawal . '-' . $tglakhir . '.xlsx';

        return Excel::download(new ArrivalIcdExport($arrivalicd), $filename);
    }

    public function antigen()
    {
        $tglawal = request('tglawal');
        $tglakhir = request('tglakhir');

        if ($tglawal && $tglakhir != NULL) {
            $antigen = Vantigen::whereBetween('tanggal', [$tglawal, $tglakhir])
                ->orderBy('nosurat', 'DESC')->get();

            $fileName = 'Report-Antigen-' . $tglawal . '-' . $tglakhir . '.xlsx';
            return Excel::download(new ReportAntigenExport($antigen), $fileName);
        }

        return Excel::download(new VantigenExport, 'Report-Antigen-ALL.xlsx');
    }

    public function serology()
    {
        $tglawal = request('tglawal');
        $tglakhir = request('tglakhir');

        if ($tglawal && $tglakhir != NULL) {
            $serology = Vserology::whereBetween('tanggal_surat', [$tglawal, $tglakhir])
                ->orderBy('nosurat', 'DESC')->get();

            $fileName = 'Report-Serology-' . $tglawal . '-' . $tglakhir . '.xlsx';
            return Excel::download(new ReportSerologyExport($serology), $fileName);
        }

        return Excel::download(new VserologyExport, 'Report-Serology-ALL.xlsx');
    }
}
