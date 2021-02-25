@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">

                        @if (session()->has('success'))
                            <div class="container">
                                <div class="alert alert-success">
                                    <ul>

                                        <li> {{ session()->get('success') }}</li>
                                    </ul>
                                </div>
                            </div>
                        @endif

                        <div class="container">
                            <h5 class="center title-dashboard font-bold">Nuevo: Usuario</h5>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="container">
                            <div class="row">
                                <div class="col s12">
                                    <form method="post" action="{{ route('users.store') }}">
                                        @csrf @method("post")

                                        <div class="mb-3">
                                            <label for="name" class="form-label">Nombre</label>
                                            <input type="text" name="name" class="form-control" id="name" minlength="2" maxlength="110" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="surname" class="form-label">Apellido</label>
                                            <input type="text" name="surname" class="form-control" id="surname" minlength="2" maxlength="110">
                                        </div>
                                        <div class="mb-3">
                                            <label for="document_type_id" class="form-label">No. documento</label>
                                            <select id="type_name" name="document_type_id" class="form-control" >
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="identification" class="form-label">No documento</label>
                                            <input type="text" name="identification" class="form-control" id="identification" minlength="5" maxlength="29">
                                            <small>Mínimo 5 carácteres y máximo 29 carácteres de longitud</small>
                                        </div>
                                        <button type="submit" class="btn btn-success">Guardar</button>
                                        <a
                                            class="btn btn-light"
                                            href="{{ route('users.index') }}">
                                            Volver
                                        </a>
                                    </form>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {

        // Cargo los tipos de documento
        $.ajax("/types", {
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            async: false,
            error: function error(data) {
                console.log("Error al cargar el tipo de documento.");
            },
            success: function success(data) {
                console.log("Tipos de documento cargados...");

                var sel = $("#type_name");
                sel.empty();
                for (var i = 0; i < data.data.length; i++) {
                    sel.append('<option value="' + data.data[i].id + '">' + data.data[i].type_name + '</option>');
                }
            }
        });
    });
</script>
@endpush
