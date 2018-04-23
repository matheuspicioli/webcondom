<?php

namespace WebCondom\Http\Requests\Balancetes;

use Illuminate\Foundation\Http\FormRequest;

class BalanceteRequest extends FormRequest
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
			'referencia' 		=> 'nullable|min:5|max:20',
			'competencia' 		=> 'nullable|min:6|max:6',
			'data_inicial' 		=> 'required|date',
			'data_final' 		=> 'required|date',
			'saldo_anterior' 	=> 'required',
			'saldo_atual' 		=> 'required',
			'condominio_id' 	=> 'required'
        ];
    }
}
