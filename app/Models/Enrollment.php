<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Enrollment extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $with = ['payments', 'student'];

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
        $solvency = $this->payments->every(
            fn($payment) => $payment->status === 'Confirmado'
        );

        return $solvency ? 'Solvente' : 'Pendiente';
    }

    // IMPROVE -> 3
    public function getStatusAttribute()
    {
        if ($this->confirmed_at !== null) {
            return 'Inscrito';
        } else {
            return 'En reserva';
        }
    }

    public function getExpiresAtAttribute()
    {
        return $this->created_at->addDays(self::EXPIRES_IN);
    }

    public function scopeExpired($query)
    {
        $query->where('created_at', '<', now()->subDays(self::EXPIRES_IN)->format(DV))
            ->whereNull('confirmed_at');
    }
}
