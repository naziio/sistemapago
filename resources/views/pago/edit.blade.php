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
                <div class="panel-heading">Actualizar Pago </div>
                <div class="panel-body">
                    <!--                    @include('admin.partials.errors')-->
                    {!! Form::model($pago, ['route'=>['pago.update',$pago], 'method'=>'PUT'])!!}
                    @include('pago.partials.fields')
                    <button type="submit" class="btn btn-default">Actualizar</button>
                    {!!Form::close() !!}
                        <p></p>
                        @include('pago.partials.delete')
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