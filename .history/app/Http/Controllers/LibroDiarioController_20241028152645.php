<?php

namespace App\Http\Controllers;

use App\Models\AsientoContableModel;
use Illuminate\Http\Request;

class LibroDiarioController extends Controller
{

    public function libro_diario(){
        return view('reportes.reporte_libro_diario');
    }


    public function generarReporte(Request $request)
    {
        // Validar las fechas de entrada
        $request->validate([
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
        ]);

        $fechaInicio = $request->input('fecha_inicio');
        $fechaFin = $request->input('fecha_fin');

        // Obtener los asientos contables entre las fechas indicadas
        $asientos = AsientoContableModel::with('cuentas')
            ->whereBetween('fecha', [$fechaInicio, $fechaFin])
            ->orderBy('fecha', 'asc')
            ->get();

        // Verificar si se requiere la exportación a PDF
        /*if ($request->input('exportar_pdf')) {
            $pdf = PDF::loadView('reportes.libro_diario_pdf', compact('asientos', 'fechaInicio', 'fechaFin'));
            return $pdf->download('libro_diario.pdf');
        }*/

        // Si no se requiere exportar a PDF, devolver los datos en JSON
        return view('reportes.libro_diario', compact('asientos', 'fechaInicio', 'fechaFin'));
    }
}
