<?php

namespace AsiMotor\Core\Entities\Contact;

use Illuminate\Database\Eloquent\Model;

class AsiAddress extends Model
{
    protected $table = 'asi_addresses';

    protected $fillable = [
        'address',
        'city_id',
        'contact_id',
        'active'
    ];

    /**
     * Relacion del id address  con id city
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this -> belongsTo('AsiMotor\Core\Entities\Contact\AsiCity', 'city_id', 'id');
    }

    /**
     * Relacion del id address  con id phone
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function phone()
    {
        return $this -> hasMany('AsiMotor\Core\Entities\Contact\AsiPhone', 'address_id', 'id');
    }

}
