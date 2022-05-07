<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Tag;

class PetResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'category' => $this->petCategory,
            'name' => $this->name,
            'photoUrls' => $this->photoUrls,
            'tags' => Tag::whereIn('id', $this->tags)->get(),
            'status' => $this->status,
        ];
    }
}
