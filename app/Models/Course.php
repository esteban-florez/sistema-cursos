<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Instructor;
use App\Models\Shared\QueryScopes;
use Carbon\Carbon;
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
        return $this->belongsToMany(Course::class, 'registries')
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

    public static function getOptions($withDefault = false)
    {
        $areas = self::all(['id', 'name']);

        $options = $areas->mapWithKeys(function ($area) {
            return [$area->id => $area->name];
        })->sortKeys()->all();

        if ($withDefault) {
            $defaultOptions = ['' => 'Todos'];
            return $defaultOptions + $options;
        }

        return $options;
    } 
}
