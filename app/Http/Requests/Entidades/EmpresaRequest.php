<?php

namespace WebCondom\Http\Requests\Entidades;

use Illuminate\Foundation\Http\FormRequest;
use WebCondom\Models\Entidades\Empresa;

class EmpresaRequest extends FormRequest
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
        	//EMPRESA
        	'creci'			=> 'nullable|max:10',
			'email_nfe'		=> 'nullable|email',

			//ENTIDADE
			'cpf_cnpj'				=> 'required|min:14|max:14|unique:entidades,cpf_cnpj,'.Empresa::find($this->id)->entidade->id,
			'nome'					=> 'nullable|max:100',
			'rg_ie'					=> 'nullable|max:30',
			'celular_1'				=> 'nullable|max:15',
			'celular_2'				=> 'nullable|max:15',
			'telefone_principal'	=> 'nullable|max:14',
			'telefone_comercial'	=> 'nullable|max:14',
			'site'					=> 'nullable|max:255',
			'email'					=> 'required|email',
			'fantasia'				=> 'required|max:100',
			'inscricao_municipal'	=> 'nullable|max:30',
			'ramo_atividade'		=> 'nullable|max:100',
			'data_abertura'			=> 'nullable|date',
			'logo_imagem'			=> 'image',

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
