<?php

namespace App\Http\Controllers;

use App\Dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function index()
    {
        $dokter = Dokter::orderBy('created_at', 'DESC')->paginate(20);

        return view('dokter.index', compact('dokter'));
    }

    public function create()
    {
        $dokter = Dokter::all();

        return view('dokter.create', compact('dokter'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Masukkan Nama Dokter',
        ]);

        $dok = new Dokter();
        $dok->doktername = $request->name;

        if (Dokter::where('doktername', $dok->doktername)->first() != Null) {
            return redirect()->route('dokter.create')->with('error', 'Nama Dokter ' . $request->name . ' Sudah Ada, Silahkan masukkan nama yang lain..');
        }

        Dokter::create([
            'doktername' => $request->name,
            'dokterAddr' => $request->address,
            'dokterTelp' => $request->telphone,
            'dokterEmail' => $request->email,
        ]);

        return redirect()->route('dokter')->with('sukses', 'Data Berhasil ditambahkan');
    }

    public function edit(Dokter $dokter)
    {
        return view('dokter.edit', compact('dokter'));
    }

    public function update(Request $request, Dokter $dokter)
    {
        $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Masukkan nama dokter',
        ]);

        $dokter->update([
            'doktername' => $request->name,
            'dokterAddr' => $request->address,
            'dokterTelp' => $request->telphone,
            'dokterEmail' => $request->email,
        ]);

        return redirect()->route('dokter')->with('sukses', 'Data Was Updated !');
    }

    public function detail(Dokter $dokter)
    {
        return view('dokter.detail', compact('dokter'));
    }
}
