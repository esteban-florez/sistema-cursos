<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * Validate if the given ID corresponds to a valid record in database.
 */
class ValidID implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $model = ucfirst(explode('_', $attribute)[0]);
        $class = "App\Models\\$model";

        return (bool) $class::find($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation.valid_id');
    }
}
