<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'returned_at' => 'date',
    ];

    public function club()
    {
        return $this->belongsTo(Club::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function getStatusAttribute()
    {
        if ($this->returned_at !== null) {
            return 'Devuelto';
        } else {
            return 'Prestado';
        }
    }

    // public function getDateAttribute()
    // {
    //     return "{$this->returned_at->format(DV)}";
    // }
}
