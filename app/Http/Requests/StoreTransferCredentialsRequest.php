<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransferCredentialsRequest extends FormRequest
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
            'ci' => ['required', 'string', 'max:12'],
            'bank' => ['required', 'string'],
            'name' => ['required', 'string'],
            'type' => ['required', 'string', 'in:'.accountTypes()->join(',')],
            'account' => ['required', 'string', 'max:20'],
        ];
    }
}
