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
		if(session()->get('isLogin')){
			$user = session()->get('isLogin');	
			if ($user->role == 0) {
				return redirect('/pengguna');
			} else {
				$users = Users::paginate(10);
				$title = 'List Users';
				return view('admin.users.index', compact('users','title'));
			}
		}else{
			$title='E-recruito Login';
			return view('auth.login',['title'=>$title]);
		}
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
				'foto'=>'default.gif',
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
					session()->put('isLogin', $user);
					return Redirect::to('/pengguna')->withInput();
				}else if($user['password'] == md5($input['password'])){
					session()->put('isLogin', $user);
					return Redirect::to('/admin')->withInput();
				}else{
					return Redirect::to('/login')->withInput()->with('error',1);
				}
			}else{
				return Redirect::to('/login')->withInput()->with('error',2);
			}

		}
	}

	public function logout(){
		Session::forget('isLogin');
		return Redirect::to('/')->withInput();
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
		public function edit()
		{
			if(session()->get('isLogin')){
				$user1 = session()->get('isLogin');
				$Input = Input::all();
				$rules = array(
					'name'=>'required',
					'username'=>'required',
					'email'=>'required|email',
					'foto'=>'mimes:jpeg,jpg,bmp,png',	
					);
				$validator = Validator::make($Input,$rules);
				if($validator->fails()){
					return Redirect::to('/pengguna/my-profile/'.$user1['id'])->withInput()->withErrors($validator->errors());
				}else{
					
					$user = Users::find($user1['id']);
					$user->name = $Input['name'];
					$user->username = $Input['username'];
					$user->email = $Input['email'];

					$image = Input::file('foto');
					if(isset($Input['foto'])){
						if($user->foto != 'default.gif'){
							File::delete('public/assets/img/avatar/'.$user->foto);
						}	
						$filename  = rand(1111,9999).time() . '.' . $image->getClientOriginalExtension();
						Input::file('foto')->move('public/assets/img/avatar/',$filename);
						$user ->foto = $filename;
					}

					$user->save(); 
					Session::put('isLogin', $user);
					return Redirect::to('/pengguna/my-profile')->withInput()->with('isMessage',1);
				}
			}else{
				return Redirect::to('/')->withInput();
			}
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
