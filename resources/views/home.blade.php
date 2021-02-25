@extends('layouts.app')
@section('content')
    <div class="row area-center fix-row">
        <div class="col-lg-12">
            <div class="container">
                <br><br>
                <h1 class="text-center">{{ config('app.name', 'Laika Laravel') }} | Menú</h1>
            </div>
        </div>
    </div>
    <div class="row fix-row">
        <div class="container">
            <br><br>
            <div class="row ">

                <div class="col-lg-6 text-center card justify-content-center align-items-center">
                    <br>
                    <a href="{{ route('types.index') }}" class="btn btn-outline-primary">
                        <div class="container py-3 mb-3">
                            <h3>Tipo de documento</h3>
                        </div>
                    </a>
                    <br>
                </div>
                <div class="col-lg-6 text-center card justify-content-center align-items-center">
                    <br>
                    <a href="{{ route('users.index') }}" class="btn btn-outline-primary">
                        <div class="container py-3 mb-3">
                            <h3>Listado de usuarios</h3>
                        </div>
                    </a>
                    <br>
                </div>
            </div>
            <hr >
            <div class="row">
                <div class="col">
                    <div class="alert alert-info font-size-1x" role="alert">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
