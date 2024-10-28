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

            return DataTables::of($asientos)
                ->addColumn('detalle', function ($asiento) {
                    return view('libro_diario.partials.detalle', compact('asiento'))->render();
                })
                ->rawColumns(['detalle'])
                ->make(true);
        }
    }
}
