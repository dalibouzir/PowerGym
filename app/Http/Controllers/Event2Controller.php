<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class Event2Controller extends Controller
{
    public function index()
    {
        // Retrieve events for the calendar
        $events = Event::select('id', 'title', 'description', 'type', 'start_date', 'end_date')
                        ->get()
                        ->map(function ($event) {
                            // Format the dates for FullCalendar
                            $event->start = Carbon::parse($event->start_date)->toIso8601String();
                            $event->end = Carbon::parse($event->end_date)->toIso8601String();
                            return $event;
                        });

        // Retrieve joined events for the current user
        $joinedEvents = Auth::check() ? Auth::user()->events : null;

        // Prepare events for the JavaScript calendar in the view
        $formattedEvents = $events->map(function ($event) {
            return [
                'id' => $event->id, // Include the 'id' attribute
                'title' => $event->title,
                'start' => $event->start,
                'end' => $event->end,
                // Additional fields here, if necessary
            ];
        });

        return view('calendar', compact('events', 'formattedEvents', 'joinedEvents'));
    }

    public function unjoin(Request $request, Event $event)
    {
        $user = Auth::user();
        if ($user) {
            // Check if the user has joined the event
            if ($event->users()->where('user_id', $user->id)->exists()) {
                $event->users()->detach($user->id);
                return redirect()->route('calendar.index')->with('success', 'You have successfully unjoined the event.');
            }
            return redirect()->route('calendar.index')->with('error', 'You are not a participant of this event.');
        }
        return redirect()->route('login');
    }

    // Other controller methods here...


    
public function myMethod()
{
    // Check if the user is authenticated
    if (Auth::check()) {
        // The user is logged in
        $userName = Auth::user()->name;
        // Continue with your logic, now safely using $userName
    } else {
        // User is not authenticated, redirect with a message
        return redirect('/registration')->with('error', 'You need to create an account or log in.');
    }
}
public function __construct()
{
    $this->middleware('auth');
}

}
