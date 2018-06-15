<?php

namespace WebCondom\Http\Requests\Entidades;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Http\FormRequest;
use WebCondom\Models\Entidades\Fornecedor;

class FornecedorRequest extends FormRequest
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
		try{
			$id = Fornecedor::findOrFail($this->id)->entidade->id;
		}catch (ModelNotFoundException $e) {
			$id = 0;
		}
    	if($this->tipo == 'CNPJ'){
			return [
				'tipo'					=> 'required',
				'tipo_fornecedor' 		=> 'required',
				'cpf_cnpj'				=> 'required|max:14|min:14|unique:entidades,cpf_cnpj,'.$id,
				'nome'					=> 'required|max:100',
				'apelido'				=> 'nullable|max:20',
				'rg_ie'					=> 'nullable|max:30',
                'codigo'				=> 'nullable',
				'fantasia'				=> 'required|max:100|min:5',
				'inscricao_municipal' 	=> 'nullable|max:30',
				'ramo_atividade'		=> 'required|max:100',
				'data_abertura'			=> 'nullable|date',
				'telefone_principal'	=> 'nullable|max:10|min:10',
				'telefone_comercial'	=> 'nullable|max:10|min:10',
				'celular_1'				=> 'nullable|max:11|min:11',
				'celular_2'				=> 'nullable|max:11|min:11',
				'site'					=> 'nullable',
				'email'					=> 'required|email',
				//ENDEREÇO
				'cep'			=> 'required|max:8|min:8',
				'logradouro'	=> 'required|max:255',
				'numero'		=> 'required|max:6',
				'complemento'	=> 'nullable|max:50',
				'bairro'		=> 'required|max:100',
				'cidade_id'		=> 'required'
			];
		}
		return [
			'tipo_fornecedor' 		=> 'required',
			'cpf_cnpj'				=> 'required|max:11|min:11|unique:entidades,cpf_cnpj,'.$id,
			'nome'					=> 'required|max:100',
			'apelido'				=> 'required|max:20',
			'rg_ie'					=> 'nullable|max:30',
			'codigo'				=> 'nullable',
			'nome_mae'				=> 'nullable|max:100',
			'estado_civil_id'		=> 'required',
			'regime_casamento_id'	=> 'required',
			'profissao'				=> 'required|min:5|max:100',
			'data_nascimento'		=> 'nullable|date',
			'empresa'				=> 'nullable|max:100',
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
			'bairro'		=> 'required|max:100',
			'cidade_id'		=> 'required'
		];
    }
}
