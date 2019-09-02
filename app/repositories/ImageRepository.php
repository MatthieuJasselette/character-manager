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
          $image->name = $path;
          $image->user_id = $request->user_id;
          $request->user()->image()->save($image);
      }
      
      // public function destroy(Request $request, Image $image)
      // {
      //     if ($request->user()->id !== $image->user_id) {
      //         return response()->json(['error' => 'You can only delete your own image.'], 403);
      //     }

      //     $image->delete();
      // }
  }