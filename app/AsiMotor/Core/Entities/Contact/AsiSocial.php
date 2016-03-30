<?php

namespace AsiMotor\Core\Entities\Contact;

use Illuminate\Database\Eloquent\Model;


class Asiocial extends Model
{
    protected $table = 'asi_socials';

    protected $fillable = [
        'social_network',
        'active'
    ];

    public function contact()
    {
        return $this
            -> belongsToMany( 'AsiMotor\Core\Entities\AsiContact',  'asi_contact_social' , 'social_id' , 'contact_id' )
            -> withTimestamps();
    }


}
