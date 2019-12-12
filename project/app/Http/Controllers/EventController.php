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
}
