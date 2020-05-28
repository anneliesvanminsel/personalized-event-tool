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
		$highlights = Event::where('published', '=', 1)->where('startdate', '>', Carbon::now())->orderBy('id', 'desc')->take(4)->get();
		$searchedevents = Event::where('published', '=', 1)->where('startdate', '>', Carbon::now())->orderBy('startdate', 'asc')->paginate(3, ['*'], 'search');
		$popularevents = Event::where('published', '=', 1)->where('startdate', '>', Carbon::now())->orderBy('startdate', 'asc')->paginate(3, ['*'], 'popular');

		return view('home', ['highlights' => $highlights, 'searchedevents' => $searchedevents, 'popularevents' => $popularevents, 'oldLocation' => '', 'oldDate' => '']);
	}


	public function getOrganisationPage() {
		$subs = Subscription::orderBy('created_at', 'desc')->get();
		return view('org-overview', ['subs' => $subs]);
	}

	public function getAccount($id) {
		$user = User::where('id', $id)->first();
		return view('content.user.account-tickets', ['user' => $user]);
	}

	public function getAccountFav($id) {
		$user = User::where('id', $id)->first();
		return view('content.user.account-favorites', ['user' => $user]);
	}

	public function getAccountEvent($id) {
		$user = User::where('id', $id)->first();
		return view('content.user.account-events', ['user' => $user]);
	}

	public function getAccountEdit($id) {
		$user = User::where('id', $id)->first();
		return view('content.user.edit', ['user' => $user]);
	}

	public function postSearch(Request $request) {
        $this->validate($request, [
            'type'=> 'nullable|string|max:255',
            'date'=> 'nullable|date',
			'location'=> 'nullable|string|max:255',
        ]);

        $type = $request->input('type');
		$date = Carbon::parse($request->input('date'));
		$location = $request->input('location');

		if($request->input('location')) {

			if($request->input('type')) {

				if($request->input('date')) {

					// location, type en date


					$searchedevents = Event::whereHas('address', function ($q) use ($location) {
						$q->where('city', 'like', '%' . $location . '%')->orWhere('locationname', 'like', '%' . $location . '%');
					})
					->where('category', $type)
					->where('startdate', $date)
					->orWhere('enddate', $date)
					->where('published', '=', 1)
					->where('startdate', '>', Carbon::now())
					->orderBy('startdate', 'asc')
					->paginate(3, ['*'], 'search');
				} else {

					// location en type


					$searchedevents = Event::whereHas('address', function ($q) use ($location) {
						$q->where('city', 'like', '%' . $location . '%')->orWhere('locationname', 'like', '%' . $location . '%');
					})
						->where('category', $type)
						->where('published', '=', 1)
						->where('startdate', '>', Carbon::now())
						->orderBy('startdate', 'asc')
						->paginate(3, ['*'], 'search');
				}

			} elseif($request->input('date')) {

				// location en date


				$searchedevents = Event::whereHas('address', function ($q) use ($location) {
					$q->where('city', 'like', '%' . $location . '%')->orWhere('locationname', 'like', '%' . $location . '%');
				})
				->where('startdate', $date)
				->orWhere('enddate', $date)
				->where('published', '=', 1)
				->where('startdate', '>', Carbon::now())
				->orderBy('startdate', 'asc')
				->paginate(3, ['*'], 'search');
			} else {

				// enkel location


				$searchedevents = Event::whereHas('address', function ($q) use ($location) {
					$q->where('city', 'like', '%' . $location . '%')->orWhere('locationname', 'like', '%' . $location . '%');
				})
					->where('published', '=', 1)
					->where('startdate', '>', Carbon::now())
					->orderBy('startdate', 'asc')
					->paginate(3, ['*'], 'search');

			}

		} elseif($request->input('type')) {

			if($request->input('date')) {

				// type en date


				$searchedevents = Event::where('category', $type)
					->where('startdate', $date)
					->orWhere('enddate', $date)
					->where('published', '=', 1)
					->where('startdate', '>', Carbon::now())
					->orderBy('startdate', 'asc')
					->paginate(3, ['*'], 'search');
			} else {

				//enkel type

				$searchedevents = Event::where('category', $type)
					->where('published', '=', 1)
					->where('startdate', '>', Carbon::now())
					->orderBy('startdate', 'asc')
					->paginate(3, ['*'], 'search');
			}

		} elseif($request->input('date')) {

			//enkel date

			$searchedevents = Event::where('startdate', $date)
				->orWhere('enddate', $date)
				->where('published', '=', 1)
				->where('startdate', '>', Carbon::now())
				->orderBy('startdate', 'asc')
				->paginate(3, ['*'], 'search');
		}

		$highlights = Event::where('published', '=', 1)->where('startdate', '>', Carbon::now())->orderBy('id', 'desc')->take(4)->get();
		$popularevents = Event::where('published', '=', 1)->where('startdate', '>', Carbon::now())->orderBy('startdate', 'asc')->paginate(3, ['*'], 'popular');

		return view('home', ['highlights' => $highlights, 'searchedevents' => $searchedevents, 'popularevents' => $popularevents, 'oldLocation' => $location, 'oldDate' => $date]);
	}

    public function getMaintenancePage() {
        return view('maintenance');
    }

    public function getUsagePage() {
        return view('usage');
    }

    public function testSearch() {
		if ($request->has('location')) {

			if ($request->has('date')) {

				if ($request->has('type')) { //has location, date and type
					$searchedevents = Event::where('starttime', $request->input('date'))
						->orWhere('endtime', $request->input('date'))
						->where('category', $request->input('type'))
						->with(['address' => function ($q) {
							$q->where('city', $request->input('location'));
						}])
						->with(['address' => function ($q) {
							$q->where('locationname', $request->input('location'));
						}])
						->where('published', '=', 1)
						->where('starttime', '>', Carbon::now())->orderBy('starttime', 'asc')
						->orderBy('starttime', 'asc')
						->paginate(3, ['*'], 'search');

				} else { //has location and date
					$searchedevents = Event::where('starttime', $request->input('date'))
						->orWhere('endtime', $request->input('date'))
						->with(['address' => function ($q) {
							$q->where('city', $request->input('location'));
						}])
						->with(['address' => function ($q) {
							$q->where('locationname', $request->input('location'));
						}])
						->where('published', '=', 1)
						->where('starttime', '>', Carbon::now())->orderBy('starttime', 'asc')
						->orderBy('starttime', 'asc')
						->paginate(3, ['*'], 'search');
				}
			}

			$searchedevents = Event::where('category', $request->input('type'))
				->with(['address' => function ($q) {
					$q->where('city', $request->input('location'));
				}])
				->with(['address' => function ($q) {
					$q->where('locationname', $request->input('location'));
				}])
				->where('published', '=', 1)
				->where('starttime', '>', Carbon::now())->orderBy('starttime', 'asc')
				->orderBy('starttime', 'asc')
				->paginate(3, ['*'], 'search');
		}



		//WHEN: wanneer ge datum en type geeft, zoekt die op één van de twee en niet of er op die dag van dat type zijn
		$searchedevents = Event::when($date, function ($q) use ($date) {
			return $q->where('startdate', Carbon::parse($date))->orWhere('enddate', Carbon::parse($date));
		})
			->when($type, function ($q) use ($type) {
				return $q->where('category', $type);
			})
			->where('published', '=', 1)
			->orderBy('startdate', 'asc')
			->paginate(3, ['*'], 'search');
	}
}
