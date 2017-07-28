<?php

namespace App\Policies;

use App\User;
use App\Donation;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class DonationPolicy
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
     * Determine whether the user can view the donation.
     *
     * @param  \App\User     $user
     * @param  \App\Donation $donation
     * @return mixed
     */
    public function view(User $user, Donation $donation)
    {
        return $user->id === $donation->user_id;
    }

    /**
     * Determine whether the user can see their donations.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function index(User $user)
    {
        return $user->id === Auth::guard('api')->id();
    }

    /**
     * Determine whether the user can create donations.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the donation.
     *
     * @param  \App\User     $user
     * @param  \App\Donation $donation
     * @return mixed
     */
    public function update(User $user, Donation $donation)
    {
        return $user->id === $donation->user_id;
    }

    /**
     * Determine whether the user can delete the donation.
     *
     * @param  \App\User     $user
     * @param  \App\Donation $donation
     * @return mixed
     */
    public function delete(User $user, Donation $donation)
    {
        return $user->id === $donation->user_id;
    }
}
