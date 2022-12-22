<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UpdateInstructorRequest extends FormRequest
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
        $instructor = $this->route('instructor');
        $uniqueIgnore = Rule::unique('instructors')
            ->ignoreModel($instructor);

        return [
            'name' => ['required', 'max:30'],
            'lastname' => ['required', 'max:30'],
            'ci' => ['required', 'integer', 'numeric', $uniqueIgnore],
            'ci_type' => ['required', 'in:V,E'],
            'image' => ['nullable', 'file','image', 'max:2048'],
            'gender' => ['required', 'in:'.genders()->join(',')],
            'phone' => ['required', 'digits:11'],
            'address' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:50', $uniqueIgnore],
            'password' => [
                'required', 'max:50', 'confirmed', 
                Password::min(8)->letters()->mixedCase()->numbers()->symbols()
            ],
            'degree' => ['required', 'max:100'], 
            'area_id' => ['required', 'integer', 'numeric'],
            'birth' => ['required', 'date'],
        ];
    }
}
