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
                            <h5 class="center title-dashboard font-bold">Tipo de documento</h5>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="container">
                            <div class="row">
                                <div class="col s12">
                                    <div class="row margin-bottom-0">
                                        <div class="col s12">
                                            <div class="row">
                                                <div class="col">
                                                    <h5 class="font-bold">Nombre de documento:</h5>
                                                </div>
                                                <div class="col" style="background-color: aliceblue;">
                                                    <h5 style="font-style: italic;">{{ $type->type_name }}</h5>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s12">
                                            <strong>Creado:</strong> <p class="">{{ $type->created_at }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s12 center-align">
                                            <a
                                                class="btn btn-light waves-effect waves-light valign-wrapper"
                                                href="{{ route('types.index') }}">
                                                Volver
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
