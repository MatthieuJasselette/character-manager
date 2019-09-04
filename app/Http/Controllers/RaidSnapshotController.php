<?php

namespace App\Http\Controllers;

use App\RaidSnapshot;
use Illuminate\Http\Request;
use App\Http\Resources\RaidSnapshotResource ;
use App\Http\Resources\RaidSnapshotCollection ;

class RaidSnapshotController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth:api')->except(['index', 'show']);
    }

    public function index()
    {
        $raidSnapshots = RaidSnapshot::all();
        return $raidSnapshots;
    }

    public function show($id)
    {
       return $snap = RaidSnapshot::find($id);
      
      //  return new RaidSnapshotResource($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'snapshot' => 'required'
        ]);

        $raidSnapshot = RaidSnapshot::create($request->all());

        return $raidSnapshot;
    }

    public function destroy($id)
    {

        RaidSnapshot::find($id)->delete();

        return response()->json();
    }
}
