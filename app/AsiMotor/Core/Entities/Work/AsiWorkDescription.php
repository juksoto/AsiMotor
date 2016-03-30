<?php

namespace AsiMotor\Core\Entities\Work;

use Illuminate\Database\Eloquent\Model;

class AsiWorkDescription extends Model
{
    protected $table = 'asi_work_descriptions';

    protected $fillable = [
        'description',
        'active',
    ];
}
