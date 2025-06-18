<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
{
    return view('rol.admin.dashboard');
}   

    public function cargas()
    {
        return view('rol.admin.cargas');
    }

    public function gastos()
    {
        return view ('rol.admin.gastos');
    }
    public function ventas()
    {
        return view('rol.admin.ventas');
    }
}


