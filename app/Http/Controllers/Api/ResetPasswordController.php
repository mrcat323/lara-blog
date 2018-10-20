<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
ues Illuminate\Foundation\Auth\ResetsPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;


class ResetPasswordController extends Controller
{

	protected $redirectTo = '/home';

    use ResetsPassword;

    public function showResetsForm(Request $request, $token = null) {
    	return view('api.auth.reset')->with([
    		'token' => $token,
    		'email' => $request->email
    	]);
    }

    public function broker() {
    	return Password::broker('users');
    }

    public function guard() {
    	return Auth::guard('users');
    }
}
