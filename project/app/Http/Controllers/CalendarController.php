<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class CalendarController extends Controller
{
    //
	public function getIndex() {
		$event = Event::findOrFail(4);

		return view('calendar', ['event' => $event]);
	}
}
