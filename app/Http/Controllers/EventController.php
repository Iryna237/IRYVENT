<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string|max:2000',
            'event_type'  => 'required|in:concert,conference,sports,workshop',
            'start_date'  => 'required|date',
            'end_date'    => 'required|date|after:start_date',
            'location'    => 'required|string|max:255',
            'banner'      => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        if ($request->hasFile('banner')) {
            $validated['banner'] = $request->file('banner')->store('banners', 'public');
        }

        $event = Event::create($validated);

        foreach ($request->tickets as $type => $ticketData) {
            $newTicket = Ticket::create([
                'event_id'   => $event->id,
                'type'       => $type,
                'price'      => $ticketData['price'] ?? 0,
                'quantity'   => $ticketData['quantity'] ?? 1,
                'description'=> $ticketData['description'] ?? null,
                'qr_code'    => '',
            ]);
            $newTicket->qr_code = 'TK'.$newTicket->id.$newTicket->price;
            $newTicket->save();
        }


        return redirect()->back()->with('success','Event created successfully!');
    }
}
