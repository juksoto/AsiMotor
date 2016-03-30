<?php

namespace AsiMotor\Core\Entities\Alerts;

use Illuminate\Database\Eloquent\Model;

class AsiAlerts extends Model
{
    protected $table = 'asi_alerts';

    protected $fillable = [
        'title',
        'date_start',
        'date_finished',
        'remember',
        'short_description',
        'observations',
        'vehicle_id',
        'work_id',
        'user_id',
        'type_alert_id',
        'active',
    ];
}
