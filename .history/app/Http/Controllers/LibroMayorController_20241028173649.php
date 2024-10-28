<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LibroMayorController extends Controller
{
    public function libro_mayor(){
        return view('reportes.reporte_libro_mayor');
    }
}
