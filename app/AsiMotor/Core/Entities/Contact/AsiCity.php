<?php

namespace AsiMotor\Core\Entities\Contact;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class AsiCity extends Model
{
    protected $table = 'asi_cities';

    use Sortable;

    protected $fillable = [
        'country_id',
        'city',
        'active'
    ];

    protected $sortable = [
        'city',
        'country_id',
    ];

    /**
     * Relacion del id city con country_id
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function country()
    {
        return $this -> belongsTo('AsiMotor\Core\Entities\Contact\AsiCountry','country_id');
    }

    /**
     * Retorna las  similitudes conforme a la cadena que se recibe como parametro.
     * @param $query
     * @param $name string Nombre del pais que escribieron en el campo search
     * @return mixed
     */
    public function scopeCityName($query, $name)
    {
        $name = ucwords(strtolower($name));

        if (trim($name) != "")
        {
            $query -> where('city',"ILIKE", "%$name%");
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
