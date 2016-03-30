<?php

namespace AsiMotor\Core\Entities\Vehicle;

use Illuminate\Database\Eloquent\Model;

class AsiMake extends Model
{
    protected $table = 'asi_vehicle_makes';

    protected $fillable = [
        'vehicle_make',
        'active'
    ];

}
