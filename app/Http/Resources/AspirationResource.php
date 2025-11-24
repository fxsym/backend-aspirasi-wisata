<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AspirationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'destination_name' => $this->whenLoaded('destination', fn() => $this->destination->name),
            'destination_category_name' => $this->destination->destinationCategory->name,
            'name' => $this->name,
            'phone' => $this->phone,
            'content' => $this->content,
            'image' => $this->image,
            'custom_category' => $this->custom_category,
            'aspiration_category_id' => $this->aspiration_category_id,
            'aspiration_category' => $this->aspirationCategory,
        ];
    }
}
