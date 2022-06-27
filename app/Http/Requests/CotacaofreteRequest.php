<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CotacaofreteRequest extends FormRequest
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
        // Validação de campos
        return [
            'uf'   =>  'required|string|min:2',
            'percentual_cotacao'   =>  'required',
            'valor_extra'   =>  'required',
            'transportadora_id'   =>  'required'
        ];
    }

    public function messages()
    {
        return [
            'message' => 'Test',

            'uf.required' => 'O campo UF é obrigatório.',
            'percentual_cotacao.required' => 'O campo PERCENTUAL COTAÇÃO é obrigatório.',
            'valor_extra.required' => 'O campo VALOR EXTRA é obrigatório.',
            'transportadora_id.required' => 'O campo TRANSPORTADORA é obrigatório.',

        ];
    }
}
