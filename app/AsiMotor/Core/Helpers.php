<?php

namespace AsiMotor\Core;

use Illuminate\Database\Eloquent\Model;

class Helpers extends Model
{
    /**
     * Valida el campo active de un registro
     * @param $active
     * @return array
     */
    public function valueActive($active)
    {

        if ($active == false)
        {
            $active = true;
            $message =  trans('admin.status.has_been_published');
            $message_alert ="alert-success";
            return array('message' => $message, 'message_alert' => $message_alert, 'active' => $active );
        }
        else
        {
            $active = false;
            $message =  trans('admin.status.has_been_removed');
            $message_alert = "alert-warning ";
            return array('message' => $message, 'message_alert' => $message_alert,  'active' => $active );
        }
    }

}
