@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <div class="row">
            <div class="col-md-8 col-md-offset-1">

                <div class="panel panel">
                    <div class="panel-heading">Seleccione la opcion que desea</div>
                    <div class="panel-body">
                        <p>Pagos por año y mes</p>
                        {!! Form::open(array('url' => 'pago/mensual2', 'method' => 'POST')) !!}

                            <div class="form-group">
                                {!! Form::Label('mes', 'Seleccionar mes:') !!}
                                {!! Form::select('mes', array('1' => 'Enero', '2' => 'Febrero', '3' => 'Marzo', '4' => 'Abril', '5' => 'Mayo', '6' => 'Junio', '7' => 'Julio', '8' => 'Agosto', '9' => 'Septiembre', '10' => 'Octubre', '11' => 'Noviembre', '12' => 'Diciembre'), $selected,['class' => 'form-control']) !!}
                           </div>
                        <div class="form-group">
                            {!! Form::Label('año', 'Seleccionar año:') !!}
                            {!! Form::select('año', array('2016' => '2016', '2017' => '2017', '2018' => '2018'),$selected,['class' => 'form-control']) !!}
                        </div>

                        <button type="submit" class="btn btn-default">Enviar</button>
                        {!!Form::close() !!}

                        <p></p>
                        <div class="col-md-6">

                            <div class="panel">
                                <i class="fa fa-list-alt icon-home"></i>
                                <a class="btn btn-info btn-block btn-home-admin" href="{{url('pago')}}" class="btn btn-primary btn-xs">Volver</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@stop