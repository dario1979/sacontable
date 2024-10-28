@extends('app')
@section('style')
    <style>
        td.wrap {
            white-space: normal;
        }
    </style>
@endsection
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
                ],
                language: {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                }
            });
        });
    </script>
@endsection

@section('content')
    <main style="margin-top: 58px">
        <div class="container pt-4">
            <section class="mb-4">
                <div class="card">
                    <div class="resources/views/roles/roles.blade.php">
                        <button class="btn btn-secondary" onclick="history.back()">
                            <i class="fas fa-arrow-left"></i> Volver
                        </button>
                        <h5 class="mb-0"><strong>Libro Diario</strong></h5>

                    </div>
                    <div class="card-body" style="max-height: 70vh; overflow-y: auto;">
                        <table class="table table-bordered" id="libroDiarioTable">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Descripción</th>
                                    <th>Asiento</th>
                                    <th>Detalle</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection
