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
        $ticket->totaltickets = $request->input('totaltickets');
        $ticket->event_id = $event['id'];

        $ticket->save();
        $event->tickets()->save($ticket);

        return redirect()->route('event.edit.settings', ['id' => $event['id']]);
    }

    public function updateTicket(Request $request, $event_id, $ticket_id)
    {
        $ticket = Ticket::where('id', $ticket_id)->first();

        return redirect()->route('ticket.update', ['event_id' => $event_id, 'ticket_id' => $ticket['id']]);
    }

    public function postUpdateTicket(Request $request, $event_id, $ticket_id) {
        $ticket = Ticket::where('id', $ticket_id)->first();

        //validatie
        $this->validate($request, [
            'ticket-edit-name' => 'nullable|string|max:255',
            'ticket-edit-description' => 'nullable|string|max:255',
            'ticket-edit-type'=> 'nullable|string',
            'ticket-edit-date'=> 'required|date',
            'ticket-edit-price'=> 'required|integer',
            'ticket-edit-totaltickets'=> 'required|string',
        ]);

        $ticket->name = $request->input('ticket-edit-name');
        $ticket->description = $request->input('ticket-edit-description');
        $ticket->type = $request->input('ticket-edit-type');;
        $ticket->date = $request->input('ticket-edit-date');
        $ticket->price = $request->input('ticket-edit-price');
        $ticket->totaltickets = $request->input('ticket-edit-totaltickets');

        $ticket->save();

        return redirect()->route('event.edit.settings', ['id' => $event_id]);
    }
}
