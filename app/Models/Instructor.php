<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Course;
use App\Models\Club;
use App\Models\Shared\QueryScopes;
use App\Models\Shared\UserAccesors;

class Instructor extends Authenticatable
{
    use HasFactory, Notifiable, UserAccesors, QueryScopes;

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
    ];

    protected static $searchColumn = 'name';

    public function clubs()
    {
        return $this->hasMany(Club::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function instructor()
    {
        return $this->belongsTo(instructor::class);
    }

    public function getNamesAttribute()
    {
        return $this->name;
    }

    public function getLastnamesAttribute()
    {
        return $this->lastname;
    }

    public function getFullNameAttribute()
    {
        return "{$this->name} {$this->lastname}";
    }

    public function getRoleAttribute()
    {
        return $this->is_admin ? 'Administrador' : 'Instructor';
    }

    public function getAdminAttribute()
    {
        return $this->is_admin ? 'Sí' : 'No';
    }

    public static function getOptions($withDefault = true)
    {
        $instructors = self::all(['id', 'name', 'lastname']);

        $options = $instructors->mapWithKeys(function ($instructor) {
            return [$instructor->id => $instructor->full_name];
        })->sortKeys()->all();

        if ($withDefault) {
            $defaultOptions = ['' => 'Todos'];
            return $defaultOptions + $options;
        }

        return $options;
    }
}
