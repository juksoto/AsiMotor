<?php

namespace AsiMotor\Core\Entities\Vehicle;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class AsiMake extends Model
{
    protected $table = 'asi_vehicle_makes';

    use Sortable;

    protected $fillable = [
        'vehicle_make',
        'active'
    ];

    protected $sortable = [
        'vehicle_make',
    ];
    /**
     * Retorna las  similitudes conforme a la cadena que se recibe como parametro.
     * @param $query
     * @param $name string Nombre del pais que escribieron en el campo search
     * @return mixed
     */
    public function scopeCountryName($query, $name)
    {
        $name = ucwords(strtolower($name));

        if (trim($name) != "")
        {
            $query -> where('country',"ILIKE", "%$name%");
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
