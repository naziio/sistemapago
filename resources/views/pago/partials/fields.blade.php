<div class="form-group">
    {!! Form::Label('user_fk', 'Nombre Alumno:') !!}
    {!! Form::select('user_fk', $data1, $selected,['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::Label('tipopago', 'Tipo de pago') !!}
    {!! Form::select('tipopago', array('Mensual' => 'Mensual', 'Anual' => 'Anual', 'Semestral' => 'Semestral'),$selected, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::Label('monto', 'Monto: ') !!}
    {!! Form::text('monto', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('fechaexpira', 'Fecha expira') !!} fecha de expiracion.
    {!! Form::date('fechaexpira',null, ['class'=>'form-control']) !!}
</div>


