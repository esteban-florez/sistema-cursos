<?php

namespace App\Models\Accesors;

trait UserAccesors
{
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

    public function getGenderAttribute($gender)
    {
        return $gender === 'male' ? 'Masculino' : 'Femenino';
    }


    public function getImageAttribute($image)
    {
        return $image ?? 'img/user-placeholder.png';
    }
    // TODO -> crear un getRawGender accesor

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}
