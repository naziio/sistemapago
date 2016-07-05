<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\App;
use App\Pago;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;
use Mail;
use Session;


class PagoController extends Controller
{
    public function index()
    {

        $pago= Pago::all();
        $pago= Pago::paginate(5);
        $pago->setPath('pago') ;

        return view('pago.index', compact('pago'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

        $selected = array();
        $data1 = User::lists('name','id');
        $data3 = Pago::lists('id','id');

        return view('pago.create', compact('data1','data3','selected'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {


        $this->pago= new pago($request->all());
        $this->pago->save();

        return redirect()->route('pago.index', compact('pago'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show()
    {

        $pago= Pago::all();
        $pago= Pago::paginate(5);
        $pago->setPath('pago') ;

        return view('pago.show', compact('pago'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $pago= pago::findOrfail($id);
        $data1 = User::lists('name','id');
        $data2  = DB::table('pago')
            ->select('id')
            ->orderBy('id', 'desc')
            ->first()->id
        ;
        $selected = array();
        return view('pago.edit', compact ('pago','data1','data2','selected'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $pago= pago::findorfail($id);
        $data=$request->all();
        $pago->fill($data);
        $pago->save();

        session::flash('message','pago editado');
        return redirect()->route('pago.index',array($pago->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $pago= pago::findOrFail($id);
        $pago->delete();

        session::flash('message','pago eliminado de los registros');
        return redirect()->route('pago.index');
    }

    public function viewdos()
    {
        /*FECHA DE AHORA*/
        $date = Carbon::now();
        $date = $date->format('Y-m-d');


        /*CONSULTA ORDENADA QUE TRAE EL USER_FK Y LA FECHA DE EXPIRA DE CADA USUARIO , A UNA SEMANA DE VENCER*/
        $subquery = DB::table('pago')
            ->select(DB::raw('user_fk, max(fechaexpira) as fecha1'))
            ->groupby('user_fk')
            ->toSql();

        $pago= Pago::from('pago as p' )
            ->select('p.id', 'p.user_fk', 'p.fechaexpira', 'tipopago','monto')
            ->join(DB::raw("({$subquery}) as j"), 'p.user_fk','=', 'j.user_fk')
            ->whereRaw('p.fechaexpira = j.fecha1')
            ->whereraw("DATEDIFF(fechaexpira, '$date')= '2'")

            ->get();


        /* FUNCION QUE DEVUELVE EL TOTAL DE DINERO*/
        $total= 0;
        foreach($pago as $pagos)
        {
            $total= $total + $pagos['monto'];
        }


        $data = array(
            'var__' =>'pago/correo2'
        );
        return view('pago.expira', compact ('pago','total','data'));
    }

    public function dos()
    {
        /*FECHA DE AHORA*/
        $date = Carbon::now();
        $date = $date->format('Y-m-d');

        /*CONSULTA ORDENADA QUE TRAE EL USER_FK Y LA FECHA DE EXPIRA DE CADA USUARIO , A 2 dias DE VENCER*/
        $subquery = DB::table('pago')
            ->select(DB::raw('user_fk, max(fechaexpira) as fecha1'))
            ->groupby('user_fk')
            ->toSql();

        $query = DB::table('pago as p' )
            ->select('p.user_fk', 'p.fechaexpira')
            ->join(DB::raw("({$subquery}) as j"), 'p.user_fk','=', 'j.user_fk')
            ->whereRaw('p.fechaexpira = j.fecha1')
            ->whereraw("DATEDIFF(fechaexpira, '$date')= '2'")
            ->get();
        $arreglo= array();
        /*GUARDAR LA QUERY EN ARREGLO*/
        foreach($query as $usuarios)
        {
            $arreglo[]=(array)$usuarios;
        }

        /*SELECCIONAR EL USUARIO DEPENDIENDO EL USER_FK DE CADA ARREGLO*/
        foreach ($arreglo as $a) {
            $user[] = User::select('name', 'email')->where('id', $a['user_fk'])->first();
        }

        /*MANDAR CORREO A USUARIO*/
        if($arreglo != null) {

            foreach ($user as $users) {
                Mail::send('mail.template', ['users' => $users], function ($message) use ($users) {

                    $message->from('pagos@crossfitpocuro.com', 'Pagos');

                    $message->subject('Alerta CrossFit Pocuro ');

                    $message->to($users->email, $users->name);

                });
            }
            return view('mail.success');
        }
        return view('mail.mal');
    }

    public function cuatro()
    {
        /*FECHA DE AHORA*/
        $date = Carbon::now();
        $date = $date->format('Y-m-d');

        /*CONSULTA ORDENADA QUE TRAE EL USER_FK Y LA FECHA DE EXPIRA DE CADA USUARIO , A 4 dias DE VENCER*/
        $subquery = DB::table('pago')
            ->select(DB::raw('user_fk, max(fechaexpira) as fecha1'))
            ->groupby('user_fk')
            ->toSql();

        $query = DB::table('pago as p' )
            ->select('p.user_fk', 'p.fechaexpira')
            ->join(DB::raw("({$subquery}) as j"), 'p.user_fk','=', 'j.user_fk')
            ->whereRaw('p.fechaexpira = j.fecha1')
            ->whereraw("DATEDIFF(fechaexpira, '$date')= '4'")
            ->get();
        $arreglo= array();
        /*GUARDAR LA QUERY EN ARREGLO*/
        foreach($query as $usuarios)
        {
            $arreglo[]=(array)$usuarios;
        }

        /*SELECCIONAR EL USUARIO DEPENDIENDO EL USER_FK DE CADA ARREGLO*/
        foreach ($arreglo as $a) {
            $user[] = User::select('name', 'email')->where('id', $a['user_fk'])->first();
        }

        /*MANDAR CORREO A USUARIO*/
        if($arreglo != null) {
            foreach ($user as $users) {
                Mail::send('mail.template', ['users' => $users], function ($message) use ($users) {

                    $message->from('pagos@crossfitpocuro.com', 'Pagos');

                    $message->subject('Alerta CrossFit Pocuro ');

                    $message->to($users->email, $users->name);

                });
            }
            return view('mail.success');
        }
        return view ('mail.mal');
    }


    public function viewcuatro()
    {
        /*FECHA DE AHORA*/
        $date = Carbon::now();
        $date = $date->format('Y-m-d');
        
        /*CONSULTA ORDENADA QUE TRAE EL USER_FK Y LA FECHA DE EXPIRA DE CADA USUARIO , A UNA SEMANA DE VENCER*/
        $subquery = DB::table('pago')
            ->select(DB::raw('user_fk, max(fechaexpira) as fecha1'))
            ->groupby('user_fk')
            ->toSql();

        $pago= Pago::from('pago as p' )
            ->select('p.id', 'p.user_fk', 'p.fechaexpira', 'tipopago', 'monto')
            ->join(DB::raw("({$subquery}) as j"), 'p.user_fk','=', 'j.user_fk')
            ->whereRaw('p.fechaexpira = j.fecha1')
            ->whereraw("DATEDIFF(fechaexpira, '$date')= '4'")

            ->get();

        /* FUNCION QUE DEVUELVE EL TOTAL DE DINERO*/
        $total= 0;
        foreach($pago as $pagos)
        {
            $total= $total + $pagos['monto'];
        }

        $data = array(
            'var__' =>'pago/correo4'
        );
        return view('pago.expira', compact ('pago','total','data'));
    }

    public function viewsemana()
    {

        /*FECHA DE AHORA*/
        $date = Carbon::now();
        $date = $date->format('Y-m-d');


        /*CONSULTA ORDENADA QUE TRAE EL USER_FK Y LA FECHA DE EXPIRA DE CADA USUARIO , A UNA SEMANA DE VENCER*/
        $subquery = DB::table('pago')
            ->select(DB::raw('user_fk, max(fechaexpira) as fecha1'))
            ->groupby('user_fk')
            ->toSql();

        $pago= Pago::from('pago as p' )
            ->select('p.id', 'p.user_fk', 'p.fechaexpira', 'tipopago','monto')
            ->join(DB::raw("({$subquery}) as j"), 'p.user_fk','=', 'j.user_fk')
            ->whereRaw('p.fechaexpira = j.fecha1')
            ->whereraw("DATEDIFF(fechaexpira, '$date')= '7'")

            ->get();


        $total= 0;
        foreach($pago as $pagos)
        {
            $total= $total + $pagos['monto'];
        }

        $data = array(
            'var__' =>'pago/correo7'
        );
        return view('pago.expira', compact ('pago','total','data'));
    }
    public function semana()
    {
        /*FECHA DE AHORA*/
        $date = Carbon::now();
        $date = $date->format('Y-m-d');


        /*CONSULTA ORDENADA QUE TRAE EL USER_FK Y LA FECHA DE EXPIRA DE CADA USUARIO , A UNA SEMANA DE VENCER*/
        $subquery = DB::table('pago')
            ->select(DB::raw('user_fk, max(fechaexpira) as fecha1'))
            ->groupby('user_fk')
            ->toSql();

        $query = DB::table('pago as p' )
            ->select('p.user_fk', 'p.fechaexpira')
            ->join(DB::raw("({$subquery}) as j"), 'p.user_fk','=', 'j.user_fk')
            ->whereRaw('p.fechaexpira = j.fecha1')
            ->whereraw("DATEDIFF(fechaexpira, '$date')= '7'")
            ->get();


        $arreglo= array();
        /*GUARDAR LA QUERY EN ARREGLO*/
        foreach($query as $usuarios)
        {
            $arreglo[]=(array)$usuarios;
        }

        /*SELECCIONAR EL USUARIO DEPENDIENDO EL USER_FK DE CADA ARREGLO*/
        foreach ($arreglo as $a) {
            $user1[] = User::select('name', 'email')->where('id', $a['user_fk'])->first();
        }



        /*MANDAR CORREO A USUARIO*/
        if($arreglo != null){
            foreach ($user1 as $users){
                Mail::send('mail.template', ['users' => $users], function ($message) use ($users){

                    $message->from('pagos@crossfitpocuro.com','Pagos');

                    $message->subject('Alerta CrossFit Pocuro ');

                    $message->to($users->email, $users->name);

                });
            }
            

            return view('mail.success');
        }
        return view('mail.mal');
    }

    public function select()
    {
        return view('pago.selectexpira');
    }

    public function morosos()
    {

        /*FECHA DE AHORA*/
        $date = Carbon::now();
        $date = $date->format('Y-m-d');


        /* FUNCION QUE MUESTRA A LOS USUARIOS MOROSOS*/
        $pago = Pago::from('pago as p')
            ->select(DB::raw('p.user_fk, p.id, tipopago, p.fechaexpira, monto'))
            ->groupby('user_fk')
            ->havingRaw(DB::raw("max(fechaexpira) < '$date'"))
            ->get();


        /*GUARDAR EL MONTO TOTAL DE LOS USUARIOS MOROSOS*/
        $total= 0;
        foreach($pago as $pagos)
        {
            $total= $total + $pagos['monto'];
        }
    

        

        $data = array(
            'var__' =>'pago/morosos'
        );
        return view('pago.expira', compact('pago','total','data'));
    }

    public function aldia()
    {

        /*FECHA DE AHORA*/
        $date = Carbon::now();
        $date = $date->format('Y-m-d');


        /* FUNCION QUE DEVUELVE USUARIOS AL DIA:lista*/
        $pago = Pago::from('pago as p')
            ->select(DB::raw("max(fechaexpira) as fechaexpira, p.user_fk, p.id, tipopago, monto"))
            ->groupby('user_fk')
            ->where('fechaexpira', '>=', $date)
            ->get();


        /* FUNCION QUE DEVUELVE EL TOTAL DE DINERO*/
        $total= 0;
        foreach($pago as $pagos)
        {
            $total= $total + $pagos['monto'];
        }


        $data = array(
            'var__' =>'pago/aldia'
        );

        return view('pago.expira', compact('pago','total','data'));
    }

    public function mensualvista()
    {
        $selected= array();
        return view('pago.mensual', compact('selected'));
    }
    
    public function mensual(Request $request)
    {
        $month=$request->mes;
        $year=$request->año;

        $pago = Pago::from('pago')
            ->select(DB::raw("tipopago, user_fk, fechaexpira, created_at, SUM(monto) as monto"))
            ->wheremonth('created_at','=', $month)
            ->whereyear('created_at','=',$year)
            ->get()
         ;


        return view('pago.mensual2', compact('pago','month','year'));
    }


}
