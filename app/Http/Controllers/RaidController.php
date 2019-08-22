<?php

namespace App\Http\Controllers;

// use App\Character;
use App\User;
use App\Http\Resources\CharacterCollection;
use Illuminate\Http\Request;

class RaidController extends Controller
{
    public function index()
    // public function index(): CharacterCollection
    {
        $user = User::where('is_available',1)->get();
        
        
        return $user;
        // return new CharacterCollection(Character::paginate());
    }
}
