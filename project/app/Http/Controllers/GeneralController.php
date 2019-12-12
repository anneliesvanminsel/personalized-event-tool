<?php

namespace App\Http\Controllers;

use App\Subscription;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    //
	public function getIndex() {
		return view('home');
	}


	public function getOrganisationPage() {
		$subs = Subscription::orderBy('created_at', 'desc')->get();
		return view('org-overview', ['subs' => $subs]);
	}
}
