<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MainController extends Controller
{
    public function index() {
        $events = Event::all();

        // Parse 'start_time' string to Carbon datetime object for each event
        $events->transform(function ($event) {
            $event->start_time = Carbon::parse($event->start_time);
            return $event;
        });

        return view('welcome', compact('events'));
    }
}
