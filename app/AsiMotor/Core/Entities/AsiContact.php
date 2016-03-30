<?php

namespace AsiMotor\Core\Entities;

use Illuminate\Database\Eloquent\Model;

class AsiContact extends Model
{
    protected $table = 'asi_contacts';

    protected $fillable = [
        'person_id',
        'company_id',
        'user_id',
        'active'
    ];

    public function social()
    {
        return $this
            -> belongsToMany( 'AsiMotor\Core\Entities\Contact\AsiSocial', 'asi_contact_has_social_networks' , 'contact_id' , 'social_network_id' )
            -> withTimestamps();
    }

    /**
     * Relacion del id contact con id email
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function email()
    {
        return $this -> hasMany('AsiMotor\Core\Entities\Contact\AsiEmail', 'contact_id' ,'id');
    }

    /**
     * Relacion del id contact con id address
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function address()
    {
        return $this -> hasMany('AsiMotor\Core\Entities\Contact\AsiAddress', 'contact_id' ,'id');
    }

    /**
     * Relacion id contacto con id phone
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function phone()
    {
        return $this -> hasMany('AsiMotor\Core\Entities\Contact\AsiPhone', 'contact_id', 'id');
    }

    /**
     * relacion muchos a muchos con id social y id contacts
     * @return $this
     */
    public function socialContact()
    {
        return $this
            -> belongsToMany( 'AsiMotor\Core\Entities\Contact\AsiSocial',  'asi_contact_has_socials' , 'contact_id'  , 'social_network_id')
            -> withPivot('social' , 'active')
            -> withTimestamps();
    }



}
