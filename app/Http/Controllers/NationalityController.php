<?php

namespace App\Http\Controllers;

use App\Nationality;
use Illuminate\Http\Request;

class NationalityController extends Controller
{
    public function index()
    {
        $nationality = Nationality::orderBy('nationName', 'ASC')->paginate(20);

        return view('nationality.index', compact('nationality'));
    }

    public function create()
    {
        return view('nationality.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Tidak boleh kosong !',
        ]);

        $nation = new Nationality();
        $nation->nationName = $request->name;

        if (Nationality::where('nationName', $nation->nationName)->first() != Null) {
            return redirect()->route('nation.create')->with('error', 'Nama Negara ' . $request->name . ' Sudah Ada, Silahkan masukkan nama negara yang lain..');
        }

        Nationality::create([
            'nationName' => $request->name,
        ]);

        return redirect()->route('nation')->with('sukses', 'Data berhasil ditambahkan');
    }

    public function edit(Nationality $nationality)
    {
        return view('nationality.edit', compact('nationality'));
    }

    public function update(Request $request, Nationality $nationality)
    {
        $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Tidak boleh kosong !',
        ]);

        $nationality->update([
            'nationName' => $request->name,
        ]);

        return redirect()->route('nation')->with('sukses', 'Data berhasil ditambahkan');
    }
}
