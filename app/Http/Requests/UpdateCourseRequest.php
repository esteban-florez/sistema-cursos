<?php

namespace App\Http\Requests;

use App\Rules\Interval;
use App\Rules\ValidID;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCourseRequest extends FormRequest
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
        $id = $this->route('course');

        return [
            'name' => ['required', 'max:50', Rule::unique('courses')->ignore($id)],
            'image' => ['nullable', 'file', 'image', 'max:2048', 'exclude'],
            'instructor_id' => [
                'required',
                'integer',
                'numeric',
                new ValidID,
            ],
            'area_id' => [
                'required',
                'integer',
                'numeric',
                new ValidID,
            ],
            'description' => ['required', 'max:255'],
            'total_price' => ['required', 'integer', 'numeric', 'between:20,100'],
            'reserv_price' => ['required', 'integer', 'numeric', 'between:5,20'],
            'start_ins' => [
                'required',
                'date',
                'before:end_ins',
                new Interval('end_ins', 30, 'd'),
            ],
            'end_ins' => [
                'required',
                'date',
                'after:start_ins',
                'before:start_course',
            ],
            'start_course' => [
                'required',
                'date',
                'after:end_ins',
                'before:end_course',
                new Interval('end_course', 90, 'd'),
            ],
            'end_course' => [
                'required',
                'date',
                'after:start_course',
            ],
            'duration' => ['required', 'integer', 'numeric', 'between:4,100'],
            'student_limit' => ['required', 'integer', 'numeric', 'between:15,40'],
            'days' => ['required', 'array', 'in:'.days()->join(',')],
            'start_hour' => [
                'required',
                'before:end_hour',
                new Interval('end_hour', 4, 'h')
            ],
            'end_hour' => [
                'required',
                'after:hour',
            ],
        ];
    }
}
