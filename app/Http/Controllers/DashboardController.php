<?php

namespace App\Http\Controllers;

use App\Antigen;
use App\Rapid;
use App\Swabtest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $year = Carbon::now()->subYear()->format('Y');
        $yearNow = Carbon::now()->format('Y');
        $year2 = Carbon::now()->subYear(2)->format('Y');

        //Membuat string tahun
        $tahun = Carbon::now()->subYear()->format('Y');
        (string) $tahun;
        $thSekarang = Carbon::now()->format('Y');
        (string) $thSekarang;
        $th2Lalu = Carbon::now()->subYear(2)->format('Y');
        (string) $th2Lalu;

        //Data Rapid Test
        $rapid = Rapid::select(DB::raw('COUNT(*) as count'))
            ->whereYear('tanggal', $yearNow)
            ->groupBy(DB::raw("Month(tanggal)"))
            ->pluck('count');

        $months = Rapid::select(DB::raw("Month(tanggal) as month"))
            ->whereYear('tanggal', $yearNow)
            ->groupBy(DB::raw("Month(tanggal)"))
            ->pluck('month');

        $datas = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

        foreach ($months as $index => $month) {
            $datas[$month - 1] = (int) $rapid[$index];
        }


        //Data Swabtest
        $swabtest = Swabtest::select(DB::raw('COUNT(*) as count'))
            ->whereYear('tanggal_sampling', $yearNow)
            ->groupBy(DB::raw("Month(tanggal_sampling)"))
            ->pluck('count');

        $swabMonths = Swabtest::select(DB::raw("Month(tanggal_sampling) as month"))
            ->whereYear('tanggal_sampling', $yearNow)
            ->groupBy(DB::raw("Month(tanggal_sampling)"))
            ->pluck('month');

        $dataSwab = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

        foreach ($swabMonths as $index => $month) {
            $dataSwab[$month - 1] = (int) $swabtest[$index];
        }


        //Data Antigen
        $antigen = Antigen::select(DB::raw('COUNT(*) as count'))
            ->whereYear('tanggal', $yearNow)
            ->groupBy(DB::raw("Month(tanggal)"))
            ->pluck('count');

        $antigenMonths = Antigen::select(DB::raw("Month(tanggal) as month"))
            ->whereYear('tanggal', $yearNow)
            ->groupBy(DB::raw("Month(tanggal)"))
            ->pluck('month');

        $dataAntigen = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

        foreach ($antigenMonths as $index => $month) {
            $dataAntigen[$month - 1] = (int) $antigen[$index];
        }

        return view('dashboard.index', compact('tahun', 'thSekarang', 'th2Lalu', 'datas', 'dataSwab', 'dataAntigen'));
    }
}
