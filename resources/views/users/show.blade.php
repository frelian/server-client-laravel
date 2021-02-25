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
                            <h5 class="center title-dashboard font-bold">Usuario</h5>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="container">
                            <div class="row">
                                <div class="col s12">
                                    <div class="row margin-bottom-0">
                                        <div class="col s12">
                                            <div class="row">
                                                <div class="col-3">
                                                    <h5 class="font-weight-bold">Nombre usuario:</h5>
                                                </div>
                                                <div class="col-6" style="background-color: aliceblue;">
                                                    <h5 style="font-style: italic;">{{ $user->name }}</h5>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-3">
                                                    <h5 class="font-weight-bold">Apellido usuario:</h5>
                                                </div>
                                                <div class="col-6" style="background-color: aliceblue;">
                                                    <h5 style="font-style: italic;">{{ $user->surname }}</h5>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-3">
                                                    <h5 class="font-weight-bold">Tipo documento:</h5>
                                                </div>
                                                <div class="col-6" style="background-color: aliceblue;">
                                                    <h5 style="font-style: italic;">{{ $user->type_name }}</h5>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-3">
                                                    <h5 class="font-weight-bold">No documento:</h5>
                                                </div>
                                                <div class="col-6" style="background-color: aliceblue;">
                                                    <h5 style="font-style: italic;">{{ $user->identification }}</h5>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-3">
                                                    <h5 class="font-weight-bold">Creado:</h5>
                                                </div>
                                                <div class="col-6" style="background-color: aliceblue;">
                                                    <h5 style="font-style: italic;">{{ $user->users_created_at }}</h5>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s12 center-align">
                                            <a
                                                class="btn btn-light waves-effect waves-light valign-wrapper"
                                                href="{{ route('users.index') }}">
                                                Volver al listado
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
