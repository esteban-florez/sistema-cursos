<?php

namespace App\Http\Requests;

use App\Rules\ValidID;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAreaRequest extends FormRequest
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
        $id = $this->route('area');

        return [
            'name' => ['required', 'string', 'min:5', 'max:50', 
                Rule::unique('areas')->ignore($id)],
            'pnf_id' => ['required', 'numeric', 'integer', 
                new ValidID('PNF')]
        ];
    }
}
