<?php

namespace App\Http\Controllers;

use App\Organisation;
use Illuminate\Http\Request;
use Auth;

use App\Event;
use App\Ticket;
use App\User;

class TicketController extends Controller
{
    //
	function getTickets($organisation_id, $event_id) {
		$org = Organisation::where('id', $organisation_id)->first();
		$event = Event::where('id', $event_id)->first();

		return view('content.ticket.overview', ['organisation' => $org,'event' => $event]);
	}

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

	function createTicket($organisation_id, $event_id) {
		$org = Organisation::where('id', $organisation_id)->first();
		$event = Event::where('id', $event_id)->first();

		return view('content.ticket.create', ['organisation' => $org,'event' => $event]);
	}

    public function postCreateTicket(Request $request, $organisation_id, $event_id) {
        $event = Event::where('id', $event_id)->first();
		$org = Organisation::where('id', $organisation_id)->first();

		//validatie
        $this->validate($request, [
            'description' => 'nullable|string|max:255',
            'type'=> 'nullable|string',
            'date'=> 'required|date',
            'price'=> 'required|regex:/^\d*(\.\d{2})?$/',
            'totaltickets'=> 'nullable|string',
        ]);

        $ticket = new Ticket;

        $ticket->description = $request->input('description');
        $ticket->type = $request->input('type');
        $ticket->date = $request->input('date');
        $ticket->price = $request->input('price');
        $ticket->totaltickets = $request->input('totaltickets');
        $ticket->event_id = $event['id'];

        $ticket->save();
        $event->tickets()->save($ticket);

		return redirect()->route('event.settings.ticket', ['organisation_id' => $org['id'], 'event_id' => $event['id']]);

	}

	function updateTicket($organisation_id, $event_id, $ticket_id) {
		$organisation = Organisation::where('id', $organisation_id)->first();
		$event = Event::where('id', $event_id)->first();
		$ticket = Ticket::where('id', $ticket_id)->first();

		return view('content.ticket.edit', ['organisation' => $organisation, 'event' => $event, 'current_ticket' => $ticket]);
	}

    public function postUpdateTicket(Request $request, $organisation_id, $event_id, $ticket_id) {
        $ticket = Ticket::where('id', $ticket_id)->first();
		$event = Event::where('id', $event_id)->first();
		$org = Organisation::where('id', $organisation_id)->first();

        //validatie
        $this->validate($request, [
            'description' => 'nullable|string|max:255',
            'type'=> 'nullable|string',
            'date'=> 'required|date',
            'price'=> 'required|regex:/^\d*(\.\d{2})?$/',
            'totaltickets'=> 'required|string',
        ]);

        $ticket->description = $request->input('description');
        $ticket->type = $request->input('type');;
        $ticket->date = $request->input('date');
        $ticket->price = $request->input('price');
        $ticket->totaltickets = $request->input('totaltickets');

        $ticket->save();

        return redirect()->route('event.settings.ticket', ['organisation_id' => $org['id'], 'event_id' => $event['id']]);
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
