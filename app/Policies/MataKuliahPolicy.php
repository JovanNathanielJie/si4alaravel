<?php

namespace App\Policies;

use App\Models\User;
use App\Models\MataKuliah;

class MataKuliahPolicy
{
    /**
     * Determine whether the user can view any mata kuliah.
     */
    public function viewAny(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can view the mata kuliah.
     */
    public function view(User $user, MataKuliah $mataKuliah)
    {
        return false;
    }

    /**
     * Determine whether the user can create mata kuliah.
     */
    public function create(User $user)
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can update the mata kuliah.
     */
    public function update(User $user, MataKuliah $mataKuliah)
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can delete the mata kuliah.
     */
    public function delete(User $user, MataKuliah $mataKuliah)
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can restore the mata kuliah.
     */
    public function restore(User $user, MataKuliah $mataKuliah)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the mata kuliah.
     */
    public function forceDelete(User $user, MataKuliah $mataKuliah)
    {
        return false;
    }
}
