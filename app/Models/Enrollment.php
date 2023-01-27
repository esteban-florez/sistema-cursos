<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Enrollment extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    protected $with = ['payments', 'student'];

    // TODO -> esta cantidad de días la pone Edeblangel, toca preguntar
    const EXPIRES_IN = 7;

    public function student()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function payments()
    {   
        return $this->hasMany(Payment::class);
    }

    public function getSolvencyAttribute()
    {
        return $this->payments->every(fn($payment) => $payment->status === 'Confirmado');
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

    public function scopeExpired($query)
    {
        $query->where('created_at', '<', now()->subDays(self::EXPIRES_IN)->format(DV))
            ->whereNull('confirmed_at');
    }
}
