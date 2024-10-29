@extends('app')

@section('modalBody')
    <div class="modal fade" id="ajaxModal-roles" tabindex="-1" role="dialog" aria-labelledby="ajaxModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ajaxModalLabel">Edición del Rol</h5>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="descripcion">Descripción</label>
                                    <input type="hidden" id="rolid" value="{{ $rol["idrol"] }}">
                                    <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ $rol["rol"] }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        onclick="cerrarModal('ajaxModal-roles')">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
@endsection
