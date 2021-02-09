<?php

namespace App\Http\Controllers;

use App\Antigen;
use App\Dokter;
use App\Exports\ArrivalIcdExport;
use App\Exports\ReportAntigenExport;
use App\Exports\ReportRapidExport;
use App\Exports\ReportSerologyExport;
use App\Exports\ReportSwabExport;
use App\Exports\VantigenExport;
use App\Exports\VrapidtestExport;
use App\Exports\VserologyExport;
use App\Exports\VswabtestExport;
use App\Laboratorium;
use App\Labstaff;
use App\Nationality;
use App\Patient;
use App\Plebotomis;
use App\Rapid;
use App\Swabtest;
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
        $dokter = Dokter::all();
        $plebotomis = Plebotomis::all();
        $nationality = Nationality::all();
        $labstaff = Labstaff::all();
        $patient = Patient::all();


        if ($tglawal && $tglakhir != NULL) {
            $rapid = Rapid::whereBetween('tanggal', [$tglawal, $tglakhir])
                ->orderBy('nosurat', 'DESC')->get();

            $fileName = 'Report-Rapidtest-' . $tglawal . '-' . $tglakhir . '.xlsx';
            return Excel::download(new ReportRapidExport($rapid, $plebotomis, $dokter, $nationality, $labstaff, $patient), $fileName);
        }

        return redirect()->route('rapidtest')->with('error', 'Masukkan tanggal yang ingin di ekspor pada tombol filter !');

        //return Excel::download(new VrapidtestExport, 'Report-Rapidtest-ALL.xlsx');
    }

    public function swabtest()
    {
        $tglawal = request('tglawal');
        $tglakhir = request('tglakhir');
        $dokter = Dokter::all();
        $nationality = Nationality::all();
        $patient = Patient::all();
        $laboratorium = Laboratorium::all();

        if ($tglawal && $tglakhir != NULL) {
            $swabtest = Swabtest::whereBetween('tanggal_sampling', [$tglawal, $tglakhir])
                ->orderBy('nosurat', 'DESC')->get();

            $fileName = 'Report-Swabtest-' . $tglawal . '-' . $tglakhir . '.xlsx';
            return Excel::download(new ReportSwabExport($swabtest, $dokter, $nationality, $patient, $laboratorium), $fileName);
        }

        return redirect()->route('swabtest')->with('error', 'Masukkan tanggal yang ingin di eksport pada tombol filter !');

        //return Excel::download(new VswabtestExport, 'Report-Swabtest-ALL.xlsx');
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
        $dokter = Dokter::all();
        $plebotomis = Plebotomis::all();
        $nationality = Nationality::all();
        $labstaff = Labstaff::all();
        $patient = Patient::all();

        if ($tglawal && $tglakhir != NULL) {
            $antigen = Antigen::whereBetween('tanggal', [$tglawal, $tglakhir])
                ->orderBy('nosurat', 'DESC')->get();

            $fileName = 'Report-Antigen-' . $tglawal . '-' . $tglakhir . '.xlsx';
            return Excel::download(new ReportAntigenExport($antigen, $dokter, $plebotomis, $nationality, $labstaff, $patient), $fileName);
        }

        return redirect()->route('antigen')->with('error', 'Masukkan tanggal yang ingin di eksport pada tombol filter !');

        //return Excel::download(new VantigenExport, 'Report-Antigen-ALL.xlsx');
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
