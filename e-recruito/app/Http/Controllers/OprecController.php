<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Instansi;
use App\Oprec;
use Input, Redirect, File, Session,Validator, Response;	
class OprecController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($id)
	{
		if(session()->get('isLogin')){
			$title = 'Create Oprec';
			return view('user.instansi.oprec.create',['title'=>$title,'idinstansi'=>$id]); 
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
		$input = Input::all();
		$input['statuspublis'] = 0;
		$rules = [
			'name' => 'required',
			'max-field-person' => 'required',
			'deadline' => 'required|after:yesterday',
			'idinstansi' => 'exists:instansi,id'
		];

		$validator = Validator::make($input,$rules);
		if($validator->fails()){
			return Redirect::to('/pengguna/instansi/'.$input['idinstansi'].'/make/oprec')->withInput()->withErrors($validator->errors());
		}else{
			Oprec::create($input);
			$instansi = Instansi::find($input['idinstansi']);
			$title ='All Oprec '.$instansi->name;
			return view('user.instansi.oprec.viewalloprec',['title'=>$title]);
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
