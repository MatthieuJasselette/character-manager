<?php

namespace App\Http\Controllers;

// use App\Character;
use App\User;
use App\Character;
use App\Http\Resources\CharacterCollection;
use Illuminate\Http\Request;

class RaidController extends Controller
{

    public function index(): CharacterCollection
    {
        $character = Character::select('characters.*')
            ->join('users', 'characters.user_id', '=', 'users.id')
            ->where('users.is_available', '=', 1)
            ->whereRaw('users.main_char_id = characters.id')
            ->get();

        return new CharacterCollection($character);
    }
}
