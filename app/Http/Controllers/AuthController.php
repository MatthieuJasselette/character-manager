<?php

namespace App\Http\Controllers;

use App\User;
use App\Image;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $user = User::create([
            'name'          => $request->name,
            'email'         => $request->email,
            'password'      => $request->password,
            'is_available'  => $request->is_available
         ]);

        $image = Image::create([
            'name'      => 'http://localhost:8000/thumbs/default_logo.png',
            // pas bien !
            'user_id'   => $user->id
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