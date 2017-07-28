<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'charity', 'amount', 'currency', 'date', 'user_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user_id',
    ];

    /**
     * Get the user
     *
     * @return User
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
