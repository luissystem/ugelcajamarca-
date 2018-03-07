<?php

namespace UgelCajamarca\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class planillaFormRequest extends FormRequest
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
            //
            'iddocente'=>'required',
            'idinstitucion'=>'required',
            'anio'=>'required|max:30',
            'mes'=>'required|max:30'
            //'imagen'=>'required|max:380'

        ];
    }
}
