<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{

    public function view(Event $event)
    {
        return view("events.view")->with("event", $event);
    }
}
