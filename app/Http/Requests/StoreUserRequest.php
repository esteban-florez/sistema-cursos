<?php

namespace App\Http\Requests;

use App\Rules\ValidID;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class StoreUserRequest extends FormRequest
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
            'image' => ['nullable', 'file', 'image', 'min:50', 'max:2048', 'exclude'],
            'gender' => ['required', 'in:'.genders()->join(',')],
            'phone' => ['required', 'integer', 'numeric', 'digits:11'],
            'address' => ['required', 'string', 'min:6', 'max:100'],
            'email' => ['required', 'email', 'min:6', 'max:50', 'unique:users'],
            'password' => ['required', 'max:20', 'confirmed', Password::defaults()],
            'birth' => ['required', 'date', 'before:now'],
            'role' => ['required', 'in:'.roles()->join(',')],
            'grade' => ['nullable', 'in:'.grades()->join(','), 'required_if:role,Estudiante'],
            'degree' => ['nullable', 'string', 'required_if:role,Instructor'],
            'area_id' => ['nullable', 'integer', 'numeric', 'required_if:role,Instructor', new ValidID],
        ];
    }
}
