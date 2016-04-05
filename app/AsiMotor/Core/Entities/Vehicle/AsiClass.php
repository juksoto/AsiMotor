<?php

namespace AsiMotor\Core\Entities\Vehicle;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class AsiClass extends Model
{
    use Sortable;

    protected $table = 'asi_vehicle_classes';

    protected $fillable = [
        'vehicle_class',
        'active'
    ];

    protected $sortable = [
        'vehicle_class',
    ];
    /**
     * Retorna las  similitudes conforme a la cadena que se recibe como parametro.
     * @param $query
     * @param $name string Nombre del pais que escribieron en el campo search
     * @return mixed
     */
    public function scopeClassName($query, $name)
    {
        $name = ucwords(strtolower($name));

        if (trim($name) != "")
        {
            $query -> where('vehicle_class',"ILIKE", "%$name%");
        }
    }

    /**
     * Retorna todos los registros donde el campo active es igual al que enviaron a la funcion.
     * @param $query
     * @param $value boolean valor actual del campo active. Si es "" lo vuelve por defecto true
     * @return mixed
     */
    public function scopeActive($query, $value)
    {

        if ($value == "")
        {
            $value = true;
        }
        return $query -> where('active', $value);
    }

}
