<?php

namespace App\Http\Controllers;

use App\VarrivalICD;
use Illuminate\Http\Request;

class ArrivalicdController extends Controller
{
    public function index()
    {
        return view('arrival.arrival_icd');
    }
}
