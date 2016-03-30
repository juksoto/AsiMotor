<?php

namespace AsiMotor\Core\Entities\Work;

use Illuminate\Database\Eloquent\Model;

class AsiWorkType extends Model
{
    protected $table = 'asi_work_types';

    protected $fillable = [
        'type_work',
        'active',
    ];
}
