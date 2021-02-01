<?php

namespace App\Http\Controllers;

use \App\Arrival;
use Illuminate\Http\Request;

class ArrivalController extends Controller
{
    public function index()
    {
        $arrival = Arrival::paginate(30);

        return view('arrival.index', compact('arrival'));
    }
}
