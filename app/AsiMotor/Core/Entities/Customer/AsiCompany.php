<?php

namespace AsiMotor\Core\Entities\Customer;

use Illuminate\Database\Eloquent\Model;

class AsiCompany extends Model
{
    protected $table = 'asi_companies';

    protected $fillable = [
          'id',
           'name',
           'website',
           'nro_identification',
           'notes',
           'active',
    ];

}
