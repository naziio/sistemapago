@extends('layouts.app')


@section('content')

    <div class="container text-center">
        <div class="row">
            <div class="col-md-8 col-md-offset-1">
                <div class="panel panel">
                    <div class="panel-heading">Plataforma de clientes por vencer, al dia y morosos </div>
                    <div class="panel-body">


                        @include('pago.partials.expira')
@foreach($data as $datas)

                        <a class="btn btn-info" href="{{url($datas)}}" role="button">Enviar correo</a>
@endforeach

                    </div>
                </div>
            </div>
            <div class="col-md-6 col-md-offset-1">

                <div class="panel">
                    <i class="fa fa-list-alt icon-home"></i>
                    <a class="btn btn-info btn-block btn-home-admin" href="{{url('pago')}}" class="btn btn-primary btn-xs">Volver</a>
                </div>
            </div>

        </div>
    </div>
@endsection