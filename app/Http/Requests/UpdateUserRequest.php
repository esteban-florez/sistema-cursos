<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

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
        $uniqueIgnore = Rule::unique('users')
            ->ignoreModel($user);

        return [
            'first_name' => ['required', 'max:30'],
            'second_name' => ['nullable', 'max:30'],
            'first_lastname' => ['required', 'max:30'],
            'second_lastname' => ['nullable', 'max:30'],
            'ci' => ['required', 'integer', 'numeric', $uniqueIgnore],
            'ci_type' => ['required', 'in:'.ciTypes()->join(',')],
            'image' => ['nullable', 'file', 'image', 'max:2048'],
            'gender' => ['required', 'in:'.genders()->join(',')],
            'phone' => ['required', 'digits:11'],
            'address' => ['required', 'string','max:255'],
            'email' => ['required', 'email', 'max:50', $uniqueIgnore],
            'password' => [
                'required', 'max:50', 'confirmed', 
                Password::min(8)->letters()->mixedCase()->numbers()->symbols()
            ],
            'birth' => ['required', 'date', 'before:now'],
            'role' => ['required', 'in:'.roles()->join(',')],
            'grade' => ['nullable', 'in:'.grades()->join(','), 'required_if:role,student'],
            'degree' => ['nullable', 'string', 'max:100', 'required_if:role,instructor'],
            'area_id' => ['nullable', 'integer', 'numeric', 'required_if:role,instructor'],
        ];
    }
}
