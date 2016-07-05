<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'role:admin'], function()
{
Route::get('pago/correo7','PagoController@semana'); // envia correo a los usuarios que vencen en 1 semana
Route::get('pago/expira7','PagoController@viewsemana'); //muestra usuarios que vencen en una semana
Route::get('pago/correo4','PagoController@cuatro'); // envia correo a los usuarios que vencen en 4 dias
Route::get('pago/expira4','PagoController@viewcuatro'); //muestra usuarios que vencen en un 4 dias
Route::get('pago/correo2','PagoController@dos'); // envia correo a los usuarios que vencen en 2 dias
Route::get('pago/expira2','PagoController@viewdos'); //muestra usuarios que vencen en 2 dias
Route::get('pago/selectexpira','PagoController@select'); //vista con botones que selecciona lo de arriba
Route::get('pago/morosos','PagoController@morosos'); //usuarios morosos, no envia correo
Route::get('pago/aldia','PagoController@aldia'); //usuarios al dia, no envia correo
route::get('pago/selectexpira', 'PagoController@select'); //index para seleccion de correos
route::get('pago/mensual','PagoController@mensualvista'); // pago ordenados por mes y año
route::post('pago/mensual2','PagoController@mensual'); // pago ordenados por mes y año
route::get('flujo/flujo','FlujoController@flujo'); // Flujo de caja
route::post('flujo/flujo2','FlujoController@viewFlujo'); // pago ordenados por mes y año
route::resource('pago','PagoController');
route::resource('flujo','FlujoController'); //todos los gatos ,add,edit, update, store


Route::get('admin/index','HomeController@admin'); // vista principal
route::resource('admin/users','AdminController');  //agregar usuarios

    
    
});



Route::auth();

Route::get('/home', 'HomeController@index');
