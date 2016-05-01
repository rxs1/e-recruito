<?php namespace App\Http\Controllers;

use App\Oprec;
use Input, Redirect, File, Session,Validator, Response;	
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
			return redirect('/pengguna');	

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
			return redirect('/pengguna');	
			
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
			$allOprec = Oprec::where('statuspublis',1)->get();
			return view('user.user',['title'=>$title,'allOprec'=>$allOprec]);
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

	/**
	* menampilkan view home dari admin
	*/
	public function homeAdmin()
	{
		if(session()->get('isLogin')){
			$user = session()->get('isLogin');
			if ($user['role'] == 0) {
				$title='Dashboard User';
				return view('user.user',['title'=>$title]);
			}
			$title='Dashboard Admin';
			return view('admin.admin',['title'=>$title]);
		}else{
			return redirect('/');	
		}
	}
}
