<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;

class UserController extends Controller
{
    public function index()
    {
        return User::paginate();
    }

    public function show(User $user)
    {
        return $user;
    }
    
    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        
        return $user;
    }

    public function __construct()
    {
      $this->middleware('auth:api')->except(['index', 'show']);
    }
}
