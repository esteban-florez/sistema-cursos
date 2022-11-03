<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\Club;

class Member extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function students() {
        return $this->belongsTo(Student::class);
    }

    public function club() {
        return $this->belongsTo(Club::class);
    }
}
