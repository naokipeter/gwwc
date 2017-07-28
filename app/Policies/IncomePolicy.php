<?php

namespace App\Policies;

use App\User;
use App\Income;
use Illuminate\Auth\Access\HandlesAuthorization;

class IncomePolicy
{
    use HandlesAuthorization;

    /**
     * Admin?
     *
     * @param mixed $user
     * @param mixed $ability
     * @return bool|void
     */
    public function before($user, $ability)
    {
        return $user->isAdmin() ?: null;
    }

    /**
     * Determine whether the user can view the income.
     *
     * @param  \App\User  $user
     * @param  \App\Income  $income
     * @return mixed
     */
    public function view(User $user, Income $income)
    {
        return $user->id === $income->user_id;
    }

    /**
     * Determine whether the user can create incomes.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the income.
     *
     * @param  \App\User  $user
     * @param  \App\Income  $income
     * @return mixed
     */
    public function update(User $user, Income $income)
    {
        return $user->id === $income->user_id;
    }

    /**
     * Determine whether the user can delete the income.
     *
     * @param  \App\User  $user
     * @param  \App\Income  $income
     * @return mixed
     */
    public function delete(User $user, Income $income)
    {
        //TODO
    }
}
