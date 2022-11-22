<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Member;
use App\Models\Registry;
use App\Models\Shared\QueryScopes;
use App\Models\Shared\UserAccesors;

class Student extends Authenticatable
{
    use HasFactory, Notifiable, UserAccesors, QueryScopes;

    /**
     * The attributes that are not mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static $searchColumn = 'first_name';

    
    // TODO -> se me ocurrió poner las estructuras como esta en los respectivos modelos, de modo que así se puedan usar, quizás solo dentro de los modelos ("protected"), o en todos lados, como para pasar datos a selects y tal ("public"). Por ahora sigamos como vamos xD
    protected static $grades = [
        'school' => 'Primaria',
        'high' => 'Bachillerato',
        'tsu' => 'TSU',
        'college' => 'Pregrado'
    ];
    /**
     * Get all the memberships of a Student.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function memberships()
    {
        return $this->hasMany(Member::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'registries')
            ->withTimestamps()
            ->withPivot(['id', 'approval']);
    }

    public function enroll(Course $course)
    {
        // TODO -> por ahora así, pero no se, me suena que hay que hacer cosas con ManyToMany y el metodo associate()
        $registry = Registry::create([
            'student_id' => $this->id,
            'course_id' => $course->id
        ]);

        return $registry;
    }

    /**
     * Accesor for the "name" attribute of a Student.
     * 
     * @return string
     */
    public function getNameAttribute()
    {
        return $this->first_name;
    }
    
    /**
     * Accesor for the "lastname" attribute of a Student.
     * 
     * @return string
     */
    public function getLastnameAttribute()
    {
        return $this->first_lastname;
    }

    public function getNamesAttribute()
    {
        return "{$this->first_name} {$this->second_name}";
    }

    public function getLastnamesAttribute()
    {
        return "{$this->first_lastname} {$this->second_lastname}";
    }

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->first_lastname}";
    }

    /**
     * Accesor for the "role" attribute of a Student.
     * 
     * @return string
     */
    public function getRoleAttribute()
    {
        return 'Estudiante';
    }

    public function getIsUptaAttribute($isUpta)
    {
        return $isUpta ? 'Sí' : 'No';
    }

    public function getGradeAttribute($grade)
    {
        $grades = [
            'school' => 'Primaria',
            'high' => 'Bachillerato',
            'tsu' => 'TSU',
            'college' => 'Pregrado'
        ];
        
        return $grades[$grade];
    }
}
