@extends('layouts.app')


@section('content')

<div class="container text-center">
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <div class="panel panel">
                <div class="panel-heading">Formulario para registrar pago </div>
                <div class="panel-body">

                    {!! Form::open(['route'=>'pago.store', 'method'=>'POST'])!!}
                    @include('pago.partials.fields')
                    <button type="submit" class="btn btn-default">Registrar pago</button>
                    {!!Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-md-6 col-md-offset-1">
            <div class="panel">
                <i class="fa fa-list-alt icon-home"></i>
                <a class="btn btn-info btn-block btn-home-admin" href="{{url('admin/index')}}" class="btn btn-primary btn-xs">Volver</a>
            </div>
        </div>
    </div>
</div>
    @endsection