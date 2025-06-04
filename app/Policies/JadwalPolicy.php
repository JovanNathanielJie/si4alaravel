<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Jadwal;

class JadwalPolicy
{
    /**
     * Determine whether the user can view any jadwal
     */
    public function viewAny(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can view the jadwal
     */
    public function view(User $user, Jadwal $jadwal)
    {
        return false;
    }

    /**
     * Determine whether the user can create jadwal
     */
    public function create(User $user)
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can update the jadwal
     */
    public function update(User $user, Jadwal $jadwal)
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can delete the jadwal
     */
    public function delete(User $user, Jadwal $jadwal)
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can restore the jadwal
     */
    public function restore(User $user, Jadwal $jadwal)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the jadwal
     */
    public function forceDelete(User $user, Jadwal $jadwal)
    {
        return false;
    }
}
