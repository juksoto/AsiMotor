<?php

namespace AsiMotor\Core\Repositories\Contact;

use AsiMotor\Core\Entities\Contact\AsiCountry;
use Illuminate\Database\Eloquent\Model;

class CountryRepo extends Model
{
    public function get()
    {
        return AsiCountry::orderBy('country' ,'ASC')
            -> where ( 'active' , true )
            -> get();
    }
}

