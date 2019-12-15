<?php

namespace App\Http\Controllers;

use App\Event;
use App\Ticket;
use Illuminate\Http\Request;

class EventController extends Controller
{
    //
	public function getEventDetail() {
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

		$tickets = [
			[
				'name' => 'daypass',
				'description' => 'Iedssen bevinnze regio.',
				'type' => 'dagticket',
				'totaltickets' => 10,
				'price' => 33.00,
			],
			[
				'name' => 'daypddass',
				'description' => 'Iedssen bevinnze regio.',
				'type' => 'dagticket',
				'totaltickets' => 10,
				'price' => 33.00,
			],

		];

		$sessions = [
			[
				'name' => 'Dag 1',
				'location' => 'campus bloemenhof',
				'date' => '19/12/2019',
				'status' => '',
				'locationname' => 'verschillende campussen van de ehb',
				'totaltickets' => '20',
			],
			[
				'name' => 'Dag 2',
				'location' => 'campus bloemenhof',
				'date' => '20/12/2019',
				'status' => '',
				'locationname' => 'verschillende campussen van de ehb',
				'totaltickets' => '20',
			],
			[
				'name' => 'Dag 3',
				'location' => 'campus bloemenhof',
				'date' => '21/12/2019',
				'status' => '',
				'locationname' => 'verschillende campussen van de ehb',
				'totaltickets' => '20',
			],

		];

		$schedule = [
			[
				'title' => 'Ada Thorne',
				'description' => 'talk with the one and only',
				'starttime' => '15:00',
				'endtime' => '16:00',
				'location' => 'campus bloemenhof',
			],
			[
				'title' => 'Gina Gray',
				'description' => 'talk with the only',
				'starttime' => '16:00',
				'endtime' => '15:00',
				'location' => 'campus Kaai',
			],
		];

		return view('content.event.detail', ['event' => $event, 'tickets' => $tickets, 'sessions' => $sessions, 'schedule' => $schedule]);
	}

	public function createEvent($user_id) {
		$user = User::where('id', $user_id)->first(); //TODO: niet de user_id maar org id ?! en wat met meerdere orgsss

		if(is_null($user)) {
			return view('errors.401');
		}

		return view('content.event.detail', ['user_id' => $user['id']);
	}

	public function postCreateEvent(Request $request, $user_id) {

		$user = User::where('id', $user_id)->first();

		//validatie
		$this->validate($request, [
			'title' => 'required|string|max:255',
			'description'=> 'required|string|max:255',
			'type'=> 'required|integer|min:1000|max:10000',
			'status'=> 'required|string|max:255',
			'bkg-color'=> 'nullable|string|max:255',
			'text-color'=> 'nullable|string|max:255',
			'logo'=> 'nullable|string|max:255',
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

		$familie = new Familie;
		$familie->email = $user['email'];

		$familie->street = $request->input('street');
		$familie->street_number = $request->input('street_number');
		$familie->box = $request->input('box');
		$familie->zipcode = $request->input('zipcode');
		$familie->city = $request->input('city');
		$familie->user_id = $user['id'];
		$familie->email = $user['email'];
		$familie->save();

		$user->account()->associate($familie);
		$user->save();

		return redirect()->route('account', ['id' => $user['id']]);
	}
}
