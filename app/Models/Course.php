<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Shared\QueryScopes;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Accesors\Course as Accesors;

class Course extends Model
{
    use HasFactory, QueryScopes, SoftDeletes, Accesors;

    /**
     * The attributes that are not mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];

    protected $casts = [
        'start_ins' => 'date',
        'end_ins' => 'date',
        'start_course' => 'date',
        'end_course' => 'date',
        'start_hour' => 'datetime',
        'end_hour' => 'datetime',
    ];

    protected static $searchColumn = 'name';

    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'inscriptions');
    }

    public function inscriptions()
    {
        return $this->hasMany(Inscription::class);
    }

    public function area() 
    {
        return $this->belongsTo(Area::class);
    }

    public function scopeOnInscriptions($query)
    {
        // TODO -> debe haber mejores maneras de hacer estos cuatro scopeQuery, y evitar tanta repetición de codigo.
        $courses = self::all();
        
        $ids = $courses->filter(fn($course) => $course->phase === 'Inscripciones')
            ->ids();
        
        return $query->whereIn('id', $ids);
    }

    public function scopeAvailables($query)
    {
        $courses = self::withCount('students')->get();
        
        $ids = $courses->filter(fn($course) => 
            $course->students_count < $course->student_limit)
            ->ids();
        
        return $query->whereIn('id', $ids);
    }
    
    public function scopeNotBoughtBy($query, $student)
    {
        $ids = $student
            ->courses
            ->ids();

        $query->whereNotIn('id', $ids);
    }

    public function scopeBoughtBy($query, $student)
    {
        $ids = $student
            ->courses
            ->ids();
        
        $query->whereIn('id', $ids);
    }

    public static function getOptions()
    {
        $areas = self::all(['id', 'name']);

        $options = $areas->mapWithKeys(fn($area) => [$area->id => $area->name])
            ->sortKeys()
            ->all();

        return $options;
    }

    private function currentPhase()
    {
        $now = now()->getTimestamp();
        $startIns = $this->start_ins->getTimestamp();
        $endIns = $this->end_ins->getTimestamp();
        $startCourse = $this->start_course->getTimestamp();
        $endCourse = $this->end_course->getTimestamp();

        return match(true) {
            $now < $startIns => 'Pre-inscripciones',
            $now < $endIns => 'Inscripciones',
            $now < $startCourse => 'Pre-curso',
            $now < $endCourse => 'En curso',
            default => 'Finalizado',
        };
    }

    private function studentCount()
    {
        return $this->students()->count();
    }
}
