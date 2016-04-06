<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Users;
use Input, Redirect, File, Session,Validator;
use Illuminate\Http\Request;

class UserController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	public function create()
	{	
		
		$input = Input::all();
		$rules = array(
			'name' =>'required', 
			'username' =>'required|unique:users,username', 
			'email' =>'required|unique:users,email', 
			'password' =>'required|min:8', 
			'repassword' =>'required|same:password'
			);

		$validator = Validator::make($input,$rules);
		if($validator->fails()){
			return Redirect::to('/signup')->withInput()->withErrors($validator->errors());
		}else{
			$user = Users::create([
				'name'=>$input['name'],
				'username'=>$input['username'],
				'email'=>$input['email'],
				'password'=>md5($input['password']),
				'role'=>0
				]);

			return Redirect::to('/login')->with('message','1');
		}

		
	}
	/**
	 * Authentication 
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function authentication()
	{

		$input = Input::all();
		$rules = array(
			'email' =>'required|email', 
			'password' =>'required'
			);

		$validator = Validator::make($input,$rules);
		if($validator->fails()){
			return Redirect::to('/login')->withInput()->withErrors($validator->errors());
		}else{
			$email = $input['email'];
			$user = Users::where('email',$email)->first();
			if($user){
				if($user['role'] == 0 && $user['password'] == md5($input['password'])){
					$request->session()->put('isLogin', 'user');
					return Redirect::to('/user')->withInput();
				}else if($user['password'] == md5($input['password'])){
					$request->session()->put('isLogin', 'admin');
					return Redirect::to('/admin')->withInput();
				}else{
					return Redirect::to('/login')->withInput()->with('error',1);
				}
			}else{
				return Redirect::to('/login')->withInput()->with('error',2);
			}

		}
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

	}
