@extends('layouts.app')

@section('content')

    <div class="container text-center">
        <div class="row">
            <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-list-alt icon-home"></i>
                    <a href="{{url('pago/create')}}" class="btn btn-warning btn-block btn-home-admin">Nuevo Pago</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-list-alt icon-home"></i>
                    <a href="{{url('pago/index')}}" class="btn btn-warning btn-block btn-home-admin">Ver Pagos</a>
                </div>

            </div>
            <div class="col-md-6">
                <div class="panel">
                    Hay {{$pago->count()}} Usuarios activos
                </div>
            </div>

            <div class="col-md-6">
                <div class="panel">
                    Hay {{$morosos->count()}} Usuarios morosos
                </div>
            </div>
        </div>
    </div>

@endsection