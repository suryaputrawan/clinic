<?php

namespace App\Http\Controllers;

use App\Laboratorium;
use Illuminate\Http\Request;

class LaboratoriumController extends Controller
{
    public function index()
    {
        $laboratorium = Laboratorium::latest()->paginate(10);

        return view('lab.index', compact('laboratorium'));
    }

    public function create()
    {
        return view('lab.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $lab = new Laboratorium();
        $lab->name = $request->name;
        if (Laboratorium::where('name', $lab->name)->first() != Null) {
            return redirect()->route('lab.create')->with('error', 'Nama Laboratorium Sudah Ada, Silahkan masukkan nama Laboratorium yang lain..');
        }

        Laboratorium::create($request->all());

        return redirect()->route('lab')->with('sukses', 'Data Success to Created');
    }

    public function edit(Laboratorium $laboratorium)
    {
        return view('lab.edit', compact('laboratorium'));
    }

    public function update(Request $request, Laboratorium $laboratorium)
    {
        $laboratorium->update($request->all());

        return redirect()->route('lab')->with('sukses', 'Data Was Updated');
    }
}
