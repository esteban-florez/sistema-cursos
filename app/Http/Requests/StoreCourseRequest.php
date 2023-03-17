<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Interval;
use App\Rules\ValidID;

class StoreCourseRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:5', 'max:50', 'unique:courses'],
            'image' => ['required', 'file', 'image', 'min:50', 'max:2048', 'exclude'],
            'user_id' => ['required', 'integer', 'numeric', 
                new ValidID],
            'area_id' => ['required', 'integer', 'numeric', 
                new ValidID],
            'description' => ['required', 'string', 'min:10', 'max:255'],
            'total_price' => ['required', 'integer', 'numeric', 'between:10,100'],
            'reserv_price' => ['nullable', 'integer', 'numeric', 'between:5,25'],
            'start_ins' => ['required', 'date', 'before:end_ins', 
                new Interval('end_ins', 30, 'd')],
            'end_ins' => ['required', 'date', 'after:start_ins', 'before:start_course'],
            'start_course' => ['required', 'date', 'after:end_ins', 'before:end_course', 
                new Interval('end_course', 90, 'd')],
            'end_course' => ['required', 'date', 'after:start_course'],
            'duration' => ['required', 'integer', 'numeric', 'between:4,120'],
            'student_limit' => ['required', 'integer', 'numeric', 'between:15,60'],
            'days' => ['required', 'in:'.days()->join(',')],
            'start_hour' => ['required', 'before:end_hour', 
                new Interval('end_hour', 8, 'h')],
            'end_hour' => ['required', 'after:start_hour'],
        ];
    }
}
