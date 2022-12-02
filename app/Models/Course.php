<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Instructor;
use App\Models\Shared\QueryScopes;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, QueryScopes, SoftDeletes;

    /**
     * The attributes that are not mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];

    protected static $searchColumn = 'name';

    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'inscriptions')
            ->withTimestamps()
            ->withPivot(['id', 'approval']);
    }

    public function area() 
    {
        return $this->belongsTo(Area::class);
    }

    public function getStartTimeAttribute($startTime) 
    {
        return formatTime($startTime);
    }

    public function getEndTimeAttribute($endTime) 
    {
        return formatTime($endTime);
    }

    public function getStartInsAttribute($startIns) 
    {
        return formatDate($startIns);
    }

    public function getEndInsAttribute($endIns) 
    {
        return formatDate($endIns);
    }

    public function getStartCourseAttribute($startCourse) 
    {
        return formatDate($startCourse);
    }

    public function getEndCourseAttribute($endCourse) 
    {
        return formatDate($endCourse);
    }

    public function getExcerptAttribute()
    {
        return Str::words($this->description, 7);
    }

    public function getStudentCountAttribute()
    {
        return Inscription::where('course_id', $this->id)
            ->count();
    }

    public function getStudentDiffAttribute()
    {
        return "{$this->student_count} / {$this->student_limit}";
    }

    public function getDaysAttribute($daysString)
    {
        $days = collect(explode(',', $daysString));
        return $days->map(function ($day) {
            return getWeekDay($day);
        })->join(', ', ' y ');
    }

    public function setDaysAttribute($daysArray)
    {
        $this->attributes['days'] = collect($daysArray)
            ->join(',');
    }

    public function getStatusAttribute()
    {
        $now = now()->getTimestamp();
        $insStart = Date::createFromFormat('Y-m-d', $this->getRawOriginal('start_ins'))->getTimestamp();
        $insEnd = Date::createFromFormat('Y-m-d', $this->getRawOriginal('end_ins'))->getTimestamp();
        $courseStart = Date::createFromFormat('Y-m-d', $this->getRawOriginal('start_course'))->getTimestamp();
        $courseEnd = Date::createFromFormat('Y-m-d', $this->getRawOriginal('end_course'))->getTimestamp();

        if($now < $insStart) {
            return 'Pre-inscripciones';
        }

        if($now < $insEnd) {
            return 'Inscipciones';
        }

        if($now < $courseStart) {
            return 'Pre-curso';
        }

        if($now < $courseEnd) {
            return 'En curso';
        }

        return 'Finalizado';
    }

    public function getDurationHoursAttribute()
    {
        return "{$this->duration} hrs.";
    }

    public function scopeAvailables($query)
    {
        // TODO -> debe haber mejores maneras de hacer estos tres scopeQuery
        $courses = Course::withCount('students')->get();
        
        $ids = $courses->filter(function ($course) {
            return $course->students_count < $course->student_limit;
        })->map(function ($course) {
            return $course->id;
        })->values()->all();
        
        return $query->whereIn('id', $ids);
    }
    
    public function scopeNotBoughtBy($query, $student)
    {
        $ids = $student->courses->pluck('id');
        $query->whereNotIn('id', $ids);
    }

    public function scopeBoughtBy($query, $student)
    {
        $ids = $student->courses->pluck('id');
        $query->whereIn('id', $ids);
    }

    public static function getOptions($withDefault = true)
    {
        $areas = self::all(['id', 'name']);

        $options = $areas->mapWithKeys(function ($area) {
            return [$area->id => $area->name];
        })->sortKeys()->all();

        if ($withDefault) {
            $defaultOptions = ['' => 'Seleccionar'];
            return $defaultOptions + $options;
        }

        return $options;
    }
}
