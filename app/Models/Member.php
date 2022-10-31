<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Estudiante;
use App\Models\Club;

class Member extends Model
{
    use HasFactory;

    public function estudiantes() {
        return $this->belongsTo(Estudiante::class);
    }

    public function club() {
        return $this->belongsTo(Club::class);
    }
}
