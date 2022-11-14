<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Member;
use App\Models\Registry;
use App\Models\Accesors\UserAccesors;

class Student extends Authenticatable
{
    use HasFactory, Notifiable, UserAccesors;

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

    /**
     * Get all the memberships of a Student.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function memberships()
    {
        return $this->hasMany(Member::class);
    }

    /**
     * Get all the registries of a Student.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function registries()
    {
        return $this->hasMany(Registry::class);
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

    public function getUptaAttribute()
    {
        return $this->is_upta ? 'Sí' : 'No';
    }
}
