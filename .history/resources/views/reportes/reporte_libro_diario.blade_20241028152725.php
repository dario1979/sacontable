@extends('app')

@section('content')
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
@endsection
