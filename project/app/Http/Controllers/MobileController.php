<?php

namespace App\Http\Controllers;

use App\Event;
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
        return view('content.mobile.search');

    }
}
