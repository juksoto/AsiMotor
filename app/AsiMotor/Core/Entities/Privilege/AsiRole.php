<?php

namespace AsiMotor\Core\Entities\Privilege;

use Illuminate\Database\Eloquent\Model;

class AsiRole extends Model
{
    protected $table = 'asi_roles';

    protected $fillable = [
        'id',
        'role',
        'active'
    ];

}
