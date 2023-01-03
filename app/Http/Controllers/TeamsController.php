<?php

namespace App\Http\Controllers;

use App\Models\Teams;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    public function view(Teams $team)
    {
        return view('events.teams.view')->with('team', $team);
    }
}
