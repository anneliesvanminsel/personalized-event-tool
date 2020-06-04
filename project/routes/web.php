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

Route::get('/calendar', [
	'uses' => 'CalendarController@getIndex',
	'as' => 'calendar'
]);

Route::get('index.php', [
	'uses' => 'GeneralController@getIndex',
	'as' => 'index'
]);

Route::any('searchevents', [
    'uses' => 'SearchController@postSearchFilter',
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

Route::get('event/detail/{event_title}/{event_id}/', [
	'uses' => 'EventController@getEventDetailSpecial',
	'as' => 'event.detail.special'
]);

// get organisation detail
Route::get('organisatie/{organisation_id}', [
	'uses' => 'OrganisationController@getOrganisationDetail',
	'as' => 'organisation.detail'
]);

//create an organisation account
Route::get('organisatie/account/{subscription_id}', [
	'uses' => 'OrganisationController@createOrganisation',
	'as' => 'organisation.create'
]);

Route::post('organisatie/account/{subscription_id}/post', [
	'uses' => 'OrganisationController@postCreateOrganisationAccount',
	'as' => 'organisation.postcreate'
]);

Route::get('organisatie/{subscription_id}/informatie/{account_id}', [
	'uses' => 'OrganisationController@createOrganisationInformation',
	'as' => 'organisation.createInformation'
]);

Route::post('organisatie/{subscription_id}/informatie/{account_id}', [
	'uses' => 'OrganisationController@postCreateOrganisationInformation',
	'as' => 'organisation.postcreateInformation'
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

	Route::group(['prefix' => 'event/{event_id}'], function() {

		Route::post('like', [
			'uses' => 'EventController@likeEvent',
			'as' => 'event.like'
		]);

		Route::post('save', [
			'uses' => 'EventController@saveEvent',
			'as' => 'event.save'
		]);

		Route::get('special', [
			'uses' => 'EventController@getEventSpecial',
			'as' => 'event.special'
		]);

		Route::get('special/floorplan', [
			'uses' => 'FloorplanController@getFloorplanSpecial',
			'as' => 'floorplan.special'
		]);

		Route::get('special/schedule', [
			'uses' => 'ScheduleController@getScheduleSpecial',
			'as' => 'schedule.special'
		]);

		Route::get('special/messages', [
			'uses' => 'MessageController@getMessageSpecial',
			'as' => 'message.special'
		]);

		Route::group(['prefix' => 'ticket/{ticket_id}'], function() {
			Route::get('buyticket', [
				'uses' => 'TicketController@buyEventTicket',
				'as' => 'ticket.payment'
			]);

			Route::post('buyticket/post', [
				'uses' => 'TicketController@postBuyEventTicket',
				'as' => 'ticket.postpayment'
			]);

			Route::get('detail', [
				'uses' => 'TicketController@getTicket',
				'as' => 'ticket.detail'
			]);

			Route::get('scan', [
				'uses' => 'TicketController@scanTicket',
				'as' => 'ticket.scan'
			]);
		});
	});

	Route::group(['prefix' => 'account/{user_id}'], function() {
		Route::get('bewerken', [
			'uses' => 'GeneralController@getAccountEdit',
			'as' => 'user.edit'
		]);

		Route::post('bewerken/post', [
			'uses' => 'GeneralController@postAccountEdit',
			'as' => 'user.postedit'
		]);

		Route::get('tickets', [
			'uses' => 'GeneralController@getAccount',
			'as' => 'user.account'
		]);

		Route::get('evenementen', [
			'uses' => 'GeneralController@getAccountEvent',
			'as' => 'user.events'
		]);

		Route::get('favorieten', [
			'uses' => 'GeneralController@getAccountFav',
			'as' => 'user.favorites'
		]);
	});
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

	Route::any('dashboard/{user_id}/zoek-evenementen', [
		'uses' => 'OrganisationController@postSearchEvents',
		'as' => 'organisation.search.events'
	]);

	Route::get('organisatie/{subscription_id}/address/{organisation_id}', [
		'uses' => 'AddressController@createAddressOrganisation',
		'as' => 'organisation.address.create'
	]);

	Route::post('organisatie/{subscription_id}/address/{organisation_id}/post', [
		'uses' => 'AddressController@postCreateAddressOrganisation',
		'as' => 'organisation.address.postcreate'
	]);



	//edit an organisation data
	Route::get('bewerken/{organisation_id}', [
		'uses' => 'OrganisationController@editOrganisation',
		'as' => 'organisation.update'
	]);

	Route::post('bewerken/{organisation_id}/post', [
		'uses' => 'OrganisationController@postEditOrganisation',
		'as' => 'organisation.postupdate'
	]);

	//edit organisation address
	Route::get('bewerken/{organisation_id}/adres', [
		'uses' => 'AddressController@updateAddressOrganisation',
		'as' => 'organisation.address.update'
	]);

	Route::post('bewerken/{organisation_id}/adres/{address_id}/post', [
		'uses' => 'AddressController@postUpdateAddressOrganisation',
		'as' => 'organisation.address.postupdate'
	]);

	//
	//
	// >>> EVENT <<<
	//
	//


	Route::group(['prefix' => '{organisation_id}/event'], function() {

		//
		//
		// === CREATE ===
		//
		//

		Route::group(['prefix' => 'create'], function() {
			Route::get('data', [
				'uses' => 'EventController@createEvent',
				'as' => 'event.create'
			]);

			Route::post('data/post', [
				'uses' => 'EventController@postCreateEvent',
				'as' => 'event.postcreate'
			]);

			//add personalisation
			Route::get('data/personalisation/{event_id}', [
				'uses' => 'EventController@createEventPersonalisation',
				'as' => 'event.create-personalisation'
			]);

			Route::post('data/personalisation/{event_id}/post', [
				'uses' => 'EventController@postCreateEventPersonalisation',
				'as' => 'event.postcreate-personalisation'
			]);

			//add event address
			Route::get('data/address/{event_id}', [
				'uses' => 'AddressController@createAddressEvent',
				'as' => 'event.address.create'
			]);

			Route::post('data/address/{event_id}/post', [
				'uses' => 'AddressController@postCreateAddressEvent',
				'as' => 'event.address.postcreate'
			]);
		});

		Route::group(['prefix' => '{event_id}'], function() {
//
			//
			// === UPDATE ===
			//
			//

			Route::group(['prefix' => 'update'], function() {
				// DATA
				Route::get('data', [
					'uses' => 'EventController@updateEvent',
					'as' => 'event.update'
				]);

				Route::post('data/post', [
					'uses' => 'EventController@postUpdateEvent',
					'as' => 'event.postupdate'
				]);

				// PERSONALISATION
				Route::get('personalisation}', [
					'uses' => 'EventController@updateEventPersonalisation',
					'as' => 'event.update-personalisation'
				]);

				Route::post('personalisation/post', [
					'uses' => 'EventController@postUpdateEventPersonalisation',
					'as' => 'event.postupdate-personalisation'
				]);

				// ADDRESS
				Route::get('address', [
					'uses' => 'AddressController@updateAddressEvent',
					'as' => 'event.address.update'
				]);

				Route::post('address/{address_id}/post', [
					'uses' => 'AddressController@postUpdateAddressEvent',
					'as' => 'event.address.postupdate'
				]);
			});

			//
			//
			// === SETTINGS ===
			//
			//

			Route::group(['prefix' => 'settings'], function() {
				Route::get('overview', [
					'uses' => 'EventController@EditSettings',
					'as' => 'event.edit.settings'
				]);

				//
				// --- TICKETS ---
				//

				Route::group(['prefix' => 'tickets'], function() {
					Route::get('overview', [
						'uses' => 'TicketController@getTickets',
						'as' => 'event.settings.ticket'
					]);

					Route::get('create', [
						'uses' => 'TicketController@createTicket',
						'as' => 'ticket.create'
					]);

					Route::post('create/post', [
						'uses' => 'TicketController@postCreateTicket',
						'as' => 'ticket.postcreate'
					]);

					//edit ticket
					Route::get('{ticket_id}/update', [
						'uses' => 'TicketController@updateTicket',
						'as' => 'ticket.update'
					]);

					Route::post('{ticket_id}/update/post', [
						'uses' => 'TicketController@postUpdateTicket',
						'as' => 'ticket.postupdate'
					]);

					//delete ticket
					Route::post('{ticket_id}/delete/post', [
						'uses' => 'TicketController@deleteTicket',
						'as' => 'ticket.delete'
					]);
				});

				//
				// --- FLOORPLANS ---
				//

				Route::group(['prefix' => 'floorplans'], function() {
					Route::get('overview', [
						'uses' => 'FloorplanController@getFloorplans',
						'as' => 'event.settings.floorplan'
					]);

					//add floorplan
					Route::get('create', [
						'uses' => 'FloorplanController@createFloorplan',
						'as' => 'floorplan.create'
					]);

					Route::post('create/post', [
						'uses' => 'FloorplanController@postCreateFloorplan',
						'as' => 'floorplan.postcreate'
					]);

					//edit floorplan
					Route::get('update/{floorplan_id}', [
						'uses' => 'FloorplanController@updateFloorplan',
						'as' => 'floorplan.update'
					]);

					Route::post('update/{floorplan_id}/post', [
						'uses' => 'FloorplanController@postUpdateFloorplan',
						'as' => 'floorplan.postupdate'
					]);

					//delete floorplan
					Route::post('delete/{floorplan_id}/post', [
						'uses' => 'FloorplanController@deleteFloorplan',
						'as' => 'floorplan.delete'
					]);
				});

				//
				// --- SCHEDULES ---
				//

				Route::group(['prefix' => 'schedules'], function() {
					Route::get('overview', [
						'uses' => 'ScheduleController@getSchedules',
						'as' => 'event.settings.schedule'
					]);

					//add planning
					Route::get('create', [
						'uses' => 'ScheduleController@createSchedule',
						'as' => 'schedule.create'
					]);

					Route::post('create/post', [
						'uses' => 'ScheduleController@postCreateSchedule',
						'as' => 'schedule.postcreate'
					]);

					//edit planning
					Route::get('update/{schedule_id}', [
						'uses' => 'ScheduleController@updateSchedule',
						'as' => 'schedule.update'
					]);

					Route::post('update/{schedule_id}/post', [
						'uses' => 'ScheduleController@postUpdateSchedule',
						'as' => 'schedule.postupdate'
					]);
				});


				//
				// --- MESSAGES ---
				//

				Route::group(['prefix' => 'messages'], function() {
					Route::get('overview', [
						'uses' => 'MessageController@getMessages',
						'as' => 'event.settings.message'
					]);

					//add message
					Route::get('create', [
						'uses' => 'MessageController@createMessage',
						'as' => 'message.create'
					]);

					Route::post('create/post', [
						'uses' => 'MessageController@postCreateMessage',
						'as' => 'message.postcreate'
					]);

					//update message
					Route::get('update/{message_id}', [
						'uses' => 'MessageController@updateMessage',
						'as' => 'message.update'
					]);

					Route::post('update/{message_id}/post', [
						'uses' => 'MessageController@postUpdateMessage',
						'as' => 'message.postupdate'
					]);

					//delete message
					Route::post('delete/{message_id}/post', [
						'uses' => 'MessageController@deleteMessage',
						'as' => 'message.delete'
					]);
				});
			});
		});

		//change publish status
		Route::post('event/{event_id}/publish', [
			'uses' => 'EventController@publishEvent',
			'as' => 'event.publish'
		]);

		//delete event
		Route::post('event/delete/{event_id}', [
			'uses' => 'EventController@deleteEvent',
			'as' => 'event.delete'
		]);
	});
});

