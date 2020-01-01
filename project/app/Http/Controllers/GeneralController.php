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
		$slideevents = Event::where('status', '=', 1)->orderBy('id', 'desc')->take(3)->get();
		$searchedevents = Event::where('status', '=', 1)->orderBy('starttime', 'asc')->paginate(5);

		return view('home', ['slideevents' => $slideevents, 'searchedevents' => $searchedevents]);
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
