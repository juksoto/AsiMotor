<?php

namespace AsiMotor\Core\Repositories\Vehicle;

use AsiMotor\Core\Entities\Vehicle\AsiMake;
use Illuminate\Database\Eloquent\Model;
use AsiMotor\Core\Helpers;

class MakeRepo extends Model
{
    protected $helpers;
    public function  __construct(Helpers $helpers)
    {
        $this -> helpers = $helpers;
    }

    public function get()
    {
        return AsiMake::orderBy('vehicle_make' ,'ASC')
            -> where ( 'active' , true )
            -> get();
    }

}

