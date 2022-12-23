<?php

namespace App\Http\Requests;

use App\Models\Course;
use Illuminate\Foundation\Http\FormRequest;

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
            'name' => ['required', 'max:30'],
            'image' => ['required', 'file', 'image', 'max:2048'],
            'instructor_id' => ['required', 'integer', 'numeric'],
            'area_id' => ['required', 'integer', 'numeric'],
            'description' => ['required', 'max:255'],
            'total_price' => ['required', 'integer', 'numeric'],
            'reserv_price' => ['required', 'integer', 'numeric'],
            'start_ins' => ['required', 'date'],
            'end_ins' => ['required', 'date'],
            'start_course' => ['required', 'date'],
            'end_course' => ['required', 'date'],
            'duration' => ['required', 'integer', 'numeric'],
            'student_limit' => ['required', 'integer', 'numeric'],
            'days' => ['required', 'array'],
            'start_time' => ['required'],
            'end_time' => ['required'],
        ];
    }

    public function attributes()
    {
        return Course::$attrNames;
    }
}
