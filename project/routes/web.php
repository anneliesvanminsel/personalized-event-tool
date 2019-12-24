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

//create an organisation account (post)

Route::post('registreer/{subscription_id}/post', [
	'uses' => 'OrganisationController@postCreateOrganisation',
	'as' => 'organisation.postcreate'
]);

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

	//edit/update event
	Route::get('event/edit/{event_id}', [
		'uses' => 'EventController@updateEvent',
		'as' => 'event.update'
	]);

	Route::post('event/edit/{event_id}/post', [
		'uses' => 'EventController@postUpdateEvent',
		'as' => 'event.postupdate'
	]);

	//delete event
	Route::post('event/delete/{organisation_id}/{event_id}', [
		'uses' => 'EventController@deleteEvent',
		'as' => 'event.delete'
	]);

	//delete event from organisation
	Route::post('event/delete/{organisation_id}/{event_id}', [
		'uses' => 'EventController@deleteEvent',
		'as' => 'event.delete'
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
});

