<?php

namespace App\Http\Requests\Vehicle;

use App\Http\Requests\Request;
use Illuminate\Routing\Route;

class EditClassRequest extends Request
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
            'vehicle_class' => 'required|unique:asi_vehicle_classes,vehicle_class' . $this -> route -> getParameter('vehicle_class') ,
        ];
    }
    public function messages()
    {
        return [
            'required'         => trans('admin.message.class_is_required'),
            'unique'           => trans('admin.message.class_already_exists'),
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

        $input['vehicle_class'] = ucwords( strtolower( $input[ 'vehicle_class' ] ) );

        $this -> replace( $input );

        return $input;
    }
}