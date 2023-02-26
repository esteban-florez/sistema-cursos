<?php

namespace App\Http\Requests;

use App\Models\Item;
use App\Rules\ValidID;
use Illuminate\Foundation\Http\FormRequest;

class OperationRequest extends FormRequest
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
        $maxAmount = Item::find($this->input('item_id'))->stock();
        $maxRule = $this->input('type') === 'Desincorporación' ? ["max:{$maxAmount}"] : [];

        return [
            'amount' => ['required', 'numeric', 'integer', 'min:1', ...$maxRule],
            'type' => ['required', 'in:'.operationTypes()->join(',')],
            'reason' => ['nullable', 'string', 'min:6', 'max:255'],
            'item_id' => ['required', 'numeric', new ValidID],
        ];
    }

    public function messages()
    {
        return [
            'amount.max' => ':attribute a desincorporar no puede ser mayor al stock actual.',
        ];
    }

    public function attributes()
    {
        return [
            'amount' => 'la cantidad',
            'type' => 'el tipo de operación',
        ];
    }
}
