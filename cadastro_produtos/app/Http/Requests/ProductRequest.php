<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required'],
            'tag' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nome do Produto deve estar preenchido',
            'tag.required' => 'Tag deve estar selecionada'
        ];
    }
}
