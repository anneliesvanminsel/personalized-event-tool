<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;

class OrganisationController extends Controller
{
    //
	public function getDashboard($org_id) {
		$user = User::where('id', $org_id)->first();
		return view('content.org.dashboard', ['user' => $user]);
	}
}
