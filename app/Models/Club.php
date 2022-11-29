<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Member;
use App\Models\Inventory;
use App\Models\Instructor;
use App\Models\Shared\QueryScopes;

class Club extends Model
{
    use HasFactory, QueryScopes;

    protected $guarded = ['id'];

    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }

    public function members()
    {
        return $this->belongsTo(Member::class);
    }

    public function inventories()
    {
        return $this->belongsTo(Inventory::class);
    }

    public function getStartHourAttribute($startHour) 
    {
        return formatTime($startHour);
    }

    public function getEndHourAttribute($endHour) 
    {
        return formatTime($endHour);
    }
}
