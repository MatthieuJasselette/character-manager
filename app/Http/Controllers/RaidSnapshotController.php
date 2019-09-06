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
        $request->user()->authorizeRoles(['admims']);
        $request->validate([
        //   'snapshot'        => 'required',
        ]);

        $Raidsnapshot = new RaidSnapshot(
        );
        $Raidsnapshot->snapshot = serialize($request->snapshot);
        $Raidsnapshot->save();

        return new RaidSnapshotResource($Raidsnapshot);
    }

    public function destroy( RaidSnapshot $raidsnapshot)
    {
        $request->user()->authorizeRoles(['admims']);
        $raidsnapshot->delete();

        return response()->json();
    }
}
