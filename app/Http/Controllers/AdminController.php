<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */


    public function index()
    {
        $users= User::paginate(5);
        $users->setPath('users') ;

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Requests\CreateUserRequest $request)
    {
        $this->user= new User($request->all());
        $password= bcrypt($request->password);
        $this->user->password=$password;
        $this->user->save();

        return redirect()->route('admin.users.index')->with('message','store');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $user= User::findOrfail($id);

        return view('admin.users.edit',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\EditUserRequest $request, $id)
    {

        $user =User::findOrfail($id);
        $user->fill($request->all());

        if(($request->password)!= null)
        {
        $user->password=bcrypt($request->password);
        }


        $user->save();
        session::flash('message','Usuario editado de los registros');
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id,Request $request)
    {
        $users= User::findOrFail($id);
       $users->delete();

        session::flash('message','Usuario eliminado de los registros');
        return redirect()->route('admin.users.index');
    }
}
