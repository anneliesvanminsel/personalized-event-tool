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

Route::get('/', function () {
    return view('home');
});

Route::get('org', function () {
	return view('org-overview');
});

Route::get('organisation', [
	'uses' => 'SubscriptionController@showAll',
	'as' => 'start.organisation'
]);
