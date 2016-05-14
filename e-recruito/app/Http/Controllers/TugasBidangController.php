<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Oprec;
use App\TugasBidang;
use Input, Redirect, Validator;
use Illuminate\Http\Request;

class TugasBidangController extends Controller {

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
	public function create($idoprec,$idbidang,$idfield)
	{
		if(session()->get('isLogin')){
			$title = 'Create Common Task';
			$oprec = Oprec::where('id',$idoprec)->first();
			$bidang = Bidang::where('id',$idfield)->first();
			$tugasbidang = TugasBidang::where('idoprec',$idoprec)->where('idbidang',$idfield)->first();
			return view('user.instansi.oprec..field.tugas.create-tugas-bidang',['title'=>$title,'idinstansi'=>$idinstansi,'idoprec'=>$idoprec,'oprec'=>$oprec,'tugasbidang'=>$tugasbidang,'bidang'=>$bidang]); 
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

}
