<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NominaController extends Controller
{
    //
      public function index()
{
    return view('nomina.dashboard');
}
}
