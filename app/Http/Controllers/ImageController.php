<?php

namespace App\Http\Controllers;

use App\Images;
use Illuminate\Http\Request;
use App\Repositories\ImageRepository;
// use App\Http\Resources\ImagesResource;
// use App\Http\Resources\ImagesCollection;

class ImageController extends Controller
{
    protected $repository;

    public function __construct(ImageRepository $repository)
    {
        $this->repository = $repository;
        $this->middleware('auth:api');
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

        $this->repository->store($request);

        return response()->json("Your image was successfully stored.");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Images $images
     * @return \Illuminate\Http\Response
     */
    
    public function destroy(Request $request, Images $images)
    {
        dd($images);
        // $image is undefined
        // $this->repository->destroy($request, $image);
        if ($request->user()->id !== $images->user_id) {
            return response()->json(['error' => 'You can only delete your own image.'], 403);
        }
  
        $images->delete();

        return response()->json("Your image was successfully removed.");
    }
}
