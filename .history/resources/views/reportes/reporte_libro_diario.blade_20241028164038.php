@extends('app')

@section('content')
    <div class="card">
        <div class="card-header py-3 d-flex justify-content-center align-items-center position-relative">
            <h5 class="mb-0"><strong>Plan de Cuentas</strong></h5>
            @if (in_array('CUENTAS.CREAR', $permissions ?? []))
                <i class="fas fa-plus position-absolute end-0 me-3" style="font-size: 1.3rem; cursor: pointer;"
                    onclick="agregarCuenta()"></i>
            @endif
        </div>
        <main style="margin-top: 58px">
            <div class="container pt-4">
                <form action="{{ route('libro.diario') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="fecha_inicio">Fecha Inicio:</label>
                        <input type="date" name="fecha_inicio" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha_fin">Fecha Fin:</label>
                        <input type="date" name="fecha_fin" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exportar_pdf">Exportar a PDF</label>
                        <input type="checkbox" name="exportar_pdf">
                    </div>
                    <button type="submit" class="btn btn-primary">Generar Reporte</button>
                </form>
            </div>
        </main>
    </div>
@endsection
