<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Aspiration extends Model
{
    use HasFactory;

    protected $fillable = [
        'destination_id',
        'name',
        'phone',
        'content',
        'image',
        'custom_category',
        'aspiration_category_id',
    ];

    /**
     * Get the user that owns the Aspiration
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function aspirationCategory(): BelongsTo
    {
        return $this->belongsTo(AspirationCategory::class, 'aspiration_category_id', 'id');
    }

    /**
     * Get the user that owns the Aspiration
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function destination(): BelongsTo
    {
        return $this->belongsTo(Destination::class, 'destination_id', 'id');
    }
}
