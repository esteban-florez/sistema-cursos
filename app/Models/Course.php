<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Instructor;

class Course extends Model
{
    use HasFactory;

    /**
     * The attributes that are not mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];

    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }

    /**
     * Get all the registries of a Course.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function registries()
    {
        return $this->hasMany(Registry::class);
    }
}
