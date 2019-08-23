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
        $filteredUser = [
            'id' => $this->user->id,
            'name' => $this->user->name,
            'is_available' => $this->user->is_available
        ];
        
        return [
            
            'name' => $this->name,
            'description' => $this->description,
            'build_url' => $this->build_url,
            'user' => $filteredUser,
            // 'user' => $this->user,
            // 'is_main' => $this->is_main
        ];
    }
}
