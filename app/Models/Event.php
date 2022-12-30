<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Event extends Model
{
    use HasFactory;

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

//    public function scopeEventsSorted($query)
//    {
//        return $query->select("events.*")->join('donations','donations.event_id','=','events.id')
//            ->orderBy("donations.amount")
//    }

    public function teams()
    {
        return $this->hasMany(Teams::class);
    }

    public function teamsByDonation()
    {
        return $this->teams()->selectRaw("teams.*, sum(donations.amount) as 'amount'")
            ->join("events", "events.id", "=", "teams.event_id")
            ->join("user_public_data", "user_public_data.team_id", "=", "teams.id")
            ->join("donations", "donations.event_id", "=", "events.id")
            ->groupBy("teams.name")
            ->orderByDesc('amount');
    }

    public function usersByDonation()
    {
        return $this->users()->selectRaw("user_public_data.*, sum(donations.amount) as 'amount'")
            ->join("donations", "donations.user_id", "=", "user_public_data.user_id")
            ->groupBy("user_public_data.slug")
            ->orderByDesc('amount');
    }


    public function users()
    {
        return $this->hasMany(UserPublicData::class);
    }

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    public function volunteers()
    {
        return $this->hasMany(Volunteer::class);
    }


    public function totalDonations()
    {
        return $this->donations()->sum('amount');
    }
}
