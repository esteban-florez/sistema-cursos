<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Enrollment extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function student()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function payment()
    {   
        return $this->hasOne(Payment::class);
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
