<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicketController extends Controller
{
    //
    public function postCreateEvent(Request $request, $event_id) {
        $event = Event::where('id', $event_id)->first();

        //validatie
        $this->validate($request, [
            'name' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'type'=> 'nullable|string',
            'date'=> 'required|date',
            'price'=> 'nullable|number',
            'totaltickets'=> 'required|string',
        ]);


        $ticket = new Ticket;

        $ticket->title = $request->input('title');
        $ticket->description = $request->input('description');
        $ticket->type = $request->input('type');;
        $ticket->date = $request->input('date');

        $ticket->save();
        $event->tickets()->attach($ticket);

        return redirect()->route('event.setting', ['id' => $event['id']]);
    }
}
