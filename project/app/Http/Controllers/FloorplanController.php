<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Floorplan;

class FloorplanController extends Controller
{
    //
    public function postCreateFloorplan(Request $request, $event_id) {
        $event = Event::where('id', $event_id)->first();

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

        return redirect()->route('event.edit.settings', ['id' => $event['id']]);
    }

    public function postUpdateFloorplan(Request $request, $event_id, $floorplan_id) {
        $floorplan = Floorplan::where('id', $floorplan_id)->first();

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

        return redirect()->route('event.edit.settings', ['id' => $event_id]);
    }

    public function deleteFloorplan($event_id, $floorplan_id){
        $event = Event::findOrFail($event_id);
        $floorplan = Floorplan::findOrFail($floorplan_id);
        $floorplan->delete();

        return redirect()->route('event.edit.settings', ['id' => $event['id']]);
    }

    public function getFloorplanSpecial($event_id) {
        $event = Event::findOrFail($event_id);
        $floorplans = $event->floorplans()->get();

        return view('content.floorplan.special', ['event' => $event, 'floorplans' => $floorplans]);
    }

}
