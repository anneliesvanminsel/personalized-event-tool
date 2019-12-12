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
		return view('content.event.detail', ['event' => $event, 'tickets' => $tickets]);
	}
}
