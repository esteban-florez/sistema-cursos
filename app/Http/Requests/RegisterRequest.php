<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
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
            'first_name' => ['required', 'string', 'min:3', 'max:20'],
            'second_name' => ['nullable', 'string', 'min:3', 'max:20'],
            'first_lastname' => ['required', 'string', 'min:3', 'max:20'],
            'second_lastname' => ['nullable', 'string', 'min:3', 'max:20'],
            'ci' => ['required', 'integer', 'numeric', 'min:6', 'max:10', 'unique:users'],
            'ci_type' => ['required', 'in:'.ciTypes()->join(',')],
            'gender' => ['required', 'in:'.genders()->join(',')],
            'phone' => ['required', 'integer', 'numeric', 'digits:11'],
            'address' => ['required', 'string', 'min:6', 'max:100'],
            'email' => ['required', 'email', 'min:6', 'max:50', 'unique:users'],
            'password' => ['required', 'max:20', 'confirmed', 
                Password::defaults()],
            'birth' => ['required', 'date', 'before:now'],
            'grade' => ['required', 'in:'.grades()->join(',')],
        ];
    }
}
