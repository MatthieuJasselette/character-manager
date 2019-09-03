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
            'file' => 'required|image|max:2000',
        ]);
        $request['user_id'] = $request->user()->id;

        $this->repository->store($request);

        return response()->json("Your image was successfully stored.");
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

        if($image->name !== 'default_logo.png'){
            Storage::disk('public')->delete(['images/'.$image->name, 'thumbs/'.$image->name]);
        }

        $image->delete();

        return response()->json("Your image was successfully removed.");
    }
}
