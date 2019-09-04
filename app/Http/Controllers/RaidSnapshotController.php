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

    public function show(RaidSnapshot $raidSnapshot): RaidSnapshotResource
    {
        // dd($raidSnapshot);
        return new RaidSnapshotResource ($raidSnapshot);
    }

    public function store(Request $request)
    {
        // $required->validate([
        //     'snapshot' => 'required'
        // ]);

        $raidSnapshot = RaidSnapshot::create($request->all());

        return $raidSnapshot;
    }

    public function destroy(RaidSnapshot $raidSnapshot)
    {
        $raidSnapshot->delete();

        return response()->json();
    }
}
