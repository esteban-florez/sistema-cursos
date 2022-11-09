<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Course;
use App\Models\Club;

class Instructor extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are not mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id', 'admin'];

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

    public function getFullNameAttribute()
    {
        return "{$this->name} {$this->lastname}";
    }

    public function getRoleAttribute()
    {
        if ($this->is_admin) {
            return 'Administrador';
        }
        
        return 'Instructor';
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

    public function getAdminAttribute()
    {
        return $this->is_admin ? 'Sí' : 'No';
    }
}
