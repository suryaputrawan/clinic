<?php

namespace App\Http\Controllers;

use App\Company;
use App\Dokter;
use App\Rapid;
use App\Labstaff;
use App\Nationality;
use App\Patient;
use App\Plebotomis;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;
use PDF;

class RapidController extends Controller
{
    public function index()
    {
        $rapid = Rapid::orderBy('created_at', 'DESC')->paginate(50);
        $labstaff = Labstaff::all();
        $plebotomis = Plebotomis::all();
        $dokter = Dokter::all();
        $patient = Patient::all();

        return view('rapid.index', compact('rapid', 'plebotomis', 'dokter', 'patient', 'labstaff'));
    }

    public function detail(Rapid $rapid)
    {
        return view('rapid.detail', compact('rapid'));
    }

    public function create()
    {
        $dokter = Dokter::all();
        $labstaff = Labstaff::all();
        $plebotomis = Plebotomis::all();
        $nationality = Nationality::all();

        return view('rapid.create', compact('dokter', 'labstaff', 'plebotomis', 'nationality'));
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
        $r = new Rapid();
        $r->nosurat = $request->nosurat;
        $r->patient_patNRM = $request->patient_patNRM;

        if (Rapid::where('nosurat', $r->nosurat)->first() != Null) {
            return redirect()->route('rapidtest.create')->with('error', 'No Surat ' . $request->nosurat . ' sudah ada, Masukkan nomor yang lain !');
        }

        if (Patient::where('patNRM', $r->patient_patNRM)->first() == Null) {
            return redirect()->route('rapidtest.create')->with('error', 'No NRM ' . $request->patient_patNRM . ' Salah atau belum terdaftar pada modul Patient !');
        }

        //Insert ke tabel rapidtest
        Rapid::create([
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

        return redirect()->route('rapidtest')->with('sukses', 'Data Success to Created');
    }

    public function edit(Rapid $rapid)
    {
        $dokter = Dokter::all();
        $labstaff = Labstaff::all();
        $plebotomis = Plebotomis::all();
        $nationality = Nationality::all();

        return view('rapid.edit', compact('rapid', 'dokter', 'labstaff', 'plebotomis', 'nationality'));
    }

    public function update(Request $request, Rapid $rapid)
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
        $rapid->update([
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

        return redirect()->route('rapidtest')->with('sukses', 'Data was updated');
    }

    public function delete(Rapid $rapid)
    {
        $rapid->delete($rapid);

        return redirect()->route('rapidtest')->with('sukses', 'Data was deleted');
    }

    public function exportPdf(Rapid $rapid)
    {
        $company = Company::all()->first();

        $pdf = PDF::loadview('rapid.rapid_pdf', compact('rapid', 'company'))->setPaper('A4', 'potrait');
        return $pdf->stream();
        //return $pdf->download('Surat Keterangan Rapid');
    }
}
