<?php

namespace App\Http\Requests\Contact;

use App\Http\Requests\Request;
use Illuminate\Routing\Route;

class EditCityRequest extends Request
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
            'city'          => 'required|unique:asi_cities,city,' . $this -> route -> getParameter('city'),
            'country_id'    => 'required',
        ];
    }
    public function messages()
    {
        return [
            'required'              =>  ':attribute' . trans('admin.message.is_required'),
            'unique'                =>  ':attribute' . trans('admin.message.already_exists'),
            'city.required'         =>  trans('admin.message.city_is_required'),
            'city.unique'           =>  trans('admin.message.city_already_exists'),
            'country_id.required'   =>  trans('admin.message.country_is_required'),
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

        $input['city'] = ucwords(strtolower($input['city']));

        $this->replace($input);

        return $input;
    }
}