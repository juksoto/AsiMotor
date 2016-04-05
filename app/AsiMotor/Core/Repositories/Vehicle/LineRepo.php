<?php

namespace AsiMotor\Core\Repositories\Vehicle;

use AsiMotor\Core\Entities\Vehicle\AsiLine;
use Illuminate\Database\Eloquent\Model;
use AsiMotor\Core\Helpers;

class LineRepo extends Model
{
    protected $helpers;

    public function  __construct(Helpers $helpers)
    {
        $this -> helpers = $helpers;
    }

    public function get()
    {
        return AsiLine::orderBy('vehicle_line' ,'ASC')
            -> where ( 'active' , true )
            -> get();
    }
}

