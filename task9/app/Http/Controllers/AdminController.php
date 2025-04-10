<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function inicio()
    {
        return view('admin.inicio');
    }

    public function ingresos()
    {
        return view('admin.ingresos');
    }

    public function gastos()
    {
        return view('admin.gastos');
    }

    public function informes()
    {
        return view('admin.informes');
    }
}
