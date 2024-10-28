@extends('app')
@section('style')
    <style>
        .form-check {
            padding-top: 2em;
        }

        .ui-autocomplete {
            z-index: 10000 !important;
            max-height: 200px;
            overflow-y: auto;
            background-color: white;
            /* Asegura que el fondo sea visible */
        }
    </style>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js"></script>
    <script type="text/javascript">

        var recibe_saldo = "{{ $datos['recibe_saldo'] }}";

        $(document).ready(function($) {
            $("#recibe_saldo").prop("checked", (recibe_saldo == 'SI')?true:false);
           /* $.ajax({
                url: "{{ route('cuentas.obtenerCuentasPadres') }}", // Ruta que devuelve las cuentas padres
                method: 'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                        'content') // Token CSRF para protección
                },
                success: function(data) {
                    const padreSelect = $('#padre_id');
                    padreSelect.empty();
                    padreSelect.append('<option value="">-- Seleccionar Cuenta Padre --</option>');
                    data.forEach(cuenta => {
                        padreSelect.append(
                            `<option value="${cuenta.idcuenta}" tipo="${cuenta.tipo}" recibe_saldo="${cuenta.recibe_saldo}">${cuenta.nro_cuenta} - ${cuenta.nombre}</option>`
                        );
                    });
                },
                error: function() {
                    alert('Error al cargar las cuentas padres');
                }
            });*/
           /* $("#clasificacion").on("change", function() {
                var nombre = $("#clasificacion :selected").text()
                    .trim(); // Obtiene el valor seleccionado del select

                $.ajax({
                    url: "{{ route('cuentas.getCatNombres') }}", // URL del servidor donde se hará la solicitud
                    type: 'post', // Tipo de solicitud (GET o POST)
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                            'content') // Token CSRF para protección
                    },
                    dataType: 'json', // Tipo de datos que se espera recibir (JSON)
                    data: {
                        nombre: nombre
                    }, // Datos que se enviarán al servidor (en este caso, el id seleccionado)
                    success: function(response) {
                        // Manejar la respuesta recibida (response es el JSON retornado)
                        //console.log(response);

                        var $select = $('#catnombre'); // El select que vamos a llenar
                        $select.empty(); // Limpiar las opciones actuales

                        // Usar map para crear las opciones y agregarlas al select
                        const opciones = response.map(item => {
                            const selected = item.id_catnombres == nombre_id ?
                                'selected' : '';
                            return '<option value="' + item.id_catnombres + '" ' +
                                selected + '>' + item.nombre + '</option>'
                        });

                        // Insertar las opciones en el select
                        $select.append(opciones.join(''));

                    },
                    error: function(xhr, status, error) {
                        console.error('Error al realizar la solicitud AJAX:', error);
                    }
                });
            });
            $("#clasificacion").change();*/

            $("#cuentaPadre").autocomplete({
                autoFocus: true,
                source: function(request, response) {
                    $.ajax({
                        url: "{{ route('cuentas.getCuentas') }}", // Ruta al método en el controlador
                        dataType: "json",
                        type: "GET",
                        data: {
                            descripcion: request
                                .term // Pasar el término de búsqueda como parámetro
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data) {
                            //console.log(data); // Verifica los datos en la consola
                            response($.map(data, function(item) {
                                return {
                                    label: item.label,
                                    value: item.value,
                                    id: item.id
                                };
                            }));
                        }
                    });
                },
                minLength: 1,
                select: function(event, ui) {
                    //console.log(ui); // Verifica los datos seleccionados en la consola
                    $("#cuentaPadreId").val(ui.item.id);
                    $("#cuentaPadre").val(ui.item.value);
                    return false;
                }
            });

            $("#nombre").on("blur", function() {
                var data = $(this).val();
                $.ajax({
                    url: "{{ route('cuentas.verificarNombre') }}", // Ruta al método en el controlador
                    dataType: "json",
                    type: "post",
                    data: {
                        descripcion: data
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        if (data.vacio == false) {
                            $("#spnombre").html("La cuenta ya existe");
                        } else {
                            $("#spnombre").html("");
                        }
                    }
                });

            });

            $("#codigo").on("blur", function() {
                var data = $(this).val();
                $.ajax({
                    url: "{{ route('cuentas.verificarCodigo') }}", // Ruta al método en el controlador
                    dataType: "json",
                    type: "post",
                    data: {
                        descripcion: data
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        if (data.vacio == false) {
                            $("#spcodigo").html("El código ya existe");
                        } else {
                            $("#spcodigo").html("");
                        }
                    }
                });
            });

        });
        flatpickr("#fechaasiento", {
            locale: "es",
            autoclose: true,
            dateFormat: "d/m/Y"
        });
        /*document.addEventListener('click', function(event) {
            if (!event.target.closest('#fechaasiento')) {
                datepicker.close(); // Cerrar el calendario
            }
        });*/
        //activarFiltro('cuentaPadre', '{{ route('cuentas.getCuentas') }}');

        function guardarCuenta() {
            let data = {
                idcuenta: "{{ $datos['idcuenta'] }}",
                nombre: $("#nombre").val(),
                nro_cuenta: $("#nro_cuenta").val(),
                tipo: $("#tipo").val(),
                saldo_actual: $("#saldo_actual").val(),
                recibe_saldo: "{{ $datos['recibe_saldo']== 'NO' ? 0 : 1 }}"
            }

            var url = "{{ route('cuentas.actualizarCuenta') }}";

            $.ajax({
                url: url,
                type: "post",
                data: data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // El token CSRF desde el meta
                },
                //error: swalError,
                success: function(json) {



                    Swal.fire({
                        title: 'Éxito',
                        text: 'El registro se ha guardado correctamente',
                        icon: 'success',
                        confirmButtonText: 'Aceptar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            myModal.hide();
                            table.ajax.reload();
                            $('#ajaxModalAsientos').on('hidden.bs.modal', function() {
                                datepicker
                                    .close(); // Cierra el calendario de flatpickr cuando el modal se oculta
                            });
                        }
                    });





                }
            });
        }
    </script>
