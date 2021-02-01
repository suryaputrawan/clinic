<?php

namespace App\Http\Controllers;

use App\Company;
use App\Nationality;
use App\Swabtest;
use App\Dokter;
use App\Laboratorium;
use App\Patient;
use Illuminate\Http\Request;
use PDF;

class SwabtestController extends Controller
{
    public function index()
    {
        $swabtest = Swabtest::orderBy('nosurat', 'DESC')->paginate(50);
        $dokter = Dokter::all();
        $patient = Patient::all();
        $nationality = Nationality::all();

        return view('swab.index', compact('swabtest', 'dokter', 'patient', 'nationality'));
    }

    public function create()
    {
        $dokter = Dokter::all();
        $patient = Patient::all();
        $nationality = Nationality::all();
        $lab = Laboratorium::all();

        return view('swab.create', compact('dokter', 'patient', 'nationality', 'lab'));
    }

    public function store(Request $request)
    {
        //Validasi Input pada Form
        $request->validate([
            'tanggal_sampling' => 'required',
            'tanggal_validasi' => 'required',
            'waktu_validasi' => 'required',
            'tanggal_surat' => 'required',
            'nosurat' => 'required',
            'patient_patNRM' => 'required|min:6',
            'pob' => 'required',
            'nationality_nationID' => 'required',
            'dokter_dokterID' => 'required',
            'laboratorium_id' => 'required',
            'result' => 'required',
        ]);

        // Cek No Surat dan NRM sudah ada atau belum di database
        $s = new Swabtest();
        $s->nosurat = $request->nosurat;
        $s->patient_patNRM = $request->patient_patNRM;

        if (Swabtest::where('nosurat', $s->nosurat)->first() != Null) {
            return redirect()->route('swabtest.create')->with('error', 'No Surat sudah ada, Masukkan nomor yang lain !');
        }

        if (Patient::where('patNRM', $s->patient_patNRM)->first() == Null) {
            return redirect()->route('swabtest.create')->with('error', 'No NRM SALAH !');
        }

        // Insert ke tabel swabtest
        Swabtest::create([
            'tanggal_sampling' => $request->tanggal_sampling,
            'tanggal_validasi' => $request->tanggal_validasi,
            'waktu_validasi' => $request->waktu_validasi,
            'tanggal_surat' => $request->tanggal_surat,
            'nosurat' => $request->nosurat,
            'patient_patNRM' => $request->patient_patNRM,
            'pob' => $request->pob,
            'nationality_nationID' => $request->nationality_nationID,
            'dokter_dokterID' => $request->dokter_dokterID,
            'laboratorium_id' => $request->laboratorium_id,
            'result' => $request->result,
            'remarks' => $request->remarks,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('swabtest')->with('sukses', 'Data Success to Created');
    }

    public function edit(Swabtest $swabtest)
    {
        $dokter = Dokter::all();
        $patient = Patient::all();
        $nationality = Nationality::all();
        $lab = Laboratorium::all();

        return view('swab.edit', compact('swabtest', 'dokter', 'patient', 'nationality', 'lab'));
    }

    public function update(Request $request, Swabtest $swabtest)
    {
        //Validasi Input pada Form
        $request->validate([
            'tanggal_sampling' => 'required',
            'tanggal_validasi' => 'required',
            'waktu_validasi' => 'required',
            'tanggal_surat' => 'required',
            'nosurat' => 'required',
            'patient_patNRM' => 'required|min:6',
            'pob' => 'required',
            'nationality_nationID' => 'required',
            'dokter_dokterID' => 'required',
            'laboratorium_id' => 'required',
            'result' => 'required',
        ]);

        // Update ke tabel swabtest
        $swabtest->update([
            'tanggal_sampling' => $request->tanggal_sampling,
            'tanggal_validasi' => $request->tanggal_validasi,
            'waktu_validasi' => $request->waktu_validasi,
            'tanggal_surat' => $request->tanggal_surat,
            'nosurat' => $request->nosurat,
            'patient_patNRM' => $request->patient_patNRM,
            'pob' => $request->pob,
            'nationality_nationID' => $request->nationality_nationID,
            'dokter_dokterID' => $request->dokter_dokterID,
            'laboratorium_id' => $request->laboratorium_id,
            'result' => $request->result,
            'remarks' => $request->remarks,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('swabtest')->with('sukses', 'Data was updated');
    }

    public function delete(Swabtest $swabtest)
    {
        $swabtest->delete($swabtest);

        return redirect()->route('swabtest')->with('sukses', 'Data was Deleted !!!');
    }

    public function detail(Swabtest $swabtest)
    {
        return view('swab.detail', compact('swabtest'));
    }

    public function exportPdf(Swabtest $swabtest)
    {
        $company = Company::all();
        $pdf = PDF::loadview('swab.swab_pdf', compact('swabtest', 'company'))->setPaper('A4', 'potrait');
        return $pdf->stream();
        //return $pdf->download('Surat Keterangan Swabtest');
    }
}
