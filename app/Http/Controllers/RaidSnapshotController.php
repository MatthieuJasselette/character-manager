<?php

namespace App\Http\Controllers;

use App\RaidSnapshot;
use Illuminate\Http\Request;
use App\Http\Resources\RaidSnapshotResource;
use App\Http\Resources\RaidSnapshotCollection;

class RaidSnapshotController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth:api')->except(['index', 'show']);
    }

    public function index(): RaidSnapshotCollection
    {
        return new RaidSnapshotCollection(RaidSnapshot::paginate());
    }

    public function show(RaidSnapshot $raidsnapshot): RaidSnapshotResource
    {
        return new RaidSnapshotResource($raidsnapshot);
    }

    public function store(Request $request): RaidSnapshotResource
    {
        $request->validate([
          'snapshot'        => 'required',
        ]);
        
        $request['user_id'] = $request->user()->id;

        $Raidsnapshot = RaidSnapshot::create($request->all());

        return new RaidSnapshotResource($Raidsnapshot);
    }

    public function destroy( RaidSnapshot $raidsnapshot)
    {
        $raidsnapshot->delete();

        return response()->json();
    }
}
