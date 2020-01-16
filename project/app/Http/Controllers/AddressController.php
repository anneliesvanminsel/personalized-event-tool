<?php

namespace App\Http\Controllers;

use App\Address;
use App\Event;
use App\Organisation;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    //
    public function createAddressOrganisation($organisation_id) {
        $organisation = Organisation::where('id', $organisation_id)->first();

        return view('content.address.create-org', ['organisation' => $organisation]);
    }

    public function postCreateAddressOrganisation(Request $request, $organisation_id) {
        $organisation = Organisation::where('id', $organisation_id)->first();

        //validatie
        $this->validate($request, [
            'locationname' => 'nullable|string|max:255',
            'street' => 'required|string|max:255',
            'streetnumber'=> 'required|string|max:255',
            'box'=> 'nullable|string|max:255',
            'zipcode'=> 'required|integer',
            'city'=> 'required|string|max:255',
            'region'=> 'nullable|string|max:255',
            'country'=> 'required|string|max:255',
            'googleframe'=> 'nullable|string',
        ]);

        $address = new Address;

        $address->locationname = $request->input('locationname');
        $address->street = $request->input('street');
        $address->streetnumber = $request->input('streetnumber');
        $address->box = $request->input('box');
        $address->postalcode = $request->input('zipcode');
        $address->city = $request->input('city');
        $address->region = $request->input('region');
        $address->country = $request->input('country');
        $address->googleframe = $request->input('googleframe');

        $address->address_id = $organisation['id'];

        $address->address()->associate($organisation);
        $address->save();

        $organisation->save();


        return redirect()->route('organisation.admin.create', ['organisation' => $organisation]);
    }

    public function createAddressEvent($event_id) {
        $event = Event::where('id', $event_id)->first();

        return view('content.address.create-event', ['event' => $event]);
    }

    public function postCreateAddressEvent(Request $request, $event_id) {
        $event = Event::where('id', $event_id)->first();

        //validatie
        $this->validate($request, [
            'locationname' => 'nullable|string|max:255',
            'street' => 'required|string|max:255',
            'streetnumber'=> 'required|string|max:255',
            'box'=> 'nullable|string|max:255',
            'zipcode'=> 'required|integer',
            'city'=> 'required|string|max:255',
            'region'=> 'nullable|string|max:255',
            'country'=> 'required|string|max:255',
            'googleframe'=> 'nullable|string',
        ]);

        $address = new Address;

        $address->locationname = $request->input('locationname');
        $address->street = $request->input('street');
        $address->streetnumber = $request->input('streetnumber');
        $address->box = $request->input('box');
        $address->postalcode = $request->input('zipcode');
        $address->city = $request->input('city');
        $address->region = $request->input('region');
        $address->country = $request->input('country');
        $address->googleframe = $request->input('googleframe');

        $address->address_id = $event['id'];

        $address->address()->associate($event);
        $address->save();

        $event->save();

        return redirect()->route('event.detail', ['event_id' => $event['id']]);
        //return redirect()->route('organisation.admin.create', ['event' => $event]);
    }

}
