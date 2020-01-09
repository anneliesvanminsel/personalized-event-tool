<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [
	'uses' => 'GeneralController@getIndex',
	'as' => 'index'
]);

Route::get('index.php', [
	'uses' => 'GeneralController@getIndex',
	'as' => 'index'
]);

Route::post('searchevents', [
    'uses' => 'GeneralController@postSearch',
    'as' => 'home.searchevents'
]);

Route::get('organisation', [
	'uses' => 'GeneralController@getOrganisationPage',
	'as' => 'start.organisation'
]);

Route::get('maintenance', [
    'uses' => 'GeneralController@getMaintenancePage',
    'as' => 'maintenance'
]);

Route::get('usage', [
    'uses' => 'GeneralController@getUsagePage',
    'as' => 'usage'
]);

Route::get('event/{event_id}', [
	'uses' => 'EventController@getEventDetail',
	'as' => 'event.detail'
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


/*
|--------------------------------------------------------------------------
| Web Routes - Auth
|--------------------------------------------------------------------------
*/
Auth::routes();

/*
|--------------------------------------------------------------------------
| Web Routes - User
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'user'], function() {
    Route::get('event/{event_id}/{ticket_id}/buyticket', [
        'uses' => 'TicketController@buyEventTicket',
        'as' => 'ticket.payment'
    ]);

    Route::post('event/{event_id}/{ticket_id}/buyticket/post', [
        'uses' => 'TicketController@postBuyEventTicket',
        'as' => 'ticket.postpayment'
    ]);

    Route::get('account/{user_id}', [
        'uses' => 'GeneralController@getAccount',
        'as' => 'user.account'
    ]);

    Route::get('ticket/{event_id}/{ticket_id}/detail', [
        'uses' => 'TicketController@getTicket',
        'as' => 'ticket.detail'
    ]);

    Route::get('ticket/{ticket_id}/{user_id}/post', [
        'uses' => 'TicketController@scanTicket',
        'as' => 'ticket.scan'
    ]);

    Route::post('event/{event_id}/like', [
        'uses' => 'EventController@likeEvent',
        'as' => 'event.like'
    ]);
});

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

    //delete floorplan
    Route::post('ticket/delete/{event_id}/{ticket_id}/post', [
        'uses' => 'TicketController@deleteTicket',
        'as' => 'ticket.delete'
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

    //delete floorplan
    Route::post('grondplan/delete/{event_id}/{floorplan_id}/post', [
        'uses' => 'FloorplanController@deleteFloorplan',
        'as' => 'floorplan.delete'
    ]);

    //add planning
    Route::post('schedule/create/{event_id}/post', [
        'uses' => 'ScheduleController@postCreateSchedule',
        'as' => 'schedule.postcreate'
    ]);

    //edit planning
    Route::post('schedule/update/{event_id}/{schedule_id}/post', [
        'uses' => 'ScheduleController@postUpdateSchedule',
        'as' => 'schedule.postupdate'
    ]);

    //add organisation admin
    Route::get('organisation/{organisation_id}/newvolunteer', [
        'uses' => 'OrganisationController@createVolunteer',
        'as' => 'volunteer.create'
    ]);

    Route::post('organisation/{organisation_id}/newvolunteer/post', [
        'uses' => 'OrganisationController@postCreateVolunteer',
        'as' => 'volunteer.postcreate'
    ]);
});

