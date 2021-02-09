<?php

namespace App\Http\Controllers;

use App\Antigen;
use App\Patient;
use App\Swabtest;
use App\Rapid;
use App\Serology;
use App\VarrivalICD;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function swabtest(Request $request)
    {
        $swabtest = Swabtest::whereHas('patient', function ($query) use ($request) {
            $query->where("patSurename", "like", "%{$request->keyword}%")
                ->orWhere("patGivenname", "like", "%{$request->keyword}%")
                ->orWhere("patient_patNRM", "like", "%{$request->keyword}%")
                ->orWhere("nosurat", "like", "%{$request->keyword}%")
                ->orWhere("result", "like", "%{$request->keyword}%");
        })->orderBy('nosurat', 'DESC')->paginate(50);

        //Membuat page berikutnya bisa menampilkan data yang dicari
        $swabtest->appends($request->only('keyword'));

        return view('swab.index', compact('swabtest'));
    }

    public function rapidtest(Request $request)
    {
        //$keyword = request('keyword');
        //$rapid = Rapid::where("nosurat", "like", "%$keyword%")
        //  ->orWhere("patient_patNRM", "like", "%$keyword%")
        //->orWhere("result", "like", "%$keyword%")->paginate(50);

        $rapid = Rapid::whereHas('patient', function ($query) use ($request) {
            $query->where("patSurename", "like", "%{$request->keyword}%")
                ->orWhere("patGivenname", "like", "%{$request->keyword}%")
                ->orWhere("patient_patNRM", "like", "%{$request->keyword}%")
                ->orWhere("nosurat", "like", "%{$request->keyword}%")
                ->orWhere("result", "like", "%{$request->keyword}%");
        })->orderBy('nosurat', 'DESC')->paginate(50);

        //Membuat page berikutnya bisa menampilkan data yang dicari
        $rapid->appends($request->only('keyword'));

        return view('rapid.index', compact('rapid'));
    }

    public function antigen(Request $request)
    {
        $antigen = Antigen::whereHas('patient', function ($query) use ($request) {
            $query->where("patSurename", "like", "%{$request->keyword}%")
                ->orWhere("patGivenname", "like", "%{$request->keyword}%")
                ->orWhere("patient_patNRM", "like", "%{$request->keyword}%")
                ->orWhere("nosurat", "like", "%{$request->keyword}%")
                ->orWhere("result", "like", "%{$request->keyword}%");
        })->orderBy('nosurat', 'DESC')->paginate(50);

        //Membuat page berikutnya bisa menampilkan data yang dicari
        $antigen->appends($request->only('keyword'));

        return view('antigen.index', compact('antigen'));
    }

    public function serology(Request $request)
    {
        $serology = Serology::whereHas('patient', function ($query) use ($request) {
            $query->where("patSurename", "like", "%{$request->keyword}")
                ->orWhere("patGivenname", "like", "%{$request->keyword}%")
                ->orWhere("patient_patNRM", "like", "%{$request->keyword}%")
                ->orWhere("nosurat", "like", "%{$request->keyword}%")
                ->orWhere("result", "like", "%{$request->keyword}%");
        })->orderBy('nosurat', 'DESC')->paginate(50);

        $serology->appends($request->only('keyword'));

        return view('serology.index', compact('serology'));
    }

    public function rapidPeriode(Request $request)
    {
        $tglawal = request('tglawal');
        $tglakhir = request('tglakhir');

        $rapid = Rapid::with('patient', 'dokter', 'nationality')
            ->whereBetween('tanggal', [$tglawal, $tglakhir])
            ->orderBy('nosurat', 'DESC')->paginate(20);

        //Membuat page berikutnya bisa menampilkan data yang dicari
        $rapid->appends($request->only('tglawal', 'tglakhir'));

        return view('rapid.index', compact('rapid', 'tglawal', 'tglakhir'));
    }

    public function swabPeriode(Request $request)
    {
        $tglawal = request('tglawal');
        $tglakhir = request('tglakhir');

        $swabtest = Swabtest::with('patient', 'dokter', 'nationality', 'laboratorium')
            ->whereBetween('tanggal_sampling', [$tglawal, $tglakhir])
            ->orderBy('nosurat', 'DESC')->paginate(20);

        //Membuat page berikutnya bisa menampilkan data yang dicari
        $swabtest->appends($request->only('tglawal', 'tglakhir'));

        return view('swab.index', compact('swabtest', 'tglawal', 'tglakhir'));
    }

    public function arrivalicdPeriode(Request $request)
    {
        $tglawal = request('tglawal');
        $tglakhir = request('tglakhir');

        $arrivalicd = VarrivalICD::whereBetween('arvDate', [$tglawal, $tglakhir])
            ->orderBy('arvDate', 'ASC')->paginate(20);

        //Membuat page berikutnya bisa menampilkan data yang dicari
        $arrivalicd->appends($request->only('tglawal', 'tglakhir'));

        return view('arrival.arrival_icd', compact('arrivalicd', 'tglawal', 'tglakhir'));
    }

    public function antigenPeriode(Request $request)
    {
        $tglawal = request('tglawal');
        $tglakhir = request('tglakhir');

        $antigen = Antigen::with('patient', 'dokter', 'nationality')
            ->whereBetween('tanggal', [$tglawal, $tglakhir])
            ->orderBy('nosurat', 'DESC')->paginate(20);

        //Membuat page berikutnya bisa menampilkan data yang dicari
        $antigen->appends($request->only('tglawal', 'tglakhir'));

        return view('antigen.index', compact('antigen', 'tglawal', 'tglakhir'));
    }

    public function serologyPeriode(Request $request)
    {
        $tglawal = request('tglawal');
        $tglakhir = request('tglakhir');

        $serology = Serology::with('patient', 'dokter', 'nationality')
            ->whereBetween('tanggal_surat', [$tglawal, $tglakhir])
            ->orderBy('nosurat', 'DESC')->paginate(20);

        //Membuat page berikutnya bisa menampilkan data yang dicari
        $serology->appends($request->only('tglawal', 'tglakhir'));

        return view('serology.index', compact('serology', 'tglawal', 'tglakhir'));
    }

    public function patient(Request $request)
    {
        $patient = Patient::where("patSurename", "like", "%{$request->keyword}%")
            ->orWhere("patGivenname", "like", "%{$request->keyword}%")
            ->orWhere("patNRM", "like", "%{$request->keyword}%")
            ->orderBy('patNRM', 'DESC')->paginate(20);

        $patient->appends($request->only('keyword'));

        return view('patient.index', compact('patient'));
    }
}
