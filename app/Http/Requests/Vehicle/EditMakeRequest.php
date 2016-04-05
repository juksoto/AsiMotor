<?php

namespace App\Http\Requests\Contact;

use App\Http\Requests\Request;
use Illuminate\Routing\Route;

class EditMakeRequest extends Request
{
    /**
     * @var Route
     */
    private $route;
    /**
     * @param Route $route
     */
    public function __construct(Route $route)
    {
        $this -> route = $route;
    }
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    /**
     * Get the validation rules that apply to the request.
     * $this->route->getParameter('country'), -> es el id que nuestro validor debe ignorar y permita actualizar
     * los datos aunque los campos sean iguales y tenga la validacion unique.
     * @return array
     */
    public function rules()
    {
        return [
            'vehicle_make' => 'required|unique:asi_vehicle_makes,vehicle_make' . $this -> route -> getParameter('vehicle_make') ,
        ];
    }
    public function messages()
    {
        return [
            'required'         => trans('admin.message.make_is_required'),
            'unique'           => trans('admin.message.make_already_exists'),
        ];
    }
    /**
     * @return array
     * Cambia los inputs asi
     * city name -> City name -> Letra capital
     */
    public function all()
    {
        $input = parent::all();

        $input['vehicle_make'] = ucwords( strtolower( $input[ 'vehicle_make' ] ) );

        $this -> replace( $input );

        return $input;
    }
}