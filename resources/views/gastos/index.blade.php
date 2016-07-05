@extends('layouts.app')

@if(Session::has('message'))
<div class="alert alert-warning alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>{{Session::get('message')}}</strong>
</div>
@endif
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <div class="panel panel-custom-horrible-red">
                <div class="panel-heading">Gastos</div>

                <div class="panel-body">
                    <a class="btn btn-info" href="{{ route('flujo.create') }}" role="button">Nuevo Gasto</a>

                    <br/>

                    @include('gastos.partials.tables')
<p></p>
                    <input type="button" name="imprimir" value="Imprimir" onclick="window.print();">
                    {!! $gasto->render() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection