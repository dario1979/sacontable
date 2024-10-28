@extends('app')

@section('style')
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $('#libroMayorTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('libros.getMovimientos') }}",
            columns: [
                { data: 'nro_cuenta', name: 'nro_cuenta' },
                { data: 'nombre', name: 'nombre' },
                { data: 'movimientos', name: 'movimientos', orderable: false, searchable: false }
            ]
        });
    });
</script>
@endsection

@section('content')
<div class="container">
    <h1>Libro Mayor</h1>
    <table class="table table-bordered" id="libroMayorTable">
        <thead>
            <tr>
                <th>Número de Cuenta</th>
                <th>Nombre de la Cuenta</th>
                <th>Movimientos</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>
@endsection



