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
          $path = basename ($request->file->store('images'));

          // Save thumb
          $image = InterventionImage::make ($request->file)->widen (500)->encode ();
          Storage::put ('thumbs/' . $path, $image);

          // Save in base
          $image = new Image;
          $image->name = $path;
          $image->user_id = $request->user_id;
          $request->user()->image()->save($image);
      }

      public function update($request, $oldImage)
      {
        //   check for authorization
        if ($request->user()->id !== $oldImage->user_id) {
            return response()->json(['error' => 'You can only delete your own image.'], 403);
        }

        // replace stored img & thumbs
            // delete old
        if($oldImage->name !== 'default_logo.png'){
            Storage::disk('public')->delete(['images/'.$oldImage->name, 'thumbs/'.$oldImage->name]);
        }
            // create new
                // Save image
        $path = basename ($request->file->store('images'));

                // Save thumb
        $image = InterventionImage::make ($request->file)->widen (500)->encode ();
        Storage::put ('thumbs/' . $path, $image);

        // update oldImage
        $oldImage->update(['name' => $path]);
      }
  }