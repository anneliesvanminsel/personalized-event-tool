<?php

namespace App\Http\Controllers;

use Auth;
use App\Event;
use App\Organisation;
use App\Ticket;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class EventController extends Controller
{
    //
	public function getEventDetail($id) {
		$event = Event::where('id', $id)->first();

		return view('content.event.detail', ['event' => $event]);
	}

	public function createEvent($organisation_id) {
		$organisation = Organisation::where('id', $organisation_id)->first();

		return view('content.event.create', ['organisation_id' => $organisation->id]);
	}

	public function postCreateEvent(Request $request, $organisation_id) {
		$organisation = Organisation::where('id', $organisation_id)->first();

		//validatie
		$this->validate($request, [
			'title' => 'required|string|max:255',
			'description' => 'required|string|max:1000',
			'type'=> 'required|string', //with examples
            'starttime'=> 'required|date|max:20',
            'endtime'=> 'nullable|date|max:20',
			'bkgcolor' => [
				'nullable',
				'string',
				'regex:/^(\#[\da-f]{3}|\#[\da-f]{6})$/i',
			],
			'textcolor' => [
				'nullable',
				'string',
				'regex:/^(\#[\da-f]{3}|\#[\da-f]{6})$/i',
			],
			'logo'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', //image
		]);

		$imageName = time().'.'.request()->logo->getClientOriginalExtension();
		request()->logo->move(public_path('images'), $imageName);

		$boolStatus = 0;

		$event = new Event;

		$event->title = $request->input('title');
		$event->description = $request->input('description');
		$event->type = $request->input('type');;
		$event->status = (int)$boolStatus;
		$event->bkgcolor = $request->input('bkgcolor');
		$event->textcolor = $request->input('textcolor');
		$event->logo = $imageName;
        $event->starttime = $request->input('starttime');
        $event->endtime = $request->input('endtime');

        $event->save();
		$organisation->events()->attach($event);

		return redirect()->route('event.detail', ['id' => $event['id']]);
	}

	public function UpdateEvent($id) {
		$event = Event::where('id', $id)->first();

		return view('content.event.edit',['event' => $event]);
	}

	public function postUpdateEvent(Request $request, $event_id) {

		//validatie
		$this->validate($request, [
			'title' => 'required|string|max:255',
			'description'=> 'required|string|max:1000',
			'eventtype'=> 'required|string|max:255', //with examples
			'bkgcolor' => [
				'nullable',
				'string',
				'regex:/^(\#[\da-f]{3}|\#[\da-f]{6})$/i',
			],
			'textcolor' => [
				'nullable',
				'string',
				'regex:/^(\#[\da-f]{3}|\#[\da-f]{6})$/i',
			],
			'logo'=> 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', //image
			'starttime'=> 'required|string|max:20',
			'endtime'=> 'nullable|string|max:20',
		]);

		$event = Event::find($event_id);

		$event->title = $request->input('title');
		$event->description = $request->input('description');
		$event->type = $request->input('eventtype');
		$event->bkgcolor = $request->input('bkgcolor');
		$event->textcolor = $request->input('textcolor');
		$event->endtime = $request->input('endtime');
		$event->starttime = $request->input('starttime');

		if (request()->logo) {
			$image_path = public_path() . "/images/" . $event['logo'];  // Value is not URL but directory file path

			if(File::exists($image_path)) {
				File::delete($image_path);
			}

			$imageName = time().'.'.request()->logo->getClientOriginalExtension();
			request()->logo->move(public_path('images'), $imageName);

			$event->logo = $imageName;
		}

		$event->save();

		return redirect()->route('event.detail', ['id' => $event['id']]);
	}

    public function EditSettings($id) {
        $event = Event::where('id', $id)->first();

        return view('content.event.settings',['event' => $event]);
    }

	public function deleteEvent($organisation_id, $event_id){
		$event = Event::find($event_id);
		$organisation = Organisation::where('id', $organisation_id)->first();
		$user = Auth::user();

		$organisation->events()->detach($event_id); //event van deze organisatie verwijderen
		$event->organisations()->detach(); //event voor alle organisaties verwijderen
		$event->delete(); //event echt verwijderen

		//TODO: wat met alle gelinkte files van events en sessions en tickets en users etc ??

		return view('content.organisation.dashboard', ['user' => $user, 'organisation' => $organisation]);
	}

	public function publishEvent($organisation_id, $event_id){
		$event = Event::find($event_id);
		$organisation = Organisation::where('id', $organisation_id)->first();
		$user = Auth::user();

		if ($event->status === 1) {
			$event->status = (int)0;
		} else {
			$event->status = (int)1;
		}

		$event->save();

		return view('content.organisation.dashboard', ['user' => $user, 'organisation' => $organisation]);
	}

	public function buyEventTicket($event_id, $ticket_id){
		$event = Event::find($event_id);
		$ticket = Ticket::find($ticket_id);
		$user = Auth::user();

		return view('content.ticket.payment', ['user' => $user, 'event' => $event, 'ticket' => $ticket]);
	}

	public function postBuyEventTicket($event_id, $ticket_id){
		$event = Event::find($event_id);
		$ticket = Ticket::find($ticket_id);
		$user = Auth::user();

		$user->tickets()->attach($ticket['id']);
		return view('content.user.account', ['user' => $user]);
	}

}
