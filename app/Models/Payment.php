<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Registry;
use App\Models\Shared\QueryScopes;

class Payment extends Model
{
    use HasFactory, QueryScopes;

    protected $guarded = ['id'];
    
    public function registry()
    {
        return $this->belongsTo(Registry::class);
    }

    public function student()
    {
        return $this->registry()
            ->first()
            ->student();
    }

    public function course()
    {
        return $this->registry()
            ->first()
            ->course();
    }

    public function getAmountAttribute($amount)
    {
        $currency = $this->type === 'dollars' ? '$' : 'Bs.D.';
        return "{$amount} {$currency}";
    }
}
