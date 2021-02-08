<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function index()
    {
        $company = Company::all();

        return view('company.index', compact('company'));
    }
    public function edit(Company $company)
    {
        return view('company.edit', compact('company'));
    }

    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required',
            'alias' => 'required',
            'address' => 'required',
            'kabupaten' => 'required',
            'provinsi' => 'required',
            'telphone' => 'required',
            'logo' => 'image|mimes:jpg,jpeg,png,svg|max:2048',
        ], [
            'name.required' => 'Masukkan nama perusahaan',
            'alias.required' => 'Masukkan nama Clinic atau Rumah Sakit',
            'address.required' => 'Masukkan alamat perusahaan',
            'kabupaten.required' => 'Masukkan lokasi kabupaten',
            'provinsi.required' => 'Masukkan lokasi provinsi',
            'telphone.required' => 'Masukkan nomor telphone',
        ]);

        //Memasukkan semua input request ke dalam variable attr
        $attr = $request->all();

        //Membuat kondisi menghapus gambar yang lama dan mengganti dengan gambar yang baru
        if (request()->file('logo')) {
            Storage::delete($company->logo);
            $picture = request()->file('logo')->storeAs("images/picture", "logo.png");
        } else {
            $picture = $company->logo;
        }

        //Memasukkan data ke array variable attr
        $attr['logo'] = $picture;

        //Update data
        $company->update($attr);

        return redirect()->route('company')->with('sukses', 'Data berhasil di update !');
    }
}
