<?php

namespace AsiMotor\Core\Entities\Privilege;

use Illuminate\Database\Eloquent\Model;

class AsiPrivilege extends Model
{
    protected $table = 'asi_privileges';

    protected $fillable = [
        'privileges',
        'active'
    ];

}
