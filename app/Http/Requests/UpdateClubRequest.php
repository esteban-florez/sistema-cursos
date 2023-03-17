<?php

namespace App\Http\Requests;

use App\Rules\Interval;
use App\Rules\ValidID;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateClubRequest extends FormRequest
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
        $id = $this->route('club');

        return [
            'name' => ['required', 'string', 'min:5', 'max:30', 
                Rule::unique('clubs')->ignore($id)],
            'image' => ['nullable', 'file', 'image', 'min:50', 'max:2048', 'exclude'],
            'description' => ['required', 'string', 'min:10', 'max:100'],
            'day' => ['required', 'in:'.days()->join(',')],
            'start_hour' => ['required', 'before:end_hour', 
                new Interval('end_hour', 8, 'h')],
            'end_hour' => ['required', 'after:start_hour'],
            'user_id' => ['required', 'integer', 'numeric', 
                new ValidID],
        ];
    }
}
