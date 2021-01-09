<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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
            'name'=>'required|min:3|unique:products',
            'price'=>'required',
            'mark_id'=>'required|not_in:0'
        ];
    }


    public function messages()
    {
        return [
            'required'=>'El :attribute es requerido',
            'min'=>'El  debe contener como minimo 3 caracteres',
            'unique'=>'El Nombre ya se encuentra registrado en bbdd',
            'not_in'=>'La marca  debe contener alguna referencia',
        ];
    }
}
