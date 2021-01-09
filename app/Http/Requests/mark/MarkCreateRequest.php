<?php

namespace App\Http\Requests\mark;

use Illuminate\Foundation\Http\FormRequest;

class MarkCreateRequest extends FormRequest
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
            'name'=>'required|min:3'
        ];
    }

    public function messages()
    {
        return [
            'required'=>'El nombre de la marca es requerida',
            'min'=>'El nombre de la marca debe de contener minimo tres caracteres'
        ];
    }
}
