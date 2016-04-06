<?php namespace App\Http\Controllers;

class HomeController extends Controller {



	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function signup()
	{
		$title='E-Recruito Signup';
		return view('register.signup',['title'=>$title]);
	}

	public function login()
	{
		$title='E-recruito Login';
		return view('auth.login',['title'=>$title]);
	}

}
