<?php

  namespace App\Repositories;

  use App\Image;
  use Illuminate\Http\Request;
  use Illuminate\Support\Facades\Storage;
  use Intervention\Image\Facades\Image as InterventionImage;

  class ImageRepository
  {
      public function store($request)
      {
          // Save image
          $path = basename ($request->image->store('images'));

          // Save thumb
          $image = InterventionImage::make ($request->image)->widen (500)->encode ();
          Storage::put ('thumbs/' . $path, $image);

          // Save in base
          $image = new Image;
          $image->name = 'http://localhost:8000/thumbs/'.$path;
          $image->user_id = $request->user_id;
          $request->user()->image()->save($image);
      }

      public function update($request, $image)
      {
        // dd($request->image. " /\ " . $image); // runs
          // Save image
          $path = basename ($request->image->store('images'));

          // Save thumb
          $image = InterventionImage::make ($request->image)->widen (500)->encode ();
          Storage::put ('thumbs/' . $path, $image);

          // Save in base
        //   $request->user()->image()->save($image);
        $image->name = 'http://localhost:8000/thumbs/'.$image->name;
        Image::whereRaw('id = $image->id')->update(['name' -> $image->name]);
      }
  }