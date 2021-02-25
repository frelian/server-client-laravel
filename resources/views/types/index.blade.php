@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">Listado: Tipos de documentos</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="container">

                            <div class="float-right">
                                <a href="{{ route('types.create')}}" class="btn btn-success btn-sm">
                                    Crear
                                </a>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Creado</th>
                                        <th scope="col" class="text-center"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($types as $type)
                                        <tr class="item-row{{ $type->id }}">
                                            <td>{{ $type->id }}</td>
                                            <td class="center">{{ $type->type_name }}</td>
                                            <td class="center">{{ $type->created_at }}</td>
                                            <td class="center">
                                                <a class="btn btn-sm btn-light" href="{{ route('types.show', ['id' => $type->id]) }}">
                                                    Ver
                                                </a>
                                                <a class="btn btn-sm btn-warning" href="{{ route('types.edit', ['id' => $type->id]) }}">
                                                    Editar
                                                </a>
                                                <a class="btn-type-delete btn btn-sm btn-danger" data-id="{{ $type->id }}">
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

        $(".btn-type-delete").click(function(){

            let id_type = $(this).data("id");

            swal({
                title: "Eliminar el tipo de documento ?",
                text: "Los datos no se podrán recuperar...",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax("/types/destroy/"+id_type, {
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: {
                                "id": id_type
                            },
                            type: "POST",
                            async: false,
                            error: function error(data) {
                                swal("Error", "Error al eliminar el tipo de documento", "error");
                            },
                            success: function success(data) {
                                $(".item-row"+id_type).remove();
                                swal("Hecho", "El tipo de documento fue eliminado...", "success");
                            }
                        });
                    }
                });
        });
    });
</script>
@endpush
