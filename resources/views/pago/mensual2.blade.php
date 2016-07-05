@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <div class="row">
            <div class="col-md-8 col-md-offset-1">
                <div class="panel panel">
                    <div class="panel-heading">Recaudacion Mensual</div>
                    <div class="panel-body">
            <div class="table-responsive">
            <table class="table table-bordered table-hover">
        <tr>
            <th>Mes</th>
            <th>Año</th>
            <th>Recaudacion mensual</th>
        </tr>


            <tr>
                <td>{{$month}}</td>
                <td>{{$year}}</td>

                @foreach($pago as $pagos)
                    @if($pagos->monto == null)
                        <td> No registra pagos este mes</td>
                    @else
                        <td>{{$pagos->monto}}</td>
                    @endif
            </tr>
        @endforeach


    </table>
</div>
                        <a href="{{url('pago')}}" class="btn btn-primary ">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop