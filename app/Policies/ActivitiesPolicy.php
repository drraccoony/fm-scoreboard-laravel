<?php

namespace App\Policies;

use App\Models\Activities;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ActivitiesPolicy
{
    use HandlesAuthorization;

    /**
     * Default global allow for admins
     *
     * @param User $user
     * @param any $ability
     * @return bool|null
     */
    public function before(User $user, $ability)
    {
        if ($user->is_admin) {
            return true;
        }
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Activities  $activities
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Activities $activities)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Activities  $activities
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Activities $activities)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Activities  $activities
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Activities $activities)
    {
        return false;
    }

    /**
     * Determine whether the user can store the model.
     *
     * @param User $user
     * @return bool
     */
    public function store(User $user) {
        return false;
    }
}
