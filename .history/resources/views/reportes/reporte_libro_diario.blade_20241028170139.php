@extends('app')

@section('script')

    <script type="text/javascript">

        $(document).ready(function() {
            $('#libroDiarioTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('libros.getAsientos') }}",
                columns: [{
                        data: 'fecha',
                        name: 'fecha'
                    },
                    {
                        data: 'descripcion',
                        name: 'descripcion'
                    },
                    {
                        data: 'nro_asiento',
                        name: 'nro_asiento'
                    },
                    {
                        data: 'detalle',
                        name: 'detalle',
                        orderable: false,
                        searchable: false
                    }
                ]
            });
        });
    </script>
@endsection

@section('content')
    <div class="container">
        <h1>Libro Diario</h1>
        <table class="table table-bordered" id="libroDiarioTable">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Descripción</th>
                    <th>Número de Asiento</th>
                    <th>Detalle</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
@endsection
