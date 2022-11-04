<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Member;
use App\Models\Registry;

class Student extends Authenticatable
{
    use HasFactory, Notifiable;

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
}
