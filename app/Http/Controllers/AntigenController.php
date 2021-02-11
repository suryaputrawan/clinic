<?php

namespace App\Http\Controllers;

use App\Antigen;
use App\Company;
use App\Dokter;
use App\Labstaff;
use App\Nationality;
use App\Patient;
use App\Plebotomis;
use Illuminate\Http\Request;
use PDF;

class AntigenController extends Controller
{
    public function index()
    {
        $antigen = Antigen::orderBy('created_at', 'DESC')->paginate(50);
        $patient = Patient::all();
        $labstaff = Labstaff::all();
        $plebotomis = Plebotomis::all();
        $dokter = Dokter::all();

        return view('antigen.index', compact('antigen', 'patient', 'labstaff', 'plebotomis', 'dokter'));
    }

    public function create()
    {
        $labstaff = Labstaff::all();
        $plebotomis = Plebotomis::all();
        $dokter = Dokter::all();
        $nationality = Nationality::all();

        return view('antigen.create', compact('labstaff', 'plebotomis', 'dokter', 'nationality'));
    }

    public function store(Request $request)
    {
        //Validasi input pada Form
        $request->validate([
            'tanggal' => 'required',
            'nosurat' => 'required',
            'patient_patNRM' => 'required|min:6',
            'pob' => 'required',
            'nationality_nationID' => 'required',
            'dokter_dokterID' => 'required',
            'plebotomis_id' => 'required',
            'labstaff_id' => 'required',
            'result' => 'required',
        ]);

        // Cek No Surat dan NRM apakah sudah ada atau belum di database
        $antigen = new Antigen();
        $antigen->nosurat = $request->nosurat;
        $antigen->patient_patNRM = $request->patient_patNRM;

        if (Antigen::where('nosurat', $antigen->nosurat)->first() != Null) {
            return redirect()->route('antigen.create')->with('error', 'No Surat ' . $request->nosurat . ' sudah ada, Masukkan nomor yang lain !');
        }

        if (Patient::where('patNRM', $antigen->patient_patNRM)->first() == Null) {
            return redirect()->route('antigen.create')->with('error', 'No NRM ' . $request->patient_patNRM . ' Salah atau belum terdaftar pada modul patient !');
        }

        //Insert ke tabel antigenswab
        Antigen::create([
            'tanggal' => $request->tanggal,
            'nosurat' => $request->nosurat,
            'patient_patNRM' => $request->patient_patNRM,
            'pob' => $request->pob,
            'nationality_nationID' => $request->nationality_nationID,
            'dokter_dokterID' => $request->dokter_dokterID,
            'plebotomis_id' => $request->plebotomis_id,
            'labstaff_id' => $request->labstaff_id,
            'result' => $request->result,
            'remarks' => $request->remarks,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('antigen')->with('sukses', 'Data Success to Created');
    }

    public function edit(Antigen $antigen)
    {
        $labstaff = Labstaff::all();
        $plebotomis = Plebotomis::all();
        $dokter = Dokter::all();
        $nationality = Nationality::all();

        return view('antigen.edit', compact('antigen', 'labstaff', 'plebotomis', 'dokter', 'nationality'));
    }

    public function update(Request $request, Antigen $antigen)
    {
        //Validasi input pada Form
        $request->validate([
            'tanggal' => 'required',
            'nosurat' => 'required',
            'patient_patNRM' => 'required|min:6',
            'pob' => 'required',
            'nationality_nationID' => 'required',
            'dokter_dokterID' => 'required',
            'plebotomis_id' => 'required',
            'labstaff_id' => 'required',
            'result' => 'required',
        ]);

        //Update kedalam tabel rapidtest
        $antigen->update([
            'tanggal' => $request->tanggal,
            'nosurat' => $request->nosurat,
            'patient_patNRM' => $request->patient_patNRM,
            'pob' => $request->pob,
            'nationality_nationID' => $request->nationality_nationID,
            'dokter_dokterID' => $request->dokter_dokterID,
            'plebotomis_id' => $request->plebotomis_id,
            'labstaff_id' => $request->labstaff_id,
            'result' => $request->result,
            'remarks' => $request->remarks,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('antigen')->with('sukses', 'Data was updated');
    }

    public function detail(Antigen $antigen)
    {
        return view('antigen.detail', compact('antigen'));
    }

    public function exportPdf(Antigen $antigen)
    {
        $company = Company::all()->first();

        $pdf = PDF::loadview('antigen.antigen_pdf', compact('antigen', 'company'))->setPaper('A4', 'potrait');
        return $pdf->stream();
    }
}
