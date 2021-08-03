<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Contracts\Auth\Authenticatable;
// use Jenssegers\Mongodb\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class AdminUser extends Eloquent implements Authenticatable
{
    use AuthenticatableTrait, HasFactory, Notifiable;

    // protected $connection = 'mongodb';

    protected $collection = "admin_users";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
        * The attributes that should be hidden for arrays.
        *
        * @var array
    */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
