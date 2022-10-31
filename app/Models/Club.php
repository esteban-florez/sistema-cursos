<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Member;
use App\Models\Inventario;

class Club extends Model
{
    use HasFactory;

    public function members() {
        return $this->hasMany(Member::class);
    }

    public function inventarios() {
        return $this->hasMany(Inventario::class);
    }
}
