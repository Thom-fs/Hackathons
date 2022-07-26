<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function groups(): HasMany
    {
        return $this->hasMany(Group::class);
    }

    public function event_users(): HasMany
    {
        return $this->hasMany(EventUser::class);
    }
}
