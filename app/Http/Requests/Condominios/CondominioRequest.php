<?php

namespace WebCondom\Http\Requests\Condominios;

use Illuminate\Foundation\Http\FormRequest;

class CondominioRequest extends FormRequest
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
            'nome' 			=> 'required|max:100',
			'apelido'		=> 'required|max:20',
			'telefone'		=> 'max:13|nullable',
			'celular'		=> 'required|max:14',
			'unidades'		=> 'required|integer',
			'tem_gas'		=> 'required',
			'valor_gas'		=> 'nullable',
			'email'			=> 'required|email',
			'sindico_id'	=> 'required',
			'cep'			=> 'required|max:8|min:8',
			'logradouro'	=> 'required|max:255',
			'numero'		=> 'required|max:6',
			'complemento'	=> 'nullable|max:50',
			'bairro'		=> 'required|mas:100',
			'cidade_id'		=> 'required'
        ];
    }
}
