<?php

namespace WebCondom\Http\Requests\Financeiros;

use Illuminate\Foundation\Http\FormRequest;

class ContaCorrenteRequest extends FormRequest
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
            'condominio_id' 		=> 'required|integer',
            'codigo'			    => 'required||max:6',
            'banco_id'				=> 'required|integer',
            'agencia'				=> 'required|max:30',
            'conta'				    => 'required|max:30',
            'inicio' 		        => 'required',
            'principal'			    => 'nullable',
            'nome'		            => 'required|max:40',
            'boleto_agencia'	    => 'nullable|max:30',
            'boleto_conta'		    => 'nullable|max:30',
            'cedente'				=> 'nullable|max:30',
            'carteira'				=> 'nullable|max:10',
            'aceite'				=> 'nullable',
            'nosso_numero'			=> 'nullable|max:20',
            'prazo_baixa'			=> 'nullable|integer',
            'multa'				    => 'nullable',
            'juros'				    => 'nullable',
            'tipo_juros'			=> 'nullable',
            'protestar'				=> 'nullable',
            'mensagem1'				=> 'nullable|max:80',
            'mensagem2'				=> 'nullable|max:80',
            'mensagem3'				=> 'nullable|max:80',
            'mensagem4'				=> 'nullable|max:80'
        ];
    }
}
