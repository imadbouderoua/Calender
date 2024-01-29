<?php

namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function store(Request $request)
    {
        // Loop through the submitted data and create events
        foreach ($request->input('events') as $day => $events) {
            foreach ($events as $time => $description) {
                // Make sure $description is not null or empty before creating the event
                if (!empty($description)) {
                    // Create and save event
                    Event::create([
                        'start_time' => now()->startOfDay()->addDays($day)->addHours($time),
                        'end_time' => now()->startOfDay()->addDays($day)->addHours($time + 1),
                        'event_description' => $description,
                        // Add other fields as needed
                    ]);
                }
            }
        }

        // Redirect or return a response as needed
        return view('welcome');
    }
}
