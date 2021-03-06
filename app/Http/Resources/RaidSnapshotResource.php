<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RaidSnapshotResource extends JsonResource
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
            'id'        => $this->id,
            'composition'  => unserialize($this->snapshot),
            'date'      => substr($this->created_at,0,10)
        ];
    }
}
