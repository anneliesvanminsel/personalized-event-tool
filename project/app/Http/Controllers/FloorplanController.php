<?php

namespace App\Http\Controllers;

use App\Organisation;
use Illuminate\Http\Request;
use App\Event;
use App\Floorplan;

class FloorplanController extends Controller
{
    //
	function getFloorplans($organisation_id, $event_id) {
		$org = Organisation::where('id', $organisation_id)->first();
		$event = Event::where('id', $event_id)->first();

		return view('content.floorplan.overview', ['organisation' => $org,'event' => $event]);
	}

	function createFloorplan($organisation_id, $event_id) {
		$org = Organisation::where('id', $organisation_id)->first();
		$event = Event::where('id', $event_id)->first();

		return view('content.floorplan.create', ['organisation' => $org,'event' => $event]);
	}

    public function postCreateFloorplan(Request $request, $organisation_id, $event_id) {
        $event = Event::where('id', $event_id)->first();
        $organisation = Organisation::where('id', $organisation_id)->first();

        //validatie
        $this->validate($request, [
            'name' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $imageName);

        $floorplan = new Floorplan;

        $floorplan->name = $request->input('name');
        $floorplan->image = $imageName;
        $floorplan->event_id = $event['id'];


        $floorplan->save();
        $event->floorplans()->save($floorplan);

        return redirect()->route('event.settings.floorplan', ['organisation_id' => $organisation['id'], 'event_id' => $event['id']]);
    }

	function updateFloorplan($organisation_id, $event_id, $floorplan_id) {
		$floorplan = Floorplan::where('id', $floorplan_id)->first();
		$org = Organisation::where('id', $organisation_id)->first();
		$event = Event::where('id', $event_id)->first();

		return view('content.floorplan.edit', ['organisation' => $org,'event' => $event, 'current_floorplan' => $floorplan]);
	}

    public function postUpdateFloorplan(Request $request, $organisation_id, $event_id, $floorplan_id) {
        $floorplan = Floorplan::where('id', $floorplan_id)->first();
		$event = Event::where('id', $event_id)->first();
		$organisation = Organisation::where('id', $organisation_id)->first();

        //validatie
        $this->validate($request, [
            'name' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if(request()->image) {
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images'), $imageName);
            $floorplan->image = $imageName;
        }

        $floorplan->name = $request->input('name');


        $floorplan->save();

		return redirect()->route('event.settings.floorplan', ['organisation_id' => $organisation['id'], 'event_id' => $event['id']]);
	}

    public function deleteFloorplan($organisation_id, $event_id, $floorplan_id) {
		$organisation = Organisation::where('id', $organisation_id)->first();
        $event = Event::findOrFail($event_id);
        $floorplan = Floorplan::findOrFail($floorplan_id);
        $floorplan->delete();

		return redirect()->route('event.settings.floorplan', ['organisation_id' => $organisation['id'], 'event_id' => $event['id']]);
	}

    public function getFloorplanSpecial($event_id) {
        $event = Event::findOrFail($event_id);
        $floorplans = $event->floorplans()->get();

        return view('content.floorplan.special', ['event' => $event, 'floorplans' => $floorplans]);
    }

}
