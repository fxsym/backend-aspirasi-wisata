<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DestinationResource extends JsonResource
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
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'address' => $this->address,
            'maps_link' => $this->maps_link,
            'location' => $this->location,
            'main_image_url' => $this->main_image_url,
            'number_of_aspirations' => count($this->aspirations),
            'destination_category' => $this->destinationCategory?->name,
            'destinationGalleryImages' => $this->destinationGalleryImages->pluck('image_url')
        ];
    }
}
