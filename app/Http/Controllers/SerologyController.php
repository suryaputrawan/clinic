<?php

namespace App\Http\Controllers;

use App\Dokter;
use App\Laboratorium;
use App\Nationality;
use App\Patient;
use App\Plebotomis;
use App\Serology;
use Illuminate\Http\Request;
use PDF;

class SerologyController extends Controller
{
    public function index()
    {
        $serology = Serology::orderBy('nosurat', 'DESC')->paginate(50);
        $dokter = Dokter::all();
        $plebotomis = Plebotomis::all();
        $laboratorium = Laboratorium::all();
        $patient = Patient::all();
        $nationality = Nationality::all();

        return view('serology.index', compact('serology', 'dokter', 'plebotomis', 'patient', 'nationality'));
    }

    public function create()
    {
        $dokter = Dokter::all();
        $plebotomis = Plebotomis::all();
        $laboratorium = Laboratorium::all();
        $nationality = Nationality::all();

        return view('serology.create', compact('dokter', 'plebotomis', 'laboratorium', 'nationality'));
    }

    public function store(Request $request)
    {
        //Validasi input pada form
        $request->validate([
            'tanggal_sampling' => 'required',
            'tanggal_validasi' => 'required',
            'tanggal_surat' => 'required',
            'nosurat' => 'required',
            'patient_patNRM' => 'required|min:6',
            'pob' => 'required',
            'nationality_nationID' => 'required',
            'dokter_dokterID' => 'required',
            'laboratorium_id' => 'required',
            'plebotomis_id' => 'required',
            'result' => 'required',
        ]);

        // Cek No Surat dan NRM apakah sudah ada atau belum di database
        $serology = new Serology();
        $serology->nosurat = $request->nosurat;
        $serology->patient_patNRM = $request->patient_patNRM;

        if (Serology::where('nosurat', $serology->nosurat)->first() != Null) {
            return redirect()->route('serology.create')->with('error', 'No Surat sudah ada, Masukkan nomor yang lain !');
        }

        if (Patient::where('patNRM', $serology->patient_patNRM)->first() == Null) {
            return redirect()->route('serology.create')->with('error', 'No NRM SALAH !');
        }

        //Insert ke tabel antigenswab
        Serology::create([
            'tanggal_sampling' => $request->tanggal_sampling,
            'tanggal_validasi' => $request->tanggal_validasi,
            'tanggal_surat' => $request->tanggal_surat,
            'nosurat' => $request->nosurat,
            'patient_patNRM' => $request->patient_patNRM,
            'pob' => $request->pob,
            'nationality_nationID' => $request->nationality_nationID,
            'dokter_dokterID' => $request->dokter_dokterID,
            'laboratorium_id' => $request->laboratorium_id,
            'plebotomis_id' => $request->plebotomis_id,
            'result' => $request->result,
            'remarks' => $request->remarks,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('serology')->with('sukses', 'Data Success to Created');
    }

    public function edit(Serology $serology)
    {
        $dokter = Dokter::all();
        $plebotomis = Plebotomis::all();
        $laboratorium = Laboratorium::all();
        $nationality = Nationality::all();

        return view('serology.edit', compact('serology', 'dokter', 'plebotomis', 'laboratorium', 'nationality'));
    }

    public function update(Request $request, Serology $serology)
    {
        //Validasi input pada form
        $request->validate([
            'tanggal_sampling' => 'required',
            'tanggal_validasi' => 'required',
            'tanggal_surat' => 'required',
            'nosurat' => 'required',
            'patient_patNRM' => 'required|min:6',
            'pob' => 'required',
            'nationality_nationID' => 'required',
            'dokter_dokterID' => 'required',
            'laboratorium_id' => 'required',
            'plebotomis_id' => 'required',
            'result' => 'required',
        ]);

        $serology->update([
            'tanggal_sampling' => $request->tanggal_sampling,
            'tanggal_validasi' => $request->tanggal_validasi,
            'tanggal_surat' => $request->tanggal_surat,
            'nosurat' => $request->nosurat,
            'patient_patNRM' => $request->patient_patNRM,
            'pob' => $request->pob,
            'nationality_nationID' => $request->nationality_nationID,
            'dokter_dokterID' => $request->dokter_dokterID,
            'laboratorium_id' => $request->laboratorium_id,
            'plebotomis_id' => $request->plebotomis_id,
            'result' => $request->result,
            'remarks' => $request->remarks,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('serology')->with('sukses', 'Data Was Updated');
    }

    public function detail(Serology $serology)
    {
        return view('serology.detail', compact('serology'));
    }

    public function exportPdf(Serology $serology)
    {
        $pdf = PDF::loadview('serology.serology_pdf', compact('serology'))->setPaper('A4', 'potrait');
        return $pdf->stream();
    }
}
