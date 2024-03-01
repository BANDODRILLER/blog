<?php

namespace App\Http\Controllers;

use App\Models\CreateEvent;
use App\Models\Tickets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketsController extends Controller
{
    public function tickets(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            // Add any other validation rules for checkboxes if needed
        ]);

        // Process the selected services and concatenate them with commas
        $selectedServices = implode(', ', $request->input('services', []));

        // Create a new ticket entry in the database and retrieve the created model instance
        $ticket = Tickets::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'events' => $selectedServices,
            // Add other fields as needed
        ]);

        $ticketId = $ticket->id; // Retrieve the ID of the created entry
        $email = $request->input('email');
        $name = $request->input('name');
        $user = Auth::user();
        $events = CreateEvent::all();


        // Redirect to the next page with the ticket ID
        return view('home.ticketpage', compact('user', 'events', 'selectedServices', 'ticketId', 'name', 'email'));
    }

}
