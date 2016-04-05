<?php

namespace App\Http\Requests\Contact;

use App\Http\Requests\Request;

class CreateCountryRequest extends Request
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
            'country' => 'required|unique:asi_countries,country',
            'iso'     => 'required|unique:asi_countries,iso',
        ];
    }

        public function messages()
        {
        return [
            'country.unique'   => trans('admin.message.country_already_exists'),
            'iso.unique'       => trans('admin.message.iso_already_exists'),
            'required'         => trans('admin.message.is_required'),
            'unique'           => trans('admin.message.already_exists'),
        ];
    }

    /**
     * @return array
     * Cambia los inputs asi
     * country name -> Country name -> Letra capital
     * iso -> ISO ->en mayuscula
     */
    public function all()
    {
        $input = parent::all();

        $input['country'] = ucwords( strtolower( $input[ 'country' ] ) );
        $input['iso'] = strtoupper( $input[ 'iso' ] );

        $this -> replace( $input );

        return $input;
    }
}
