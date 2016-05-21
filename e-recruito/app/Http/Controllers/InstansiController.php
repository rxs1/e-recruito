<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Instansi;
use Input, Redirect, File, Session,Validator, Response;
use Illuminate\Http\Request;

class InstansiController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user = session()->get('isLogin');
		if($user){
			if($user['role'] == 0){
				return Redirect::to('/pengguna')->withInput();
			}else{
				$instansiNotAccept = Instansi::where('status',0)->get();
				$instansiIgnored = Instansi::where('status',-1)->get();
				$instansiAccept = Instansi::where('status',1)->get();
				$title = 'Instance Management';
				return view('admin.instansi.index',['title'=>$title,'instansiNotAccept'=>$instansiNotAccept,'instansiIgnored'=>$instansiIgnored,'instansiAccept'=>$instansiAccept]);
			}
		}else{
			$title='E-recruito Login';
			return Redirect::to('/login')->with('title',$title);
		}
	}

	public function viewMyInstance(){
		if(session()->get('isLogin')){
			$title = 'My Instance';
			$user = session()->get('isLogin');
			$myinstansi = Instansi::where('iduser',$user['id'])->get();
			return view('user.instansi.viewmyinstance',['title'=>$title,'myinstansi'=>$myinstansi]); 
		}else{
			$title='E-recruito Login';
			return Redirect::to('/login')->with('title',$title);
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if(session()->get('isLogin')){
			$title = 'Create Instansi';
			return view('user.instansi.create',['title'=>$title]); 
		}else{
			$title='E-recruito Login';
			return Redirect::to('/login')->with('title',$title);
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if(session()->get('isLogin')){
			$user = session()->get('isLogin');
			$input = Input::all();
			$rules = array(
				'foto' =>'required|mimes:jpeg,jpg,png', 
				'fileproveinstansi' =>'required|mimes:zip,rar', 
				'name' =>'required|unique:instansi,name', 
				);
			
			$validator = Validator::make($input,$rules);
			if($validator->fails()){
				return Redirect::to('/instansi/create')->withInput()->withErrors($validator->errors());
			}else{

				$image = Input::file('foto');
				$filename  = rand(1111,9999).time() . '.' . $image->getClientOriginalExtension();
				Input::file('foto')->move('public/assets/img/logo-instansi/',$filename);
				$directorylogo = $filename;

				$prove = Input::file('fileproveinstansi');
				$filename  = rand(1111,9999).time() . '.' . $prove->getClientOriginalExtension();
				Input::file('fileproveinstansi')->move('file-server/file-prove-instansi/',$filename);
				$directoryprove = $filename;
				$instansi = Instansi::create([
					'iduser'=>$user['id'],
					'name'=>$input['name'],
					'foto'=>$directorylogo,
					'fileproveinstansi'=>$directoryprove,
					'status'=>0
					]);

				return Redirect::to('/instansi/create')->with('message','1');
			}

		}else{
			$title='E-recruito Login';
			return Redirect::to('/login')->with('title',$title);
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
		
		if (session()->get('isLogin')) {
			$user = session()->get('isLogin');
			if ($user->id == 0) {
				return redirect('/pengguna');
			} else {
				$instansi = Instansi::find($id);
				$instansi->delete();
				return Redirect::route('instansi.index');
			}
		} else {
			return Redirect::to('/login')->with('title',$title);;
		}
	}

	public function deleteInstance($id)
	{
		
		if (session()->get('isLogin')) {
			$user = session()->get('isLogin');
			$instansi = Instansi::find($id);
			if ($instansi->status == -1) {
				$instansi->delete();
				return Redirect::to('/pengguna/instansi')->withInput();
				
			} else {
				return redirect('/pengguna/instansi');
			}
		} else {
			return Redirect::to('/login')->with('title',$title);;
		}
	}

	public function updateInstance()
	{
		$input = Input::all();
		if (session()->get('isLogin')) {

			$rules = array(
				'foto' =>'mimes:jpeg,jpg,png', 
				'email' =>'required|email', 
				'deskripsi' =>'required', 
				);
			
			$validator = Validator::make($input,$rules);
			if($validator->fails()){
				return Redirect::to('pengguna/instansi/update/'.$input['id'])->withInput()->withErrors($validator->errors());
			}else{
				
				$user = session()->get('isLogin');
				$instansi = Instansi::find($input['id']);
				$instansi->email = $input['email'];
				$instansi->deskripsi = $input['deskripsi'];
				if(isset($input['foto'])){
					$image = Input::file('foto');

					File::delete('public/assets/img/logo-instansi/'.$instansi->foto);
					$filename  = rand(1111,9999).time() . '.' . $image->getClientOriginalExtension();
					Input::file('foto')->move('public/assets/img/logo-instansi/',$filename);
					
					$instansi->foto = $filename;

				}

				$instansi->save();
				return Redirect::to('/pengguna/instansi')->with(['message'=>'Update Success ','name'=>$instansi->name]);
			}

		} else {
			return Redirect::to('/login')->with('title',$title);;
		}
	}

	public function editInstance($id)
	{
		
		if(session()->get('isLogin')){
			$instansi = Instansi::find($id);
			$title = 'Edit Instansi '. $instansi['name'];

			return view('user.instansi.edit',['title'=>$title,'instansi'=>$instansi]); 
		}else{
			$title='E-recruito Login';
			return Redirect::to('/login')->with('title',$title);
		}
	}


	public function getDownloadProve($file)
	{
		$file_download=url().'/file-server/file-prove-instansi/'.$file;
		return Response::download($file_download);
	}

	public function acceptInstance($id)
	{
		$instansi = Instansi::find($id);
		$instansi->status = 1;
		$instansi->save();
		return Redirect::to('/instansi')->with('message','Success Accept Instance');
	}

	public function ignoreInstance($id)
	{
		$instansi = Instansi::find($id);
		$instansi->status = -1;
		$instansi->save();
		return Redirect::to('/instansi')->with('message','Success Ignore Instance');
	}

}
