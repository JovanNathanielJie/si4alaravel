<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Sesi;

class SesiPolicy
{
    /**
     * Determine whether the user can view any sesi.
     */
    public function viewAny(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can view the sesi.
     */
    public function view(User $user, Sesi $sesi)
    {
        return false;
    }

    /**
     * Determine whether the user can create sesi.
     */
    public function create(User $user)
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can update the sesi.
     */
    public function update(User $user, Sesi $sesi)
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can delete the sesi.
     */
    public function delete(User $user, Sesi $sesi)
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can restore the sesi.
     */
    public function restore(User $user, Sesi $sesi)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the sesi.
     */
    public function forceDelete(User $user, Sesi $sesi)
    {
        return false;
    }
}
