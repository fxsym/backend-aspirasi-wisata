<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AspirationCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * Get all of the comments for the AspirationCategory
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function aspirations(): HasMany
    {
        return $this->hasMany(Aspiration::class, 'aspiration_category_id', 'id');
    }
}
