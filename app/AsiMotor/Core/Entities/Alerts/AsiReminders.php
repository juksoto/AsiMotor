<?php

namespace AsiMotor\Core\Entities\Alerts;

use Illuminate\Database\Eloquent\Model;

class AsiReminders extends Model
{
    protected $table = 'asi_reminders';

    protected $fillable = [
        'title',
        'date_start',
        'date_finished',
        'remember',
        'short_description',
        'observations',
        'user_id',
        'type_alert_id',
        'active',
    ];
}
