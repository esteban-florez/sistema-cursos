<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Instructor;
use App\Models\Shared\QueryScopes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class Course extends Model
{
    use HasFactory, QueryScopes;

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
        return $this->belongsToMany(Student::class, 'registries')
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
        return Str::words($this->description, 8);
    }

    public function getStudentCountAttribute()
    {
        return Registry::where('course_id', $this->id)
            ->count();
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
