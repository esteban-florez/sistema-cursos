<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Membership;
use App\Models\Inventory;
use App\Models\Instructor;
use App\Models\Shared\QueryScopes;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class Club extends Model
{
    use HasFactory, QueryScopes, SoftDeletes;

    protected $guarded = ['id'];

    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }

    public function memberships()
    {
        return $this->belongsTo(Membership::class);
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

    public function getExcerptAttribute()
    {
        return Str::words($this->description, 7);
    }
}
