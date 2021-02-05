<?php

use App\Antigen;
use App\Company;
use App\Patient;
use App\Rapid;
use App\Serology;
use App\Swabtest;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

function totalrapid()
{
    return Rapid::count();
}

function totalswab()
{
    return Swabtest::count();
}

function totalAntigen()
{
    return Antigen::count();
}

function viewyear()
{
    $year = Carbon::now()->format('Y');

    return $year;
}

function oldYear()
{
    $oldyear = Carbon::now()->subYear()->format('Y'); //Perintah sub untuk mengurangi sebanyak 1

    return $oldyear;
}

function viewmonth()
{
    $month = Carbon::now()->format('M Y');

    return $month;
}

function oldMonth()
{
    $oldmonth = Carbon::now()->subMonth()->format('M Y');

    return $oldmonth;
}

function viewday()
{
    $day = Carbon::now()->format('d M Y');

    return $day;
}

function pasienbaruYear()
{
    $year = Carbon::now()->format('Y');

    $tahun = Patient::whereYear('patRegDate', $year)->count();

    return $tahun;
}

function pasienbaruMonth()
{
    $month = Carbon::now()->format('m');
    $year = Carbon::now()->format('Y');

    $bulan = Patient::whereMonth('patRegDate', $month)
        ->whereYear('patRegDate', $year)->count();

    return $bulan;
}

function pasienbaruDay()
{
    $day = Carbon::now()->format('d');
    $month = Carbon::now()->format('m');
    $year = Carbon::now()->format('Y');

    $hari = Patient::whereDay('patRegDate', $day)
        ->whereMonth('patRegDate', $month)
        ->whereYear('patRegDate', $year)->count();

    return $hari;
}
