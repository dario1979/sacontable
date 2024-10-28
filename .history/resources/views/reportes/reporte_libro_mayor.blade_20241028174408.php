@extends('app')

@section('style')
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#libroMayorTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('libros.getMovimientos') }}",
                columns: [{
                        data: 'nro_cuenta',
                        name: 'nro_cuenta'
                    },
                    {
                        data: 'nombre',
                        name: 'nombre'
                    },
                    {
                        data: 'movimientos',
                        name: 'movimientos',
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
    <div class="container">
        <main style="margin-top: 58px">
            <div class="container pt-4">
                <section class="mb-4">
                    <div class="card">
                        <div class="card-header py-3 d-flex justify-content-center align-items-center position-relative">
                            <h5 class="mb-0"><strong>Libro Mayor</strong></h5>

                        </div>
                        <div class="card-body" style="max-height: 70vh; overflow-y: auto;">
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
                    </div>
                </section>
            </div>
        </main>
    @endsection
