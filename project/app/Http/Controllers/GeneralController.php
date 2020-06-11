<?php

namespace App\Http\Controllers;

use App\Event;
use App\Subscription;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;

class GeneralController extends Controller
{
	public function getIndex() {
		$highlights = Event::where('published', '=', 1)->where('startdate', '>=', Carbon::now())->orderBy('id', 'desc')->take(4)->get();
		$searchedevents = Event::where('published', '=', 1)->where('startdate', '>=', Carbon::now())->orderBy('startdate', 'asc')->paginate(3, ['*'], 'search');

		$ip_address = \Request::ip();
		$position = \Location::get($ip_address);

		if($position && $position->cityName) {
			$popularevents = Event::whereHas('address', function ($q) use ($position) {
				$q->where('city', 'like', '%' . $position->cityName . '%')->orWhere('locationname', 'like', '%' . $position->cityName . '%');
			})->where('published', '=', 1)
				->where('startdate', '>=', Carbon::now())
				->orderBy('startdate', 'asc')
				->paginate(3, ['*'], 'popular');
		} else {
			$popularevents = Event::whereHas('address', function ($q) use ($position) {
				$q->where('city', 'like', '%' . 'brussel' . '%');
			})->where('published', '=', 1)
				->where('startdate', '>=', Carbon::now())
				->orderBy('startdate', 'asc')
				->paginate(3, ['*'], 'popular');
		}

		if($popularevents->count() < 1) {
			$popularevents = Event::where('published', '=', 1)->where('startdate', '>', Carbon::now())->orderBy('startdate', 'asc')->paginate(3, ['*'], 'popular');
		}


		return view('home', ['highlights' => $highlights, 'searchedevents' => $searchedevents, 'popularevents' => $popularevents, 'oldLocation' => '', 'oldDate' => '']);
	}


	public function getOrganisationPage() {
		$subs = Subscription::orderBy('id', 'asc')->get();
		return view('org-overview', ['subs' => $subs]);
	}

	public function getAccount($id) {
		if(Auth::user()) {
			$user = User::where('id', $id)->first();
			return view('content.user.account-tickets', ['user' => $user]);
		}
		return redirect()->route('login');
	}

	public function getAccountFav($id) {
		if(Auth::user()) {
			$user = User::where('id', $id)->first();
			return view('content.user.account-favorites', ['user' => $user]);
		}
		return redirect()->route('login');
	}

	public function getAccountEvent($id) {
		if(Auth::user()) {
			$user = User::where('id', $id)->first();
			return view('content.user.account-events', ['user' => $user]);
		}
		return redirect()->route('login');
	}

	public function getAccountEdit($id) {
		$user = User::where('id', $id)->first();
		return view('content.user.edit', ['user' => $user]);
	}

    public function getMaintenancePage() {
        return view('maintenance');
    }

    public function getUsagePage() {
        return view('usage');
    }

	public function postAccountEdit(Request $request, $id) {
		$user = User::where('id', $id)->first();

		//validatie
		$this->validate($request, [
			'name' => 'nullable|string|max:255',
			'birthday' => 'nullable|date',
			'phonenumber' => 'nullable|string|max:255',
		]);

		$user->name = $request->input('name');
		$user->birthday = $request->input('birthday');
		$user->phonenumber = $request->input('phonenumber');

		$user->save();

		return redirect()->route('user.account', ['user_id' => $user['id']]);
	}
}
