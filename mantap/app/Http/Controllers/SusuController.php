<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Susu;
use Illuminate\Http\Request;
use Input, Session;
class SusuController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('susu');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
	
	
	public function loginForm()
	{
		return view('login');
	}
	
	public function login()
	{
		$input = Input::all();
		$susu = Susu::where('email',$input['email'])->first();
		
		
		
		if($susu){
				
				if($input['pass'] == $susu->PASS){
					Session::put('login', 'value');
					session(['login' => 'value']);
					return view('dashboard');
				}else{
					echo $susu->PASS;
				}
		}else{
			echo 'asdasd';
		}
		
	}
	
	public function dashboard()
	{
		$Input = Input::all();
		$user = User::where('username','=',$Input['username'])->first();
		if($user){
			if(md5($Input['pass']) == $user->password){
				Session::put('login', 'value');
				session(['login' => 'value']);
				return view('admin.admin',['title'=>'Admin Page']);
			}else{
				return view('login',['title'=>'Login Page','error'=>'Password Salah']);
			}
		}else{
			return view('login',['title'=>'Login Page','error'=>'Username Salah']);			
		}
	}

}
