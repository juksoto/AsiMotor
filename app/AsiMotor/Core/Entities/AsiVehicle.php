<?php

namespace AsiMotor\Core\Entities;

use Illuminate\Database\Eloquent\Model;

class AsiVehicle extends Model
{
    protected $table = 'asi_vehicles';

    protected $fillable = [
        'license',
        'vehicle_model',
        'color',
        'nro_identification',
        'class_make_line_id',
        'contact_id',
        'active'
    ];

   

}
