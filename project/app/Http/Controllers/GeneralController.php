<?php

namespace App\Http\Controllers;

use App\Event;
use App\Subscription;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    //TODO: find places to put these (organsisatorpage? and account?)
	public function getIndex() {
		$slideevents = Event::where('status', '=', 1)->where('starttime', '>', Carbon::now())->orderBy('id', 'desc')->take(3)->get();
		$searchedevents = Event::where('status', '=', 1)->where('starttime', '>', Carbon::now())->orderBy('starttime', 'asc')->paginate(5);

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

	public function postSearch(Request $request) {
        $this->validate($request, [
            'type'=> 'required',
        ]);

        $slideevents = Event::where('status', '=', 1)->orderBy('id', 'desc')->where('starttime', '>', Carbon::now())->take(3)->get();
        $searchedevents = Event::where('status', '=', 1)->where('type', $request->input('type'))->where('starttime', '>', Carbon::now())->orderBy('starttime', 'asc')->paginate(5);

        return view('home', ['slideevents' => $slideevents, 'searchedevents' => $searchedevents]);
    }

    public function getMaintenancePage() {
        return view('maintenance');
    }

    public function getUsagePage() {
        return view('usage');
    }
}
