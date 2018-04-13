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
			'referencia'	=> 'required|max:20',
			'tipo_imovel_id'=> 'required',
			'categoria_id'	=> 'required',
			'condominio_id'	=> 'required',
			'valor_locacao'	=> 'required',
			'valor_venda'	=> 'required',
			'codigo_agua'	=> 'required|max:20',
			'codigo_iptu'	=> 'required|max:20',
			'codigo_energia'=> 'required|max:20',
			'descritivo'	=> 'required|max:255',

			'cep'			=> 'required|max:8|min:8',
			'logradouro'	=> 'required|max:255',
			'numero'		=> 'required|max:6',
			'complemento'	=> 'nullable|max:50',
			'bairro'		=> 'required',
			'cidade_id'		=> 'required'
        ];
    }
}
