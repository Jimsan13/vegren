<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');}
        $role = auth()->user()->role;

    return match ($role) {
        'admin' => redirect('/admin/dashboard'),
        'contador' => redirect('/finanzas'),
        'campo' => redirect('/campo'),
        'almacen' => redirect('/almacen'),
        'nomina' => redirect('/nomina'),
        default => redirect('/'),
    };
    }
}
