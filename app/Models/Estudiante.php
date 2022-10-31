<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Member;

class Estudiante extends Model
{
    use HasFactory;

    // Relacion uno a uno
    // public function user(){
    //     return $this->hasOne(User::class);
    // }

    public function member() {
        return $this->hasOne(Member::class);
    }
}
