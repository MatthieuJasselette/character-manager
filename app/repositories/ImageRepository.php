<?php

  namespace App\Repositories;

  use App\Images;
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
          $image = new Images;
          $image->name = $path;
          $image->user_id = $request->user_id;
          $request->user()->images()->save($image);
      }
      
      // public function destroy(Request $request, Images $images)
      // {
      //     if ($request->user()->id !== $images->user_id) {
      //         return response()->json(['error' => 'You can only delete your own image.'], 403);
      //     }

      //     $images->delete();
      // }
  }