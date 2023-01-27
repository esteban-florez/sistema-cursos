<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnrollmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'ref' => [
                'nullable',
                'numeric',
                'digits_between:4,10',
                'required_if:type,'.payTypes()->take(2)->join(','),
            ],
            'amount' => ['required', 'numeric'],
            'type' => ['required', 'in:'.payTypes()->join(',')],
            'category' => ['required', 'in:'.payCategories()->join(',')],
            'mode' => ['required', 'in:'.modes()->join(',')],
        ];
    }
}
