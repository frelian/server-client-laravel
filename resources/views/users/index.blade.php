@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">Listado: Usuarios</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="container">

                            <div class="float-right">
                                <a href="{{ route('users.create')}}" class="btn btn-success btn-sm">
                                    Crear usuario
                                </a>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Apellido</th>

                                        <th scope="col">Tipo Documento</th>
                                        <th scope="col">Documento</th>
                                        <th scope="col" class="text-center"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr class="item-row{{ $user->id_user }}">
                                            <td>{{ $user->id_user }}</td>
                                            <td class="center">{{ $user->name }}</td>
                                            <td class="center">{{ $user->surname }}</td>
                                            <td class="center">{{ $user->type_name }}</td>
                                            <td class="center">{{ $user->identification }}</td>
                                            <td class="center">
                                                <a class="btn btn-sm btn-light" href="{{ route('users.show', ['id' => $user->id_user]) }}">
                                                    Ver
                                                </a>
                                                <a class="btn btn-sm btn-warning" href="{{ route('users.edit', ['id' => $user->id_user]) }}">
                                                    Editar
                                                </a>
                                                <a class="btn-user-delete btn btn-sm btn-danger" data-id="{{ $user->id_user }}">
                                                    <i class="fas fa-trash fa-lg"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="pagination">

                        </div>

                    </div>

                    <div class="card-footer text-muted">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {

        $(".btn-user-delete").click(function(){

            let id_type = $(this).data("id");

            swal({
                title: "Eliminar el usuario ?",
                text: "Los datos no se podrán recuperar...",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax("/users/destroy/"+id_type, {
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: {
                                "id": id_type
                            },
                            type: "POST",
                            async: false,
                            error: function error(data) {
                                swal("Error", "Error al eliminar el usuario", "error");
                            },
                            success: function success(data) {
                                $(".item-row"+id_type).remove();
                                swal("Hecho", "El usuario fue eliminado...", "success");
                            }
                        });
                    }
                });
        });
    });
</script>
@endpush
