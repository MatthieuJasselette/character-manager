<?php

namespace App\Http\Controllers;

// use App\Character;
use App\User;
use App\Http\Resources\UserCollection;
use Illuminate\Http\Request;

class RaidController extends Controller
{
    public function index(): UserCollection
    {
        $user = User::where('is_available', '=',1)
            ->where('main_char_id', '!=', NULL)
            ->with('mainCharacter')
            ->get();
        
        return new UserCollection($user);

    }
}
