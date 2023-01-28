<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Shared\QueryScopes;

class Payment extends Model
{
    use HasFactory, SoftDeletes, QueryScopes;
    
    protected $guarded = [];
    
    public function enrollment()
    {
        return $this->belongsTo(Enrollment::class);
    }

    public function getFullAmountAttribute()
    {
        $currency = $this->type === 'Efectivo ($)' ? '$' : 'Bs.D.';
        return "{$this->amount} {$currency}";
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

                $value = match ($value) {
                    'true' => true,
                    'false' => false,
                    default => $value,
                };

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
}
