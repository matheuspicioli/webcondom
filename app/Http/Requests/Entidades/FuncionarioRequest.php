<?php

namespace WebCondom\Http\Requests\Entidades;

use Illuminate\Foundation\Http\FormRequest;

class FuncionarioRequest extends FormRequest
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
		if($this->tipo == 'CNPJ'){
			return [
				'tipo'					=> 'required',
				'cpf_cnpj'				=> 'required|max:14|min:14',
				'departamento_id'		=> 'required',
				'setor_id'				=> 'required',
				'nome'					=> 'required|max:100',
				'apelido'				=> 'required|max:20',
				'rg_ie'					=> 'required|max:30',
				'codigo'				=> 'nullable',
				'fantasia'				=> 'required|max:100|min:5',
				'inscricao_municipal' 	=> 'nullable|max:30',
				'ramo_atividade'		=> 'required|max:100',
				'data_abertura'			=> 'required|date',
				'telefone_principal'	=> 'nullable|max:10|min:10',
				'telefone_comercial'	=> 'nullable|max:10|min:10',
				'celular_1'				=> 'required|max:11|min:11',
				'celular_2'				=> 'nullable|max:11|min:11',
				'site'					=> 'nullable',
				'email'					=> 'required|email',
				//ENDEREÇO
				'cep'			=> 'required|max:8|min:8',
				'logradouro'	=> 'required|max:255',
				'numero'		=> 'required|max:6',
				'complemento'	=> 'nullable|max:50',
				'bairro'		=> 'required',
				'cidade_id'		=> 'required'
			];
		}
		return [
			'tipo'					=> 'required',
			'cpf_cnpj'				=> 'required|max:11|min:11',
			'departamento_id'		=> 'required',
			'setor_id'				=> 'required',
			'nome'					=> 'required|max:100',
			'apelido'				=> 'required|max:20',
			'rg_ie'					=> 'required|max:30',
			'codigo'				=> 'nullable',
			'nome_mae'				=> 'required|max:100',
			'estado_civil_id'		=> 'required',
			'regime_casamento_id'	=> 'required',
			'profissao'				=> 'required|min:5|max:100',
			'data_nascimento'		=> 'required|date',
			'nacionalidade'			=> 'min:5|max:100',
			'empresa'				=> 'required|max:100',
			'inss'					=> 'nullable|max:20',
			'dependentes'			=> 'nullable|integer',
			'telefone_principal'	=> 'nullable|max:10|min:10',
			'telefone_comercial'	=> 'nullable|max:10|min:10',
			'celular_1'				=> 'required|max:11|min:11',
			'celular_2'				=> 'nullable|max:11|min:11',
			'site'					=> 'nullable|url',
			'email'					=> 'required|email',
			//ENDEREÇO
			'cep'			=> 'required|max:8|min:8',
			'logradouro'	=> 'required|max:255',
			'numero'		=> 'required|max:6',
			'complemento'	=> 'nullable|max:50',
			'bairro'		=> 'required',
			'cidade_id'		=> 'required'
		];
    }
}
