<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Oprec;
use Illuminate\Http\Request;
use App\PendaftarOprec;
use Input, Redirect, File, Session,Validator, Response;

class PendaftarOprecController extends Controller {

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

		/**
	 *	Adding user who join to an Open Recruitment
	 */

		public function joinOprec($iduser, $idoprec) {
			if(session()->get('isLogin')) {
				$oprec = Oprec::where('id',$idoprec)->first();
				PendaftarOprec::create([
					'iduser' => $iduser,
					'idoprec' => $idoprec,
					]);

				return Redirect::to('/pengguna/registered-oprec')->with('message','joined')->with('oprecName',$oprec->name);
			} else {
				return redirect('/');


			}

		}


		public function viewAllJoinedOprec() {
			if(session()->get('isLogin')) {
				$user = session()->get('isLogin');
				$title = 'Registered Oprec';
				$allJoined = PendaftarOprec::where('iduser',$user->id)->get();
				
				
				return view('user.registered-oprec.registered-oprec', compact('title','allJoined'));
			} else {
				return redirect('/');
			}
		}


	}
