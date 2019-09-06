<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;

class UserController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth:api')->except(['index', 'show']);
    }

    public function index(): UserCollection
    {
        return new UserCollection(User::paginate());
    }

    public function show(User $user): UserResource
    {
        return new UserResource($user);
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Request $request
    * @param  \App\User  $user
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, User $user)
    {
        if ($request->user()->id !== $user->id && !$request->user()->authorizeRoles(['admims']))
        {
            return response()->json(['error' => 'You can only delete your own characters.'], 403);
        }

        $user->update($request->all());



        return $user;
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Request $request
    * @param  \App\User  $user
    * @return \Illuminate\Http\Response
    */
    public function destroy(Request $request, User $user)
    {
        $request->user()->authorizeRoles(['admims']);
        $user->delete();
        // doesn't delete stored img
        return response()->json();
    }
}
