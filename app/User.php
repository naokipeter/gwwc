<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'role'
    ];

    /**
     * Get the donations
     *
     * @return Donation[]
     */
    public function donations()
    {
        return $this->hasMany('App\Donation');
    }

    /**
     * Get the incomes
     *
     * @return Income[]
     */
    public function incomes()
    {
        return $this->hasMany('App\Income');
    }

    /**
     * Generate token
     *
     * @return string
     */
    public function generateToken()
    {
        $this->api_token = str_random(60);
        $this->save();

        return $this->api_token;
    }

    /**
     * Is this user an admin?
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->role === 'ADMIN';
    }
}
