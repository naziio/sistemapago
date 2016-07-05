<div class="table-responsive">
<table class="table table-hover">
    <tr>
        <th>#</th>
        <th>Nombre</th>
        <th>Mail</th>
        <th>Acciones</th>
    </tr>
    @foreach( $users as $user)

    <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td><a href="{{ route('admin.users.edit', $user) }}">Editar</a> <a href="">Eliminar</a></td>

    </tr>
    @endforeach
</table>
</div>