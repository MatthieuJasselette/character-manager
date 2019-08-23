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
        $filteredUsers = [
            'id' => $this->user->id,
            'name' => $this->user->name,
            'is_available' => $this->user->is_available
        ];
        
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'build_url' => $this->build_url,
            'user' => $filteredUsers,
        ];
    }
}
