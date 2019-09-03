<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use App\Repositories\ImageRepository;
use Illuminate\Support\Facades\Storage;
// use App\Http\Resources\ImageResource;
// use App\Http\Resources\ImageCollection;

class ImageController extends Controller
{
    protected $repository;

    public function __construct(ImageRepository $repository)
    {
        $this->repository = $repository;
        $this->middleware('auth:api');
        $this->endPoint = "http://localhost:8000/thumbs/";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2000',
        ]);
        $request['user_id'] = $request->user()->id;

        $this->repository->store($request, $this->endPoint);

        return response()->json("Your image was successfully stored.");
    }

    public function update(Request $request, Image $image)
    {
        // dd($request->user()->id. " /\ " . $image); //runs
        // displays similar data because psotman doesn't allow formdata
        // for update -> needt to find a way to send file via raw submit
        if ($request->user()->id !== $image->user_id) {
            return response()->json(['error' => 'You can only update your own image.'], 403);
        }

        $this->destroy($request, $image); // runs
        
        $this->repository->store($request);

        return response()->json("Your image was successfully updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image $image
     * @return \Illuminate\Http\Response
     */
    
    public function destroy(Request $request, Image $image)
    {
        if ($request->user()->id !== $image->user_id) {
            return response()->json(['error' => 'You can only delete your own image.'], 403);
        }
        $image->name = str_replace($this->endPoint, "", $image->name);
        // to change !
        Storage::disk('public')->delete(['images/'.$image->name, 'thumbs/'.$image->name]);

        $image->delete();

        return response()->json("Your image was successfully removed.");
    }
}
