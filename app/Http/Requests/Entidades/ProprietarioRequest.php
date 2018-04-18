<?php

namespace WebCondom\Http\Requests\Entidades;

use Illuminate\Foundation\Http\FormRequest;

class ProprietarioRequest extends FormRequest
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
        if($this->tipo == 'CNPJ') {
            return [
                'cpf_cnpj'              => 'required|unique:entidades,cpf_cnpj,'.$this->id,
                'tipo'					=> 'required',
                'nome'					=> 'required|max:100',
                'apelido'				=> 'nullable|max:20',
                'rg_ie'					=> 'nullable|max:30',
                'codigo'				=> 'required',
                'fantasia'				=> 'required|max:100|min:5',
                'inscricao_municipal' 	=> 'nullable|max:30',
                'ramo_atividade'		=> 'nullable|max:100',
                'data_abertura'			=> 'nullable|date',
                'telefone_principal'	=> 'nullable|max:10|min:10',
                'telefone_comercial'	=> 'nullable|max:10|min:10',
                'celular_1'				=> 'nullable|max:11|min:11',
                'celular_2'				=> 'nullable|max:11|min:11',
                'site'					=> 'nullable',
                'email'					=> 'required|email',
                //ENDEREÇO PRINCIPAL
                'cep_principal'         => 'required|max:8|min:8',
                'logradouro_principal'  => 'required|max:255',
                'numero_principal'      => 'required|max:6',
                'complemento_principal' => 'nullable|max:50',
                'bairro_principal'      => 'required|max:100',
                'cidade_id_principal'   => 'required',
                //ENDEREÇO COBRANÇA
                'cep_cobranca'          => 'nullable|max:8|min:8',
                'logradouro_cobranca'   => isset($this->cep_cobranca) ? 'required|max:255' : 'nullable|max:255',
                'numero_cobranca'       => isset($this->cep_cobranca) ? 'required|max:6' : 'nullable|max:6',
                'complemento_cobranca'  => 'nullable|max:50',
                'bairro_cobranca'       => isset($this->cep_cobranca) ? 'required|max:100' : 'nullable|max:100',
                'cidade_id_cobranca'    => isset($this->cep_cobranca) ? 'required' : 'nullable',
            ];
        }
        return [
            'cpf_cnpj'				=> 'required|unique:entidades,cpf_cnpj,'.$this->id,
            'nome'					=> 'required|max:100',
            'apelido'				=> 'nullable|max:20',
            'rg_ie'					=> 'nullable|max:30',
            'codigo'				=> 'nullable|integer',
            'nome_mae'				=> 'nullable|max:100',
            'estado_civil_id'		=> 'required',
            'regime_casamento_id'	=> 'required',
            'profissao'				=> 'nullable|min:5|max:100',
            'data_nascimento'		=> 'nullable|date',
            'nacionalidade'			=> 'nullable|max:100|min:5',
            'empresa'				=> 'nullable|max:100',
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
            'cep_cobranca'          => 'nullable|max:8|min:8',
            'logradouro_cobranca'   => isset($this->cep_cobranca) ? 'required|max:255' : 'nullable|max:255',
            'numero_cobranca'       => isset($this->cep_cobranca) ? 'required|max:6' : 'nullable|max:6',
            'complemento_cobranca'  => 'nullable|max:50',
            'bairro_cobranca'       => isset($this->cep_cobranca) ? 'required|max:100' : 'nullable|max:100',
            'cidade_id_cobranca'    => isset($this->cep_cobranca) ? 'required' : 'nullable',
        ];
    }
}
