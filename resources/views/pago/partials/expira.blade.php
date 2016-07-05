<div class="table-responsive">
    <table class="table table-bordered table-hover">
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
                <td>{{$pagos->user->name or 'DEFAULT'}}</td>
                <td>{{$pagos->tipopago or 'DEFAULT'}}</td>
                <td>{{$pagos->monto or 'DEFAULT'}}</td>
                <td>{{$pagos->fechaexpira}}</td>
            </tr>
        @endforeach
        <tr>
            <td></td>
            <td></td>
            <th CLASS="text-center">Total</th>

            <th CLASS="text-center">{{$total or 'DEFAULT'}}</th>


        </tr>
    </table>
</div>