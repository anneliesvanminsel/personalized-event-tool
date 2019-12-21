<?php

namespace App\Http\Controllers;


use App\Organisation;
use App\Subscription;
use Illuminate\Http\Request;
use App\User;
use App\Event;

class OrganisationController extends Controller
{
    //
	public function getDashboard($org_id) {
		$user = User::where('organisation_id', $org_id)->first();

		$organisation = Organisation::where('id', $org_id)->first();

		$events = Event::where('organisation_id', $org_id)->paginate(5);

		return view('content.organisation.dashboard', ['user' => $user, '$organisation' => $organisation]);
	}

	public function createOrganisation($subscription_id) {
		$subscription = Subscription::where('id', $subscription_id)->first();

		return view('content.organisation.create', ['subscription' => $subscription]);
	}

	public function postCreateOrganisation(Request $request, $subscription_id) {
		$subscription = Subscription::where('id', $subscription_id)->first();

		//validatie
		$this->validate($request, [
			'name' => 'required|string|max:255',
			'bkgcolor'=> 'nullable|string|max:255', //TODO: hex
			'textcolor'=> 'nullable|string|max:255', //TODO: hex
			'logo'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', //image
		]);

		$imageName = time().'.'.request()->logo->getClientOriginalExtension();
		request()->logo->move(public_path('images'), $imageName);

		$organisation = new Organisation();

		$organisation->name = $request->input('name');
		$organisation->bkgcolor = $request->input('bkgcolor');
		$organisation->textcolor = $request->input('textcolor');
		$organisation->logo = $imageName;

		$organisation->subscription()->associate($subscription);

		$organisation->save();

		return redirect()->route('start.organisation');
	}
}
