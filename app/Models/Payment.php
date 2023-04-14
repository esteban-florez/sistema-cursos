<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Shared\QueryScopes;
use App\Services\ExchangeRate;

class Payment extends Model
{
    use HasFactory, SoftDeletes, QueryScopes;
    
    protected $guarded = [];
    
    public function enrollment()
    {
        return $this->belongsTo(Enrollment::class);
    }

    public function isOnline()
    {
        return payTypes()->take(2)->contains($this->type);
    }
    
    public function getFullAmountAttribute()
    {
        $currency = $this->type === 'Efectivo ($)' ? '$' : 'Bs.D.';

        $amount = number_format($this->amount, 2, ',', '.');

        return "{$amount} {$currency}";
    }

    public function scopeFilters($query, $filters)
    {
        return $query->when($filters, function ($query, $filters) {
            foreach($filters as $filter => $value) {
                if ($filter === 'course_id') {
                    $ids = Enrollment::where('course_id', $value)
                        ->pluck('id')
                        ->all();
                        
                    $query->whereIn('enrollment_id', $ids);
                    continue;
                }
                
                $value = strToBool($value);

                $query->where($filter, '=', $value);
            }
            
            return $query;
        });
    }

    public function scopeSearch($query, $search)
    {
        return $query->when($search, function ($query, $search) {
            $id = User::students()
                ->where('ci', (int) $search)
                ->first()
                ->id ?? 0;
            
            $ids = Enrollment::where('user_id', $id)
                ->pluck('id')
                ->all();

            return $query->whereIn('enrollment_id', $ids);
        });
    }

    public function scopeUnfulfilled($query)
    {
        return $query->withoutGlobalScope('fulfilled')
            ->where('fulfilled', false);
    }

    protected static function booted()
    {
        static::addGlobalScope('fulfilled', function ($builder) {
            $builder->where('fulfilled', true);
        });
    }

    public static function incomes()
    {
        $rate = ExchangeRate::get();

        $total = self::all()->reduce(function ($carry, $payment) use ($rate) {
            $invalid = !$payment->fulfilled || 
                $payment->status !== 'Confirmado';
            
            if ($invalid) return $carry;

            $amount = $payment->type === 'Efectivo ($)' 
                ? $payment->amount * $rate  
                : $payment->amount; 

            return $carry + $amount;
        }, 0.0);

        return number_format($total, 2, ',', '.');
    }
}
