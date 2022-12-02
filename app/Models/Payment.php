<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Inscription;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory, SoftDeletes;

    public static $statuses = [
        '' => 'Seleccionar',
        'pending' => 'Pendiente',
        'confirmed' => 'Confirmado',
        'rejected' => 'Rechazado',
    ];

    public static $types = [
        '' => 'Seleccionar',
        'movil' => 'Pago Móvil',
        'bs' => 'Efectivo (Bs.D.)',
        'dollars' => 'Efectivo ($)',
        'transfer' => 'Transferencia',
    ];
    
    protected $guarded = ['id'];
    
    public function inscription()
    {
        return $this->belongsTo(Inscription::class);
    }

    public function getAmountAttribute($amount)
    {
        $currency = $this->type === 'dollars' ? '$' : 'Bs.D.';
        return "{$amount} {$currency}";
    }

    public function getRefAttribute($ref)
    {
        return $ref ?? '----';
    }

    public function getTypeAttribute($type)
    {
        return static::$types[$type];
    }

    public function getStatusAttribute($status)
    {
        return static::$statuses[$status];
    }

    public function getDateAttribute($date)
    {
        return formatDate($date);
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

                if ($value === 'true') {
                    $value = true;
                } else if ($value === 'false') {
                    $value = false; 
                }

                $query->where($filter, '=', $value);
            }
            
            return $query;
        });
    }

    public function scopeSearch($query, $search)
    {
        return $query->when($search, function ($query, $search) {
            // TODO -> también debe servir para cédula de extranjero
            $id = Student::where('ci', (int) $search)
                ->first()
                ->id;
            
            $ids = Inscription::where('student_id', $id)
                ->pluck('id')
                ->all();

            return $query->whereIn('inscription_id', $ids);
        });
    }

    public function scopeSort($query, $sortColumn)
    {
        return $query->when($sortColumn, function ($query, $sortColumn) {
            return $query->orderBy($sortColumn);
        });
    }
}
