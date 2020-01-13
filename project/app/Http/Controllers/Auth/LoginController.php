<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent as Agent;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    protected function authenticated(Request $request, $user)
	{
		if ( $user ) {
			if ($user['role'] === 'organisator') {
                //return back();
				return redirect()->route('org.dashboard', ['id' => $user['id']]);
			}

			if ($user['role'] === 'volunteer') {
                //return back();
                $Agent = new Agent();
                // agent detection influences the view storage path
                if ($Agent->isMobile()) {
                    // you're a mobile device
                    return redirect()->route('mobile.account', ['id' => $user['id']] );
                } else {
                    // you're a desktop device, or something similar
                    return redirect()->route('user.account', ['id' => $user['id']] );
                }
			}

			if ($user['role'] === 'guest') {
                $Agent = new Agent();
                // agent detection influences the view storage path
                if ($Agent->isMobile()) {
                    // you're a mobile device
                    return redirect()->route('mobile.account', ['id' => $user['id']] );
                } else {
                    // you're a desktop device, or something similar
                    return redirect()->route('user.account', ['id' => $user['id']] );
                }
			}

			return redirect()->route('login');
		}

		return redirect('/index.php');
	}

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
