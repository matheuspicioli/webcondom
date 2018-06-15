<?php

namespace WebCondom\Http\Requests\Enderecos;

use Illuminate\Foundation\Http\FormRequest;

class EstadosRequest extends FormRequest
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
            'descricao'     => 'required|max:100',
            'sigla'         => 'required|max:2',
            'codigo_ibge'   => 'max:2'
        ];
    }

    public function messages()
    {
        return [
            'descricao.required'    => 'Você não preencheu o campo descrição',
            'descricao.max'         => 'Você ultrapassou o limite de caracteres',
            'sigla.required'        => 'Você não preencheu o campo sigla',
            'sigla.max'             => 'A sigla só pode conter 2 caracteres',
            'codigo_ibge.max'       => 'O código IBGE só pode conter 2 caracteres'
        ];
    }
}
