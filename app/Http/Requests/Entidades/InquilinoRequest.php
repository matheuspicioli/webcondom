<?php

namespace WebCondom\Http\Requests\Entidades;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Http\FormRequest;
use WebCondom\Models\Entidades\Inquilino;

class InquilinoRequest extends FormRequest
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
			$id = Inquilino::findOrFail($this->id)->entidade->id;
		}catch (ModelNotFoundException $e) {
			$id = 0;
		}
		return [
			'cpf_cnpj'				=> 'required|max:11|min:11|unique:entidades,cpf_cnpj,'.$id,
			'nome'					=> 'required|max:100',
			'apelido'				=> 'required|max:20',
			'rg_ie'					=> 'required|max:30',
			'codigo'				=> 'nullable|integer',
			'nome_mae'				=> 'required|max:100',
			'estado_civil_id'		=> 'required',
			'regime_casamento_id'	=> 'required',
			'profissao'				=> 'required|min:5|max:100',
			'data_nascimento'		=> 'required|date',
			'nacionalidade'			=> 'nullable|max:100|min:5',
			'empresa'				=> 'required|max:100',
			'inss'					=> 'nullable|max:20',
			'dependentes'			=> 'nullable|integer',
			'telefone_principal'	=> 'nullable|max:10|min:10',
			'telefone_comercial'	=> 'nullable|max:10|min:10',
			'celular_1'				=> 'required|max:11|min:11',
			'celular_2'				=> 'nullable|max:11|min:11',
			'site'					=> 'nullable|url',
			'email'					=> 'required|email',
			//ENDEREÇO PRINCIPAL
			'cep_principal'			=> 'required|max:8|min:8',
			'logradouro_principal'	=> 'required|max:255',
			'numero_principal'		=> 'required|max:6',
			'complemento_principal'	=> 'nullable|max:50',
			'bairro_principal'		=> 'required|max:100',
			'cidade_id_principal'	=> 'required',
			//ENDEREÇO COBRANÇA
			'cep_cobranca'			=> 'nullable|max:8|min:8',
			'logradouro_cobranca'	=> 'nullable|max:255',
			'numero_cobranca'		=> 'nullable|max:6',
			'complemento_cobranca'	=> 'nullable|max:50',
			'bairro_cobranca'		=> 'nullable|max:100',
			'cidade_id_cobranca'	=> 'nullable'
		];
    }
}