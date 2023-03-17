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
            'ci' => ['required', 'string', 'min:6', 'max:15'],
            'bank' => ['required', 'string', 'min:5', 'max:50'],
            'phone' => ['required', 'string', 'min:11', 'max:15'],
        ];
    }
}
