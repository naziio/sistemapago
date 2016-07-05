@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <div class="panel panel-custom-horrible-red">
                <div class="panel-heading">Actualizar gasto {{ $gasto->descripcion }}</div>
                <div class="panel-body">

                    {!! Form::model($gasto, ['route'=>['flujo.update',$gasto], 'method'=>'PUT'])!!}
                    @include('gastos.partials.fields')
                    <button type="submit" class="btn btn-default">Actualizar</button>
                    {!!Form::close() !!}
                    <p></p>
                    @include('gastos.partials.delete')

                </div>

            </div>
        </div>
    </div>
</div>
@endsection