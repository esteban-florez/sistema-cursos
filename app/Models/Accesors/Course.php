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

    public function getDateAttribute()
    {
        return "{$this->start_course->format(DF)} al {$this->end_course->format(DF)}";
    }
    
    public function getInsDateAttribute()
    {
        return "{$this->start_ins->format(DF)} al {$this->end_ins->format(DF)}";
    }
    
    public function getHoursAttribute()
    {
        return "{$this->start_time->format(TF)} a {$this->end_time->format(TF)}";
    }

    public function getTotalAmountAttribute()
    {
        return "{$this->total_price}$";
    }

    public function getReservAmountAttribute()
    {
        return "{$this->reserv_price}$";
    }

    public function setDaysAttribute($daysArray)
    {
        $this->attributes['days'] = collect($daysArray)
            ->join(',');
    }
}