@endsection
@section('modalBody')
    <div class="modal fade" id="ajaxModalCuentas" tabindex="-1" role="dialog" aria-labelledby="ajaxModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ajaxModalLabel">Edición de Cuenta</h5>
                    <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
                </div>
                <div class="modal-body">
                    <form id="formCrearCuenta">
                        <div class="modal-body">
                            <div class="row mb-3">
                                <!--<div class="col-md-6">

                                    <div class="form-group">
                                        <label for="padre_id">Cuenta Padre</label>
                                        <select class="form-control" id="padre_id" name="padre_id" disabled>
                                            <option value="">-- Seleccionar Cuenta Padre --</option>

                                        </select>
                                    </div>
                                </div>-->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="nro_cuenta">Número de Cuenta</label>
                                        <input type="text" class="form-control" id="nro_cuenta" name="nro_cuenta" value="{{ $datos["codigo"] }}"
                                            disabled>
                                    </div>
                                </div>
                                <!-- Tipo de cuenta -->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="tipo">Tipo de Cuenta</label>
                                        <input type="text" class="form-control" id="tipo" name="tipo" disabled value="{{ $datos["tipo"] }}">
                                    </div>
                                </div>
                            </div>
                            <!-- Nombre de la cuenta -->
                            <div class="form-group">
                                <label for="nombre">Nombre de la Cuenta</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required value="{{ $datos["nombre"] }}">
                            </div>


                            <!-- Saldo actual -->
                            <!--<div class="form-group">
                                <label for="saldo_actual">Saldo Actual</label>
                                <input type="text" disabled class="form-control input-moneda" id="saldo_actual" name="saldo_actual" value="{{ $datos["saldo_actual"] }}">
                            </div>-->

                            <!-- Recibe saldo -->
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="recibe_saldo" name="recibe_saldo"
                                    value="1" disabled>
                                <label class="form-check-label" for="recibe_saldo">¿Recibe Saldo?</label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        onclick="cerrarModal('ajaxModalCuentas')">Cerrar</button>
                    @if (in_array('CUENTAS.MODIFICAR', $permissions ?? []))
                        <button type="button" class="btn btn-primary" onclick="guardarCuenta()">Guardar cambios</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
