@extends('layouts.app')


@section('content')
    <div class="container text-center">
        <div class="row">
            <div class="col-md-8 col-md-offset-1">
                <div class="panel panel">
                    <div class="panel-heading">Registro de pagos </div>

                    <div class="panel-body">

                        <p>Hay {{ $pago->total() }} pago(s) </p>

                        @include('pago.partials.tables')



                        <br/> <br/>
                        <div class="col-md-6">
                            <div class="panel">
                                <i class="fa fa-list-alt icon-home"></i>
                                <a class="btn btn-info btn-block btn-home-admin" href="{{ url('pago/selectexpira') }}">Alumnos por vencer </a>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="panel">
                                <i class="fa fa-list-alt icon-home"></i>
                                <a class="btn btn-info btn-block btn-home-admin" href="{{ url('pago/mensual') }}">Pagos por mes </a>
                            </div>

                        </div>



                        {{--  <a class="btn btn-default" href="{{ url('admin/pago/excel') }}">Ver en excel</a>
   <a href="{{ url('admin/pago/morosos') }}">Alumnos morosos</a>
                          <a class ="btn btn-default" href="{{ url('excel/morosos') }}">Descargar planilla morosos</a>--}}
                        <br/>
                        {{ $pago->render()}}
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection