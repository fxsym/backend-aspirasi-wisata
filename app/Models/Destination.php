<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Destination extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'address',
        'maps_link',
        'location',
        'main_image_url',
        'destination_category_id'
    ];

    /**
     * Get the user that owns the Destination
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function destinationCategory(): BelongsTo
    {
        return $this->belongsTo(DestinationCategory::class, 'destination_category_id', 'id');
    }

    /**
     * Get all of the comments for the Destination
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function aspirations(): HasMany
    {
        return $this->hasMany(Aspiration::class, 'destination_id', 'id');
    }

    /**
     * Get all of the comments for the Destination
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function destinationGalleryImages(): HasMany
    {
        return $this->hasMany(DestinationGalleryImage::class, 'destination_id', 'id');
    }
}