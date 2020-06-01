<?php

namespace App\Http\Controllers;

use Auth;
use App\Organisation;
use App\Subscription;
use Illuminate\Http\Request;
use App\User;
use App\Event;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class OrganisationController extends Controller
{
    //
	public function getDashboard($user_id) {
	    if(Auth::user() && Auth::user()->id == $user_id) {
            $user = User::where('id', $user_id)->first();
            $organisation = Organisation::where('id', $user['organisation_id'])->first();

            return view('content.organisation.dashboard', ['user' => $user, 'organisation' => $organisation]);
        }

	    return redirect()->route('index');
	}

	public function getOrganisationDetail($id) {
		$organisation = Organisation::findOrFail($id);

		return view('content.organisation.detail', ['organisation' => $organisation]);
	}

	public function createOrganisation($subscription_id) {
		$subscription = Subscription::where('id', $subscription_id)->first();

		return view('content.organisation.create-account', ['subscription' => $subscription]);
	}

	public function postCreateOrganisationAccount(Request $request, $subscription_id) {
		$subscription = Subscription::where('id', $subscription_id)->first();

		$this->validate($request, [
			'name' => 'required|string|max:255',
			'email' => 'required|string|email|max:255|unique:users',
			'password' => 'required|string|min:8|confirmed',
		]);

		$user = new User([
			'name' => $request->input('name'),
			'email' => $request->input('email'),
			'password' => Hash::make($request->input('password')),
			'role' => 'organisator',
		]);

		$user->save();

		return redirect()->route('organisation.createInformation', ['subscription_id' => $subscription['id'], 'account_id' => $user->id]);
	}

	public function createOrganisationInformation($subscription_id, $account_id) {
		$subscription = Subscription::where('id', $subscription_id)->first();
		$user = User::where('id', $account_id)->first();

		return view('content.organisation.create', ['subscription' => $subscription, 'user' => $user]);
	}

	public function postCreateOrganisationInformation(Request $request, $subscription_id, $user_id) {
		$subscription = Subscription::where('id', $subscription_id)->first();
		$user = User::where('id', $user_id)->first();

		//validatie
		$this->validate($request, [
			'name' => 'required|string|max:255',
            'description'=> 'required|string|max:1000',
			'logo'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', //image
		]);

		$imageName = time().'.'.request()->logo->getClientOriginalExtension();
		request()->logo->move(public_path('images'), $imageName);

		$organisation = new Organisation();

		$organisation->name = $request->input('name');
		$organisation->description = $request->input('description');
		$organisation->logo = $imageName;


		$organisation->subscription()->associate($subscription);

		$organisation->save();

		$user['organisation_id'] = $organisation->id;

		$user->save();
		$organisation->users()->save($user);

		return redirect()->route('organisation.address.create', ['subscription_id' => $subscription['id'], 'organisation_id' => $organisation['id']]);
	}

    public function editOrganisation($organisation_id) {
        $organisation = Organisation::where('id', $organisation_id)->first();

        return view('content.organisation.edit', ['organisation' => $organisation]);
    }

    public function postEditOrganisation(Request $request, $organisation_id) {
        $organisation = Organisation::where('id', $organisation_id)->first();

        //validatie
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'description'=> 'required|string|max:1000',
            'logo'=> 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', //image
        ]);

        $organisation->name = $request->input('name');
        $organisation->description = $request->input('description');

        if (request()->logo) {
            $image_path = public_path() . "/images/" . $organisation['logo'];  // Value is not URL but directory file path

            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $imageName = time().'.'.request()->logo->getClientOriginalExtension();
            request()->logo->move(public_path('images'), $imageName);

            $organisation->logo = $imageName;
        }

        $organisation->save();

        return redirect()->route('organisation.address.update', ['organisation_id' => $organisation['id']]);
    }

	public function createAdmin($organisation_id) {
		$org = Organisation::where('id', $organisation_id)->first();

		return view('content.user.create', ['organisation' => $org]);
	}

	public function postCreateAdmin(Request $request, $organisation_id) {
		$org = Organisation::where('id', $organisation_id)->first();

		//validatie
		$this->validate($request, [
			'name' => 'required|string|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|string|min:8]',
		]);

		$user = new User();

		$user->name = $request->input('name');
		$user->email = $request->input('email');
		$user->password = Hash::make($request->input('password'));
		$user->role = 'organisator';
		$user['organisation_id'] = $org->id;

		$user->save();
		$org->users()->save($user);

		return redirect()->route('org.dashboard', ['organisation_id' => $organisation_id]);
	}

    public function createVolunteer($organisation_id) {
        $org = Organisation::where('id', $organisation_id)->first();

        return view('content.volunteer.create', ['organisation' => $org]);
    }

    public function postCreateVolunteer(Request $request, $organisation_id) {
        $org = Organisation::where('id', $organisation_id)->first();

        //validatie
        $this->validate($request, [
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:8]',
        ]);

        $user = new User();

        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role = 'volunteer';
        $user['organisation_id'] = $org->id;

        $user->save();
        $org->users()->save($user);

        return redirect()->route('org.dashboard', ['organisation_id' => $organisation_id]);
    }
}
