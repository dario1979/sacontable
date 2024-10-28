<?php

namespace App\Http\Controllers;

use App\Models\AsientoContableModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class LibroDiarioController extends Controller
{

    public function libro_diario(){
        return view('reportes.reporte_libro_diario');
    }


    public function getAsientos(Request $request)
    {
        if ($request->ajax()) {
            $asientos = AsientoContableModel::with(['asientoCuentas.cuenta'])->get();
            var_dump($asientos);
            die();
            return DataTables::of($asientos)
                ->addColumn('detalle', function ($asiento) {
                    return view('reportes.libro_diario', compact('asiento'))->render();
                })
                ->rawColumns(['detalle'])
                ->make(true);
        }
    }
}
