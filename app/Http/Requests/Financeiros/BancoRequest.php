<?php

namespace WebCondom\Http\Requests\Financeiros;

use Illuminate\Foundation\Http\FormRequest;

class BancoRequest extends FormRequest
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
            'codigo_banco' 			=> 'required|min:2|max:4',
			'nome_banco'			=> 'required|min:5|max:40',
			'CNAB'					=> 'required',
			'foto'					=> 'nullable|image',
			'carteira'				=> 'nullable|min:2|max:6',
			'tamanho_agencia' 		=> 'nullable|integer',
			'tamanho_conta'			=> 'nullable|integer',
			'tamanho_cedente'		=> 'nullable|integer',
			'tamanho_nossonumero'	=> 'nullable|integer',
			'local_pagamento'		=> 'nullable|min:5|max:100',
			'mensagem'				=> 'nullable|min:5|max:100',
			'mascara_cedente'		=> 'nullable|min:5|max:100',
			'mascara_nossonumero'	=> 'nullable|min:5|max:100',
			'linha_valor'			=> 'nullable|integer',
			'coluna_valor'			=> 'nullable|integer',
			'linha_extenso1'		=> 'nullable|integer',
			'coluna_extenso1'		=> 'nullable|integer',
			'linha_extenso2'		=> 'nullable|integer',
			'coluna_extenso2'		=> 'nullable|integer',
			'linha_nominal'			=> 'nullable|integer',
			'coluna_nominal'		=> 'nullable|integer',
			'linha_dia'				=> 'nullable|integer',
			'coluna_dia'			=> 'nullable|integer',
			'linha_mes'				=> 'nullable|integer',
			'coluna_mes'			=> 'nullable|integer',
			'linha_ano'				=> 'nullable|integer',
			'coluna_ano'			=> 'nullable|integer'
        ];
    }
}
