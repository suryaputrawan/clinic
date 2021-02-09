<?php

namespace App\Http\Controllers;

use App\Labstaff;
use Illuminate\Http\Request;

class LabstaffController extends Controller
{
    public function index()
    {
        $labstaff = Labstaff::paginate(10);

        return view('labstaff.index', compact('labstaff'));
    }

    public function create()
    {
        return view('labstaff.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5',
        ]);

        $labstaff = new Labstaff();
        $labstaff->name = $request->name;
        if (Labstaff::where('name', $labstaff->name)->first() != Null) {
            return redirect()->route('labstaff.create')->with('error', 'Nama Petugas Sudah Ada, Silahkan masukkan nama petugas yang lain..');
        }

        Labstaff::create($request->all());

        return redirect()->route('labstaff')->with('sukses', 'Data Success to Created');
    }

    public function edit(Labstaff $labstaff)
    {
        return view('labstaff.edit', compact('labstaff'));
    }

    public function update(Request $request, Labstaff $labstaff)
    {
        # code...
    }
}
