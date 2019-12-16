<?php

namespace App\Http\Controllers;

use App\Event;
use App\Subscription;
use App\User;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    //TODO: find places to put these (organsisatorpage? and account?)
	public function getIndex() {
		$slideevents = Event::orderBy('id', 'desc')->take(3)->get();
		$event1 = $slideevents[0];
		$event2 = $slideevents[1];
		$event3 = $slideevents[2];

		$searchedevents = Event::orderBy('id', 'asc')->get();


		return view('home', ['event1' => $event1, 'event2' => $event2, 'event3' => $event3, 'searchedevents' => $searchedevents]);
	}


	public function getOrganisationPage() {
		$subs = Subscription::orderBy('created_at', 'desc')->get();
		return view('org-overview', ['subs' => $subs]);
	}

	public function getAccount($id) {
		$user = User::where('id', $id)->first();
		return view('content.user.account', ['user' => $user]);
	}
}
