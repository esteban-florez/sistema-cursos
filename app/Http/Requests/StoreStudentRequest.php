<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class StoreStudentRequest extends FormRequest
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
            'first_name' => ['required', 'max:30'],
            'second_name' => ['nullable', 'max:30'],
            'first_lastname' => ['required', 'max:30'],
            'second_lastname' => ['nullable', 'max:30'],
            'password' => [
                'required', 'confirmed', 'max:50',
                Password::min(8)->letters()->mixedCase()->numbers()->symbols()
            ],
            'image' => ['nullable', 'file','image', 'max:2048'],
            'ci' => ['required', 'integer', 'numeric', 'unique:students'],
            'ci_type' => ['required', 'in:V,E'],
            'email' => ['required', 'email', 'max:50', 'unique:students'],
            'birth' => ['required', 'date'],
            'gender' => ['required', 'in:'.genders()->join(',')],
            'phone' => ['required', 'digits:11'],
            'grade' => ['required', 'in:'.grades()->join(',')],
            'address' => ['required', 'string', 'max:255'],
        ];
    }
}
