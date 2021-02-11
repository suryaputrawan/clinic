<?php

namespace App\Http\Controllers;

use App\Nationality;
use App\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patient = Patient::orderBy('patNRM', 'DESC')->paginate(50);
        return view('patient.index', compact('patient'));
    }

    public function create()
    {
        $patient = Patient::all();
        $nationality = Nationality::all();

        return view('patient.create', compact('patient', 'nationality'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patnrm' => 'required',
            'idcard' => 'required',
            'surename' => 'required|min:3',
            'givenname' => 'required|min:3',
            'sex' => 'required',
            'nationality_nationID' => 'required',
        ], [
            'patnrm.required' => 'Data tidak boleh kosong',
            'idcard.required' => 'Data tidak boleh kosong',
            'surename.required' => 'Data tidak boleh kosong',
            'givenname.required' => 'Data tidak boleh kosong',
            'sex.required' => 'Pilih salah satu data',
            'nationality_nationID.required' => 'Pilih salah satu data',
        ]);

        $p = new Patient();
        $p->patNRM = $request->patnrm;

        if (Patient::where('patNRM', $p->patNRM)->first() != Null) {
            $patient = Patient::where('patNRM', $request->patnrm)->paginate();

            return redirect()->route('patient')->with('error', 'NRM Patient ' . $request->patnrm . ' sudah ada !');
        }

        // Memanggil tanggal perhari ini
        $date = Carbon::now()->format('Y-m-d');

        Patient::create([
            'patNRM' => $request->patnrm,
            'patidCardNo' => $request->idcard,
            'patRegDate' => $date,
            'patSurename' => $request->surename,
            'patGivenname' => $request->givenname,
            'patDOB' => $request->dob,
            'patSex' => $request->sex,
            'patAddres' => $request->address,
            'patPhone' => $request->phone,
            'patEmail' => $request->email,
            'nationality_nationID' => $request->nationality_nationID,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('patient')->with('sukses', 'Data Success to Created');
    }

    public function edit(Patient $patient)
    {
        $nationality = Nationality::all();

        return view('patient.edit', compact('patient', 'nationality'));
    }

    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'patnrm' => 'required',
            'idcard' => 'required',
            'surename' => 'required|min:3',
            'givenname' => 'required|min:3',
            'sex' => 'required',
            'nationality_nationID' => 'required',
        ], [
            'patnrm' => 'Data tidak boleh kosong',
            'idcard' => 'Data tidak boleh kosong',
            'surename' => 'Data tidak boleh kosong',
            'givenname' => 'Data tidak boleh kosong',
            'sex' => 'Pilih salah satu data',
            'nationality_nationID' => 'Pilih salah satu data',
        ]);

        $patient->update([
            'patNRM' => $request->patnrm,
            'patidCardNo' => $request->idcard,
            'patSurename' => $request->surename,
            'patGivenname' => $request->givenname,
            'patDOB' => $request->dob,
            'patSex' => $request->sex,
            'patAddres' => $request->address,
            'patPhone' => $request->phone,
            'patEmail' => $request->email,
            'nationality_nationID' => $request->nationality_nationID,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('patient')->with('sukses', 'Data Was Updated !');
    }

    public function detail(Patient $patient)
    {
        return view('patient.detail', compact('patient'));
    }
}
