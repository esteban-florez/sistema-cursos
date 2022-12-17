<?php

namespace App\Models\Accesors;

trait Student
{
    public function getNameAttribute()
    {
        return $this->first_name;
    }

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

    public function getRoleAttribute()
    {
        return 'Estudiante';
    }

    public function getUptaAttribute()
    {
        return $this->is_upta ? 'Sí' : 'No';
    }

    public function getAgeAttribute()
    {
        return now()->year - $this->birth->year;
    }
}