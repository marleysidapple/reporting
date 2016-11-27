<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\LoginRequest;
use Auth;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }


	/*
	* rendering login form
	*/
    public function login()
    {
    	return view('modules.auth.login');
    }


    /*
    * validating user login 
    * redirect to dashboard if success
    */
    public function validateLogin(LoginRequest $request)
    {
    	$credentials = array('email' => $request->email, 'password' => $request->password);
    	if (Auth::attempt($credentials)){
    		return redirect()->intended('home');
    	} else {
    		 return redirect()->back()->with('error', 'Invalid login credentials. Please retry');
    	}
    }
}
