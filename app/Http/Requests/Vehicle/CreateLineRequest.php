<?php

namespace App\Http\Requests\Vehicle;

use App\Http\Requests\Request;

class CreateLineRequest extends Request
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
            'vehicle_line' => 'required|unique:asi_vehicle_lines,vehicle_line',
        ];
    }

    public function messages()
    {
        return [
            'required'         => trans('admin.message.line_is_required'),
            'unique'           => trans('admin.message.line_already_exists'),
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

        $input['vehicle_line'] = ucwords( strtolower( $input[ 'vehicle_line' ] ) );

        $this -> replace( $input );

        return $input;
    }

}
