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
		$event1 = new Event(
			[
				'title' => 'Ehb Rock',
				'description' => 'Iedereen welkom op ons eerste festival. Verspreid over onze campussen bevinden zich podia met artiesten uit onze regio.',
				'type' => 'festival',
				'status' => 'published',
				'bkgcolor' => 'purple',
				'textcolor' => 'white',
				'logo' => 'https://images.pexels.com/photos/59884/pexels-photo-59884.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260',
			]
		);

		$event2 = new Event(
			[
				'title' => 'Middelton Christmas Fair',
				'description' => 'Iedereen welkom op ons eerste festival. Verspreid over onze campussen bevinden zich podia met artiesten uit onze regio.',
				'type' => 'festival',
				'status' => 'published',
				'bkgcolor' => 'purple',
				'textcolor' => 'white',
				'logo' => 'https://images.pexels.com/photos/1047442/pexels-photo-1047442.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260',
			]
		);

		$event3 = new Event(
			[
				'title' => 'Aldovias Halloween',
				'description' => 'Iedereen welkom op ons eerste festival. Verspreid over onze campussen bevinden zich podia met artiesten uit onze regio.',
				'type' => 'festival',
				'status' => 'published',
				'bkgcolor' => 'purple',
				'textcolor' => 'white',
				'logo' => 'https://images.pexels.com/photos/948199/pexels-photo-948199.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260',
			]
		);
		return view('home', ['event1' => $event1, 'event2' => $event2, 'event3' => $event3]);
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
