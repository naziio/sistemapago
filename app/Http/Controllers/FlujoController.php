<?php

namespace App\Http\Controllers;

use App\Gasto;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\App;
use App\Pago;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;


use Session;

class FlujoController extends Controller
{
    
    public function index()
    {
        $gasto= Gasto::all();
        $gasto= Gasto::paginate(5);
        $gasto->setPath('gasto') ;

        return view('gastos.index',compact('gasto'));
    }

    public function show()
    {
        $gasto= Gasto::all();
        $gasto= Gasto::paginate(5);
        $gasto->setPath('gasto') ;

        return view('gastos.index',compact('gasto'));
    }
    public function create()
    {
        
        return view('gastos.create');
    }

    public function store(Request $request)
    {


        $this->gasto= new Gasto($request->all());
        $this->gasto->save();
        $gasto= Gasto::all();
        $gasto= Gasto::paginate(5);
        $gasto->setPath('gasto') ;

        return view('gastos.index', compact('gasto'));
    }
    
    public function edit($id)
    {
        $gasto= Gasto::findOrfail($id);

        return view('gastos.edit',['gasto'=>$gasto]);

    }
    
    public function update(Requests\EditGastoRequest $request, $id)
    {

        $gasto= Gasto::findOrfail($id);

        $gasto->fill($request->all());

        $gasto->save();
        $gasto= Gasto::all();
        $gasto= Gasto::paginate(5);
        $gasto->setPath('gasto') ;
        session::flash('message','GASTO editado de los registros');
        return view('gastos.index',compact('gasto'));
    }

    public function destroy($id)
    {
        $gasto= Gasto::findOrFail($id);
        $gasto->delete();
        $gasto= Gasto::all();
        $gasto= Gasto::paginate(5);
        $gasto->setPath('gasto') ;

        session::flash('message','gasto eliminado de los registros');
        return redirect()->route('flujo.index', compact('gasto'));
    }

    public function flujo(Request $request)
    {

        $selected= array();
        return view('flujo.flujo', compact('selected'));
    }

    public function viewFlujo(Request $request)
    {

        $year=$request->año;
        $pago = Pago::from('pago')
            ->select(DB::raw("month(created_at) as mes, SUM(monto) as monto"))
            ->groupby('mes')
            -> whereyear('created_at','=',$year)
            ->get()
        ;
        // dd($pago);

        $gasto= Gasto::from('gastos')
            ->select(DB::raw("month(created_at) as mes, SUM(monto) as monto"))
            ->groupby('mes')
            -> whereyear('created_at','=',$year)
            ->get();

      /*$utilidades= Pago::from('pago as p')
            ->join('gastos as g', 'p.month(created_at)', '=', 'g.month(created_at)')
            ->select('p.monto', 'g.monto', 'p.month(created_at) as mes')
            ->groupby('mes')
            ->tosql();
        dd($utilidades);
        
        */

        /* SELECT T1.entradas - T2.salidas
        FROM tabla1 T1
        INNER JOIN tabla2 T2 ON T1.id = T2.id*/


        return view('flujo.flujo2',compact('pago','gasto'));
    }
}
