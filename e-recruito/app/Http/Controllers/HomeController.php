<?php namespace App\Http\Controllers;

class HomeController extends Controller {



	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$title='Welcome To Erecruito: Get Your Recruitment';
		return view('home',['title'=>$title]);
	}

}
