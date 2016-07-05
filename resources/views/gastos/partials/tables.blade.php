<div class="table-responsive">
<table class="table table-hover">
    <tr>
        <th>#</th>
        <th>Monto</th>
        <th>Descripcion</th>
        <th>Fecha</th>
        <th>Acciones</th>
    </tr>
    @foreach( $gasto as $gastos)

    <tr>
        <td>{{$gastos->id}}</td>
        <td>{{$gastos->monto}}</td>
        <td>{{$gastos->descripcion}}</td>
        <td>{{$gastos->created_at}}</td>
        <td><a href="{{ route('flujo.edit', $gastos) }}">Editar</a> </td>

    </tr>
    @endforeach
</table>
</div>