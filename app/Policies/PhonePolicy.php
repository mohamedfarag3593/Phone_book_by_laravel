<?php

namespace App\Policies;

use App\Phone;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class PhonePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->id === Auth::id();
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Phone  $phone
     * @return mixed
     */
    public function view(User $user, Phone $phone)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->id === Auth::id();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Phone  $phone
     * @return mixed
     */
    public function update(User $user, Phone $phone)
    {
        return $user->id == $phone->user_id ? Response::allow() : Response::deny('You Do not Have Permission....');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Phone  $phone
     * @return mixed
     */
    public function delete(User $user, Phone $phone)
    {
        return $user->id == $phone->user_id ? Response::allow() : Response::deny('You Do not Have Permission....');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Phone  $phone
     * @return mixed
     */
    public function restore(User $user, Phone $phone)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Phone  $phone
     * @return mixed
     */
    public function forceDelete(User $user, Phone $phone)
    {
        //
    }
}
