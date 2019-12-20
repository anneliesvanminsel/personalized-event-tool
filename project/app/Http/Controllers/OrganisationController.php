<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;
use App\Event;

class OrganisationController extends Controller
{
    //
	public function getDashboard($org_id) {
		$user = User::where('id', $org_id)->first();
		$events = Event::whre('organisation_id', $org_id)->paginate(5);

		return view('content.org.dashboard', ['user' => $user, 'events' => $events]);
	}
}
