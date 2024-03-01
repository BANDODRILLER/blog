<?php

namespace App\Http\Controllers;

use App\Models\CreateEvent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $events = CreateEvent::all();

        // Check if user_type is set and not null
        $user_type = optional(Auth::user())->user_type;

        // Default view page in case user_type is not set or null
        $viewPage = 'home.userpage';

        // If user_type is set and not null, use adminpage for user_type '1'
        if ($user_type === '1') {
            $viewPage = 'admin.adminpage';
        }

        $data = compact(
            'user',
            'events'

        );

        return view($viewPage, $data);
    }
    public function postevent(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'eventname' => 'required|string',
            'eventcapacity' => 'required|string',
            'eventlocation' => 'required|string',
            'eventdate' => 'required|string',
            'event_openingtime' => 'required|string',
            'event_closingtime' => 'required|string',
            'alias' => 'required|string',
            'single_ticket_price' => 'required|string',
            'partners_tickets_price' => 'required|string',
            'group_tickets_price' => 'required|string',
        ]);

        // Create a new CreateEvent instance and fill it with the validated data
        $createEvent = new CreateEvent($validatedData);

        // Save the event to the database
        $createEvent->save();

        // Redirect back with a success message or any other logic you need
        return redirect()->back()->with('success', 'Event created successfully');
    }

}
