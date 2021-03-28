<?php

namespace App\Policies;

use App\Models\Vox;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class VoxPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(?User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Vox  $vox
     * @return mixed
     */
    public function view(?User $user, Vox $vox)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Vox  $vox
     * @return mixed
     */
    public function update(User $user, Vox $vox)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Vox  $vox
     * @return mixed
     */
    public function delete(User $user, Vox $vox)
    {
        return true;
    }
}
