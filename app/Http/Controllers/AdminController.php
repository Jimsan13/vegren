<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carga;
class AdminController extends Controller
{
    public function index()
{
    return view('rol.admin.dashboard');
}   

    
    public function cargas()
    {
        
        return view ('rol.admin.cargas');
    }

    public function gastos()
    {
        return view ('rol.admin.gastos');
    }

    public function ventas()
    {
        return view('rol.admin.ventas');
    }

    public function almacen()
    {
        return view('rol.admin.almacen');
    
    }

    public function nomina()
    {
        return view('rol.admin.nomina');
    }

    public function utilidades()
    {
        return view('rol.admin.utilidades');
    }

    public function efectivo()
    {
        return view('rol.admin.efectivo'); 
    }

    public function productos()
    {
        return view('rol.admin.productos');
    }

    public function proveedores()
    {
        return view('rol.admin.proveedores');
    }

    public function resultados()
    {
        return view('rol.admin.resultados');
    }

    public function finanzas()
    {
        return view('rol.admin.finanzas');
    }


    public function campo()
    {
        return view('rol.admin.campo');
    }
    
}


