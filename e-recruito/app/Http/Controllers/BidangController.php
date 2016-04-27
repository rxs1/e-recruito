<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class BidangController extends Controller {

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
	public function create()
	{
		//
	}

	/**
	 * create bidang by admin of instances
	 */
	public function createBidang($idoprec) 
	{
		$input = Input::all();
		$input->idoprec = $idoprec;
		$rules = [
			'name' => 'required',
			'cp' => 'required',
			'deskripsi' => 'required',
			'deadline' => 'date|required',
			'idoprec' => 'required|exists:oprec,id'
		];

		$validator = Validator::make($input,$rules);
		if($validator->fails()){
			return Redirect::to('/oprec/bidang/createBidang')->withInput()->withErrors($validator->errors());
		}else{
			Bidang::create($input);
			return Redirect::to('/pengguna');
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
