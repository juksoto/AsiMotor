<?php

namespace AsiMotor\Core\Repositories\Vehicle;

use AsiMotor\Core\Entities\Vehicle\AsiClass;
use Illuminate\Database\Eloquent\Model;
use AsiMotor\Core\Helpers;

class ClassRepo extends Model
{
    protected $helpers;
    public function  __construct(Helpers $helpers)
    {
        $this -> helpers = $helpers;
    }

    public function get()
    {
        return AsiClass::orderBy('vehicle_class' ,'ASC')
            -> where ( 'active' , true )
            -> get();
    }
}

