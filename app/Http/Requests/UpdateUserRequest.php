<?php

namespace App\Http\Requests;

use App\Rules\ValidID;
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

        return [
            'first_name' => ['required', 'string', 'min:3', 'max:20'],
            'second_name' => ['nullable', 'string', 'min:3', 'max:20'],
            'first_lastname' => ['required', 'string', 'min:3', 'max:20'],
            'second_lastname' => ['nullable', 'string', 'min:3', 'max:20'],
            'ci' => [
                'required', 'integer', 'numeric', 'digits_between:6,10',  Rule::unique('users')->ignoreModel($user)
            ],
            'ci_type' => ['required', 'in:'.ciTypes()->join(',')],
            'gender' => ['required', 'in:'.genders()->join(',')],
            'phone' => ['required', 'digits:11'],
            'address' => ['required', 'string', 'min:6', 'max:100'],
            'birth' => ['required', 'date', 'before:now'],
            'grade' => Rule::when($user->role === "Estudiante", 
                ['required', 'in:'.grades()->join(',')]),
            'degree' => Rule::when($user->role === "Instructor", 
                ['required', 'string']),
            'area_id' => Rule::when($user->role === "Instructor", 
                ['required', 'integer', 'numeric', new ValidID]),
        ];
    }
}
