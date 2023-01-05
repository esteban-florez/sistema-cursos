<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Date;

/**
 * Validates a maximum interval of a time unit between two dates.
 * 
 */
class Interval implements Rule, DataAwareRule
{
    /**
     * All of the data under validation.
     *
     * @var array
     */
    protected $data = [];

    /**
     * The name of the other date field.
     * 
     * @var string
     */
    private $field;

    /**
     * Maximum amount of the interval between the dates. 
     * 
     * @var int
     */
    private $interval;

    /**
     * Unit of the interval. 
     * 
     * @var int
     */
    private $unit;

    /**
     * Create a new rule instance.
     * 
     * @param  string  $field  The name of the other date field.
     * @param  int  $interval  Maximum amount of the interval between the dates.
     * @param  string  $unit  Time unit of the interval.
     * @return void
     */
    public function __construct($field, $interval, $unit)
    {
        $this->field = $field;
        $this->interval = $interval;
        $this->unit = $unit;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $format = match ($this->unit) {
            'd' => DV,
            'h' => TV,
        };

        $date = Date::createFromFormat($format, $value);
        $fieldDate = Date::createFromFormat($format, $this->data[$this->field]);
        $unit = $this->unit === 'd' ? 'days' : $this->unit;
        
        return $date->diff($fieldDate)->{$unit} <= $this->interval;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        $units = ['d' => 'días', 'h' => 'horas'];

        return trans('validation.interval', [
            'interval' => $this->interval,
            'other' => trans("validation.attributes.{$this->field}"),
            'unit' => $units[$this->unit], 
        ]);
    }

    /**
     * Set the data under validation.
     *
     * @param  array  $data
     * @return $this
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }
}
