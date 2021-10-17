<?php

namespace App\Http\Controllers\System;

use App\Models\Users\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\System\UserController;
use App\Http\Controllers\Auth\RegisterController;

class ClebController extends UserController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageConfigs    = ['pageHeader' => false];
        $roles          = Role::all()->pluck('name','id');
        $states         = User::getStatesFor('state');

        return view('/content/apps/cleb/index', compact('pageConfigs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'  => ['required', 'string', 'min:8'],
        ]);

        User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' =>  Hash::make(request('user-password')),
        ])->roles()->sync(request('roles'));


        return redirect()->route('system.users.index')->with('status','Usuario creado exitosamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Users\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Users\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {   
        $user->load('data');

        $roles  = Role::all()->pluck('name','id');
        $states = User::getStatesFor('state');

        return view('/content/apps/user/app-user-edit', compact('user','roles','states'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Users\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {



        $user->update([
            'name'      => request('name'),
            'email'     => request('email'),
            'state'    =>  request('state'),
        ]); 


        return redirect()->route('system.users.edit',compact('user'))->with('status','Usuario actualizado exitosamente');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Users\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return true;
    }
}
