<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Course;
use App\Models\Club;
use App\Models\Area;
use App\Models\Accesors\UserAccesors;

class Instructor extends Authenticatable
{
    use HasFactory, Notifiable, UserAccesors;

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

    public function clubs()
    {
        return $this->hasMany(Club::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
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

    public function scopeFilters($query, $adminFilter, $sortColumn, $search)
    {
        return $query->when(
            $sortColumn,
            function ($query, $sortColumn) {
                return $query->orderBy($sortColumn);
            }
        )->when(
            $adminFilter,
            function ($query, $adminFilter) {
                $isAdmin = $adminFilter === 'true';
                return $query->where('is_admin', '=', $isAdmin);
            }
        )->when(
            $search,
            function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%");
            }
        );
    }

    public static function getOptions()
    {
        // TODO -> un poquito de DRY no estaría mal
        $instructors = self::all(['id', 'name', 'lastname']);
        $instructors = $instructors->mapWithKeys(function ($instructor) {
            return [$instructor->id => $instructor->full_name];
        })->sortKeys();
        
        return $instructors;
    }
}
