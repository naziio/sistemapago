{!! Form::open(['route'=>['flujo.destroy',$gasto], 'method'=>'DELETE'])!!}
<button type="submit" class="btn btn-danger" onclick="return confirm('seguro desea eliminar??')" >Eliminar gasto</button>
<a href="{{url('gastos/index')}}" class="btn btn-primary ">Volver</a>
{!!Form::close() !!}
