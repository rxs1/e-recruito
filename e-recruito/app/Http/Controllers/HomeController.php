<?php namespace App\Http\Controllers;

class HomeController extends Controller {



	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$title='Join Us E-Recruito: Recruit Online';
		return view('home',['title'=>$title]);
	}

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

	public function homeUser()
	{
		$title='Dashboard User';
		if(session()->get('isLogin')){
			return view('user.user',['title'=>$title]);
		}else{
			return redirect('/');	
		}
	}

}
