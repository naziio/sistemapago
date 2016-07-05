@extends('layouts.app')



@if(Session::has('message'))
    <div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>{{Session::get('message')}}</strong>
    </div>
@endif

@section('content')
<div class="container text-center">
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <div class="panel panel">
                <div class="panel-heading">Usuarios</div>

                <div class="panel-body">
                    <a class="btn btn-info" href="{{ route('admin.users.create') }}" role="button">Nuevo Usuario</a>

                    <br/>
                    <p>Hay {{$users->total()}} Registros</p>
                    @include('admin.users.partials.tables')
<p></p>
                    <input type="button" name="imprimir" value="Imprimir" onclick="window.print();">
                    {!! $users->render() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection