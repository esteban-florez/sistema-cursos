<?php

namespace App\Http\Requests;

use App\Rules\ValidID;
use Illuminate\Foundation\Http\FormRequest;

class StoreAreaRequest extends FormRequest
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
            'name' => [
                'required',
                'max:50',
                'unique:areas',
            ],
            'pnf_id' => ['required', new ValidID('PNF')]
        ];
    }
}
