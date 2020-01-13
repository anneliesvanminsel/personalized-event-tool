<?php

namespace App\Http\Controllers;

use App\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MobileController extends Controller
{
    //
    public function getAccount() {
        return view('content.mobile.account');
    }

    public function getEventDetail($event_id) {
        $event = Event::findOrFail($event_id);

        return view('content.mobile.eventdetail', ['event' => $event]);
    }

    public function getLikedEvents() {
        return view('content.mobile.likedevents');
    }

    public function getTickets() {
        return view('content.mobile.tickets');
    }

    public function getSearch() {
        $searchedevents = Event::where('status', '=', 1)->where('starttime', '>', Carbon::now())->orderBy('starttime', 'asc')->paginate(5);

        return view('content.mobile.search', ['searchedevents' => $searchedevents]);
    }

    public function postSearch(Request $request) {
        $this->validate($request, [
            'type'=> 'required',
        ]);

        $searchedevents = Event::where('status', '=', 1)->where('type', $request->input('type'))->where('starttime', '>', Carbon::now())->orderBy('starttime', 'asc')->paginate(5);

        return view('content.mobile.search', ['searchedevents' => $searchedevents]);
    }
}
