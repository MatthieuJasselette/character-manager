<?php

namespace App\Http\Controllers;

use App\Images;
use Illuminate\Http\Request;
use App\Repositories\ImageRepository;
use App\Http\Resources\ImagesResource;
use App\Http\Resources\ImagesCollection;

class ImageController extends Controller
{
    protected $repository;

    public function __construct(ImageRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index():ImagesCollection
    {
        // $images = $repository->getAllImages ();


        return new ImagesCollection(Images::paginate());
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Images $images): ImagesResource
    {
        return new ImagesResource($images);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
