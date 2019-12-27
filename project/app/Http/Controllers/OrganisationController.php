<?php

namespace App\Http\Controllers;


use App\Organisation;
use App\Subscription;
use Illuminate\Http\Request;
use App\User;
use App\Event;
use Illuminate\Support\Facades\Hash;

class OrganisationController extends Controller
{
    //
	public function getDashboard($user_id) {
		$user = User::where('id', $user_id)->first();
		$organisation = Organisation::where('id', $user['organisation_id'])->first();

		//$events = Event::where('organisation_id', $org_id)->paginate(5);

		return view('content.organisation.dashboard', ['user' => $user, 'organisation' => $organisation]);
	}

	public function getOrganisationDetail($id) {
		$organisation = Organisation::where('id', $id)->first();

		return view('content.organisation.detail', ['organisation' => $organisation]);
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
            'description'=> 'required|string|max:1000',
			'bkgcolor' => [
				'nullable',
				'string',
				'regex:/^(\#[\da-f]{3}|\#[\da-f]{6})$/',
			],
			'textcolor' => [
				'nullable',
				'string',
				'regex:/^(\#[\da-f]{3}|\#[\da-f]{6})$/',
			],
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

		return redirect()->route('organisation.admin.create', ['organisation_id' => $organisation['id']]);
	}

	public function createAdmin($organisation_id) {
		$org = Organisation::where('id', $organisation_id)->first();

		return view('content.user.create', ['organisation' => $org]);
	}

	public function postCreateAdmin(Request $request, $organisation_id) {
		$org = Organisation::where('id', $organisation_id)->first();

		//validatie
		$this->validate($request, [
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|string|min:8]',
		]);

		$user = new User();

		$user->email = $request->input('email');
		$user->password = Hash::make($request->input('password'));
		$user->role = 'organisator';
		$user['organisation_id'] = $org->id;

		$user->save();
		$org->users()->save($user);

		return redirect()->route('org.dashboard', ['organisation_id' => $organisation_id]);
	}
}
