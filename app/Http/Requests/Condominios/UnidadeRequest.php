<?php

namespace WebCondom\Http\Requests\Condominios;

use Illuminate\Foundation\Http\FormRequest;

class UnidadeRequest extends FormRequest
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
            'bloco' 		            => 'nullable|max:4',
            'unidade'		            => 'required|max:4',
            'tipo_imovel_id'            => 'required',
            'garagem'		            => 'nullable',
            'bloquear_acesso'		    => 'required',
            'proprietario_id'		    => 'required',
            'inquilino_id'		        => 'nullable',
            'area_util'			        => 'nullable',
            'area_total'	            => 'nullable',
            'indice'			        => 'nullable',
            'imobiliaria'		        => 'nullable|max:50',
            'imobiliaria_contato'       => 'nullable|max:50',
            'observacoes'		        => 'nullable',
            'boleto_impresso'	        => 'required',
            'boleto_impresso_destino'	=> 'required',
            'boleto_email'	            => 'required',
            'boleto_email_destino'		=> 'nullable',
            'convocacao'		        => 'required',
            'convocacao_destino'		=> 'required',
            'correspondencia'		    => 'required',
            'correspondencia_destino'	=> 'required',
        ];
    }
}
