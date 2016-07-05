
@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <div class="row">
            <div class="col-md-8 col-md-offset-1">

                <div class="panel panel">
                    <div class="panel-heading">Flujo de caja</div>
                    <div class="panel-body">
                        <a class="btn btn-info" href="{{url('gastos/index')}}" class="btn btn-primary btn-xs">Gastos</a>
                        <p></p>
<table class="table table-bordered table-hover">
    <tr>
        <th>Mes</th>
    @foreach( $pago as $pagos)

            <td>{{$pagos->mes}}</td>

        @endforeach
        </tr>

    <tr>
        <th>Ganancia</th>
        @foreach( $pago as $pagos)
        <td>{{$pagos->monto or 'DEFAULT'}}</td>
        @endforeach
    </tr>

    <tr>
        <th>Gastos</th>
        @foreach( $gasto as $gastos)
            <td>{{$gastos->monto or 'DEFAULT'}}</td>
        @endforeach
    </tr>

    <tr>
        <th>Utilidades</th>

            <td>{{$pagos->monto - $gastos->monto }}</td>

    </tr>

</table>
</div>
                </div>
            </div>

        </div>
    </div>
    @stop