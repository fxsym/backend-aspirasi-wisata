<?php

namespace App\Policies;

use App\Models\DestinationCategory;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class DestinationCategoryPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, DestinationCategory $destinationCategory): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response
    {
        return $user->role === 'admin'
            ? Response::allow()
            : Response::deny('Maaf, hanya admin yang diperbolehkan menambahkan kategori destinasi.');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, DestinationCategory $destinationCategory): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, DestinationCategory $destinationCategory): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, DestinationCategory $destinationCategory): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, DestinationCategory $destinationCategory): bool
    {
        return false;
    }
}
