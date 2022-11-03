<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Club;
use App\Models\Item;

class Inventory extends Model
{
    use HasFactory;

    private $guarded = ['id'];

    public function club()
    {
        return $this->belongsTo(Club::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
