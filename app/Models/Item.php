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
}
