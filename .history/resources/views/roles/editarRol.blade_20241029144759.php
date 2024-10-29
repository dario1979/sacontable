@extends('app')
@section('script')
    <script type="text/javascript">
        $(document).ready(function($) {

        });

        document.getElementById('roleForm').addEventListener('submit', function(event) {
            event.preventDefault();

            var id = document.getElementById('roleId').value;
            var url = "{{ route('roles.actualizarRol') }}";
            var method = 'POST';

            $.ajax({
                url: url,
                type: "post",
                data: {
                    id: id,
                    descripcion: $("#descripcion").val()
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                        'content') // El token CSRF desde el meta
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
                            cerrarModal('ajaxModalRoles');
                        }
                    });
                }
            });
        });
    </script>
@endsection
@section('modalBody')
    <div class="modal fade" id="ajaxModalRoles" tabindex="-1" role="dialog" aria-labelledby="ajaxModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">


                <div class="modal-header">
                    <h5 class="modal-title" id="ajaxModalLabel">Edición del Rol</h5>
                </div>
                <div class="modal-body">
                    <form id="roleForm" method="POST">
                        <div class="container">
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="descripcion">Descripción</label>
                                        <input type="hidden" id="roleId" value="{{ $rol['idrol'] }}">
                                        <input type="text" class="form-control" id="descripcion" name="descripcion"
                                            value="{{ $rol['rol'] }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        onclick="cerrarModal('ajaxModalRoles')">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>

        </div>
    </div>
@endsection
