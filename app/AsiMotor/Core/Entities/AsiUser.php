<?php

namespace AsiMotor\Core\Entities;

use Illuminate\Foundation\Auth\User as Authenticatable;

class AsiUser extends Authenticatable
{
    protected $table = 'asi_users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password','role_id', 'active' ,
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

}
