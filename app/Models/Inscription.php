<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\Course;
use App\Models\Payment;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inscription extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function payment()
    {   
        return $this->hasOne(Payment::class);
    }

    public function setUniqueAttribute()
    {
        // TODO -> test default attribute value on unique
        $this->attributes['unique'] = "{$this->student_id}-{$this->course_id}";
    }

    public function getStatusAttribute()
    {
        if($this->confirmed_at !== null) {
            return 'Inscrito';
        } else {
            return 'En reserva';
        }
    }

    public function getApprovedAttribute()
    {
        return $this->approved_at !== null ? 'Sí' : 'No';
    }
}
