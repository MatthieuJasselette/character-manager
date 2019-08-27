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
        // $characters = $this->character;
        // $filteredCharacters = foreach ($characters as $character) {
        //     return [
        //     'id' => $this->character->id,
        //     'name' => $this->character->name,
        //     'description' => $this->character->description
        //     ];
        // }

        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'email'         => $this->email,
            'is_available'  => $this->is_available,
            'main_char_id'  => $this->main_char_id,
            'characters'    =>  $this->character
        ];
    }
}
