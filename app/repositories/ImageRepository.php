<?php

    namespace App\Repositories;

    use App\Images;
    use Illuminate\Support\Facades\Storage;
    use Intervention\Image\Facades\Image as InterventionImage;

    class ImageRepository
    {
     public function store($request)
     {
      // Save image; works
      $path = basename ($request->image->store('images'));

      // Save thumb; works
      $image = InterventionImage::make ($request->image)->widen (500)->encode ();
      Storage::put ('thumbs/' . $path, $image);

      // Save in base
      $image = new Images;
      $image->name = $path;
      $image->user_id = $request->user_id;
      $request->user()->images()->save($image);
     }
    }