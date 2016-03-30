<?php

namespace AsiMotor\Core\Entities\Alerts;

use Illuminate\Database\Eloquent\Model;

class AsiAlertTypes extends Model
{
    protected $table = 'asi_alert_types';

    protected $fillable = [
        'type_alerts',
        'active',
    ];
}
