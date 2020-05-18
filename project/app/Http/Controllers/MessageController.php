<?php

namespace App\Http\Controllers;

use App\Event;
use App\Message;
use App\Organisation;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    //
	function getMessages($organisation_id, $event_id) {
		$org = Organisation::where('id', $organisation_id)->first();
		$event = Event::where('id', $event_id)->first();

		return view('content.message.overview', ['organisation' => $org,'event' => $event]);
	}

	function createMessage($organisation_id, $event_id) {
		$org = Organisation::where('id', $organisation_id)->first();
		$event = Event::where('id', $event_id)->first();

		return view('content.message.create', ['organisation' => $org,'event' => $event]);
	}

    public function postCreateMessage(Request $request, $event_id) {
        $event = Event::where('id', $event_id)->first();

        //validatie
        $this->validate($request, [
            'title' => 'nullable|string|max:255',
            'message' => 'required|string|max:255',
            'type' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $message = new Message;

        $message->title = $request->input('title');
        $message->message = $request->input('message');
        $message->type = $request->input('type');

        if(request()->image) {
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images'), $imageName);
            $message->image = $imageName;
        }

        $message->event_id = $event['id'];


        $message->save();
        $event->messages()->save($message);

        return redirect()->route('event.edit.settings', ['id' => $event['id']]);
    }

    public function deleteMessage($event_id, $message_id){
        $event = Event::find($event_id);
        $message = Message::find($message_id);
        $message->delete();

        return redirect()->route('event.edit.settings', ['id' => $event['id']]);
    }

	public function getMessageSpecial($event_id) {
		$event = Event::where('id', $event_id)->first();

		return view('content.message.special', ['event' => $event]);
	}
}
