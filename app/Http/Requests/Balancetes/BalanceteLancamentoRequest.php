<?php

namespace WebCondom\Http\Requests\Balancetes;

use Illuminate\Foundation\Http\FormRequest;

class BalanceteLancamentoRequest extends FormRequest
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
			'data_lancamento' 	=> 'required|date',
			'documento' 		=> 'required|min:2|max:15',
			'historico'			=> 'nullable|max:100',
			'valor'				=> 'required',
			'tipo'				=> 'required',
			'folha'				=> 'required|max:4|min:4',
			'balancete_id'		=> 'required',
			'plano_contas_id'	=> 'required',
			'fornecedor_id'		=> 'required'
		];
    }
}
