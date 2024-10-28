<?php

namespace App\Http\Controllers;

use App\Models\CuentasModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class LibroMayorController extends Controller
{
    public function libro_mayor()
    {
        return view('reportes.reporte_libro_mayor');
    }

    public function getMovimientos(Request $request)
    {
        if ($request->ajax()) {
            $cuentas = CuentasModel::with(['movimientos.asiento'])->get();

            // Formateamos las fechas de los movimientos en cada cuenta
            foreach ($cuentas as $cuenta) {
                foreach ($cuenta->movimientos as $movimiento) {
                    $movimiento->asiento->fecha = \Carbon\Carbon::parse($movimiento->asiento->fecha)->format('d/m/Y');
                }
            }

            return DataTables::of($cuentas)
                ->addColumn('movimientos', function ($cuenta) {
                    return view('libro_mayor.partials.movimientos', compact('cuenta'))->render();
                })
                ->rawColumns(['movimientos'])
                ->make(true);
        }
    }
}
