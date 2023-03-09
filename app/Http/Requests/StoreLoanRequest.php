<?php

namespace App\Http\Requests;

use App\Models\Item;
use App\Rules\ValidID;
use Illuminate\Foundation\Http\FormRequest;

class StoreLoanRequest extends FormRequest
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
        $max = $this->input('amount')
            ? Item::find($this->input('item_id'))->stock()
            : 100;

        return [
            'amount' => ['required', 'integer', 'numeric', 'min:1', 'max:'.$max],
            'item_id' => [
                'required', 
                'integer', 
                'numeric',
                new ValidID,
            ],
            'club_id' => [
                'required', 
                'integer', 
                'numeric',
                new ValidID,
            ],
        ];
    }

    public function messages()
    {
        $custom = [
            'amount.max' => 'La cantidad a prestar no puede ser mayor al stock actual.'
        ];

        return $this->input('amount') ? $custom : [];
    }
}
