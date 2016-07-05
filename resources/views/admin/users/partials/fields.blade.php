<div class="form-group">
    {!! Form::label('email', 'Correo') !!}
    {!! Form::text('email', null, ['class'=>'form-control', 'placeholder'=>'correo@crossfitpocuro.com'])!!}
</div>
<div class="form-group">
    {!! Form::label('password', 'Contraseña') !!}
    {!! Form::password('password',['class'=>'form-control','placeholder'=>'*****']) !!}
</div>
<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name',null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('role', 'Tipo de Usuario') !!}
    {!! Form::select('role', array( 'user' => 'Usuario', 'Admin' => 'Administrador'),null, ['class'=>'form-control']) !!}
</div>