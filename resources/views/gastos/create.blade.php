@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <div class="panel panel-custom-horrible-red">
                <div class="panel-heading">Registro de nuevo gasto</div>
                <div class="panel-body">

                    {!! Form::open(['route'=>'flujo.store', 'method'=>'POST'])!!}
                    @include('gastos.partials.fields')
                    <button type="submit" class="btn btn-default">Crear</button>
                    {!!Form::close() !!}
                        <p></p>
                        <a href="{{url('gastos/index')}}" class="btn btn-primary ">Volver</a>
                </div>
            </div>
        </div>
    </div>
    </div>
    @endsection