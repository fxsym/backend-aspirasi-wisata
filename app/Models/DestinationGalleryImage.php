<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DestinationGalleryImage extends Model
{
    use HasFactory;

    protected $fillable = ['destination_id', 'image_url'];

    /**
     * Get the user that owns the DestinationGalleryImage
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function destination(): BelongsTo
    {
        return $this->belongsTo(Destination::class, 'destination_id', 'id');
    }
}
