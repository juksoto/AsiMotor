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
        return AsiMake::orderBy('country' ,'ASC')
            -> where ( 'active' , true )
            -> get();
    }

    /**
     * Valida si en el request cuantas variables hay  con el nombre make_n existen.
     * Guarda en una array los valores y los devuelve a la transaccion.
     * @param $request array todos los valores del formulario. Convertirmos en un objeto.
     * @return array
     */
    public function resolveContentMake($request)
    {
        // Convertimos en un objeto
        $req = (object)$request;

        $makeArray = Array();
        $totalMake = $req ->num_vehicle_make;

        for ($i = 0; $i <= $totalMake; $i++)
        {
            $makeVehicle = "make_". $i;
            array_push($makeArray ,$req -> $makeVehicle);
        }

        return $makeArray;
    }
}

