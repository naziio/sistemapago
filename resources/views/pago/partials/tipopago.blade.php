<div class="form-group">
    {!! Form::label('tipopago_fk', 'Tipo de pago') !!}
    {!! Form::select('type', array('mensual' => 'Mensual', 'Semestral' => 'Semestral','trimestral' => 'Trimestral'),['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('monto', 'Monto') !!}
    {!! Form::text('monto',null,['class'=>'form-control']) !!}
</div>