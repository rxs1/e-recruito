<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Bidang;
use App\Oprec;
use App\Instansi;
use Illuminate\Http\Request;
use App\PendaftarBidang;
use Input, Redirect, File, Session,Validator, Response;
class PendaftarBidangController extends Controller {

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

	public function chooseField($idinstansi,$idoprec){


		if(session()->get('isLogin')) {
			$user = session()->get('isLogin');	
			$oprec = Oprec::where('id',$idoprec)->first();
			$instansi=Instansi::where('id',$idinstansi)->first();
			$allbidang = Bidang::where('idoprec',$idoprec)->get();
			$title = 'Choose field on Open Recruiment '.$oprec->name; 
			return view('user.registered-oprec.field.choose',['title'=>$title,'oprec'=>$oprec,'instansi'=>$instansi,'allbidang'=>$allbidang,'idoprec'=>$idoprec,'idinstansi'=>$idinstansi]);
		} else {
			return redirect('/');
		}
	}

	public function choosedField(){


		if(session()->get('isLogin')) {
			$input = Input::all();
			$user = session()->get('isLogin');
			$oprec = Oprec::where('id',$input['idoprec'])->first();
			$instansi=Instansi::where('id',$input['idinstansi'])->first();
			if(count(Input::get('choose')) == 0){
				return Redirect::to('pengguna/instansi/'.$input['idinstansi'].'/oprec/'.$input['idoprec'].'/choose-field')->with('message','-1');
			}
			if(count(Input::get('choose')) <= $oprec['max-field-person']){
				$i=0;
				$choose = Input::get('choose');

				while($i < count(Input::get('choose'))){
					PendaftarBidang::create([
						'iduser'=> $user->id,
						'idbidang'=>$choose[$i],
						'idoprec'=>$input['idoprec'],
						]);
					$i++;
				}
				return Redirect::to('pengguna/registered-oprec')->with('message','1')->with('oprec',$oprec);
			}else{

				return Redirect::to('pengguna/instansi/'.$input['idinstansi'].'/oprec/'.$input['idoprec'].'/choose-field')->with('message','-2');
			}

		} else {
			return redirect('/');


		}
	}



}
