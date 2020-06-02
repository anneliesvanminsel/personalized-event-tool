<?php

namespace App\Http\Controllers;

use Auth;
use \DateTime;
use Carbon\Carbon;

use App\Event;
use App\Organisation;
use App\User;
use App\Session;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class EventController extends Controller
{
    //
	public function getEventDetail($event_id) {
		$event = Event::findOrFail($event_id);
		$org = Organisation::findOrFail($event->organisation_id);

		if( $org->subscription_id === 3 ) {
			return redirect()->route('event.detail.special', [ 'event_title' => $event['title'], 'event_id' => $event['id'] ]);
		}

		return view('content.event.detail', ['event' => $event]);
	}

	public function getEventDetailSpecial($event_title, $event_id) {
		$event = Event::findOrFail($event_id);

		return view('content.event.detailspecial', ['event' => $event]);
	}

    public function getEventSpecial($event_id) {
        $event = Event::findOrFail($event_id);

        return view('content.event.special', ['event' => $event]);
    }

	public function createEvent($organisation_id) {
		$organisation = Organisation::where('id', $organisation_id)->first();

		return view('content.event.create-data', ['organisation' => $organisation]);
	}

	public function postCreateEvent(Request $request, $organisation_id) {
		$organisation = Organisation::findOrFail($organisation_id);

		//validatie
		$this->validate($request, [
			'title' => 'required|string|max:255',
			'description' => 'required|string|max:1000',
			'type'=> 'required',
			'startdate'=> 'required|date|max:20',
			'enddate'=> 'nullable|date|max:20',
			'starttime'=> 'required|date_format:H:i',
			'endtime'=> 'nullable|date_format:H:i',
			'ig-username' => 'nullable|string|max:255',
			'logo'=> 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', //image
			'image'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', //image
		]);

		$imageName = time().'.'.request()->image->getClientOriginalExtension();
		request()->image->move(public_path('images'), $imageName);

		if($request->logo) {
			$logoName = time().'.'.request()->logo->getClientOriginalExtension();
			request()->logo->move(public_path('images'), $logoName);
		}

		$boolStatus = 0;

		$event = new Event;

		$event->title = $request->input('title');
		$event->ig_username = $request->input('ig-username');
		$event->description = $request->input('description');
		$event->organisation_id = $organisation['id'];
		$event->category = $request->input('type');
		$event->published = (int)$boolStatus;
		$event->image = $imageName;
		$event->logo = $logoName;
		$event->startdate = $request->input('startdate');
		$event->starttime = $request->input('starttime');
		$event->enddate = $request->input('enddate');
		$event->endtime = $request->input('endtime');

        $event->save();

        if($request->input('enddate')) {
            $starttime = new DateTime($request->input('startdate'));
            $endtime = new DateTime($request->input('enddate'));

            $difference = $starttime->diff($endtime);

            for($i = 0; $i < $difference->d + 1; $i++) {
                $session = new Session([
                    'date' => Carbon::parse(strtotime($request->input('startdate'). ' + ' . $i . ' days')),
                    'event_id' => $event['id']
                ]);

                $session->save();
                $event->sessions()->save($session);
            }
        } else {
            $session = new Session([
                'date' => Carbon::parse($request->input('startdate')),
                'event_id' => $event['id']
            ]);
            $session->save();
            $event->sessions()->save($session);
        }

		if( $organisation->subscription_id === 2 || $organisation->subscription_id === 3) {
			return redirect()->route('event.create-personalisation', [ 'organisation_id' => $organisation['id'], 'event_id' => $event['id'] ]);
		} else {
			return redirect()->route('event.address.create', [ 'organisation_id' => $organisation['id'], 'event_id' => $event['id'] ]);
		}

	}

	public function createEventPersonalisation($organisation_id, $event_id) {
		$event = Event::where('id', $event_id)->first();
		$organisation = Organisation::where('id', $organisation_id)->first();

		return view('content.event.create-personalisation', ['organisation' => $organisation, 'event' => $event]);
	}

	public function postCreateEventPersonalisation(Request $request, $organisation_id, $event_id) {
		$organisation = Organisation::findOrFail($organisation_id);
		$event = Event::findOrFail($event_id);

		//validatie
		$this->validate($request, [
			'theme' => 'nullable',
			'prim-color' => 'nullable',
			'sec-color'=> 'nullable',
			'tert-color'=> 'nullable',
			'shape'=> 'nullable',
			'schedule' => 'nullable',
		]);

		$event->theme = $request->input('theme');
		$event->prim_color = $request->input('prim-color');
		$event->sec_color = $request->input('sec-color');
		$event->tert_color = $request->input('tert-color');
		$event->shape = $request->input('shape');
		$event->schedule = $request->input('schedule');

		$event->save();

		return redirect()->route('event.address.create', [ 'organisation_id' => $organisation['id'], 'event_id' => $event['id'] ]);
	}

	public function UpdateEvent($organisation_id, $event_id) {
		$event = Event::where('id', $event_id)->first();
		$org = Organisation::where('id', $organisation_id)->first();

		return view('content.event.edit-data',['event' => $event, 'organisation' => $org]);
	}

	public function postUpdateEvent(Request $request, $organisation_id, $event_id) {
		$org = Organisation::where('id', $organisation_id)->first();

		//validatie
		$this->validate($request, [
			'title' => 'required|string|max:255',
			'description' => 'required|string|max:1000',
			'type'=> 'required',
			'startdate'=> 'required|date|max:20',
			'enddate'=> 'nullable|date|max:20',
			'starttime'=> 'required|date_format:H:i',
			'endtime'=> 'nullable|date_format:H:i',
			'ig-username' => 'nullable|string|max:255',
			'logo'=> 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', //image
			'image'=> 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', //image
		]);

		$event = Event::find($event_id);

		$event->title = $request->input('title');
		$event->ig_username = $request->input('ig-username');
		$event->description = $request->input('description');
		$event->category = $request->input('type');
		$event->startdate = $request->input('startdate');
		$event->starttime = $request->input('starttime');
		$event->enddate = $request->input('enddate');
		$event->endtime = $request->input('endtime');

		if (request()->logo) {
			$image_path = public_path() . "/images/" . $event['logo'];  // Value is not URL but directory file path

			if(File::exists($image_path)) {
				File::delete($image_path);
			}

			$imageName = time().'.'.request()->logo->getClientOriginalExtension();
			request()->logo->move(public_path('images'), $imageName);

			$event->logo = $imageName;
		}

        if($request->input('enddate')) {
            $event->sessions()->delete();

            $starttime = new DateTime($request->input('startdate'));
            $endtime = new DateTime($request->input('enddate'));

            $difference = $starttime->diff($endtime);

            for($i = 0; $i < $difference->d + 1; $i++) {
                $session = new Session([
                    'date' => Carbon::parse(strtotime($request->input('startdate'). ' + ' . $i . ' days')),
                    'event_id' => $event['id']
                ]);

                $session->save();
                $event->sessions()->save($session);
            }
        }

		$event->save();

		return redirect()->route('event.detail', ['id' => $event['id']]);
	}

    public function EditSettings($organisation_id, $event_id) {
		if(Auth::user() && Auth::user()->role === "organisator") {
            $event = Event::findOrFail($event_id);
			$org = Organisation::where('id', $organisation_id)->first();

			if($event->organisation_id === Auth::user()->organisation_id) {
				return redirect()->route('event.settings.schedule', ['organisation_id' => $org['id'], 'event_id' => $event['id']]);
            }

            return view('errors.401');
        }

        return view('errors.401');
    }

	public function deleteEvent($organisation_id, $event_id){
		$event = Event::findOrFail($event_id);
		$organisation = Organisation::where('id', $organisation_id)->first();
		$user = Auth::user();

		$organisation->events()->detach($event_id); //event van deze organisatie verwijderen
		$event->organisations()->detach(); //event voor alle organisaties verwijderen
		$event->delete(); //event echt verwijderen

		//TODO: wat met alle gelinkte files van events en sessions en tickets en users etc ??

		return view('content.organisation.dashboard', ['user' => $user, 'organisation' => $organisation]);
	}

	public function publishEvent($organisation_id, $event_id){
		$event = Event::findOrFail($event_id);
		$organisation = Organisation::where('id', $organisation_id)->first();
		$user = Auth::user();

		if ($event->published === 1) {
			$event->published = (int)0;
		} else {
			$event->published = (int)1;
		}

		$event->save();

		return redirect()->route('org.dashboard', ['user' => $user, 'organisation' => $organisation]);
	}

    public function likeEvent($event_id){
	    if(Auth::user()) {
	        if(Auth::user()->role === 'volunteer' || Auth::user()->role === 'guest') {
                $event = Event::findOrFail($event_id);
                $user = Auth::user();

                if($event->favusers->contains($user['id'])) {
                    $event->favusers()->where('user_id', $user['id'])->detach();
                } else {
                    $event->favusers()->sync($user);
                }

                return redirect()->back();
            } else {
                return redirect()->back();
            }
        } else {
            return view('auth.login');
        }
    }

	public function saveEvent($event_id){
		if(Auth::user()) {
			if(Auth::user()->role === 'volunteer' || Auth::user()->role === 'guest') {
				$event = Event::findOrFail($event_id);
				$user = Auth::user();

				if($event->savedusers->contains($user['id'])) {
					$event->savedusers()->where('user_id', $user['id'])->detach();
				} else {
					$event->savedusers()->sync($user);
				}

				return redirect()->back();
			} else {
				return redirect()->back();
			}
		} else {
			return view('auth.login');
		}
	}
}
