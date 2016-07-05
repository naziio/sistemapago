{!! Form::open(['route'=>['admin.users.destroy',$user], 'method'=>'DELETE'])!!}
<button type="submit" class="btn btn-danger" onclick="return confirm('seguro desea eliminar??')" >Eliminar usuario</button>
{!!Form::close() !!}
