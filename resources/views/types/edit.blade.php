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
                            <h5 class="center title-dashboard font-bold">Editar: Tipo de documento</h5>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="container">
                            <div class="row">
                                <div class="col s12">
                                    <form method="post" action="{{ route('types.update', ['id' => $type->id]) }}">
                                        @csrf @method("post")
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Nombre</label>
                                            <input type="text" name="type_name" class="form-control" id="name"
                                                   value="{{ $type->type_name }}"
                                                   minlength="2" maxlength="49"
                                                   required>
                                            <small>Mínimo 2 carácteres y máximo 49 carácteres de longitud</small>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Actualizar</button>
                                        <a
                                            class="btn btn-light waves-effect waves-light valign-wrapper"
                                            href="{{ route('types.index') }}">
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
