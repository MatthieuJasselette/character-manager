<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;

class UserController extends Controller
{
    public function index(): UserCollection
    {
        return new UserCollection(User::paginate());
    }

    public function show(User $user): UserResource
    {
        return new UserResource($user);
    }
    
    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        
        return $user;
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Character  $character
    * @return \Illuminate\Http\Response
    */
    public function destroy(User $user)
    {
        $user->delete();

        return response()->json();
    }

    public function __construct()
    {
      $this->middleware('auth:api')->except(['index', 'show']);
    }
}
