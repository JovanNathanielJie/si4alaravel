<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Prodi;

class ProdiPolicy
{
    /**
     * Determine whether the user can view any prodi.
     */
    public function viewAny(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can view the prodi.
     */
    public function view(User $user, Prodi $prodi)
    {
        return false;
    }

    /**
     * Determine whether the user can create prodi.
     */
    public function create(User $user)
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can update the prodi.
     */
    public function update(User $user, Prodi $prodi)
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can delete the prodi.
     */
    public function delete(User $user, Prodi $prodi)
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can restore the prodi.
     */
    public function restore(User $user, Prodi $prodi)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the prodi.
     */
    public function forceDelete(User $user, Prodi $prodi)
    {
        return false;
    }
}
