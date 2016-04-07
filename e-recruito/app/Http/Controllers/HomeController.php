<?php namespace App\Http\Controllers;

class HomeController extends Controller {


/**
	*menampilkan view home
	*/
	public function index()
	{
		$title='Join Us E-Recruito: Recruit Online';
		return view('home',['title'=>$title]);
	}
	/**
	*menampilkan view Sign Up
	*/
	public function signup()
	{
		if(session()->get('isLogin')){
			return redirect('/user');	

		}else{
			$title='E-Recruito Signup';
			return view('register.signup',['title'=>$title]);
		}
		
	}
	/**
	*menampilkan view Login
	*/
	public function login()
	{
		if(session()->get('isLogin')){
			return redirect('/user');	
			
		}else{
			$title='E-recruito Login';
			return view('auth.login',['title'=>$title]);
			
		}
		
	}
	/**
	*menampilkan view home dariuser
	*/
	public function homeUser()
	{
		$title='Dashboard User';
		if(session()->get('isLogin')){
			return view('user.user',['title'=>$title]);
		}else{
			return redirect('/');	
		}
	}
	/**
	*Menampilkan view my profile
	*/
	public function vProfile()
	{
		$title='My Profile';
		if(session()->get('isLogin')){
			return view('user.profile.profile',['title'=>$title]);
		}else{
			return redirect('/');	
		}

	}
/**
	*Menampilkan view edit my profile
	*/
	public function eProfile($id)
	{
		$title='Edit My Profile';
		
		if(session()->get('isLogin')){
			return view('user.profile.edit',['title'=>$title]);
		}else{
			return redirect('/');	
		}

	}
}
