<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Mahasiswa;

class MahasiswaPolicy
{
    /**
     * Determine whether the user can view any mahasiswa.
     */
    public function viewAny(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can view the mahasiswa.
     */
    public function view(User $user, Mahasiswa $mahasiswa)
    {
        return false;
    }

    /**
     * Determine whether the user can create mahasiswa.
     */
    public function create(User $user)
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can update the mahasiswa.
     */
    public function update(User $user, Mahasiswa $mahasiswa)
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can delete the mahasiswa.
     */
    public function delete(User $user, Mahasiswa $mahasiswa)
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can restore the mahasiswa.
     */
    public function restore(User $user, Mahasiswa $mahasiswa)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the mahasiswa.
     */
    public function forceDelete(User $user, Mahasiswa $mahasiswa)
    {
        return false;
    }
}
