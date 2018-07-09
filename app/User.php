<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    const USER_ACTIVE = 0;
    const USER_UNACTIVE = 1;

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
        'password', 'remember_token',
    ];


    public function order()
    {
        return $this->hasMany('App\ShoppingCart\Order');
    }

    public function invoice()
    {
        return $this->hasOne('App\UserInvoiceData','user_id', 'id' );
    }

    public function account()
    {
        return $this->hasOne('App\UserData', 'user_id', 'id');
    }

    public function isAdmin()
    {
        return $this->is_admin; // this looks for an admin column in your users table
    }

    public function isBanned()
    {
        return $this->ban; // this looks for an admin column in your users table
    }
}
