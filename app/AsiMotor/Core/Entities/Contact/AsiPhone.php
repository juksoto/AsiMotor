<?php

namespace AsiMotor\Core\Entities\Contact;

use Illuminate\Database\Eloquent\Model;

class AsiPhone extends Model
{
    protected $table = 'asi_phones';

    protected $fillable = [
        'phone',
        'address_id',
        'contact_id',
        'type_phone',
        'active'
    ];

/**
     * Relacion del id address  con id city
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function address()
    {
        return $this -> belongsTo('AsiMotor\Core\Entities\Contact\AsiAddress', 'address_id', 'id');
    }

}
