<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Instructor;
use App\Models\Course;

class Area extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function instructors()
    {
        return $this->hasMany(Instructor::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public static function getOptions($withDefault = true)
    {
        $areas = self::all(['id', 'name']);

        $options = $areas->mapWithKeys(function ($area) {
            return [$area->id => $area->name];
        })->sortKeys()->all();

        if ($withDefault) {
            $defaultOptions = ['' => 'Seleccionar'];
            return $defaultOptions + $options;
        }

        return $options;
    }
}
