<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ImagesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return [
        //     "image" => $this->media->getFullUrl() //fails; call function on null
        // ];
        return [
            'id'        => $this->id,
            'name'      => $this->name,
            'user_id'   => $this->user_id
        ];
    }
}
