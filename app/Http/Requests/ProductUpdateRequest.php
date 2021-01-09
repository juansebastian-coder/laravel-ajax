<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;

class ProductUpdateRequest extends FormRequest
{
   
public function __construct(Route $route)
{
    $this->route=$route;
}

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
            // exceptuamos el nombre solo para el caso de editar
            'name'=>'required|min:3|unique:products,name,'.$this->route()->parameter('product'),
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
