<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Ticket;
use App\User;

class TicketController extends Controller
{
    //
    public function getTicket($event_id, $ticket_id) {
        $event = Event::where('id', $event_id)->first();
        $ticket =Ticket::where('id', $ticket_id)->first();

        return view('content.ticket.detail', ['ticket' => $ticket, 'event' => $event]);
    }

    public function scanTicket($ticket_id, $user_id) {
        $user = User::where('id', $user_id)->first();
        $ticket = Ticket::where('id', $ticket_id)->first();

        $user->tickets()->sync([$ticket['id'] => [ 'attendance' => true] ], false);

        return redirect()->route('index');
    }

    public function postCreateTicket(Request $request, $event_id) {
        $event = Event::where('id', $event_id)->first();

        //validatie
        $this->validate($request, [
            'ticket-create-name' => 'nullable|string|max:255',
            'ticket-create-description' => 'nullable|string|max:255',
            'ticket-create-type'=> 'nullable|string',
            'ticket-create-date'=> 'required|date',
            'ticket-create-price'=> 'required|regex:/^\d*(\.\d{2})?$/',
            'ticket-create-totaltickets'=> 'required|string',
        ]);


        $ticket = new Ticket;

        $ticket->name = $request->input('ticket-create-name');
        $ticket->description = $request->input('ticket-create-description');
        $ticket->type = $request->input('ticket-create-type');;
        $ticket->date = $request->input('ticket-create-date');
        $ticket->price = $request->input('ticket-create-price');
        $ticket->totaltickets = $request->input('ticket-create-totaltickets');
        $ticket->event_id = $event['id'];

        $ticket->save();
        $event->tickets()->save($ticket);

        return redirect()->route('event.edit.settings', ['id' => $event['id']]);
    }

    public function postUpdateTicket(Request $request, $event_id, $ticket_id) {
        $ticket = Ticket::where('id', $ticket_id)->first();

        //validatie
        $this->validate($request, [
            'ticket-edit-name' => 'nullable|string|max:255',
            'ticket-edit-description' => 'nullable|string|max:255',
            'ticket-edit-type'=> 'nullable|string',
            'ticket-edit-date'=> 'required|date',
            'ticket-edit-price'=> 'required|regex:/^\d*(\.\d{2})?$/',
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

    public function deleteTicket($event_id, $ticket_id){
        $event = Event::find($event_id);
        $ticket = Ticket::find($ticket_id);
        $ticket->delete();

        return redirect()->route('event.edit.settings', ['id' => $event['id']]);
    }

    public function buyEventTicket($event_id, $ticket_id){
        if(Auth::user()) {
            $event = Event::find($event_id);
            $ticket = Ticket::find($ticket_id);
            $user = Auth::user();

            return view('content.ticket.payment', ['user' => $user, 'event' => $event, 'ticket' => $ticket]);
        } else {
            return view('auth.login');
        }
    }

    public function postBuyEventTicket($event_id, $ticket_id){
        $event = Event::find($event_id);
        $ticket = Ticket::find($ticket_id);
        $user = Auth::user();

        $user->tickets()->attach($ticket['id']);

        return redirect()->route('user.account', ['user' => $user]);
    }
}
