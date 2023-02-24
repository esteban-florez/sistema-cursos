<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function operations()
    {
        return $this->hasMany(Operation::class);
    }

    public static function getOptions()
    {
        $items = self::all(['id', 'name']);

        $options = $items->mapWithKeys(fn($item) => [$item->id => $item->name])
            ->all();

        return $options;
    }

    public function getCurrentAmountAttribute()
    {
        if ($this->operations->count() < 1) {
            return "0 unidades.";
        }

        $amount = $this->operations->reduce(function ($carry, $operation) {
            if ($operation->type === 'Ingreso') {
                return $carry + $operation->amount;
            }

            return $carry - $operation->amount;
        }, 0);

        return "{$amount} unidades.";
    }
}
