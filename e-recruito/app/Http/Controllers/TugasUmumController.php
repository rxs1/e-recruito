<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Oprec;
use App\TugasUmum;
use Input, Redirect, Validator;
use Illuminate\Http\Request;

class TugasUmumController extends Controller {

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
	public function create($idinstansi,$idoprec)
	{
		if(session()->get('isLogin')){
			$title = 'Create Common Task';
			$oprec = Oprec::where('id',$idoprec)->first();
			$tugasumum = TugasUmum::where('idoprec',$idoprec)->first();
			return view('user.instansi.oprec..field.tugas.create-tugas-umum',['title'=>$title,'idinstansi'=>$idinstansi,'idoprec'=>$idoprec,'oprec'=>$oprec,'tugasumum'=>$tugasumum]); 
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

				'deskripsi' =>'required', 

				);
			
			$validator = Validator::make($input,$rules);
			if($validator->fails()){
				return Redirect::to('/pengguna/instansi/'.$input['idinstansi'].'/oprec/'.$input['idoprec'].'/create-common-task')->withInput()->withErrors($validator->errors());
			}else{
				$tugasumum = TugasUmum::where('idoprec',$input['idoprec'])->first();
				if($tugasumum){
					$tugasumum->deskripsi = $input['deskripsi'];
					$tugasumum->save();
				}else{
					$bidang = TugasUmum::create([
						'idoprec'=>$input['idoprec'],
						'deskripsi'=>$input['deskripsi'],			
						]);
				}
				return Redirect::to('/pengguna/instansi/'.$input['idinstansi'].'/oprec/'.$input['idoprec'].'/allfield')->with('message','2');
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
		//
	}

}
