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
		$highlights = Event::where('status', '=', 1)->where('starttime', '>', Carbon::now())->orderBy('id', 'desc')->take(4)->get();
		$searchedevents = Event::where('status', '=', 1)->where('starttime', '>', Carbon::now())->orderBy('starttime', 'asc')->paginate(3, ['*'], 'search');
		$popularevents = Event::where('status', '=', 1)->where('starttime', '>', Carbon::now())->orderBy('starttime', 'asc')->paginate(3, ['*'], 'popular');

		return view('home', ['highlights' => $highlights, 'searchedevents' => $searchedevents, 'popularevents' => $popularevents]);
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

		$highlights = Event::where('status', '=', 1)->where('starttime', '>', Carbon::now())->orderBy('id', 'desc')->take(4)->get();
		$popularevents = Event::where('status', '=', 1)->where('starttime', '>', Carbon::now())->orderBy('starttime', 'asc')->paginate(3, ['*'], 'popular');
        $searchedevents = Event::where('status', '=', 1)->where('type', $request->input('type'))->where('starttime', '>', Carbon::now())->orderBy('starttime', 'asc')->paginate(3, ['*'], 'search');

		return view('home', ['highlights' => $highlights, 'searchedevents' => $searchedevents, 'popularevents' => $popularevents]);
	}

    public function getMaintenancePage() {
        return view('maintenance');
    }

    public function getUsagePage() {
        return view('usage');
    }
}
