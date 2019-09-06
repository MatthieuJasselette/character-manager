<?php

namespace App\Http\Controllers;

use App\User;
use App\Character;
use App\RaidSnapshot;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DashboardController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth:api');
    }

    // index users raw (no resource)
    public function users(Request $request)
    {
        $request->user()->authorizeRoles(['admims']);
        // add roles ?
        $users = User::paginate();

        return $users;

    }

    // index characters raw
    public function characters(Request $request)
    {
        $request->user()->authorizeRoles(['admims']);
        
        $characters = Character::paginate();

        return $characters;

    }

    // index snapshots raw
    public function snapshots(Request $request)
    {
        $request->user()->authorizeRoles(['admims']);
        
        $snapshots = RaidSnapshot::paginate();

        return $snapshots;

    }

    public function updateRole(Request $request, User $user)
    {
      $request->user()->authorizeRoles(['admims']);
      $validRequest = $request->validate([
        'role' => ['required',
        Rule::in(['admims', 'mims'])]
      ]);
      $role = Role::where('name', $validRequest["role"])->first()->id;
      $user->roles()->sync([$role]);

      return response()->json('User permissions set to '.$validRequest["role"]); 
    }
}
