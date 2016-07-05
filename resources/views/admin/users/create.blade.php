@extends('layouts.app')

@section('content')

<div class="container text-center">
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <div class="panel panel">
                <div class="panel-heading">Registro de usuario nuevo</div>
                <div class="panel-body">
                    <!--                    @include('admin.partials.errors')-->
                    {!! Form::open(['route'=>'admin.users.store', 'method'=>'POST'])!!}
                    @include('admin.users.partials.fields')
                    <button type="submit" class="btn btn-default">Crear</button>
                    {!!Form::close() !!}
                        <p></p>
                        <a href="{{url('admin/users')}}" class="btn btn-primary ">Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>
    @endsection