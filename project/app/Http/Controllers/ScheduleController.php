<?php

namespace App\Http\Controllers;

use App\Organisation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Event;
use App\Schedule;
use App\Session;
use \DateTime;
use Carbon\Carbon;

class ScheduleController extends Controller
{
    //
	function getSchedules($organisation_id, $event_id) {
		$org = Organisation::where('id', $organisation_id)->first();
		$event = Event::where('id', $event_id)->first();

		return view('content.schedule.overview', ['organisation' => $org,'event' => $event]);
	}

	function createSchedule($organisation_id, $event_id) {
		$org = Organisation::where('id', $organisation_id)->first();
		$event = Event::where('id', $event_id)->first();

		return view('content.schedule.create', ['organisation' => $org,'event' => $event]);
	}

    function postCreateSchedule(Request $request, $org_id, $event_id) {
        $event = Event::where('id', $event_id)->first();
		$org = Organisation::where('id', $org_id)->first();

        $this->validate($request, [
            'session_id' => 'required',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'starttime' => 'required|date_format:H:i',
            'endtime' => 'nullable|date_format:H:i',
            'location' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $session = Session::where('id', (int)$request->input('session_id'))->first();

        $schedule = new Schedule;


		if( request()->logo ) {
			$imageName = time().'.'.request()->logo->getClientOriginalExtension();
			request()->logo->move(public_path('images'), $imageName);
			$schedule->image = $imageName;
		}

        $schedule->title = $request->input('title');
        $schedule->description = $request->input('description');
        $schedule->starttime = $request->input('starttime');
        $schedule->endtime = $request->input('endtime');
        $schedule->location = $request->input('location');
        $schedule->session_id = $session['id'];

		$schedule->save();
        $session->schedules()->save($schedule);

        return redirect()->route('event.edit.settings', ['organisation_id' => $org->id, 'event_id' => $event['id']]);
    }

    public function deleteSchedule($event_id, $schedule_id){
        $event = Event::find($event_id);
        $schedule = Schedule::find($schedule_id);
        $schedule->delete();

        return redirect()->route('event.edit.settings', ['id' => $event['id']]);
    }

    public function getScheduleSpecial($event_id) {
        $event = Event::findOrFail($event_id);
        $sessions = $event->sessions()->get();

        return view('content.schedule.special', ['event' => $event, 'sessions' => $sessions]);
    }
}
