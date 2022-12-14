<?php

namespace App\Models\Accesors;

use Illuminate\Support\Str;

trait Course 
{
    public function getExcerptAttribute()
    {
        return Str::words($this->description, 8);
    }

    public function getStudentCountAttribute()
    {
        return $this->studentCount();
    }

    public function getStudentDiffAttribute()
    {
        return "{$this->studentCount()} / {$this->student_limit}";
    }

    public function getDaysTextAttribute()
    {
        return collect(explode(',', $this->days))
            ->join(', ', ' y ');
    }

    public function getDaysArrAttribute()
    {
        return collect(explode(',', $this->days));
    }

    public function getPhaseAttribute()
    {
        return $this->currentPhase();
    }

    public function getDurationHoursAttribute()
    {
        return "{$this->duration} hrs.";
    }

    public function setDaysAttribute($daysArray)
    {
        $this->attributes['days'] = collect($daysArray)
            ->join(',');
    }
}