<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Membership;
use App\Models\Enrollment;
use App\Models\Shared\QueryScopes;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, Notifiable, QueryScopes, SoftDeletes;

    const ROLE_ADMIN = 1;
    const ROLE_INSTRUCTOR = 2;
    const ROLE_STUDENT = 3;

    /**
     * The attributes that are not mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id', 'is_admin'];

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

    public function enrolledCourses()
    {
        return $this->belongsToMany(Course::class, 'enrollments');
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function clubs()
    {
        return $this->hasMany(Club::class);
    }

    public function dictatedCourses()
    {
        return $this->hasMany(Course::class);
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

    /** --------------- Query Scopes --------------- */

    public function scopeInstructors($query)
    {
        return $query->where('role', User::ROLE_INSTRUCTOR);
    }

    public function scopeStudents($query)
    {
        return $query->where('role', User::ROLE_STUDENT);
    }

    /** --------------- Accesors and Mutators --------------- */

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

    public function getUptaAttribute()
    {
        return $this->is_upta ? 'Sí' : 'No';
    }

    public function getAgeAttribute()
    {
        return now()->year - $this->birth->year;
    }

    public function getFullCiAttribute()
    {
        $reverseCi = str_split(strrev($this->ci));
        $length = count($reverseCi);
        array_splice($reverseCi, 3, 0, '.');
        if ($length > 6) {
            array_splice($reverseCi, 7, 0, '.');
        }
        $ci = strrev(implode($reverseCi));

        return "{$this->ci_type}-{$ci}";
    }

    public function getTelAttribute()
    {
        $phone = str_split($this->phone);
        array_splice($phone, 4, 0, '-');
        return implode($phone);
    }

    public function getImageAttribute($image)
    {
        return $image ?? 'img/user-placeholder.png';
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public static function instructorsAsOptions()
    {
        $instructors = self::all(['id', 'name', 'lastname']);

        $options = $instructors->mapWithKeys(fn($instructor) => 
            [$instructor->id => $instructor->full_name])
            ->sortKeys()->all();

        return $options;
    }
}
