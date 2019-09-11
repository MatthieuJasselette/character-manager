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
        // replace stored img & thumbs
            // delete old
        if($oldImage->name !== 'default_logo.jpg'){
            Storage::disk('public')->delete(['images/'.$oldImage->name, 'thumbs/'.$oldImage->name]);
        }
            // create new
        $path = basename ($request->file->store('images'));

        $image = InterventionImage::make ($request->file)->widen (500)->encode ();
        Storage::put ('thumbs/' . $path, $image);

        // update oldImage
        $oldImage->update(['name' => $path]);
      }
  }