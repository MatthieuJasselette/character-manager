<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $filteredImage = [
            'id'        => $this->image->id,
            'name'      => 'http://localhost:8000/thumbs/' . $this->image->name,
            'user_id'   => $this->image->user_id
        ];

        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'email'         => $this->email,
            'is_available'  => $this->is_available,
            'main_char_id'  => $this->main_char_id,
            'characters'    => $this->character,
            'image'         => $filteredImage
        ];
    }
}
