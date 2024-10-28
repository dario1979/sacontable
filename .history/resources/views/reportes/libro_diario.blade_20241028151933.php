@extends('app')

@section('content')
    <div class="container">
        <h2>Libro Diario - Desde {{ $fechaInicio }} hasta {{ $fechaFin }}</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Nro. Asiento</th>
                    <th>Descripción</th>
                    <th>Cuenta</th>
                    <th>Debe</th>
                    <th>Haber</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($asientos as $asiento)
                    @foreach ($asiento->cuentas as $cuenta)
                        <tr>
                            <td>{{ $asiento->fecha }}</td>
                            <td>{{ $asiento->nro_asiento }}</td>
                            <td>{{ $asiento->descripcion }}</td>
                            <td>{{ $cuenta->nombre }}</td>
                            <td>{{ $cuenta->pivot->debe }}</td>
                            <td>{{ $cuenta->pivot->haber }}</td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
