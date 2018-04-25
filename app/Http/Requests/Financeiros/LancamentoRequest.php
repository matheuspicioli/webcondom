<?php

namespace WebCondom\Http\Requests\Financeiros;

use Illuminate\Foundation\Http\FormRequest;

class LancamentoRequest extends FormRequest
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
            'nota_fiscal' 			=> 'nullable|max:10',
            'parcela'			    => 'nullable|max:3',
            'data_lancamento'		=> 'required',
            'documento'				=> 'nullable|max:50',
            'tipo'				    => 'required',
            'historico' 		    => 'required|min:3|max:100',
            'valor'			        => 'required',
            'compensado'		    => 'required',
            'cheque'	            => 'required',
            'enviado_em'		    => 'nullable',
            'retorno_em'			=> 'nullable',
            'assinado'		        => 'required',
            'fornecedor_id'	        => 'nullable|integer',
            'conta_corrente_id'		=> 'required|integer',
            'plano_conta_id'		=> 'required|integer',
        ];
    }
}
