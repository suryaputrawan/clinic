<?php

namespace App\Http\Controllers;

use App\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patient = Patient::paginate(50);
        return view('patient.index', compact('patient'));
    }

    public function detail(Patient $patient)
    {
        return view('patient.detail', compact('patient'));
    }
}
