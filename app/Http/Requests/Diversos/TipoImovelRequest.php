<?php

namespace WebCondom\Http\Requests\Diversos;

use Illuminate\Foundation\Http\FormRequest;

class TipoImovelRequest extends FormRequest
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
			'descricao' => 'required|max:100|min:5'
		];
    }
}
