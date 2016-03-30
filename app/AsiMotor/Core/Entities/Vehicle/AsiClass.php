<?php

namespace AsiMotor\Core\Entities\Vehicle;

use Illuminate\Database\Eloquent\Model;

class AsiClass extends Model
{
    protected $table = 'asi_vehicle_classes';

    protected $fillable = [
        'vehicle_class',
        'active'
    ];

}
