<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateCityRequest extends Request
{
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
     *
     * @return array
     */
    public function rules()
    {
        return [
            'city'           => 'required|unique:asi_cities,city',
            'country_id'     => 'required',
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
     * iso -> ISO ->en mayuscula
     */
    public function all()
    {
        $input = parent::all();

        $input['city'] = ucwords(strtolower($input['city']));

        $this -> replace($input);

        return $input;
    }
}
