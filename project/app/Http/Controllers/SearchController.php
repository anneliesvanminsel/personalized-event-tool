<?php

namespace App\Http\Controllers;

use App\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
	public function postSearchFilter(Request $request) {
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
						->where('startdate', '>=', Carbon::now())
						->orderBy('startdate', 'asc')
						->paginate(3, ['*'], 'search');
				} else {

					// location en type


					$searchedevents = Event::whereHas('address', function ($q) use ($location) {
						$q->where('city', 'like', '%' . $location . '%')->orWhere('locationname', 'like', '%' . $location . '%');
					})
						->where('category', $type)
						->where('published', '=', 1)
						->where('startdate', '>=', Carbon::now())
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
					->where('startdate', '>=', Carbon::now())
					->orderBy('startdate', 'asc')
					->paginate(3, ['*'], 'search');
			} else {

				// enkel location


				$searchedevents = Event::whereHas('address', function ($q) use ($location) {
					$q->where('city', 'like', '%' . $location . '%')->orWhere('locationname', 'like', '%' . $location . '%');
				})
					->where('published', '=', 1)
					->where('startdate', '>=', Carbon::now())
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
					->where('startdate', '>=', Carbon::now())
					->orderBy('startdate', 'asc')
					->paginate(3, ['*'], 'search');
			} else {

				//enkel type

				$searchedevents = Event::where('category', $type)
					->where('published', '=', 1)
					->where('startdate', '>=', Carbon::now())
					->orderBy('startdate', 'asc')
					->paginate(3, ['*'], 'search');
			}

		} elseif($request->input('date')) {

			//enkel date

			$searchedevents = Event::where('startdate', $date)
				->orWhere('enddate', $date)
				->where('published', '=', 1)
				->where('startdate', '>=', Carbon::now())
				->orderBy('startdate', 'asc')
				->paginate(3, ['*'], 'search');
		} else {
			$searchedevents = Event::where('published', '=', 1)
				->where('startdate', '>=', Carbon::now()->format('Y-m-d'))
				->orderBy('startdate', 'asc')
				->paginate(3, ['*'], 'search');
		}

		$searchedevents->appends(['search' => $request]);

		$highlights = Event::where('published', '=', 1)->where('startdate', '>', Carbon::now())->orderBy('id', 'desc')->take(4)->get();


		$ip_address = \Request::ip();
		$position = \Location::get($ip_address);

		if($position && $position->cityName) {
			$popularevents = Event::whereHas('address', function ($q) use ($position) {
				$q->where('city', 'like', '%' . $position->cityName . '%')->orWhere('locationname', 'like', '%' . $position->cityName . '%');
			})->where('published', '=', 1)
				->where('startdate', '>', Carbon::now())
				->orderBy('startdate', 'asc')
				->paginate(3, ['*'], 'popular');
		} else {
			$popularevents = Event::whereHas('address', function ($q) use ($position) {
				$q->where('city', 'like', '%' . 'brussel' . '%');
			})->where('published', '=', 1)
				->where('startdate', '>', Carbon::now())
				->orderBy('startdate', 'asc')
				->paginate(3, ['*'], 'popular');
		}

		if($popularevents->count() < 1) {
			$popularevents = Event::where('published', '=', 1)->where('startdate', '>', Carbon::now())->orderBy('startdate', 'asc')->paginate(3, ['*'], 'popular');
		}

		return view('home', ['highlights' => $highlights, 'searchedevents' => $searchedevents, 'popularevents' => $popularevents, 'oldLocation' => $location, 'oldDate' => $date]);
	}
}
