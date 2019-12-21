<?php

namespace App\Http\Controllers;

use App\Event;
use App\Organisation;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class EventController extends Controller
{
    //
	public function getEventDetail($id) {
		$event = Event::where('id', $id)->first();

		return view('content.event.detail', ['event' => $event]);
	}

	public function createEvent($organisation_id) {
		$organisation = Organisation::where('id', $organisation_id)->first();

		return view('content.event.create', ['organisation_id' => $organisation->id]);
	}

	public function postCreateEvent(Request $request, $organisation_id) {
		$organisation = Organisation::where('id', $organisation_id)->first();

		//validatie
		$this->validate($request, [
			'title' => 'required|string|max:255',
			'description'=> 'required|string|max:255',
			'type'=> 'required|string', //with examples
			'status'=> 'required|string|max:255', //select
			'bkgcolor'=> 'nullable|string|max:255', //TODO: hex
			'textcolor'=> 'nullable|string|max:255', //TODO: hex
			'logo'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', //image
		]);

		$imageName = time().'.'.request()->logo->getClientOriginalExtension();
		request()->logo->move(public_path('images'), $imageName);

		$boolStatus = $request->input('status');

		if ($boolStatus === '1') {
			$boolStatus = 1;
		} else {
			$boolStatus = 0;
		}

		$event = new Event;

		$event->title = $request->input('title');
		$event->description = $request->input('description');
		$event->type = $request->input('type');;
		$event->status = (int)$boolStatus;
		$event->bkgcolor = $request->input('bkgcolor');
		$event->textcolor = $request->input('textcolor');
		$event->logo = $imageName;


		$event->save();
		$organisation->events()->attach($event);

		return redirect()->route('event.detail', ['id' => $event['id']]);
	}

	public function UpdateEvent($id) {
		$event = Event::where('id', $id)->first();

		return view('content.event.edit',['event' => $event]);
	}

	public function postUpdateEvent(Request $request, $event_id) {

		//validatie
		$this->validate($request, [
			'title' => 'required|string|max:255',
			'description'=> 'required|string|max:255',
			'eventtype'=> 'required|string|max:255', //with examples
			'eventstatus'=> 'required|string|max:255', //select
			'bkgcolor'=> 'nullable|string|max:255', //TODO: hex
			'textcolor'=> 'nullable|string|max:255', //TODO: hex
			'logo'=> 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', //image
		]);

		$event = Event::find($event_id);


		$boolStatus = $request->input('eventstatus');

		if ($boolStatus === '1') {
			$boolStatus = 1;
		} else {
			$boolStatus = 0;
		}

		$event->title = $request->input('title');
		$event->description = $request->input('description');
		$event->type = $request->input('eventtype');
		$event->status = (int)$boolStatus;
		$event->bkgcolor = $request->input('bkgcolor');
		$event->textcolor = $request->input('textcolor');

		if (request()->logo) {

			$image_path = public_path() . "/images/" . $event['logo'];  // Value is not URL but directory file path

			if(File::exists($image_path)) {

				File::delete($image_path);
			}

			$imageName = time().'.'.request()->logo->getClientOriginalExtension();
			request()->logo->move(public_path('images'), $imageName);

			$event->logo = $imageName;
		}

		$event->save();

		return redirect()->route('event.detail', ['id' => $event['id']]);
	}
}
