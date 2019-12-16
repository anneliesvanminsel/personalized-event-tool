<?php

namespace App\Http\Controllers;

use App\Event;
use App\Ticket;
use Illuminate\Http\Request;

class EventController extends Controller
{
    //
	public function getEventDetail($id) {
		$event = Event::where('id', $id)->first();

		return view('content.event.detail', ['event' => $event]);
	}

	public function createEvent() {
		/*
		$user = User::where('id', $user_id)->first(); //TODO: niet de user_id maar org id ?! en wat met meerdere orgsss

		if(is_null($user)) {
			return view('errors.401');
		}
*/
		return view('content.event.create');
	}
/*
	public function postCreateEvent(Request $request, $user_id) {

		$user = User::where('id', $user_id)->first();

		//validatie
		$this->validate($request, [
			'title' => 'required|string|max:255',
			'description'=> 'required|string|max:255',
			'type'=> 'required|integer|min:1000|max:10000', //with examples
			'status'=> 'required|string|max:255', //select
			'bkg-color'=> 'nullable|string|max:255', //hex
			'text-color'=> 'nullable|string|max:255', //hex
			'logo'=> 'nullable|string|max:255', //image
		]);

		$event = new Event(
			[
				'title' => 'Ehb Rock',
				'description' => 'Iedereen welkom op ons eerste festival. Verspreid over onze campussen bevinden zich podia met artiesten uit onze regio.',
				'type' => 'festival',
				'status' => 'published',
				'bkg-color' => 'red',
				'text-color' => 'purple',
				'logo' => 'Erasmushogeschool Brussel',
			]
		);

		$event = new Event;
		$event->email = $user['email'];

		$event->street = $request->input('street');
		$event->street_number = $request->input('street_number');
		$event->box = $request->input('box');
		$event->zipcode = $request->input('zipcode');
		$event->city = $request->input('city');
		$event->user_id = $user['id'];
		$event->email = $user['email'];
		$event->save();

		$user->account()->associate($familie);
		$user->save();

		return redirect()->route('account', ['id' => $user['id']]);
	} */
}
