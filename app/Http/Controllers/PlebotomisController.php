<?php

namespace App\Http\Controllers;

use App\Plebotomis;
use App\User;
use Illuminate\Http\Request;

class PlebotomisController extends Controller
{
    public function index()
    {
        $plebotomis = Plebotomis::paginate(10);

        return view('plebotomis.index', compact('plebotomis'));
    }

    public function create()
    {
        return view('plebotomis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $plebo = new Plebotomis();
        $plebo->name = $request->name;
        if (Plebotomis::where('name', $plebo->name)->first() != Null) {
            return redirect()->route('plebotomis.create')->with('error', 'Nama Petugas Sudah Ada, Silahkan masukkan nama petugas yang lain..');
        }

        Plebotomis::create([
            'name' => $request->name,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('plebotomis')->with('sukses', 'Data Success to Created');
    }
}
