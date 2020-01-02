<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [
	'uses' => 'GeneralController@getIndex',
	'as' => 'index'
]);

Route::get('index.php', [
	'uses' => 'GeneralController@getIndex',
	'as' => 'index'
]);

Route::get('organisation', [
	'uses' => 'GeneralController@getOrganisationPage',
	'as' => 'start.organisation'
]);

Route::get('event/{event_id}', [
	'uses' => 'EventController@getEventDetail',
	'as' => 'event.detail'
]);

Route::get('event/{event_id}/{ticket_id}/buyticket', [
	'uses' => 'EventController@buyEventTicket',
	'as' => 'ticket.payment'
]);

Route::post('event/{event_id}/{ticket_id}/buyticket/post', [
	'uses' => 'EventController@postBuyEventTicket',
	'as' => 'ticket.postpayment'
]);

Route::get('account/{user_id}', [
	'uses' => 'GeneralController@getAccount',
	'as' => 'user.account'
]);


// get organisation detail

Route::get('organisatie/{organisation_id}', [
	'uses' => 'OrganisationController@getOrganisationDetail',
	'as' => 'organisation.detail'
]);


//create an organisation account
Route::get('registreer/{subscription_id}', [
	'uses' => 'OrganisationController@createOrganisation',
	'as' => 'organisation.create'
]);

Route::post('registreer/{subscription_id}/post', [
	'uses' => 'OrganisationController@postCreateOrganisation',
	'as' => 'organisation.postcreate'
]);


//Auth routes
Auth::routes();

/*
|--------------------------------------------------------------------------
| Web Routes - Organisator
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'admin'], function() {

	Route::get('dashboard/{user_id}', [
		'uses' => 'OrganisationController@getDashboard',
		'as' => 'org.dashboard'
	]);

	//add event
	Route::get('event/create/{organisation_id}', [
		'uses' => 'EventController@createEvent',
		'as' => 'event.create'
	]);

	Route::post('event/create/{organisation_id}/post', [
		'uses' => 'EventController@postCreateEvent',
		'as' => 'event.postcreate'
	]);

    //add organisation admin
    Route::get('organisation/{organisation_id}/newadmin', [
        'uses' => 'OrganisationController@createAdmin',
        'as' => 'organisation.admin.create'
    ]);

    Route::post('organisation/{organisation_id}/newadmin/post', [
        'uses' => 'OrganisationController@postCreateAdmin',
        'as' => 'organisation.admin.postcreate'
    ]);

    //add event settings
    Route::get('event/settings/{event_id}', [
        'uses' => 'EventController@EditSettings',
        'as' => 'event.edit.settings'
    ]);

	//edit/update event
	Route::get('event/edit/{event_id}', [
		'uses' => 'EventController@updateEvent',
		'as' => 'event.update'
	]);

	Route::post('event/edit/{event_id}/post', [
		'uses' => 'EventController@postUpdateEvent',
		'as' => 'event.postupdate'
	]);

	//change publish status
    Route::post('{organisation_id}/event/{event_id}/publish', [
        'uses' => 'EventController@publishEvent',
        'as' => 'event.publish'
    ]);

	//delete event
	Route::post('event/delete/{organisation_id}/{event_id}', [
		'uses' => 'EventController@deleteEvent',
		'as' => 'event.delete'
	]);

    //edit an organisation account
    Route::get('bewerken/{organisation_id}', [
        'uses' => 'OrganisationController@editOrganisation',
        'as' => 'organisation.update'
    ]);

    Route::post('bewerken/{organisation_id}/post', [
        'uses' => 'OrganisationController@postEditOrganisation',
        'as' => 'organisation.postupdate'
    ]);

    //add ticket
    Route::post('ticket/create/{event_id}/post', [
        'uses' => 'TicketController@postCreateTicket',
        'as' => 'ticket.postcreate'
    ]);

    //edit ticket
    Route::post('ticket/update/{event_id}/{ticket_id}/post', [
        'uses' => 'TicketController@postUpdateTicket',
        'as' => 'ticket.postupdate'
    ]);

    //add floorplan
    Route::post('grondplan/create/{event_id}/post', [
        'uses' => 'FloorplanController@postCreateFloorplan',
        'as' => 'floorplan.postcreate'
    ]);

    //edit floorplan
    Route::post('grondplan/update/{event_id}/{floorplan_id}/post', [
        'uses' => 'FloorplanController@postUpdateFloorplan',
        'as' => 'floorplan.postupdate'
    ]);
});

