<?php

namespace App\Http\Controllers\Api;

use App\Models\Users\Cleb;
use App\Models\Users\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users =  UserResource::collection(User::all());

        $data = ['data' => $users];

        return response()->json($data);

        // $json = json_decode('{
        //     "responsive_id": "",
        //     "id": 1,
        //     "full_name": "Galen Slixby",
        //     "role": "Editor",
        //     "username": "gslixby0",
        //     "email": "gslixby0@abc.net.au",
        //     "current_plan": "Enterprise",
        //     "status": 3,
        //     "avatar": ""
        //   }');

        // return response()->json($json);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Users\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Users\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
