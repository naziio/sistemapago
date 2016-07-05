<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Pago;
use Carbon\Carbon;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    
    public function admin()
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

    


        /* FUNCION QUE MUESTRA A LOS USUARIOS MOROSOS*/
        $morosos = Pago::from('pago as p')
            ->select(DB::raw('p.user_fk, p.id, tipopago, p.fechaexpira, monto'))
            ->groupby('user_fk')
            ->havingRaw(DB::raw("max(fechaexpira) < '$date'"))
            ->get();



        return view('admin.index', compact('pago','morosos'));
    }
}
