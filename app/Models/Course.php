<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Instructor;
use Carbon\Carbon;

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

    public function area() 
    {
        return $this->belongsTo(Area::class);
    }

    public function getStartTimeAttribute($startTime) 
    {
        $newStartTime = Carbon::createFromFormat('H:i:s', $startTime);

        return $newStartTime->format('g:i A');
    }

    public function getEndTimeAttribute($endTime) 
    {
        $newEndTime = Carbon::createFromFormat('H:i:s', $endTime);

        return $newEndTime->format('g:i A');
    }

    public function getStartInsAttribute($startIns) 
    {
        $startIns = Carbon::createFromFormat('Y-m-d', $startIns);

        return $startIns->format('m/d/Y');
    }

    public function getEndInsAttribute($endIns) 
    {
        $endIns = Carbon::createFromFormat('Y-m-d', $endIns);

        return $endIns->format('m/d/Y');
    }
}
