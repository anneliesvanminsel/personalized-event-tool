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

Route::get('organisatie/{organisation_id}', [
	'uses' => 'OrganisationController@getOrganisationDetail',
	'as' => 'organisation.detail'
]);

Route::get('registreer/{subscription_id}', [
	'uses' => 'OrganisationController@createOrganisation',
	'as' => 'organisation.create'
]);

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

	Route::get('dashboard/{org_id}', [
		'uses' => 'OrganisationController@getDashboard',
		'as' => 'org.dashboard'
	]);

	//add event
	Route::get('newevent', [
		'uses' => 'EventController@createEvent',
		'as' => 'event.create'
	]);

	Route::post('newevent/post', [
		'uses' => 'EventController@postCreateEvent',
		'as' => 'event.postcreate'
	]);

	//edit/update event
	Route::get('editevent/{event_id}', [
		'uses' => 'EventController@updateEvent',
		'as' => 'event.update'
	]);

	Route::post('editevent/post/{event_id}', [
		'uses' => 'EventController@postUpdateEvent',
		'as' => 'event.postupdate'
	]);


	//add event
	Route::get('organisation/{organisation_id}/newadmin', [
		'uses' => 'OrganisationController@createAdmin',
		'as' => 'organisation.admin.create'
	]);

	Route::post('organisation/{organisation_id}/newadmin/post', [
		'uses' => 'OrganisationController@postCreateAdmin',
		'as' => 'organisation.admin.postcreate'
	]);
});

