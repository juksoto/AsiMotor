<?php

namespace AsiMotor\Core\Entities\Vehicle;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class AsiLine extends Model
{
    use Sortable;

    protected $table = 'asi_vehicle_lines';

    protected $fillable = [
        'vehicle_line',
        'active'
    ];

    protected $sortable = [
        'vehicle_line',
    ];
    /**
     * Retorna las  similitudes conforme a la cadena que se recibe como parametro.
     * @param $query
     * @param $name string Nombre del pais que escribieron en el campo search
     * @return mixed
     */
    public function scopeLineName($query, $name)
    {
        $name = ucwords(strtolower($name));

        if (trim($name) != "")
        {
            $query -> where('vehicle_line',"ILIKE", "%$name%");
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
