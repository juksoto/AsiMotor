<?php

namespace AsiMotor\Core\Repositories\Contact;

use AsiMotor\Core\Entities\Contact\AsiCity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class CityRepo extends Model
{
    public function get()
    {
        return AsiCity::All() -> where ( 'active' , true );

    }

    /**
     * [Description]
     * Valida si existe paises creados o acivos. Si existe, muestra el formulario de crear ciudad, si no existe,
     * redirecciona al index de ciudad con un mensaje de error, solicitando que primero debe crear paises.
     * @param $countCountry [number] cantidad de paises
     * @param $data [array] es la coleccion de datos para enviar al formularo de crear
     * @return $this|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function validateExistCountry($countCountry, $data)
    {
        if ( $countCountry > 0 )
        {
            return view('admin.contact.city.create', compact('data'));
        }
        else
        {
            $message = trans('admin.message.error_city_country');

            $message_alert ="alert-warning";
            $message_ico ="alert";

            Session::flash('message', $message);
            Session::flash('message_alert', $message_alert);
            Session::flash('message_ico', $message_ico);

            return redirect()
                -> route('admin.city.index');
        }
    }
}

