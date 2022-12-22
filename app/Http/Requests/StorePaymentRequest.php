<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePaymentRequest extends FormRequest
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
            // TODO -> aqui pueden pasar cosas raras si incluyen uno o más ceros al inicio de la referencia
            'ref' => ['nullable', 'integer', 'numeric', 'digits_between:4,10'],
            'amount' => ['required', 'numeric'],
            'type' => ['required', 'in:'.payTypes()->join(',')],
        ];
    }
}
