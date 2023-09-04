<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    public function index()
    {
        $meets = Meeting::all();
        return view('dashboard.meeting.meeting-dash', [
            'meets' => $meets
        ]);
    }
}
