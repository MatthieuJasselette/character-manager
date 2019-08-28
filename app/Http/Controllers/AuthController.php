<?php

namespace App\Http\Controllers;

use App\User;
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
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => $request->password,
            'is_available' => $request->is_available
         ]);

        $token = auth()->login($user);
        $id = $user->id;
        return $this->respondWithToken($token, $id);
    }

    public function login(Request $request)
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $user = User::where("email", "=", $request->email)->first();
        $id = $user->id;
        return $this->respondWithToken($token, $id);
    }

    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    protected function respondWithToken($token, $id)
    {
        return response()->json([
            'id'            => $id,
            'access_token'  => $token,
            'token_type'    => 'bearer',
            'expires_in'    => auth()->factory()->getTTL() * 60
        ]);
    }
}