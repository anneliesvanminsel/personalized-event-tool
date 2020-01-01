<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Ticket;

class TicketController extends Controller
{
    //
    public function postCreateTicket(Request $request, $event_id) {
        $event = Event::where('id', $event_id)->first();

        //validatie
        $this->validate($request, [
            'name' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'type'=> 'nullable|string',
            'date'=> 'required|date',
            'price'=> 'required|integer',
            'totaltickets'=> 'required|string',
        ]);


        $ticket = new Ticket;

        $ticket->name = $request->input('name');
        $ticket->description = $request->input('description');
        $ticket->type = $request->input('type');;
        $ticket->date = $request->input('date');
        $ticket->price = $request->input('price');
        $ticket->event_id = $event['id'];

        $ticket->save();
        $event->tickets()->save($ticket);

        return redirect()->route('event.edit.settings', ['id' => $event['id']]);
    }

    public function postUpdateTicket(Request $request, $event_id) {
        $event = Event::where('id', $event_id)->first();

        //validatie
        $this->validate($request, [
            'name' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'type'=> 'nullable|string',
            'date'=> 'required|date',
            'price'=> 'required|integer',
            'totaltickets'=> 'required|string',
        ]);


        $ticket = new Ticket;

        $ticket->name = $request->input('name');
        $ticket->description = $request->input('description');
        $ticket->type = $request->input('type');;
        $ticket->date = $request->input('date');
        $ticket->price = $request->input('price');
        $ticket->event_id = $event['id'];

        $ticket->save();
        $event->tickets()->save($ticket);

        return redirect()->route('event.edit.settings', ['id' => $event['id']]);
    }
}
