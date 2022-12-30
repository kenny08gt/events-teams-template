<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teams extends Model
{
    use HasFactory;

    public function scopeFromEvent($query, $event_id)
    {
        return $query->where('event_id', $event_id);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function members()
    {
        return $this->hasMany(UserPublicData::class ,'team_id');
    }

    public function donations()
    {
        return $this->members()->join('donations', 'donations.user_id', '=', 'user_public_data.user_id')
            ->sum('donations.amount');
    }
}
