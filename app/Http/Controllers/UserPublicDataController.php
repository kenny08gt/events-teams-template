<?php

namespace App\Http\Controllers;

use App\Models\UserPublicData;
use Illuminate\Http\Request;

class UserPublicDataController extends Controller
{
    public function view(UserPublicData $userPublicData)
    {
        return view('events.users.view')->with('user', $userPublicData);
    }
}
