<?php

namespace App\Models;

use App\Models\Shared\QueryScopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    use HasFactory, QueryScopes;

    protected $guarded = [];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function getFullAmountAttribute()
    {
        $sign = [
            'Desincorporación' => '-',
            'Ingreso' => '+',
        ];

        return "{$sign[$this->type]}{$this->amount}";
    }

    public function scopeSearch($query, $text)
    {
        $item = Item::where('code', $text)
            ->first();

        $query->whereBelongsTo($item);
    }
}
