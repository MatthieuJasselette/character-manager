<?php

namespace App\Http\Controllers;

use App\Character;
use App\Http\Resources\CharacterResource;
use App\Http\Resources\CharacterCollection;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth:api')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): CharacterCollection
    {
        return new CharacterCollection(Character::paginate());
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
        ]);
        
        $request['user_id'] = $request->user()->id;

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
    public function update(Request $request, Character $character)
    {
        if ($request->user()->id !== $character->user_id) {

            return response()->json(['error' => 'You can only edit your own characters.'], 403);
        }

        $character->update($request->all());

        return $character;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Character $character)
    {
        dd($character);
        if ($request->user()->id !== $character->user_id) {
            return response()->json(['error' => 'You can only delete your own characters.'], 403);
        }

        $character->delete();

        return response()->json();
    }
}
