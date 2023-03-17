<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMovilCredentialsRequest extends FormRequest
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
            'ci' => ['required', 'integer', 'numeric', 'min:6', 'max:10'],
            'bank' => ['required', 'string', 'min:5', 'max:50'],
            'phone' => ['required', 'integer', 'numeric', 'digits:11'],
        ];
    }
}
