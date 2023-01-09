<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Inscription;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Shared\QueryScopes;

class Payment extends Model
{
    use HasFactory, SoftDeletes, QueryScopes;
    
    protected $guarded = ['id'];
    
    public function inscription()
    {
        return $this->belongsTo(Inscription::class);
    }

    public function getAmountAttribute($amount)
    {
        $currency = $this->type === 'Efectivo ($)' ? '$' : 'Bs.D.';
        return "{$amount} {$currency}";
    }

    public function getRefAttribute($ref)
    {
        return $ref ?? '----';
    }

    public function scopeFilters($query, $filters)
    {
        return $query->when($filters, function ($query, $filters) {
            foreach($filters as $filter => $value) {
                if ($filter === 'course_id') {
                    $ids = Inscription::where('course_id', $value)
                        ->pluck('id')
                        ->all();
                        
                    $query->whereIn('inscription_id', $ids);
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
            $id = Student::where('ci', (int) $search)
                ->first()
                ->id ?? 0;
            
            $ids = Inscription::where('student_id', $id)
                ->pluck('id')
                ->all();

            return $query->whereIn('inscription_id', $ids);
        });
    }
}
