<?php

namespace App\Http\Controllers;

use App\Character;
use App\Http\Resources\CharacterResource;
use App\Http\Resources\CharacterCollection;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): CharacterCollection
    {
        return new CharacterCollection(Character::all());
    }

       /**
     * Display the specified resource.
     *
     * @param  \App\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function show(Character $character): CharacterResource
    {
        return new CharacterResource($character);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): CharacterResource
    {
        $request->validate([
          'name'        => 'required',
          'build_url'   => 'required',
          'is_main'     => 'required',
        ]);

        $character = Character::create($request->all());

        return new CharacterResource($character);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Character $character): CharacterResource
    {
        $character->update($request->all());

        return new CharacterResource($character);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function destroy(Character $character)
    {
        $character->delete();

        return response()->json();
    }
}
