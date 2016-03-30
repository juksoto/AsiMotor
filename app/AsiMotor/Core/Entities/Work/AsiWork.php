<?php

namespace AsiMotor\Core\Entities\Work;

use Illuminate\Database\Eloquent\Model;

class AsiWork extends Model
{
    protected $table = 'asi_works';

    protected $fillable = [
        'vehicle_class',
        'number_identification',
        'title',
        'description_short',
        'date',
        'observations',
        'notes',
        'url_pdf',
        'vehicle_id',
        'work_descriptions_id',
        'work_types_id',
        'active',
    ];
}
