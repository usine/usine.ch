<?php

namespace App\Policies;

use App\Bla;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlaPolicy
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
     * @param  \App\Bla  $bla
     * @return mixed
     */
    public function view(?User $user, Bla $bla)
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
     * @param  \App\Bla  $bla
     * @return mixed
     */
    public function update(User $user, Bla $bla)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Bla  $bla
     * @return mixed
     */
    public function delete(User $user, Bla $bla)
    {
        return true;
    }
}
