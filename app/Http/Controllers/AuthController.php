<?php

namespace App\Http\Controllers;

use App\User;
use App\Image;
use App\Role;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        if($request->is_available == true){
            $request->is_available = 1;
        } elseif ($request->is_available == false) {
            $request->is_available = 0;
        }

        $user = User::create([
            'name'          => $request->name,
            'email'         => $request->email,
            'password'      => $request->password,
            'is_available'  => $request->is_available
         ]);
         $user
            ->roles()
            ->attach(Role::where('name', 'mims')->first());

        $image = Image::create([
            'name'      => 'default_logo.jpg',
            'user_id'   => $user->id
        ]);

        $token = auth()->login($user);
        $id = $user->id;
        $role = $user->roles->first()->name;
        return $this->respondWithToken($token, $id, $role);
    }

    public function login(Request $request)
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $user = User::where("email", "=", $request->email)->first();
        $id = $user->id;
        $role = $user->roles->first()->name;        
        return $this->respondWithToken($token, $id, $role);
    }

    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    protected function respondWithToken($token, $id, $role)
    {
        return response()->json([
            'id'            => $id,
            'role'          => $role,
            'access_token'  => $token,
            'token_type'    => 'bearer',
            'expires_in'    => auth()->factory()->getTTL() * 60
        ]);
    }
}