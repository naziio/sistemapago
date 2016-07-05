@extends('layouts.app')


@section('content')
    <div class="container text-center">
        <div class="row">
            <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-list-alt icon-home"></i>
                    <a class="btn btn-info btn-block btn-home-admin" href="{{url('pago/expira7')}}" role="button">7 dias</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-list-alt icon-home"></i>
                    <a class="btn btn-info btn-block btn-home-admin" href="{{url('pago/expira4')}}" role="button">4 dias</a>
                </div>

            </div>
            <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-list-alt icon-home"></i>
                    <a class="btn btn-info btn-block btn-home-admin" href="{{url('pago/expira2')}}" role="button">2 dias</a>
                </div>

            </div>
            <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-list-alt icon-home"></i>
                    <a class="btn btn-info btn-block btn-home-admin" href="{{url('pago/morosos')}}" role="button">Morosos</a>
                </div>

            </div>
            <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-list-alt icon-home"></i>
                    <a class="btn btn-info btn-block btn-home-admin" href="{{url('pago/aldia')}}" role="button">Al dia</a>
                </div>

            </div>
        </div>

    </div>

@endsection