<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CharacterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'user' => $this->user,
            'name' => $this->name,
            'description' => $this->description,
            'build_url' => $this->build_url,
            // 'is_main' => $this->is_main
        ];
    }
}
