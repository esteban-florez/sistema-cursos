<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Membership;
use App\Models\Enrollment;
use App\Models\Shared\QueryScopes;
use App\Models\Shared\UserAccesors;
use App\Models\Accesors\Student as Accesors;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Authenticatable
{
    use HasFactory, Notifiable, UserAccesors, QueryScopes, SoftDeletes, Accesors;

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
        'birth' => 'datetime',
    ];

    protected static $searchColumn = 'first_name';

    /**
     * Get all the memberships of a Student.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function memberships()
    {
        return $this->hasMany(Membership::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'enrollments');
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function enroll(Course $course)
    {
        // TODO -> por ahora así, pero no se, me suena que hay que hacer cosas con ManyToMany y el metodo associate()
        $enrollment = Enrollment::create([
            'student_id' => $this->id,
            'course_id' => $course->id,
        ]);

        return $enrollment;
    }
}
