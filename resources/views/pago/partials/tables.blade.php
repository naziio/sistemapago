<div class="table-responsive">
<table class="table table-hover">
    <tr>
        <th>#</th>
        <th>Nombre de usuario</th>
        <th>Tipo de pago</th>
        <th>Monto</th>
        <th>Fecha expira</th>
    </tr>

    @foreach( $pago as $pagos)
    <tr>
        <td>{{$pagos->id}}</td>
        <td>{{$pagos->user->name}}</td>
        <td>{{$pagos->tipopago}}</td>
        <td>{{$pagos->monto}}</td>
        <td>{{$pagos->fechaexpira}}</td>
        <td><a href="{{ route('pago.edit', $pagos) }}">Editar</a></td>
    </tr>
    @endforeach

</table>
</div>
