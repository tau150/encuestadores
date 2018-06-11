<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Encuestador;


class Encuestadores extends FormRequest
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
            'apellido' => 'required',
            'dni' => 'required|digits_between:7,8|numeric|unique:encuestadors,dni,'.$this->id,
            'img' => 'image|mimes:jpg,png,jpeg|dimensions:max_width=500,max_height=500',
            'nombre'=> 'required',
            'localidad' => 'required',
            'cargo' => 'required',
            'encuesta' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'img.image'    => 'El archivo debe ser una imagen.',
            'img.mimes' => 'Solo se aceptan formatos .jpg .png o .jpeg',
            'img.dimensions' => 'Las dimensiones máximas son de 1200 x 1200 px'
        ];
    }
}

