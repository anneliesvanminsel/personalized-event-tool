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

		return view('content.event.detail', ['event' => $event]);
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
            'starttime'=> 'required|date|max:20',
            'endtime'=> 'nullable|date|max:20',
			'ig-username' => 'required|string|max:255',
			'logo'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', //image
		]);

		$imageName = time().'.'.request()->logo->getClientOriginalExtension();
		request()->logo->move(public_path('images'), $imageName);

		$boolStatus = 0;

		$event = new Event;

		$event->title = $request->input('title');
		$event->ig_username = $request->input('ig-username');
		$event->description = $request->input('description');
		$event->category = $request->input('type');
		$event->published = (int)$boolStatus;
		$event->image = $imageName;
        $event->starttime = $request->input('starttime');
        $event->endtime = $request->input('endtime');

        $event->save();
		$organisation->events()->attach($event);

        if($request->input('endtime')) {
            $starttime = new DateTime($request->input('starttime'));
            $endtime = new DateTime($request->input('endtime'));

            $difference = $starttime->diff($endtime);

            for($i = 0; $i < $difference->d + 1; $i++) {
                $session = new Session([
                    'date' => Carbon::parse(strtotime($request->input('starttime'). ' + ' . $i . ' days')),
                    'event_id' => $event['id']
                ]);

                $session->save();
                $event->sessions()->save($session);
            }
        } else {
            $session = new Session([
                'date' => Carbon::parse($request->input('starttime')),
                'event_id' => $event['id']
            ]);
            $session->save();
            $event->sessions()->save($session);
        }

		if( $organisation->subscription_id === 2 || $organisation->subscription_id === 3 ) {
			return redirect()->route('event.create-personalisation', [ 'organisation_id' => $organisation['id'], 'event_id' => $event['id'] ]);
		} else {
			return redirect()->route('event.address.create', [ 'organisation_id' => $organisation['id'], 'event_id' => $event['id'] ]);
		}

	}

	public function createEventPersonalisation($event_id, $organisation_id) {
		$event = Event::where('id', $event_id)->first();
		$organisation = Organisation::where('id', $organisation_id)->first();

		return view('content.event.create-personalisation', ['organisation' => $organisation, 'event' => $event]);
	}

	public function postCreateEventPersonalisation(Request $request, $event_id, $organisation_id) {
		$organisation = Organisation::where('id', $organisation_id)->first();
		$event = Event::findOrFail($event_id);

		//validatie
		$this->validate($request, [
			'title' => 'required|string|max:255',
			'description' => 'required|string|max:1000',
			'type'=> 'required',
			'starttime'=> 'required|date|max:20',
			'endtime'=> 'nullable|date|max:20',
			'ig-username' => 'required|string|max:255',
			'logo'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', //image
		]);

		$event->title = $request->input('title');
		$event->ig_username = $request->input('ig-username');
		$event->description = $request->input('description');
		$event->category = $request->input('type');
		$event->starttime = $request->input('starttime');
		$event->endtime = $request->input('endtime');

		$event->save();
		$organisation->events()->attach($event);

		return redirect()->route('event.address.create', ['event_id' => $event['id'], 'organisation_id' => $organisation['id']]);
	}

	public function UpdateEvent($id) {
		$event = Event::where('id', $id)->first();

		return view('content.event.edit',['event' => $event]);
	}

	public function postUpdateEvent(Request $request, $event_id) {

		//validatie
		$this->validate($request, [
			'title' => 'required|string|max:255',
			'description' => 'required|string|max:1000',
			'type'=> 'required',
			'starttime'=> 'required|date|max:20',
			'endtime'=> 'nullable|date|max:20',
			'ig-username' => 'required|string|max:255',
			'logo'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', //image
		]);

		$event = Event::find($event_id);

		$event->title = $request->input('title');
		$event->description = $request->input('description');
		$event->type = $request->input('eventtype');
		$event->bkgcolor = $request->input('bkgcolor');
		$event->textcolor = $request->input('textcolor');
		$event->endtime = $request->input('endtime');
		$event->starttime = $request->input('starttime');

		if (request()->logo) {
			$image_path = public_path() . "/images/" . $event['logo'];  // Value is not URL but directory file path

			if(File::exists($image_path)) {
				File::delete($image_path);
			}

			$imageName = time().'.'.request()->logo->getClientOriginalExtension();
			request()->logo->move(public_path('images'), $imageName);

			$event->logo = $imageName;
		}

        if($request->input('endtime')) {
            $event->sessions()->delete();

            $starttime = new DateTime($request->input('starttime'));
            $endtime = new DateTime($request->input('endtime'));

            $difference = $starttime->diff($endtime);

            for($i = 0; $i < $difference->d + 1; $i++) {
                $session = new Session([
                    'date' => Carbon::parse(strtotime($request->input('starttime'). ' + ' . $i . ' days')),
                    'event_id' => $event['id']
                ]);

                $session->save();
                $event->sessions()->save($session);
            }
        }

		$event->save();

		return redirect()->route('event.detail', ['id' => $event['id']]);
	}

    public function EditSettings($id) {
	    if(Auth::user() && Auth::user()->role === "organisator") {
            $event = Event::findOrFail($id);

            if($event->organisations->contains( Auth::user()->organisation_id )) {
                return view('content.event.settings',['event' => $event]);
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
