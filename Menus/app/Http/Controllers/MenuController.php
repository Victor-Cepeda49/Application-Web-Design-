<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function inicio()
    {
        return view('inicio');
    }

    public function ingresos()
    {
        return view('ingresos');
    }

    public function gastos()
    {
        return view('gastos');
    }

    public function informes()
    {
        return view('informes');
    }
}
