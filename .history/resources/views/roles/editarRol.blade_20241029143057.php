@extends('app')
@section('script')
    <script type="text/javascript">
        $(document).ready(function($) {

        });

        document.getElementById('roleForm').addEventListener('submit', function(event) {
            event.preventDefault();

            var id = document.getElementById('roleId').value;
            var url = "{{ route('roles.actualizarRol') }}";
            var method = id ? 'PUT' : 'POST';

            fetch(url, {
                    method: method,
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        descripcion: document.getElementById('descripcion').value,
                        id : id
                    })
                })
                .then(response => response.json())
                .then(data => {
                    location.reload();
                });
        });
    </script>
@endsection
@section('modalBody')
    <div class="modal fade" id="ajaxModalRoles" tabindex="-1" role="dialog" aria-labelledby="ajaxModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="roleForm" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="ajaxModalLabel">Edición del Rol</h5>
                    </div>
                    <div class="modal-body">
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
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"
                            onclick="cerrarModal('ajaxModalRoles')">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
