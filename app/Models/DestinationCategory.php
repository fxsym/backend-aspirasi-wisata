<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DestinationCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    /**
     * Get all of the comments for the AspirationCategory
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function destinations(): HasMany
    {
        return $this->hasMany(Destination::class, 'destination_category_id', 'id');
    }
}