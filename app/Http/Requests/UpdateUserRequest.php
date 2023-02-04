<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
        $user = $this->route('user');

        $rules = [
            'first_name' => ['required', 'max:30'],
            'second_name' => ['nullable', 'max:30'],
            'first_lastname' => ['required', 'max:30'],
            'second_lastname' => ['nullable', 'max:30'],
            'ci' => ['required', 'integer', 'numeric', Rule::unique('users')->ignoreModel($user)],
            'ci_type' => ['required', 'in:'.ciTypes()->join(',')],
            'gender' => ['required', 'in:'.genders()->join(',')],
            'phone' => ['required', 'digits:11'],
            'address' => ['required', 'string','max:255'],
            'birth' => ['required', 'date', 'before:now'],
            'grade' => Rule::when($user->role === "Estudiante", ['required', 'in:'.grades()->join(',')]),
            'degree' => Rule::when($user->role === "Instructor", ['required', 'string', 'max:100']),
            'area_id' => Rule::when($user->role === "Instructor", ['required', 'integer', 'numeric']),
        ];

        return $rules;
    }
}
