<?php

namespace App\Http\Controllers;

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
    function postCreateSchedule(Request $request, $event_id) {
        $event = Event::where('id', $event_id)->first();


        $this->validate($request, [
            'schedule-create-sessionid' => 'required',
            'schedule-create-title' => 'required|string|max:255',
            'schedule-create-description' => 'nullable|string|max:1000',
            'schedule-create-starttime' => 'required|date_format:H:i',
            'schedule-create-endtime' => 'nullable|date_format:H:i',
            'schedule-create-location' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $session = Session::where('id', (int)$request->input('schedule-create-sessionid'))->first();

        $schedule = new Schedule;

        if($request->input('schedule-create-image')) {
            $imageName = time().'.'.$request->input('schedule-create-image')->getClientOriginalExtension();
            $request->input('schedule-create-image')->move(public_path('images'), $imageName);
            $schedule->image = $imageName;
        }

        $schedule->title = $request->input('schedule-create-title');
        $schedule->description = $request->input('schedule-create-description');
        $schedule->starttime = $request->input('schedule-create-starttime');
        $schedule->endtime = $request->input('schedule-create-endtime');
        $schedule->location = $request->input('schedule-create-location');
        $schedule->session_id = $session['id'];

        $schedule->save();
        $session->schedules()->save($schedule);

        return redirect()->route('event.edit.settings', ['id' => $event['id']]);
    }

    public function deleteSchedule($event_id, $schedule_id){
        $event = Event::find($event_id);
        $schedule = Schedule::find($schedule_id);
        $schedule->delete();

        return redirect()->route('event.edit.settings', ['id' => $event['id']]);
    }
}
