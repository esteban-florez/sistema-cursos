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

    protected static $searchColumn = 'name';

    protected $casts = [
        'start_hour' => 'datetime',
        'end_hour' => 'datetime',
    ];

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

    public function getHourAttribute()
    {
        return "{$this->start_hour->format(TF)} a {$this->end_hour->format(TF)}";
    }

    public function getExcerptAttribute()
    {
        return Str::words($this->description, 8);
    }
}
