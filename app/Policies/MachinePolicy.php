<?php

namespace App\Policies;

use App\Models\Machine;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MachinePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Machine  $machine
     * @return mixed
     */
    public function view(User $user, Machine $machine)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Machine  $machine
     * @return mixed
     */
    public function update(User $user, Machine $machine)
    {
        if ($user->role === 'admin')
            return true;
        return $user->id === $machine->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Machine  $machine
     * @return mixed
     */
    public function delete(User $user, Machine $machine)
    {
        if ($user->role === 'admin')
            return true;
        return $user->id === $machine->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Machine  $machine
     * @return mixed
     */
    public function restore(User $user, Machine $machine)
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Machine  $machine
     * @return mixed
     */
    public function forceDelete(User $user, Machine $machine)
    {
        return true;
    }
}
