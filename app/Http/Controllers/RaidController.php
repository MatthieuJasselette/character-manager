<?php

namespace App\Http\Controllers;

use App\Character;
use App\Http\Resources\CharacterCollection;
use Illuminate\Http\Request;

class RaidController extends Controller
{
    public function index(): CharacterCollection
    {
        return new CharacterCollection(Character::paginate());
    }
}
