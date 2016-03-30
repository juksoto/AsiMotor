<?php

namespace AsiMotor\Core\Entities\Contact;

use Illuminate\Database\Eloquent\Model;

class AsiEmail extends Model
{
    protected $table = 'asi_emails';

    protected $fillable = [
        'email',
        'contact_id',
        'active'
    ];

    /**
     * Relacion del id contact con id email
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contact()
    {
        return $this -> belongsTo('AsiMotor\Core\Entities\AsiContact','contact_id' , 'id');
    }


}
