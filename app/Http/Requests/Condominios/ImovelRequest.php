<?php

namespace WebCondom\Http\Requests\Condominios;

use Illuminate\Foundation\Http\FormRequest;

class ImovelRequest extends FormRequest
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
            'codigo' 		=> 'required|integer',
			'referencia'	=> 'nullable|max:20',
			'tipo_imovel_id'=> 'required',
			'categoria_id'	=> 'required',
			'condominio_id'	=> 'nullable',
			'valor_locacao'	=> 'nullable',
			'valor_venda'	=> 'nullable',
			'codigo_agua'	=> 'nullable|max:20',
			'codigo_iptu'	=> 'nullable|max:20',
			'codigo_energia'=> 'nullable|max:20',
			'descritivo'	=> 'nullable|max:255',

			'cep'			=> 'required|max:8|min:8',
			'logradouro'	=> 'required|max:255',
			'numero'		=> 'required|max:6',
			'complemento'	=> 'nullable|max:50',
			'bairro'		=> 'required',
			'cidade_id'		=> 'required'
        ];
    }
}
