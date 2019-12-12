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

	Route::get('event', [
		'uses' => 'EventController@getEventDetail',
		'as' => 'event.detail'
	]);

Auth::routes();

/*
|--------------------------------------------------------------------------
| Web Routes - Admin
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'admin'], function() {

	//admin routes
	Route::get('dashboard', [
		'uses' => 'AdminController@getIndex',
		'as' => 'admin.dashboard'
	]);

	//verwijder kid-events
	Route::post('verwijder-event/{kid_id}', [
		'uses' => 'AdminController@deleteKidDays',
		'as' => 'admin.deletekiddays'
	]);

});

